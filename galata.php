<?php
// مدیریت زبان
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'fa';

// تنظیم هدر برای کدگذاری کاراکترها
header('Content-Type: text/html; charset=utf-8');

// اطلاعات برج گالاتا به سه زبان
$content = [
    'fa' => [
        'lang_code' => 'fa',
        'dir' => 'rtl',
        'title' => 'برج گالاتا استانبول - تحلیل موقعیت جغرافیایی و تاریخی',
        'meta_description' => 'تحلیل جامع نقش موقعیت جغرافیایی، تاریخ و معماری برج گالاتا استانبول',
        'header_title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری، معماری و کاربری برج گالاتا',
        'header_subtitle' => 'بررسی تأثیر موقعیت جغرافیایی، شرایط اقلیمی و زمین‌شناختی، و جایگاه راهبردی تنگه بسفر بر مکان‌یابی، معماری، کاربری و هویت تاریخی برج گالاتا',
        'nav_home' => 'خانه',
        'nav_history' => 'تاریخچه',
        'nav_architecture' => 'معماری',
        'nav_visit' => 'بازدید',
        'nav_gallery' => 'گالری',
        'abstract_title' => 'چکیده',
        'abstract_content' => 'برج گالاتا یکی از نمادهای شهری استانبول است که فراتر از یک سازه معمولی، بازتابی عینی از موقعیت جغرافیایی، راهبردی و ژئوپلیتیکی شهر محسوب می‌شود. این مقاله به بررسی تأثیر موقعیت جغرافیایی، شرایط اقلیمی و زمین‌شناختی، و جایگاه راهبردی تنگه بسفر بر مکان‌یابی، معماری، کاربری و هویت تاریخی برج گالاتا می‌پردازد. یافته‌ها نشان می‌دهد که برج گالاتا نه‌تنها محصول یک دوره تاریخی خاص، بلکه نتیجه تعامل مستمر جغرافیا، قدرت سیاسی و تحولات تمدنی است.',
        'location_title' => 'موقعیت جغرافیایی و راهبردی استانبول',
        'location_content' => 'استانبول (قسطنطنیه سابق) تنها شهر بزرگ جهان است که بر روی دو قاره آسیا و اروپا قرار دارد. این شهر بر تنگه بسفر اشراف دارد؛ گذرگاهی حیاتی که دریای سیاه را به دریای مرمره و در نهایت به مدیترانه متصل می‌کند. این موقعیت جغرافیایی، استانبول را به گلوگاهی تجاری و نظامی در مقیاس جهانی تبدیل کرده است.',
        'positioning_title' => 'مکان‌یابی برج گالاتا',
        'positioning_content' => 'برج گالاتا در مرتفع‌ترین نقطه منطقه گالاتا ساخته شد؛ مکانی که از نظر بصری بر تنگه بسفر، خلیج شاخ طلایی و بخش اروپایی استانبول اشراف کامل داشت. نزدیکی آن به بندرگاه تاریخی، این برج را به چشم راهبردی منطقه گالاتا تبدیل کرد که هم برای دیده‌بانی و هم برای هدایت کشتی‌ها استفاده می‌شد.',
        'strategic_title' => 'تأثیر شرایط راهبردی و نظامی تنگه بسفر',
        'strategic_content' => 'تنگه بسفر یکی از مهم‌ترین نقاط راهبردی جهان به‌شمار می‌آید. هر قدرتی که قسطنطنیه را در اختیار داشت، می‌توانست عبور ناوگان‌های دریایی را کنترل کرده یا از آن مالیات دریافت کند. برج گالاتا نماد نظارت و کنترل بر این گذرگاه حیاتی بود.',
        'strategic_quote' => 'ساخت برج گالاتا در سال ۱۳۴۸ میلادی توسط جنوایی‌ها، اعلام حضور و قدرت تجاری آنان در قلب قسطنطنیه محسوب می‌شد. پس از فتح قسطنطنیه در سال ۱۴۵۳ میلادی، استفاده عثمانی‌ها از این برج به عنوان برج دیده‌بانی، تأیید نقش راهبردی این سازه بود.',
        'climate_title' => 'تأثیر اقلیم و شرایط محیطی',
        'climate_items' => [
            [
                'title' => 'اقلیم استانبول',
                'content' => 'استانبول دارای اقلیم معتدل مرطوب با تابستان‌های ملایم، زمستان‌های مرطوب و بادهای شدید ناشی از بسفر است.',
                'icon' => 'temperature-low'
            ],
            [
                'title' => 'طراحی مخروطی',
                'content' => 'ساختار مخروطی شکل برج به مقاومت در برابر بادهای شدید بسفر کمک می‌کند.',
                'icon' => 'wind'
            ],
            [
                'title' => 'سیستم نورگیری',
                'content' => 'پنجره‌های متعدد در بدنه برج، امکان دید ۳۶۰ درجه و نورگیری مناسب را فراهم می‌آورند.',
                'icon' => 'lightbulb'
            ],
            [
                'title' => 'مصالح ساختمانی',
                'content' => 'استفاده از سنگ و آجر ضخیم موجب پایداری حرارتی و مقاومت در برابر رطوبت شده است.',
                'icon' => 'mountain'
            ]
        ],
        'earthquake_title' => 'زمین‌شناسی و زلزله‌خیزی منطقه',
        'earthquake_content' => 'استانبول بر روی کمربند لرزه‌خیز آلپ–هیمالیا قرار دارد و زلزله‌های متعددی در طول تاریخ این شهر را تهدید کرده‌اند. طراحی استوانه‌ای برج گالاتا با دیوارهای ضخیم (۳.۷ متر در پایه) پاسخی مستقیم به این شرایط زمین‌شناختی بوده است.',
        'reinforcement_title' => 'تقویت سازه در دوره عثمانی',
        'reinforcement_content' => 'در دوره عثمانی، با افزودن کلاهک مخروطی و تقویت پی‌ها، پایداری سازه را در برابر زلزله افزایش دادند. این برج در طول تاریخ چندین زلزله بزرگ را از سر گذرانده است.',
        'usage_title' => 'تأثیر جغرافیا بر کاربری تاریخی',
        'usage_items' => [
            [
                'title' => 'دوره جنوایی‌ها',
                'content' => 'در دوره جنوایی‌ها، برج گالاتا به عنوان برج دیده‌بانی و نماد قدرت تجاری استفاده می‌شد.',
                'icon' => 'flag'
            ],
            [
                'title' => 'دوره عثمانی',
                'content' => 'در دوره عثمانی، این برج به زندان، رصدخانه و سپس برج آتش‌نما تبدیل شد.',
                'icon' => 'mosque'
            ],
            [
                'title' => 'دوره مدرن',
                'content' => 'در دوره مدرن، تبدیل آن به رستوران و جاذبه گردشگری، بازتابی از تحولات سیاسی و اقتصادی ترکیه معاصر است.',
                'icon' => 'landmark'
            ]
        ],
        'conclusion_title' => 'جمع‌بندی',
        'conclusion_content' => 'برج گالاتا تجسم فیزیکی موقعیت جغرافیایی استثنایی منطقه گالاتا است. مکان‌یابی آن نماد نظارت بر تنگه بسفر، معماری‌اش پاسخی به اقلیم و زلزله، و کاربری‌اش آینه تغییر حاکمیت‌ها و تحولات تاریخی است.',
        'conclusion_quote' => 'برج گالاتا نه‌تنها یک بنای تاریخی، بلکه روایتی زنده از تعامل جغرافیا، تجارت و قدرت در قلب استانبول است.',
        'footer_text' => 'تحلیل علمی تأثیر جغرافیا بر معماری و تاریخ برج گالاتا',
        'copyright' => '© ۲۰۲۳ - همه حقوق محفوظ است',
        'lang_switcher' => 'زبان:',
        'back_button' => 'صفحه اصلی',
        'back_tooltip' => 'بازگشت به صفحه اصلی'
    ],
    
    'tr' => [
        'lang_code' => 'tr',
        'dir' => 'ltr',
        'title' => 'Galata Kulesi İstanbul - Coğrafi ve Tarihi Analiz',
        'meta_description' => 'Galata Kulesi\'nin coğrafi konumu, tarihi ve mimarisi hakkında kapsamlı analiz',
        'header_title' => 'Galata Kulesi\'nin Oluşumu, Mimarisi ve Kullanımında Coğrafi Konumun Rolünün Analizi',
        'header_subtitle' => 'Galata Kulesi\'nin konumlandırılması, mimarisi, kullanımı ve tarihi kimliği üzerinde coğrafi konum, iklim koşulları, jeolojik faktörler ve İstanbul Boğazı\'nın stratejik öneminin etkisinin incelenmesi',
        'nav_home' => 'Ana Sayfa',
        'nav_history' => 'Tarihçe',
        'nav_architecture' => 'Mimari',
        'nav_visit' => 'Ziyaret',
        'nav_gallery' => 'Galeri',
        'abstract_title' => 'Özet',
        'abstract_content' => 'Galata Kulesi, sıradan bir yapı olmanın ötesinde, İstanbul\'un coğrafi, stratejik ve jeopolitik konumunun somut bir yansımasıdır. Bu makale, Galata Kulesi\'nin konumlandırılması, mimarisi, kullanımı ve tarihi kimliği üzerinde coğrafi konum, iklim koşulları, jeolojik faktörler ve İstanbul Boğazı\'nın stratejik öneminin etkisini incelemektedir. Bulgular, Galata Kulesi\'nin sadece belirli bir tarihsel dönemin ürünü değil, aynı zamanda coğrafya, siyasi güç ve medeniyet dönüşümlerinin sürekli etkileşiminin bir sonucu olduğunu göstermektedir.',
        'location_title' => 'İstanbul\'un Coğrafi ve Stratejik Konumu',
        'location_content' => 'İstanbul (eski Konstantinopolis), Asya ve Avrupa kıtaları üzerinde yer alan dünyanın tek büyük şehridir. Şehir, Karadeniz\'i Marmara Denizi\'ne ve nihayetinde Akdeniz\'e bağlayan hayati bir geçit olan İstanbul Boğazı\'na hakimdir. Bu coğrafi konum, İstanbul\'u küresel ölçekte bir ticari ve askeri darboğaza dönüştürmüştür.',
        'positioning_title' => 'Galata Kulesi\'nin Konumlandırılması',
        'positioning_content' => 'Galata Kulesi, Galata bölgesinin en yüksek noktasına inşa edilmiştir; İstanbul Boğazı, Haliç ve İstanbul\'un Avrupa yakasına tamamen hakim bir konumdadır. Tarihi limana yakınlığı, bu kuleyi hem gözetleme hem de gemilere rehberlik etmek için kullanılan Galata bölgesinin stratejik gözü haline getirdi.',
        'strategic_title' => 'İstanbul Boğazı\'nın Stratejik ve Askeri Koşullarının Etkisi',
        'strategic_content' => 'İstanbul Boğazı, dünyanın en önemli stratejik noktalarından biri olarak kabul edilir. Konstantinopolis\'i kontrol eden her güç, deniz filolarının geçişini kontrol edebilir veya onlardan vergi alabilirdi. Galata Kulesi, bu hayati geçidin gözetlenmesi ve kontrolünün bir simgesiydi.',
        'strategic_quote' => 'Cenevizliler tarafından 1348 yılında Galata Kulesi\'nin inşa edilmesi, Konstantinopolis\'in kalbinde ticari varlıklarını ve güçlerini ilan etmek anlamına geliyordu. 1453 yılında Konstantinopolis\'in fethinden sonra, Osmanlıların bu kuleyi gözetleme kulesi olarak kullanması, bu yapının stratejik rolünün teyidiydi.',
        'climate_title' => 'İklim ve Çevresel Koşulların Etkisi',
        'climate_items' => [
            [
                'title' => 'İstanbul\'un İklimi',
                'content' => 'İstanbul, yazları ılıman, kışları nemli ve boğazdan gelen şiddetli rüzgarlarla karakterize edilen ılıman nemli bir iklime sahiptir.',
                'icon' => 'temperature-low'
            ],
            [
                'title' => 'Koni Tasarımı',
                'content' => 'Kulenin konik yapısı, boğazın şiddetli rüzgarlarına karşı direnç göstermesine yardımcı olur.',
                'icon' => 'wind'
            ],
            [
                'title' => 'Aydınlatma Sistemi',
                'content' => 'Kule gövdesindeki çok sayıda pencere, 360 derece görüş ve uygun aydınlatma sağlar.',
                'icon' => 'lightbulb'
            ],
            [
                'title' => 'Yapı Malzemeleri',
                'content' => 'Kalın taş ve tuğla kullanımı, termal stabilite ve neme karşı direnç sağlamıştır.',
                'icon' => 'mountain'
            ]
        ],
        'earthquake_title' => 'Bölgenin Jeolojisi ve Depremselliği',
        'earthquake_content' => 'İstanbul, Alp-Himalaya deprem kuşağı üzerinde yer alır ve tarih boyunca çok sayıda deprem bu şehri tehdit etmiştir. Galata Kulesi\'nin kalın duvarlı (tabanda 3.7 metre) silindirik tasarımı, bu jeolojik koşullara doğrudan bir yanıt olmuştur.',
        'reinforcement_title' => 'Osmanlı Döneminde Yapı Güçlendirmesi',
        'reinforcement_content' => 'Osmanlı döneminde, konik çatı eklenmesi ve temellerin güçlendirilmesiyle yapının depreme karşı dayanıklılığı artırıldı. Bu kule, tarih boyunca birkaç büyük depremi atlatmıştır.',
        'usage_title' => 'Coğrafyanın Tarihi Kullanım Üzerindeki Etkisi',
        'usage_items' => [
            [
                'title' => 'Ceneviz Dönemi',
                'content' => 'Cenevizliler döneminde, Galata Kulesi gözetleme kulesi ve ticari gücün bir sembolü olarak kullanıldı.',
                'icon' => 'flag'
            ],
            [
                'title' => 'Osmanlı Dönemi',
                'content' => 'Osmanlı döneminde, bu kule hapishane, gözlemevi ve daha sonra yangın gözetleme kulesine dönüştürüldü.',
                'icon' => 'mosque'
            ],
            [
                'title' => 'Modern Dönem',
                'content' => 'Modern dönemde, restoran ve turistik cazibe merkezine dönüştürülmesi, çağdaş Türkiye\'nin politik ve ekonomik dönüşümlerinin bir yansımasıdır.',
                'icon' => 'landmark'
            ]
        ],
        'conclusion_title' => 'Sonuç',
        'conclusion_content' => 'Galata Kulesi, Galata bölgesinin istisnai coğrafi konumunun fiziksel bir tezahürüdür. Konumlandırılması İstanbul Boğazı üzerinde gözetlemenin sembolüdür, mimarisi iklime ve depreme bir yanıttır ve kullanımı iktidar değişikliklerinin ve tarihsel dönüşümlerin aynasıdır.',
        'conclusion_quote' => 'Galata Kulesi sadece tarihi bir yapı değil, aynı zamanda İstanbul\'un kalbinde coğrafya, ticaret ve gücün etkileşiminin canlı bir anlatımıdır.',
        'footer_text' => 'Galata Kulesi\'nin mimarisi ve tarihi üzerinde coğrafyanın etkisinin bilimsel analizi',
        'copyright' => '© 2023 - Tüm hakları saklıdır',
        'lang_switcher' => 'Dil:',
        'back_button' => 'Ana Sayfa',
        'back_tooltip' => 'Ana sayfaya dön'
    ],
    
    'en' => [
        'lang_code' => 'en',
        'dir' => 'ltr',
        'title' => 'Galata Tower Istanbul - Geographic and Historical Analysis',
        'meta_description' => 'Comprehensive analysis of the geographical location, history and architecture of Galata Tower',
        'header_title' => 'Analysis of the Role of Geographic Location in the Formation, Architecture and Use of Galata Tower',
        'header_subtitle' => 'Examination of the influence of geographical location, climatic conditions, geological factors, and the strategic importance of the Bosphorus Strait on the positioning, architecture, use and historical identity of Galata Tower',
        'nav_home' => 'Home',
        'nav_history' => 'History',
        'nav_architecture' => 'Architecture',
        'nav_visit' => 'Visit',
        'nav_gallery' => 'Gallery',
        'abstract_title' => 'Abstract',
        'abstract_content' => 'Galata Tower is more than an ordinary structure; it is a tangible reflection of Istanbul\'s geographical, strategic and geopolitical position. This article examines the influence of geographical location, climatic conditions, geological factors, and the strategic importance of the Bosphorus Strait on the positioning, architecture, use and historical identity of Galata Tower. Findings show that Galata Tower is not only the product of a specific historical period, but also the result of continuous interaction between geography, political power and civilizational transformations.',
        'location_title' => 'Geographical and Strategic Location of Istanbul',
        'location_content' => 'Istanbul (formerly Constantinople) is the only major city in the world located on two continents, Asia and Europe. The city overlooks the Bosphorus Strait, a vital passage connecting the Black Sea to the Sea of Marmara and ultimately to the Mediterranean. This geographical location has turned Istanbul into a commercial and military bottleneck on a global scale.',
        'positioning_title' => 'Positioning of Galata Tower',
        'positioning_content' => 'Galata Tower was built at the highest point of the Galata region; a location that completely overlooks the Bosphorus Strait, the Golden Horn and the European side of Istanbul. Its proximity to the historic harbor made this tower the strategic eye of the Galata region, used both for observation and for guiding ships.',
        'strategic_title' => 'Impact of Strategic and Military Conditions of the Bosphorus Strait',
        'strategic_content' => 'The Bosphorus Strait is considered one of the most important strategic points in the world. Any power that controlled Constantinople could control the passage of naval fleets or tax them. Galata Tower was a symbol of surveillance and control over this vital passage.',
        'strategic_quote' => 'The construction of Galata Tower by the Genoese in 1348 meant declaring their commercial presence and power in the heart of Constantinople. After the conquest of Constantinople in 1453, the Ottomans\' use of this tower as an observation tower confirmed the strategic role of this structure.',
        'climate_title' => 'Influence of Climate and Environmental Conditions',
        'climate_items' => [
            [
                'title' => 'Istanbul\'s Climate',
                'content' => 'Istanbul has a temperate humid climate with mild summers, humid winters and strong winds from the strait.',
                'icon' => 'temperature-low'
            ],
            [
                'title' => 'Conical Design',
                'content' => 'The conical structure of the tower helps it resist the strong winds of the strait.',
                'icon' => 'wind'
            ],
            [
                'title' => 'Lighting System',
                'content' => 'Numerous windows in the tower body provide 360-degree visibility and proper lighting.',
                'icon' => 'lightbulb'
            ],
            [
                'title' => 'Building Materials',
                'content' => 'The use of thick stone and brick provided thermal stability and resistance to moisture.',
                'icon' => 'mountain'
            ]
        ],
        'earthquake_title' => 'Geology and Seismicity of the Region',
        'earthquake_content' => 'Istanbul is located on the Alpine-Himalayan earthquake belt and numerous earthquakes have threatened this city throughout history. The cylindrical design of Galata Tower with thick walls (3.7 meters at the base) was a direct response to these geological conditions.',
        'reinforcement_title' => 'Structural Reinforcement in the Ottoman Period',
        'reinforcement_content' => 'During the Ottoman period, the addition of the conical roof and reinforcement of the foundations increased the structure\'s resistance to earthquakes. This tower has survived several major earthquakes throughout history.',
        'usage_title' => 'Impact of Geography on Historical Use',
        'usage_items' => [
            [
                'title' => 'Genoese Period',
                'content' => 'During the Genoese period, Galata Tower was used as an observation tower and a symbol of commercial power.',
                'icon' => 'flag'
            ],
            [
                'title' => 'Ottoman Period',
                'content' => 'During the Ottoman period, this tower was converted into a prison, observatory and later a fire watchtower.',
                'icon' => 'mosque'
            ],
            [
                'title' => 'Modern Period',
                'content' => 'In the modern period, its conversion into a restaurant and tourist attraction reflects the political and economic transformations of contemporary Turkey.',
                'icon' => 'landmark'
            ]
        ],
        'conclusion_title' => 'Conclusion',
        'conclusion_content' => 'Galata Tower is a physical manifestation of the exceptional geographical location of the Galata region. Its positioning symbolizes surveillance over the Bosphorus Strait, its architecture is a response to climate and earthquakes, and its use mirrors power changes and historical transformations.',
        'conclusion_quote' => 'Galata Tower is not only a historical structure, but also a living narrative of the interaction between geography, commerce, and power in the heart of Istanbul.',
        'footer_text' => 'Scientific analysis of the influence of geography on the architecture and history of Galata Tower',
        'copyright' => '© 2023 - All rights reserved',
        'lang_switcher' => 'Language:',
        'back_button' => 'Home Page',
        'back_tooltip' => 'Return to home page'
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
    
    <!-- فونت‌ها و آیکون‌ها -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        
        /* هدر */
        header {
            text-align: center;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('https://images.unsplash.com/photo-1531901599638-a89bb60971a3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
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
        
        .nav-links {
            display: flex;
            gap: 20px;
            background: rgba(255, 255, 255, 0.1);
            padding: 8px 15px;
            border-radius: 8px;
            backdrop-filter: blur(5px);
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        
        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        /* کارت محتوا */
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
        
        /* باکس ویژه */
        .highlight-box {
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #FDF6E3, #FAF0E6);
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 4px solid #DAA520;
            padding: 25px;
            border-radius: 10px;
            margin: 25px 0;
            box-shadow: 0 5px 15px rgba(218, 165, 32, 0.1);
        }
        
        /* گرید اطلاعات */
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
        
        /* نقل قول */
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
        
        /* جمع‌بندی */
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
        
        /* فوتر */
        footer {
            text-align: center;
            margin-top: 60px;
            padding: 30px;
            color: #666;
            border-top: 1px solid #ddd;
        }
        
        /* آیکون برج گالاتا */
        .galata-icon {
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
        
        /* موبایل */
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
            
            .nav-links, .language-switcher {
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
            <div class="nav-links">
                <a href="#history"><?php echo $current['nav_history']; ?></a>
                <a href="#architecture"><?php echo $current['nav_architecture']; ?></a>
                <a href="#visit"><?php echo $current['nav_visit']; ?></a>
                <a href="#gallery"><?php echo $current['nav_gallery']; ?></a>
            </div>
            
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
        <!-- بخش چکیده -->
        <div class="content-card">
            <h2><i class="fas fa-map-marker-alt"></i> <?php echo $current['abstract_title']; ?></h2>
            <p><?php echo $current['abstract_content']; ?></p>
            
            <div class="galata-icon">
                <i class="fas fa-tower-observation"></i>
                <i class="fas fa-binoculars"></i>
                <i class="fas fa-compass"></i>
                <i class="fas fa-landmark"></i>
            </div>
        </div>
        
        <!-- بخش موقعیت جغرافیایی -->
        <div class="content-card">
            <h2><i class="fas fa-globe-asia"></i> <?php echo $current['location_title']; ?></h2>
            <p><?php echo $current['location_content']; ?></p>
            
            <div class="highlight-box">
                <h3><i class="fas fa-hill-rockslide"></i> <?php echo $current['positioning_title']; ?></h3>
                <p><?php echo $current['positioning_content']; ?></p>
            </div>
        </div>
        
        <!-- بخش راهبردی -->
        <div class="content-card">
            <h2><i class="fas fa-route"></i> <?php echo $current['strategic_title']; ?></h2>
            <p><?php echo $current['strategic_content']; ?></p>
            
            <div class="quote">
                <?php echo $current['strategic_quote']; ?>
            </div>
        </div>
        
        <!-- بخش اقلیم -->
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
        
        <!-- بخش زلزله -->
        <div class="content-card">
            <h2><i class="fas fa-mountain"></i> <?php echo $current['earthquake_title']; ?></h2>
            <p><?php echo $current['earthquake_content']; ?></p>
            
            <div class="highlight-box">
                <h3><i class="fas fa-hard-hat"></i> <?php echo $current['reinforcement_title']; ?></h3>
                <p><?php echo $current['reinforcement_content']; ?></p>
            </div>
        </div>
        
        <!-- بخش کاربری -->
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
        
        <!-- بخش جمع‌بندی -->
        <div class="conclusion">
            <h2><i class="fas fa-gem"></i> <?php echo $current['conclusion_title']; ?></h2>
            <p><?php echo $current['conclusion_content']; ?></p>
            
            <div class="quote" style="background: rgba(255, 255, 255, 0.1); color: #FFD700; margin-top: 30px;">
                <?php echo $current['conclusion_quote']; ?>
            </div>
        </div>
        
        <!-- فوتر -->
        <footer>
            <p><?php echo $current['footer_text']; ?></p>
            <p>طراحی شده با <i class="fas fa-heart" style="color: #e74c3c;"></i> برای ارائه در سطح جهانی</p>
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
            
            // هموار کردن اسکرول برای لینک‌های داخلی
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    if(targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if(targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 100,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>