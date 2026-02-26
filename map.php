<?php
// includes/map.php

class MapController {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }

    // دریافت همه مکان‌ها برای نقشه
    public function getAllPlacesForMap() {
        $query = "SELECT id, name_fa, name_en, latitude, longitude, 
                         category, price_range, rating, image_url
                  FROM places 
                  WHERE latitude IS NOT NULL AND longitude IS NOT NULL";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        $places = $stmt->fetchAll();
        
        // گروه‌بندی بر اساس دسته‌بندی
        $grouped = [];
        foreach($places as $place) {
            $grouped[] = [
                'type' => 'Feature',
                'properties' => [
                    'id' => $place['id'],
                    'name' => $place['name_fa'],
                    'category' => $place['category'],
                    'price' => $place['price_range'],
                    'rating' => $place['rating'],
                    'popupContent' => $this->generatePopupContent($place)
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$place['longitude'], $place['latitude']]
                ]
            ];
        }
        
        return [
            'type' => 'FeatureCollection',
            'features' => $grouped
        ];
    }

    // تولید محتوای پاپ‌آپ
    private function generatePopupContent($place) {
        return "
            <div class='map-popup'>
                <img src='{$place['image_url']}' alt='{$place['name_fa']}' style='width:100px;height:60px;border-radius:5px;'>
                <h4>{$place['name_fa']}</h4>
                <p>امتیاز: {$place['rating']} ⭐</p>
                <button onclick='showPlaceDetails({$place['id']})' class='popup-btn'>
                    مشاهده جزئیات
                </button>
            </div>
        ";
    }

    // پیدا کردن مکان‌های نزدیک
    public function findNearbyPlaces($lat, $lng, $radius = 5) {
        $query = "SELECT *, 
                         (6371 * acos(cos(radians(:lat)) * cos(radians(latitude)) * 
                         cos(radians(longitude) - radians(:lng)) + sin(radians(:lat)) * 
                         sin(radians(latitude)))) AS distance 
                  FROM places 
                  HAVING distance < :radius 
                  ORDER BY distance 
                  LIMIT 10";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':lat', $lat);
        $stmt->bindParam(':lng', $lng);
        $stmt->bindParam(':radius', $radius);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
}