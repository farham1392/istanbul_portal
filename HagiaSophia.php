<?php
// مدیریت زبان
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'fa';

// تنظیم هدر برای کدگذاری کاراکترها
header('Content-Type: text/html; charset=utf-8');

// اطلاعات ایاصوفیه به سه زبان
$content = [
    'fa' => [
        'lang_code' => 'fa',
        'dir' => 'rtl',
        'title' => 'تحلیل نقش موقعیت جغرافیایی ایاصوفیه',
        'meta_description' => 'تحلیل جامع تأثیر موقعیت جغرافیایی، شرایط اقلیمی و زمین‌شناختی بر شکل‌گیری، معماری و کاربری ایاصوفیه',
        'header_title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری، معماری و کاربری ایاصوفیه',
        'header_subtitle' => 'بررسی تأثیر موقعیت جغرافیایی، شرایط اقلیمی و زمین‌شناختی، و جایگاه راهبردی تنگه بسفر بر مکان‌یابی، معماری، کاربری مذهبی و هویت تاریخی ایاصوفیه',
        'abstract_title' => 'چکیده',
        'abstract_content' => 'ایاصوفیه یکی از شاخص‌ترین بناهای تاریخ معماری جهان است که فراتر از یک سازه مذهبی، بازتابی عینی از موقعیت جغرافیایی، راهبردی و ژئوپلیتیکی شهر استانبول محسوب می‌شود. این مقاله با تلفیق دو متن تحلیلی ارائه‌شده، به بررسی تأثیر موقعیت جغرافیایی، شرایط اقلیمی و زمین‌شناختی، و جایگاه راهبردی تنگه بسفر بر مکان‌یابی، معماری، کاربری مذهبی و هویت تاریخی ایاصوفیه می‌پردازد. یافته‌ها نشان می‌دهد که ایاصوفیه نه‌تنها محصول یک دوره یا یک دین خاص، بلکه نتیجه تعامل مستمر جغرافیا، قدرت سیاسی و تحولات تمدنی است.',
        'location_title' => 'موقعیت جغرافیایی و راهبردی استانبول',
        'location_content' => 'استانبول (قسطنطنیه سابق) تنها شهر بزرگ جهان است که بر روی دو قاره آسیا و اروپا قرار دارد. این شهر بر تنگه بسفر اشراف دارد؛ گذرگاهی حیاتی که دریای سیاه را به دریای مرمره و در نهایت به مدیترانه متصل می‌کند. این موقعیت جغرافیایی، استانبول را به گلوگاهی تجاری و نظامی در مقیاس جهانی تبدیل کرده است.',
        'positioning_title' => 'مکان‌یابی ایاصوفیه',
        'positioning_content' => 'ایاصوفیه در مرتفع‌ترین و مرکزی‌ترین نقطه شبه‌جزیره تاریخی استانبول (تپه اول) ساخته شد؛ مکانی که از نظر بصری بر شهر، راه‌های زمینی و مسیرهای دریایی اشراف کامل داشت. نزدیکی آن به کاخ بزرگ امپراتوری و هیپودروم، این بنا را به قلب سیاسی–مذهبی امپراتوری روم شرقی تبدیل کرد.',
        'strategic_title' => 'تأثیر شرایط راهبردی و نظامی تنگه بسفر',
        'strategic_content' => 'تنگه بسفر یکی از مهم‌ترین نقاط راهبردی جهان به‌شمار می‌آید. هر قدرتی که قسطنطنیه را در اختیار داشت، می‌توانست عبور ناوگان‌های دریایی را کنترل کرده یا از آن مالیات دریافت کند. ایاصوفیه نماد مشروعیت سیاسی و مذهبی حاکمیت بر این گذرگاه حیاتی بود.',
        'strategic_quote' => 'پس از فتح قسطنطنیه در سال ۱۴۵۳ میلادی، تبدیل ایاصوفیه به مسجد جامع، اعلام رسمی انتقال قدرت از روم شرقی مسیحی به امپراتوری اسلامی عثمانی محسوب می‌شد.',
        'climate_title' => 'تأثیر اقلیم و شرایط محیطی',
        'climate_items' => [
            [
                'title' => 'اقلیم استانبول',
                'content' => 'استانبول دارای اقلیم معتدل مرطوب با تابستان‌های ملایم، زمستان‌های مرطوب و بادهای شدید ناشی از بسفر است.',
                'icon' => 'temperature-low'
            ],
            [
                'title' => 'طراحی گنبد',
                'content' => 'گنبد عظیم مرکزی ایاصوفیه به گردش هوا و تعادل دمایی فضای داخلی کمک می‌کند.',
                'icon' => 'wind'
            ],
            [
                'title' => 'سیستم نورگیری',
                'content' => 'پنجره‌های متعدد در پایه گنبد، نور طبیعی فراوانی ایجاد کرده و رطوبت فضای داخلی را کاهش می‌دهد.',
                'icon' => 'lightbulb'
            ],
            [
                'title' => 'مصالح ساختمانی',
                'content' => 'استفاده از سنگ و آجر ضخیم نیز موجب پایداری حرارتی و مقاومت در برابر رطوبت شده است.',
                'icon' => 'mountain'
            ]
        ],
        'earthquake_title' => 'زمین‌شناسی و زلزله‌خیزی منطقه',
        'earthquake_content' => 'استانبول بر روی کمربند لرزه‌خیز آلپ–هیمالیا قرار دارد و زلزله‌های متعددی در طول تاریخ این شهر را تهدید کرده‌اند. طراحی سازه‌ای ایاصوفیه با استفاده از پندنتیوها، نیم‌گنبدها و قوس‌های بزرگ، پاسخی مستقیم به این شرایط زمین‌شناختی بوده است.',
        'reinforcement_title' => 'تقویت سازه در دوره عثمانی',
        'reinforcement_content' => 'در دوره عثمانی، معمار سینان با افزودن پشت‌بندها، ستون‌های تقویتی و مناره‌ها، پایداری سازه را در برابر زلزله افزایش داد.',
        'usage_title' => 'تأثیر جغرافیا بر کاربری مذهبی و تاریخی',
        'usage_items' => [
            [
                'title' => 'دوره بیزانس',
                'content' => 'در دوره بیزانس، ایاصوفیه کلیسای اصلی جهان ارتدوکس و محل تاج‌گذاری امپراتوران بود.',
                'icon' => 'church'
            ],
            [
                'title' => 'دوره عثمانی',
                'content' => 'در دوره عثمانی، این بنا به مسجد جامع امپراتوری تبدیل شد و الگویی برای مساجد بزرگ بعدی فراهم آورد.',
                'icon' => 'mosque'
            ],
            [
                'title' => 'دوره مدرن',
                'content' => 'در دوره مدرن، تبدیل آن به موزه و سپس بازگشت دوباره به مسجد، بازتابی از تحولات سیاسی، مذهبی و ژئوپلیتیکی ترکیه معاصر است.',
                'icon' => 'landmark'
            ]
        ],
        'conclusion_title' => 'جمع‌بندی',
        'conclusion_content' => 'ایاصوفیه تجسم فیزیکی موقعیت جغرافیایی استثنایی استانبول است. مکان‌یابی آن نماد قدرت جهانی، معماری‌اش پاسخی به اقلیم و زلزله، و کاربری مذهبی‌اش آینه تغییر حاکمیت‌ها و ایدئولوژی‌هاست.',
        'conclusion_quote' => 'ایاصوفیه نه‌تنها یک بنای تاریخی، بلکه روایتی زنده از تعامل جغرافیا، سیاست و تمدن است.',
        'footer_text' => 'تحلیل علمی تأثیر جغرافیا بر معماری و تاریخ ایاصوفیه',
        'footer_designed' => 'طراحی شده با <i class="fas fa-heart" style="color: #e74c3c;"></i> برای ارائه در سطح جهانی',
        'copyright' => '© ۲۰۲۳ - همه حقوق محفوظ است',
        'lang_switcher' => 'زبان:',
        'back_tooltip' => 'بازار بزرگ استانبول'
    ],
    
    'tr' => [
        'lang_code' => 'tr',
        'dir' => 'ltr',
        'title' => 'Ayasofya\'nın Coğrafi Konumunun Rolünün Analizi',
        'meta_description' => 'Ayasofya\'nın oluşumu, mimarisi ve kullanımında coğrafi konumun, iklim koşullarının ve jeolojik faktörlerin kapsamlı analizi',
        'header_title' => 'Ayasofya\'nın Oluşumu, Mimarisi ve Kullanımında Coğrafi Konumun Rolünün Analizi',
        'header_subtitle' => 'Ayasofya\'nın konumlandırılması, mimarisi, dini kullanımı ve tarihi kimliği üzerinde coğrafi konum, iklim koşulları, jeolojik faktörler ve İstanbul Boğazı\'nın stratejik konumunun etkisinin incelenmesi',
        'abstract_title' => 'Özet',
        'abstract_content' => 'Ayasofya, dini bir yapı olmanın ötesinde, İstanbul\'un coğrafi, stratejik ve jeopolitik konumunun somut bir yansıması olan dünya mimarlık tarihinin en önemli yapılarından biridir. Bu makale, iki analitik metnin birleştirilmesiyle, Ayasofya\'nın konumlandırılması, mimarisi, dini kullanımı ve tarihi kimliği üzerinde coğrafi konum, iklim koşulları, jeolojik faktörler ve İstanbul Boğazı\'nın stratejik konumunun etkisini incelemektedir. Bulgular, Ayasofya\'nın sadece belirli bir dönemin veya dinin ürünü değil, aynı zamanda coğrafya, siyasi güç ve medeniyet dönüşümlerinin sürekli etkileşiminin bir sonucu olduğunu göstermektedir.',
        'location_title' => 'İstanbul\'un Coğrafi ve Stratejik Konumu',
        'location_content' => 'İstanbul (eski Konstantinopolis), Asya ve Avrupa kıtaları üzerinde yer alan dünyanın tek büyük şehridir. Şehir, Karadeniz\'i Marmara Denizi\'ne ve nihayetinde Akdeniz\'e bağlayan hayati bir geçit olan İstanbul Boğazı\'na hakimdir. Bu coğrafi konum, İstanbul\'u küresel ölçekte bir ticari ve askeri darboğaza dönüştürmüştür.',
        'positioning_title' => 'Ayasofya\'nın Konumlandırılması',
        'positioning_content' => 'Ayasofya, tarihi İstanbul yarımadasının (Birinci Tepe) en yüksek ve merkezi noktasına inşa edilmiştir; şehre, karayollarına ve deniz yollarına tamamen hakim bir konumdadır. İmparatorluk Sarayı ve Hipodrom\'a yakınlığı, bu yapıyı Doğu Roma İmparatorluğu\'nun politik-dini kalbi haline getirdi.',
        'strategic_title' => 'İstanbul Boğazı\'nın Stratejik ve Askeri Koşullarının Etkisi',
        'strategic_content' => 'İstanbul Boğazı, dünyanın en önemli stratejik noktalarından biri olarak kabul edilir. Konstantinopolis\'i kontrol eden her güç, deniz filolarının geçişini kontrol edebilir veya onlardan vergi alabilirdi. Ayasofya, bu hayati geçidi kontrol eden iktidarın politik ve dini meşruiyetinin bir sembolüydü.',
        'strategic_quote' => '1453 yılında Konstantinopolis\'in fethinden sonra, Ayasofya\'nın camiye dönüştürülmesi, gücün Hristiyan Doğu Roma İmparatorluğu\'ndan İslami Osmanlı İmparatorluğu\'na resmi olarak aktarılması anlamına geliyordu.',
        'climate_title' => 'İklim ve Çevresel Koşulların Etkisi',
        'climate_items' => [
            [
                'title' => 'İstanbul\'un İklimi',
                'content' => 'İstanbul, yazları ılıman, kışları nemli ve boğazdan gelen şiddetli rüzgarlarla karakterize edilen ılıman nemli bir iklime sahiptir.',
                'icon' => 'temperature-low'
            ],
            [
                'title' => 'Kubbe Tasarımı',
                'content' => 'Ayasofya\'nın dev merkezi kubbesi, hava sirkülasyonuna ve iç mekanın ısı dengesine yardımcı olur.',
                'icon' => 'wind'
            ],
            [
                'title' => 'Aydınlatma Sistemi',
                'content' => 'Kubbe tabanındaki çok sayıda pencere, bol doğal ışık sağlar ve iç mekanın nemini azaltır.',
                'icon' => 'lightbulb'
            ],
            [
                'title' => 'Yapı Malzemeleri',
                'content' => 'Kalın taş ve tuğla kullanımı, termal stabilite ve neme karşı direnç sağlamıştır.',
                'icon' => 'mountain'
            ]
        ],
        'earthquake_title' => 'Bölgenin Jeolojisi ve Depremselliği',
        'earthquake_content' => 'İstanbul, Alp-Himalaya deprem kuşağı üzerinde yer alır ve tarih boyunca çok sayıda deprem bu şehri tehdit etmiştir. Ayasofya\'nın pandantifler, yarım kubbeler ve büyük kemerler kullanılarak yapısal tasarımı, bu jeolojik koşullara doğrudan bir yanıt olmuştur.',
        'reinforcement_title' => 'Osmanlı Döneminde Yapı Güçlendirmesi',
        'reinforcement_content' => 'Osmanlı döneminde, Mimar Sinan payandalar, takviye sütunları ve minareler ekleyerek yapının depreme karşı dayanıklılığını artırdı.',
        'usage_title' => 'Coğrafyanın Dini ve Tarihi Kullanım Üzerindeki Etkisi',
        'usage_items' => [
            [
                'title' => 'Bizans Dönemi',
                'content' => 'Bizans döneminde, Ayasofya Ortodoks dünyasının ana kilisesi ve imparatorların taç giyme yeriydi.',
                'icon' => 'church'
            ],
            [
                'title' => 'Osmanlı Dönemi',
                'content' => 'Osmanlı döneminde, bu yapı imparatorluk camisine dönüştürüldü ve sonraki büyük camilere bir model sağladı.',
                'icon' => 'mosque'
            ],
            [
                'title' => 'Modern Dönem',
                'content' => 'Modern dönemde, müzeye dönüştürülmesi ve daha sonra tekrar camiye dönüşmesi, çağdaş Türkiye\'nin politik, dini ve jeopolitik dönüşümlerinin bir yansımasıdır.',
                'icon' => 'landmark'
            ]
        ],
        'conclusion_title' => 'Sonuç',
        'conclusion_content' => 'Ayasofya, İstanbul\'un istisnai coğrafi konumunun fiziksel bir tezahürüdür. Konumlandırılması küresel gücün bir sembolüdür, mimarisi iklime ve depreme bir yanıttır ve dini kullanımı iktidar değişikliklerinin ve ideolojilerin aynasıdır.',
        'conclusion_quote' => 'Ayasofya sadece tarihi bir yapı değil, aynı zamanda coğrafya, politika ve medeniyet etkileşiminin canlı bir anlatımıdır.',
        'footer_text' => 'Ayasofya\'nın mimarisi ve tarihi üzerinde coğrafyanın etkisinin bilimsel analizi',
        'footer_designed' => 'Küresel sunum için <i class="fas fa-heart" style="color: #e74c3c;"></i> ile tasarlandı',
        'copyright' => '© 2023 - Tüm hakları saklıdır',
        'lang_switcher' => 'Dil:',
        'back_tooltip' => 'Kapalı Çarşı'
    ],
    
    'en' => [
        'lang_code' => 'en',
        'dir' => 'ltr',
        'title' => 'Analysis of the Role of Geographic Location in Hagia Sophia',
        'meta_description' => 'Comprehensive analysis of the impact of geographical location, climatic conditions, and geological factors on the formation, architecture and use of Hagia Sophia',
        'header_title' => 'Analysis of the Role of Geographic Location in the Formation, Architecture and Use of Hagia Sophia',
        'header_subtitle' => 'Examination of the influence of geographical location, climatic conditions, geological factors, and the strategic position of the Bosphorus Strait on the positioning, architecture, religious use and historical identity of Hagia Sophia',
        'abstract_title' => 'Abstract',
        'abstract_content' => 'Hagia Sophia is one of the most significant structures in the history of world architecture, which beyond being a religious structure, is a tangible reflection of Istanbul\'s geographical, strategic and geopolitical position. This article, by combining two analytical texts, examines the influence of geographical location, climatic conditions, geological factors, and the strategic position of the Bosphorus Strait on the positioning, architecture, religious use and historical identity of Hagia Sophia. Findings show that Hagia Sophia is not only the product of a specific period or religion, but also the result of continuous interaction between geography, political power and civilizational transformations.',
        'location_title' => 'Geographical and Strategic Location of Istanbul',
        'location_content' => 'Istanbul (formerly Constantinople) is the only major city in the world located on two continents, Asia and Europe. The city overlooks the Bosphorus Strait, a vital passage connecting the Black Sea to the Sea of Marmara and ultimately to the Mediterranean. This geographical location has turned Istanbul into a commercial and military bottleneck on a global scale.',
        'positioning_title' => 'Positioning of Hagia Sophia',
        'positioning_content' => 'Hagia Sophia was built at the highest and most central point of the historical Istanbul peninsula (First Hill); a location that completely overlooks the city, land routes and sea routes. Its proximity to the Imperial Palace and the Hippodrome made this structure the political-religious heart of the Eastern Roman Empire.',
        'strategic_title' => 'Impact of Strategic and Military Conditions of the Bosphorus Strait',
        'strategic_content' => 'The Bosphorus Strait is considered one of the most important strategic points in the world. Any power that controlled Constantinople could control the passage of naval fleets or tax them. Hagia Sophia was a symbol of the political and religious legitimacy of the rule over this vital passage.',
        'strategic_quote' => 'After the conquest of Constantinople in 1453, the conversion of Hagia Sophia into a mosque meant the official transfer of power from the Christian Eastern Roman Empire to the Islamic Ottoman Empire.',
        'climate_title' => 'Influence of Climate and Environmental Conditions',
        'climate_items' => [
            [
                'title' => 'Istanbul\'s Climate',
                'content' => 'Istanbul has a temperate humid climate with mild summers, humid winters and strong winds from the strait.',
                'icon' => 'temperature-low'
            ],
            [
                'title' => 'Dome Design',
                'content' => 'Hagia Sophia\'s huge central dome helps air circulation and thermal balance of the interior space.',
                'icon' => 'wind'
            ],
            [
                'title' => 'Lighting System',
                'content' => 'Numerous windows at the base of the dome provide abundant natural light and reduce humidity in the interior space.',
                'icon' => 'lightbulb'
            ],
            [
                'title' => 'Building Materials',
                'content' => 'The use of thick stone and brick also provided thermal stability and resistance to moisture.',
                'icon' => 'mountain'
            ]
        ],
        'earthquake_title' => 'Geology and Seismicity of the Region',
        'earthquake_content' => 'Istanbul is located on the Alpine-Himalayan earthquake belt and numerous earthquakes have threatened this city throughout history. The structural design of Hagia Sophia using pendentives, half-domes and large arches was a direct response to these geological conditions.',
        'reinforcement_title' => 'Structural Reinforcement in the Ottoman Period',
        'reinforcement_content' => 'During the Ottoman period, Architect Sinan increased the structure\'s resistance to earthquakes by adding buttresses, reinforcement columns and minarets.',
        'usage_title' => 'Impact of Geography on Religious and Historical Use',
        'usage_items' => [
            [
                'title' => 'Byzantine Period',
                'content' => 'In the Byzantine period, Hagia Sophia was the main church of the Orthodox world and the coronation place of emperors.',
                'icon' => 'church'
            ],
            [
                'title' => 'Ottoman Period',
                'content' => 'In the Ottoman period, this structure was converted into an imperial mosque and provided a model for subsequent large mosques.',
                'icon' => 'mosque'
            ],
            [
                'title' => 'Modern Period',
                'content' => 'In the modern period, its conversion into a museum and then back to a mosque reflects the political, religious and geopolitical transformations of contemporary Turkey.',
                'icon' => 'landmark'
            ]
        ],
        'conclusion_title' => 'Conclusion',
        'conclusion_content' => 'Hagia Sophia is a physical manifestation of Istanbul\'s exceptional geographical location. Its positioning symbolizes global power, its architecture is a response to climate and earthquakes, and its religious use mirrors changes in power and ideologies.',
        'conclusion_quote' => 'Hagia Sophia is not only a historical structure, but also a living narrative of the interaction between geography, politics and civilization.',
        'footer_text' => 'Scientific analysis of the influence of geography on the architecture and history of Hagia Sophia',
        'footer_designed' => 'Designed with <i class="fas fa-heart" style="color: #e74c3c;"></i> for global presentation',
        'copyright' => '© 2023 - All rights reserved',
        'lang_switcher' => 'Language:',
        'back_tooltip' => 'Grand Bazaar'
    ]
];

// انتخاب محتوای زبان فعلی
$current = $content[$lang];
?>
<!DOCTYPE html>
<html lang="<?php echo $current['lang_code']; ?>" dir="<?php echo $current['dir']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $current['title']; ?></title>
    <meta name="description" content="<?php echo $current['meta_description']; ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- فونت‌های مناسب هر زبان -->
    <?php if($lang == 'fa'): ?>
        <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Noto+Naskh+Arabic:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?php elseif($lang == 'tr'): ?>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <?php else: ?>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <?php endif; ?>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: <?php 
                if($lang == 'fa') echo "'Noto Naskh Arabic', 'Amiri', serif";
                else echo "'Poppins', sans-serif";
            ?>;
            line-height: 1.8;
            color: #333;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
            padding-bottom: 50px;
            direction: <?php echo $current['dir']; ?>;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            text-align: center;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('https://images.unsplash.com/photo-1528190336456-9eb7e9e0eef9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 20px;
            border-radius: 0 0 20px 20px;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        
        header h1 {
            font-size: 3.2rem;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        .subtitle {
            font-size: 1.4rem;
            opacity: 0.9;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        /* ناوبری و تغییر زبان */
        .navigation {
            position: absolute;
            top: 20px;
            <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .language-switcher {
            display: flex;
            gap: 10px;
            background: rgba(255, 255, 255, 0.1);
            padding: 8px 15px;
            border-radius: 8px;
            backdrop-filter: blur(5px);
        }
        
        .lang-option {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            font-weight: 500;
        }
        
        .lang-option:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .lang-option.active {
            background-color: #8B4513;
            color: white;
        }
        
        .content-card {
            background-color: white;
            border-radius: 15px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 5px solid #8B4513;
        }
        
        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }
        
        h2 {
            color: #8B4513;
            font-size: 2.2rem;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #F0E68C;
            position: relative;
        }
        
        h2:after {
            content: '';
            position: absolute;
            bottom: -2px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 0;
            width: 100px;
            height: 2px;
            background: #8B4513;
        }
        
        h3 {
            color: #654321;
            font-size: 1.8rem;
            margin: 30px 0 15px;
            display: flex;
            align-items: center;
        }
        
        h3 i {
            margin-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 10px;
            color: #8B4513;
        }
        
        p {
            font-size: 1.2rem;
            margin-bottom: 20px;
            text-align: justify;
            color: #444;
        }
        
        .highlight-box {
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #FDF6E3, #FAF0E6);
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 4px solid #DAA520;
            padding: 25px;
            border-radius: 10px;
            margin: 25px 0;
            box-shadow: 0 5px 15px rgba(218, 165, 32, 0.1);
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }
        
        .info-item {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-top: 4px solid #8B4513;
            transition: all 0.3s ease;
        }
        
        .info-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .info-item h4 {
            color: #8B4513;
            font-size: 1.4rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .info-item h4 i {
            margin-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 10px;
        }
        
        .quote {
            font-style: italic;
            text-align: center;
            font-size: 1.4rem;
            color: #654321;
            padding: 30px;
            margin: 40px 0;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #FFF8DC, #FFFAF0);
            border-radius: 15px;
            position: relative;
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 5px solid #DAA520;
            border-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 5px solid #DAA520;
        }
        
        .quote:before, .quote:after {
            content: '"';
            font-size: 3rem;
            color: #8B4513;
            position: absolute;
            opacity: 0.3;
        }
        
        .quote:before {
            top: 10px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 20px;
        }
        
        .quote:after {
            bottom: 10px;
            <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 20px;
        }
        
        .conclusion {
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>, #8B4513, #654321);
            color: white;
            padding: 40px;
            border-radius: 15px;
            margin-top: 40px;
        }
        
        .conclusion h2 {
            color: #FFD700;
            border-bottom-color: #FFD700;
        }
        
        .conclusion p {
            color: #f5f5f5;
        }
        
        footer {
            text-align: center;
            margin-top: 60px;
            padding: 30px;
            color: #666;
            border-top: 1px solid #ddd;
        }
        
        .hagia-sophia-icon {
            text-align: center;
            margin: 30px 0;
            color: #8B4513;
            font-size: 2.5rem;
        }
        
        /* دکمه بازگشت */
        .back-button {
            position: fixed;
            bottom: 30px;
            <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 30px;
            background: linear-gradient(135deg, #8B4513, #654321);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            box-shadow: 0 6px 15px rgba(139, 69, 19, 0.4);
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .back-button:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 25px rgba(139, 69, 19, 0.6);
            background: linear-gradient(135deg, #654321, #8B4513);
        }
        
        .back-button .tooltip {
            position: absolute;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 70px;
            background: rgba(139, 69, 19, 0.9);
            color: white;
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 0.9rem;
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }
        
        .back-button:hover .tooltip {
            opacity: 1;
        }
        
        .back-button .tooltip:after {
            content: '';
            position: absolute;
            top: 50%;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: -6px;
            transform: translateY(-50%);
            border-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 6px solid rgba(139, 69, 19, 0.9);
            border-top: 6px solid transparent;
            border-bottom: 6px solid transparent;
        }
        
        @media (max-width: 768px) {
            header h1 {
                font-size: 2.2rem;
            }
            
            .subtitle {
                font-size: 1.1rem;
            }
            
            h2 {
                font-size: 1.8rem;
            }
            
            h3 {
                font-size: 1.5rem;
            }
            
            .content-card {
                padding: 25px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .navigation {
                flex-direction: column;
                gap: 10px;
                <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 10px;
                top: 10px;
            }
            
            .language-switcher {
                font-size: 0.9rem;
                padding: 5px 10px;
            }
            
            .back-button {
                width: 50px;
                height: 50px;
                bottom: 20px;
                <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 20px;
                font-size: 1.5rem;
            }
            
            .back-button .tooltip {
                font-size: 0.8rem;
                padding: 6px 10px;
                <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 60px;
            }
        }
    </style>
</head>

<body>
    <!-- دکمه بازگشت -->
    <a href="index.php" class="back-button">
        <i class="fas fa-arrow-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>"></i>
        <span class="tooltip"><?php echo $current['back_tooltip']; ?></span>
    </a>
    
    <header>
        <div class="navigation">
            <div class="language-switcher">
                <span><?php echo $current['lang_switcher']; ?></span>
                <a href="?lang=fa" class="lang-option <?php echo $lang == 'fa' ? 'active' : ''; ?>">فا</a>
                <a href="?lang=tr" class="lang-option <?php echo $lang == 'tr' ? 'active' : ''; ?>">TR</a>
                <a href="?lang=en" class="lang-option <?php echo $lang == 'en' ? 'active' : ''; ?>">EN</a>
            </div>
        </div>
        
        <h1><?php echo $current['header_title']; ?></h1>
        <p class="subtitle"><?php echo $current['header_subtitle']; ?></p>
    </header>
    
    <div class="container">
        <div class="content-card">
            <h2><i class="fas fa-map-marker-alt"></i> <?php echo $current['abstract_title']; ?></h2>
            <p><?php echo $current['abstract_content']; ?></p>
            
            <div class="hagia-sophia-icon">
                <i class="fas fa-monument"></i>
                <i class="fas fa-mosque"></i>
                <i class="fas fa-church"></i>
                <i class="fas fa-landmark"></i>
            </div>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-globe-asia"></i> <?php echo $current['location_title']; ?></h2>
            <p><?php echo $current['location_content']; ?></p>
            
            <div class="highlight-box">
                <h3><i class="fas fa-hill-rockslide"></i> <?php echo $current['positioning_title']; ?></h3>
                <p><?php echo $current['positioning_content']; ?></p>
            </div>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-route"></i> <?php echo $current['strategic_title']; ?></h2>
            <p><?php echo $current['strategic_content']; ?></p>
            
            <div class="quote">
                <?php echo $current['strategic_quote']; ?>
            </div>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-sun"></i> <?php echo $current['climate_title']; ?></h2>
            
            <div class="info-grid">
                <?php foreach($current['climate_items'] as $item): ?>
                <div class="info-item">
                    <h4><i class="fas fa-<?php echo $item['icon']; ?>"></i> <?php echo $item['title']; ?></h4>
                    <p><?php echo $item['content']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-mountain"></i> <?php echo $current['earthquake_title']; ?></h2>
            <p><?php echo $current['earthquake_content']; ?></p>
            
            <div class="highlight-box">
                <h3><i class="fas fa-hard-hat"></i> <?php echo $current['reinforcement_title']; ?></h3>
                <p><?php echo $current['reinforcement_content']; ?></p>
            </div>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-history"></i> <?php echo $current['usage_title']; ?></h2>
            
            <div class="info-grid">
                <?php foreach($current['usage_items'] as $item): ?>
                <div class="info-item">
                    <h4><i class="fas fa-<?php echo $item['icon']; ?>"></i> <?php echo $item['title']; ?></h4>
                    <p><?php echo $item['content']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="conclusion">
            <h2><i class="fas fa-gem"></i> <?php echo $current['conclusion_title']; ?></h2>
            <p><?php echo $current['conclusion_content']; ?></p>
            
            <div class="quote" style="background: rgba(255, 255, 255, 0.1); color: #FFD700; margin-top: 30px;">
                <?php echo $current['conclusion_quote']; ?>
            </div>
        </div>
        
        <footer>
            <p><?php echo $current['footer_text']; ?></p>
            <p><?php echo $current['footer_designed']; ?></p>
            <p style="margin-top: 15px; font-size: 0.9rem;"><?php echo $current['copyright']; ?></p>
        </footer>
    </div>

    <script>
        // افزودن انیمیشن‌های ساده برای کارت‌ها هنگام اسکرول
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.content-card, .info-item');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });
            
            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(card);
            });
            
            // افزودن پارالاکس برای هدر
            const header = document.querySelector('header');
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const rate = scrolled * 0.5;
                header.style.backgroundPosition = `center ${rate}px`;
            });
        });
    </script>
</body>
</html>