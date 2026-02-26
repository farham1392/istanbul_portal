<?php
// مدیریت زبان
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'fa';

// تنظیم هدر برای کدگذاری کاراکترها
header('Content-Type: text/html; charset=utf-8');

// اطلاعات بازار بزرگ استانبول به سه زبان
$content = [
    'fa' => [
        'lang_code' => 'fa',
        'dir' => 'rtl',
        'title' => 'تحلیل نقش موقعیت جغرافیایی بازار بزرگ استانبول',
        'meta_description' => 'تحلیل تأثیر موقعیت جغرافیایی بر شکل‌گیری، توسعه و کارکرد بازار بزرگ استانبول (Kapalıçarşı)',
        'header_title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری، توسعه و کارکرد بازار بزرگ استانبول',
        'header_subtitle' => 'بازار بزرگ استانبول (Kapalıçarşı) یکی از کهن‌ترین و بزرگ‌ترین بازارهای سرپوشیده جهان است که شکل‌گیری، توسعه و تداوم حیات آن به‌طور مستقیم تحت تأثیر شرایط جغرافیایی و موقعیت مکانی شهر استانبول قرار داشته است.',
        'abstract_title' => 'چکیده',
        'abstract_content' => 'بازار بزرگ استانبول (Kapalıçarşı) یکی از کهن‌ترین و بزرگ‌ترین بازارهای سرپوشیده جهان است که شکل‌گیری، توسعه و تداوم حیات آن به‌طور مستقیم تحت تأثیر شرایط جغرافیایی و موقعیت مکانی شهر استانبول قرار داشته است. قرارگیری استانبول در محل تلاقی دو قاره آسیا و اروپا و دسترسی هم‌زمان به مسیرهای تجاری دریایی و زمینی، این شهر را به یکی از مهم‌ترین مراکز اقتصادی جهان پیشامدرن تبدیل کرد. این مقاله با رویکردی تحلیلی، نقش عوامل جغرافیایی، دسترسی‌های طبیعی و انسانی و جایگاه مکانی بازار بزرگ را در توسعه تاریخی، رونق اقتصادی، سازمان فضایی و نقش امروزی آن در شبکه تجاری و گردشگری استانبول بررسی می‌کند.',
        'stats' => [
            'streets' => '۶۱+',
            'shops' => '۴,۰۰۰+',
            'years' => '۵۶۶+',
            'visitors' => '۳۰۰,۰۰۰+'
        ],
        'stats_labels' => [
            'streets' => 'خیابان سرپوشیده',
            'shops' => 'مغازه فعال',
            'years' => 'سال تاریخچه',
            'visitors' => 'بازدیدکننده روزانه'
        ],
        'introduction_title' => 'مقدمه',
        'introduction_content' => 'بازارها همواره یکی از عناصر بنیادین در شکل‌گیری شهرهای تاریخی بوده‌اند و نقش مهمی در سازمان فضایی، اقتصادی و اجتماعی شهرها ایفا کرده‌اند. بازار بزرگ استانبول نمونه‌ای شاخص از این فضاهای شهری است که نه‌تنها یک مرکز اقتصادی، بلکه بازتابی از ساختار قدرت، فرهنگ و جغرافیای شهر استانبول محسوب می‌شود. این بازار با بیش از ۶۱ خیابان سرپوشیده، بیش از ۴۰۰۰ مغازه و جذب روزانه صدها هزار بازدیدکننده، یکی از زنده‌ترین فضاهای شهری جهان به شمار می‌آید.',
        'geographical_title' => 'موقعیت جغرافیایی استانبول و اهمیت راهبردی آن',
        'geographical_content' => 'استانبول در نقطه‌ای منحصربه‌فرد میان دو قاره اروپا و آسیا و در کنار تنگه بسفر قرار گرفته است؛ تنگه‌ای که دریای سیاه را به دریای مرمره و در نهایت به مدیترانه متصل می‌کند. این موقعیت جغرافیایی استثنایی، استانبول را از دوران باستان تا دوره عثمانی به یکی از مهم‌ترین گره‌های ارتباطی، نظامی و تجاری جهان تبدیل کرده است.',
        'highlight_box_title' => 'قلب تجارت جهانی',
        'highlight_box_content' => 'استانبول به دلیل موقعیت منحصر به فرد جغرافیایی خود، برای قرن‌ها پل ارتباطی شرق و غرب بوده و بازار بزرگ استانبول در مرکز این شبکه جهانی تجاری قرار داشته است.',
        'natural_access_title' => 'نقش دسترسی‌های طبیعی در شکل‌گیری بازار',
        'natural_access_content' => 'عوامل طبیعی نقش تعیین‌کننده‌ای در رونق تجاری استانبول و بازار بزرگ داشته‌اند. تنگه بسفر به‌عنوان شاهراه اصلی تجارت دریایی، امکان جابه‌جایی کالا میان شمال و جنوب را فراهم می‌کرد. خلیج شاخ طلایی نیز به‌عنوان بندری امن، محل پهلوگیری کشتی‌ها و تخلیه کالاها بود.',
        'human_access_title' => 'نقش دسترسی‌های انسانی و شبکه‌های تجاری',
        'human_access_content' => 'استانبول در مسیر جاده ابریشم و راه‌های تجاری ادویه قرار داشت و به‌واسطه شبکه گسترده راه‌های امپراتوری عثمانی، ارتباطی پایدار میان شرق و غرب برقرار می‌کرد. بازار بزرگ به‌عنوان نقطه پایانی این مسیرها، به هاب اصلی تجارت کالاهای ارزشمند در سه قاره تبدیل شد.',
        'location_title' => 'موقعیت مکانی بازار بزرگ در بافت شهری',
        'location_content' => 'بازار بزرگ استانبول در قلب بخش تاریخی شهر و در منطقه فاتح، میان مسجد بایزید دوم و مسجد نورعثمانیه واقع شده است. نزدیکی این بازار به مراکز قدرت سیاسی و مذهبی مانند کاخ توپکاپی و ایاصوفیه، امنیت و اعتبار اقتصادی آن را تضمین می‌کرد.',
        'quote' => 'بازار بزرگ نه تنها یک مرکز تجاری، بلکه نمادی از قدرت و ثبات امپراتوری عثمانی بود که در قلب پایتخت این امپراتوری قرار داشت.',
        'historical_title' => 'تأثیر عوامل جغرافیایی بر توسعه تاریخی بازار',
        'timeline' => [
            [
                'year' => '۱۴۵۵-۱۴۵۶ میلادی',
                'content' => 'ساخت بازار بزرگ اندکی پس از فتح قسطنطنیه آغاز شد. موقعیت مرکزی بازار و دسترسی آسان به مسیرهای تجاری، گسترش تدریجی و ارگانیک آن را ممکن ساخت.'
            ],
            [
                'year' => 'قرن ۱۶-۱۷ میلادی',
                'content' => 'بازار بزرگ به اوج گسترش و رونق خود رسید و به یکی از بزرگ‌ترین مراکز تجاری جهان تبدیل شد.'
            ],
            [
                'year' => 'قرن ۱۹ میلادی',
                'content' => 'با تغییر مسیرهای تجاری جهانی، نقش بازار بزرگ تا حدی تغییر کرد اما همچنان به عنوان مرکز تجاری مهم منطقه باقی ماند.'
            ],
            [
                'year' => 'امروز',
                'content' => 'بازار بزرگ استانبول به یکی از مهم‌ترین جاذبه‌های گردشگری جهان تبدیل شده و سالانه میلیون‌ها بازدیدکننده را جذب می‌کند.'
            ]
        ],
        'prosperity_title' => 'نقش جغرافیا در رونق اقتصادی بازار',
        'prosperity_content' => 'قرارگیری استانبول در مرکز شبکه تجاری مدیترانه و اوراسیا، بازار بزرگ را به یکی از پررونق‌ترین مراکز اقتصادی جهان پیشامدرن بدل کرد. نظام صنفی، تمرکز مغازه‌ها و امنیت بازار نقش مهمی در این رونق داشتند.',
        'spatial_title' => 'سازمان فضایی بازار و ارتباط آن با محیط جغرافیایی',
        'spatial_content' => 'سرپوشیده بودن بازار پاسخی به شرایط اقلیمی و نیاز به حفاظت از کالاها بود. راسته‌های تخصصی، بدیستان‌ها و استفاده از شیب طبیعی زمین، سازمان فضایی کارآمدی را شکل دادند.',
        'spatial_highlight_title' => 'طراحی هوشمندانه',
        'spatial_highlight_content' => 'طراحی پیچیده اما منظم بازار بزرگ استانبول نشان‌دهنده درک عمیق معماران از شرایط جغرافیایی، اقلیمی و نیازهای تجاری منطقه است.',
        'today_title' => 'جایگاه امروزی بازار بزرگ در شبکه تجاری و گردشگری',
        'today_content' => 'امروزه بازار بزرگ استانبول علاوه بر نقش تجاری، یکی از مهم‌ترین جاذبه‌های گردشگری شهر محسوب می‌شود و سالانه میلیون‌ها گردشگر داخلی و خارجی را جذب می‌کند.',
        'conclusion_title' => 'نتیجه‌گیری',
        'conclusion_content' => 'بازار بزرگ استانبول نمونه‌ای برجسته از تأثیر مستقیم شرایط جغرافیایی و موقعیت مکانی بر شکل‌گیری و تداوم فضاهای اقتصادی و شهری است و همچنان بخشی زنده از هویت تاریخی و فرهنگی استانبول به‌شمار می‌رود.',
        'conclusion_quote' => 'بازار بزرگ استانبول، داستان زنده‌ای از تعامل انسان، جغرافیا و تاریخ است که در معماری، فضای شهری و فرهنگ تجاری آن تبلور یافته است.',
        'footer_text' => 'تحلیل جغرافیایی بازار بزرگ استانبول - Kapalıçarşı',
        'footer_source' => 'منبع: داده‌های تاریخی و جغرافیایی استانبول',
        'copyright' => '© ۲۰۲۳ - طراحی شده برای ارائه مقاله‌ای در سطح بین‌المللی',
        'lang_switcher' => 'زبان:',
        'back_tooltip' => 'ایاصوفیه'
    ],
    
    'tr' => [
        'lang_code' => 'tr',
        'dir' => 'ltr',
        'title' => 'Kapalıçarşı\'nin Coğrafi Konumunun Analizi',
        'meta_description' => 'Kapalıçarşı\'nin oluşumu, gelişimi ve işleyişinde coğrafi konumun etkisi üzerine analiz',
        'header_title' => 'Kapalıçarşı\'nin Oluşumu, Gelişimi ve İşleyişinde Coğrafi Konumun Rolünün Analizi',
        'header_subtitle' => 'Kapalıçarşı, dünyanın en eski ve büyük kapalı çarşılarından biridir ve oluşumu, gelişimi ve sürekliliği doğrudan İstanbul\'un coğrafi koşullarından ve konumundan etkilenmiştir.',
        'abstract_title' => 'Özet',
        'abstract_content' => 'Kapalıçarşı, dünyanın en eski ve büyük kapalı çarşılarından biridir ve oluşumu, gelişimi ve sürekliliği doğrudan İstanbul\'un coğrafi koşullarından ve konumundan etkilenmiştir. İstanbul\'un Asya ve Avrupa kıtalarının kesişim noktasında yer alması ve hem deniz hem de kara ticaret yollarına aynı anda erişebilmesi, bu şehri modern öncesi dünyanın en önemli ekonomik merkezlerinden biri haline getirmiştir. Bu makale, coğrafi faktörlerin, doğal ve beşeri erişimlerin ve Kapalıçarşı\'nın konumunun tarihsel gelişim, ekonomik refah, mekânsal organizasyon ve günümüzde İstanbul\'un ticari ve turistik ağındaki rolü üzerindeki etkisini analitik bir yaklaşımla incelemektedir.',
        'stats' => [
            'streets' => '61+',
            'shops' => '4,000+',
            'years' => '566+',
            'visitors' => '300,000+'
        ],
        'stats_labels' => [
            'streets' => 'Kapalı Sokak',
            'shops' => 'Aktif Dükkan',
            'years' => 'Yıllık Tarih',
            'visitors' => 'Günlük Ziyaretçi'
        ],
        'introduction_title' => 'Giriş',
        'introduction_content' => 'Çarşılar, tarihsel şehirlerin oluşumunda her zaman temel unsurlardan biri olmuş ve şehirlerin mekânsal, ekonomik ve sosyal organizasyonunda önemli rol oynamıştır. Kapalıçarşı, sadece bir ekonomik merkez olmayıp aynı zamanda İstanbul\'un güç yapısının, kültürünün ve coğrafyasının bir yansıması olan bu kentsel alanların çarpıcı bir örneğidir. 61\'den fazla kapalı sokak, 4000\'den fazla dükkan ve günlük yüz binlerce ziyaretçi çekmesiyle bu çarşı, dünyanın en canlı kentsel alanlarından biri olarak kabul edilmektedir.',
        'geographical_title' => 'İstanbul\'un Coğrafi Konumu ve Stratejik Önemi',
        'geographical_content' => 'İstanbul, Avrupa ve Asya kıtaları arasında eşsiz bir noktada ve İstanbul Boğazı\'nın kenarında yer almaktadır; Karadeniz\'i Marmara Denizi\'ne ve nihayetinde Akdeniz\'e bağlayan bir boğaz. Bu olağanüstü coğrafi konum, İstanbul\'u antik dönemden Osmanlı dönemine kadar dünyanın en önemli iletişim, askeri ve ticari merkezlerinden biri haline getirmiştir.',
        'highlight_box_title' => 'Küresel Ticaretin Kalbi',
        'highlight_box_content' => 'İstanbul, eşsiz coğrafi konumu sayesinde yüzyıllar boyunca Doğu ve Batı arasında bir köprü olmuş ve Kapalıçarşı bu küresel ticaret ağının merkezinde yer almıştır.',
        'natural_access_title' => 'Çarşının Oluşumunda Doğal Erişimlerin Rolü',
        'natural_access_content' => 'Doğal faktörler, İstanbul\'un ve Kapalıçarşı\'nın ticari refahında belirleyici bir rol oynamıştır. İstanbul Boğazı, deniz ticaretinin ana arteri olarak kuzey ve güney arasında mal değişimini mümkün kılmıştır. Haliç de güvenli bir liman olarak gemilerin demirlemesi ve malların boşaltılması için bir yer sağlamıştır.',
        'human_access_title' => 'Beşeri Erişimler ve Ticari Ağların Rolü',
        'human_access_content' => 'İstanbul, İpek Yolu ve baharat ticaret yolları üzerinde yer almış ve Osmanlı İmparatorluğu\'nun geniş yol ağı sayesinde Doğu ve Batı arasında sürekli bir bağlantı kurmuştur. Kapalıçarşı, bu yolların son noktası olarak üç kıtada değerli malların ticaretinin ana merkezi haline gelmiştir.',
        'location_title' => 'Kapalıçarşı\'nın Kentsel Dokudaki Konumu',
        'location_content' => 'Kapalıçarşı, şehrin tarihi bölgesinin kalbinde, Fatih ilçesinde, II. Bayezid Camii ve Nuruosmaniye Camii arasında yer almaktadır. Bu çarşının Topkapı Sarayı ve Ayasofya gibi siyasi ve dini güç merkezlerine yakınlığı, ekonomik güvenliğini ve itibarını garanti etmiştir.',
        'quote' => 'Kapalıçarşı sadece bir ticaret merkezi değil, aynı zamanda imparatorluğun başkentinin kalbinde yer alan Osmanlı İmparatorluğu\'nun gücünün ve istikrarının bir sembolüydü.',
        'historical_title' => 'Çarşının Tarihsel Gelişiminde Coğrafi Faktörlerin Etkisi',
        'timeline' => [
            [
                'year' => '1455-1456 MS',
                'content' => 'Kapalıçarşı\'nın inşası, Konstantinopolis\'in fethinden kısa bir süre sonra başladı. Çarşının merkezi konumu ve ticaret yollarına kolay erişimi, kademeli ve organik genişlemesini mümkün kıldı.'
            ],
            [
                'year' => '16.-17. Yüzyıl',
                'content' => 'Kapalıçarşı en geniş ve refah dönemine ulaştı ve dünyanın en büyük ticaret merkezlerinden biri haline geldi.'
            ],
            [
                'year' => '19. Yüzyıl',
                'content' => 'Küresel ticaret yollarının değişmesiyle Kapalıçarşı\'nın rolü kısmen değişti, ancak yine de bölgenin önemli bir ticaret merkezi olarak kaldı.'
            ],
            [
                'year' => 'Bugün',
                'content' => 'Kapalıçarşı, dünyanın en önemli turistik cazibe merkezlerinden biri haline geldi ve yılda milyonlarca ziyaretçiyi çekmektedir.'
            ]
        ],
        'prosperity_title' => 'Coğrafyanın Çarşının Ekonomik Refahındaki Rolü',
        'prosperity_content' => 'İstanbul\'un Akdeniz ve Avrasya ticaret ağının merkezinde yer alması, Kapalıçarşı\'yı modern öncesi dünyanın en müreffeh ekonomik merkezlerinden biri haline getirdi. Lonca sistemi, dükkanların yoğunlaşması ve çarşının güvenliği bu refahta önemli bir rol oynadı.',
        'spatial_title' => 'Çarşının Mekansal Organizasyonu ve Coğrafi Çevreyle İlişkisi',
        'spatial_content' => 'Çarşının kapalı olması, iklim koşullarına ve malların korunma ihtiyacına bir cevaptı. Uzmanlaşmış sokaklar, avlular ve doğal arazi eğiminin kullanımı, verimli bir mekansal organizasyon oluşturdu.',
        'spatial_highlight_title' => 'Akıllı Tasarım',
        'spatial_highlight_content' => 'Kapalıçarşı\'nın karmaşık ama düzenli tasarımı, mimarların bölgenin coğrafi, iklimsel ve ticari ihtiyaçlarını derinlemesine anladığını göstermektedir.',
        'today_title' => 'Kapalıçarşı\'nın Günümüz Ticari ve Turistik Ağındaki Yeri',
        'today_content' => 'Günümüzde Kapalıçarşı, ticari rolünün yanı sıra şehrin en önemli turistik cazibe merkezlerinden biri olarak kabul edilmekte ve yılda milyonlarca yerli ve yabancı turisti çekmektedir.',
        'conclusion_title' => 'Sonuç',
        'conclusion_content' => 'Kapalıçarşı, coğrafi koşulların ve konumun ekonomik ve kentsel alanların oluşumu ve devamlılığı üzerindeki doğrudan etkisinin çarpıcı bir örneğidir ve hala İstanbul\'un tarihi ve kültürel kimliğinin canlı bir parçasıdır.',
        'conclusion_quote' => 'Kapalıçarşı, mimarisinde, kentsel alanında ve ticari kültüründe somutlaşan insan, coğrafya ve tarih etkileşiminin canlı bir hikayesidir.',
        'footer_text' => 'Kapalıçarşı\'nın Coğrafi Analizi',
        'footer_source' => 'Kaynak: İstanbul\'un tarihi ve coğrafi verileri',
        'copyright' => '© 2023 - Uluslararası düzeyde bir makale sunumu için tasarlandı',
        'lang_switcher' => 'Dil:',
        'back_tooltip' => 'Ayasofya'
    ],
    
    'en' => [
        'lang_code' => 'en',
        'dir' => 'ltr',
        'title' => 'Geographical Location Analysis of the Grand Bazaar Istanbul',
        'meta_description' => 'Analysis of the impact of geographical location on the formation, development and functioning of the Grand Bazaar (Kapalıçarşı)',
        'header_title' => 'Analysis of the Role of Geographical Location in the Formation, Development and Functioning of the Grand Bazaar Istanbul',
        'header_subtitle' => 'The Grand Bazaar (Kapalıçarşı) is one of the oldest and largest covered markets in the world, and its formation, development and continuity have been directly influenced by the geographical conditions and location of Istanbul.',
        'abstract_title' => 'Abstract',
        'abstract_content' => 'The Grand Bazaar (Kapalıçarşı) is one of the oldest and largest covered markets in the world, and its formation, development and continuity have been directly influenced by the geographical conditions and location of Istanbul. Istanbul\'s location at the intersection of two continents, Asia and Europe, and its simultaneous access to maritime and land trade routes made this city one of the most important economic centers of the pre-modern world. This article analytically examines the role of geographical factors, natural and human access, and the location of the Grand Bazaar in its historical development, economic prosperity, spatial organization, and its current role in Istanbul\'s commercial and tourism network.',
        'stats' => [
            'streets' => '61+',
            'shops' => '4,000+',
            'years' => '566+',
            'visitors' => '300,000+'
        ],
        'stats_labels' => [
            'streets' => 'Covered Streets',
            'shops' => 'Active Shops',
            'years' => 'Years of History',
            'visitors' => 'Daily Visitors'
        ],
        'introduction_title' => 'Introduction',
        'introduction_content' => 'Markets have always been one of the fundamental elements in the formation of historical cities and have played an important role in the spatial, economic and social organization of cities. The Grand Bazaar is a prominent example of these urban spaces that is not only an economic center but also a reflection of the power structure, culture and geography of Istanbul. With over 61 covered streets, more than 4,000 shops and attracting hundreds of thousands of visitors daily, this bazaar is considered one of the most vibrant urban spaces in the world.',
        'geographical_title' => 'Geographical Location of Istanbul and Its Strategic Importance',
        'geographical_content' => 'Istanbul is located at a unique point between two continents, Europe and Asia, and on the shores of the Bosphorus Strait; a strait connecting the Black Sea to the Sea of Marmara and ultimately to the Mediterranean. This exceptional geographical location made Istanbul one of the most important communication, military and commercial hubs in the world from ancient times to the Ottoman period.',
        'highlight_box_title' => 'Heart of Global Trade',
        'highlight_box_content' => 'Due to its unique geographical location, Istanbul has been a bridge between East and West for centuries, and the Grand Bazaar has been at the center of this global trade network.',
        'natural_access_title' => 'Role of Natural Access in the Formation of the Bazaar',
        'natural_access_content' => 'Natural factors played a determining role in the commercial prosperity of Istanbul and the Grand Bazaar. The Bosphorus Strait, as the main artery of maritime trade, enabled the exchange of goods between north and south. The Golden Horn also provided a safe harbor for ships to dock and unload goods.',
        'human_access_title' => 'Role of Human Access and Trade Networks',
        'human_access_content' => 'Istanbul was located on the Silk Road and spice trade routes, and through the extensive road network of the Ottoman Empire, it established a stable connection between East and West. The Grand Bazaar, as the endpoint of these routes, became the main hub for trade of valuable goods across three continents.',
        'location_title' => 'Location of the Grand Bazaar in the Urban Fabric',
        'location_content' => 'The Grand Bazaar is located in the heart of the historical part of the city, in the Fatih district, between the Bayezid II Mosque and the Nuruosmaniye Mosque. The proximity of this bazaar to political and religious power centers such as Topkapi Palace and Hagia Sophia guaranteed its economic security and prestige.',
        'quote' => 'The Grand Bazaar was not only a commercial center but also a symbol of the power and stability of the Ottoman Empire, located in the heart of the empire\'s capital.',
        'historical_title' => 'Impact of Geographical Factors on the Historical Development of the Bazaar',
        'timeline' => [
            [
                'year' => '1455-1456 AD',
                'content' => 'Construction of the Grand Bazaar began shortly after the conquest of Constantinople. The central location of the bazaar and easy access to trade routes enabled its gradual and organic expansion.'
            ],
            [
                'year' => '16th-17th Century',
                'content' => 'The Grand Bazaar reached its peak expansion and prosperity, becoming one of the largest commercial centers in the world.'
            ],
            [
                'year' => '19th Century',
                'content' => 'With the change of global trade routes, the role of the Grand Bazaar changed somewhat, but it remained an important commercial center in the region.'
            ],
            [
                'year' => 'Today',
                'content' => 'The Grand Bazaar has become one of the most important tourist attractions in the world, attracting millions of visitors annually.'
            ]
        ],
        'prosperity_title' => 'Role of Geography in the Economic Prosperity of the Bazaar',
        'prosperity_content' => 'Istanbul\'s location at the center of the Mediterranean and Eurasian trade network made the Grand Bazaar one of the most prosperous economic centers of the pre-modern world. The guild system, concentration of shops, and security of the bazaar played an important role in this prosperity.',
        'spatial_title' => 'Spatial Organization of the Bazaar and Its Relationship with the Geographical Environment',
        'spatial_content' => 'The covered nature of the bazaar was a response to climatic conditions and the need to protect goods. Specialized alleys, courtyards, and use of natural land slope formed an efficient spatial organization.',
        'spatial_highlight_title' => 'Intelligent Design',
        'spatial_highlight_content' => 'The complex yet orderly design of the Grand Bazaar demonstrates architects\' deep understanding of the region\'s geographical, climatic, and commercial needs.',
        'today_title' => 'Current Position of the Grand Bazaar in the Commercial and Tourism Network',
        'today_content' => 'Today, the Grand Bazaar, in addition to its commercial role, is considered one of the most important tourist attractions of the city, attracting millions of domestic and foreign tourists annually.',
        'conclusion_title' => 'Conclusion',
        'conclusion_content' => 'The Grand Bazaar is a prominent example of the direct impact of geographical conditions and location on the formation and continuity of economic and urban spaces, and it remains a living part of Istanbul\'s historical and cultural identity.',
        'conclusion_quote' => 'The Grand Bazaar is a living story of the interaction between humans, geography, and history, embodied in its architecture, urban space, and commercial culture.',
        'footer_text' => 'Geographical Analysis of the Grand Bazaar - Kapalıçarşı',
        'footer_source' => 'Source: Historical and geographical data of Istanbul',
        'copyright' => '© 2023 - Designed for an international level article presentation',
        'lang_switcher' => 'Language:',
        'back_tooltip' => 'Hagia Sophia'
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
            background: linear-gradient(135deg, #f9f5e9 0%, #f0ebe0 100%);
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
            background: linear-gradient(rgba(139, 69, 19, 0.85), rgba(101, 67, 33, 0.9)), 
                        url('https://images.unsplash.com/photo-1548013146-72479768bada?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 20px;
            border-radius: 0 0 25px 25px;
            margin-bottom: 50px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
            position: relative;
            overflow: hidden;
        }
        
        header:before {
            content: '';
            position: absolute;
            top: 0;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 0;
            bottom: 0;
            <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M20,20 L80,20 L80,80 L20,80 Z" fill="none" stroke="%23DAA520" stroke-width="2" stroke-dasharray="5,5"/></svg>');
            opacity: 0.1;
        }
        
        header h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);
            font-weight: 700;
            letter-spacing: 1px;
            position: relative;
            z-index: 1;
        }
        
        .subtitle {
            font-size: 1.5rem;
            opacity: 0.95;
            max-width: 900px;
            margin: 0 auto;
            line-height: 1.7;
            position: relative;
            z-index: 1;
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
        
        .bazaar-icon {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 30px 0;
            color: #DAA520;
            font-size: 2.8rem;
            position: relative;
            z-index: 1;
        }
        
        .content-card {
            background-color: white;
            border-radius: 20px;
            padding: 45px;
            margin-bottom: 50px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 6px solid #8B4513;
            position: relative;
            overflow: hidden;
        }
        
        .content-card:before {
            content: '';
            position: absolute;
            top: 0;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #8B4513, #DAA520, #F4A460);
        }
        
        .content-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        h2 {
            color: #8B4513;
            font-size: 2.5rem;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #F0E68C;
            position: relative;
        }
        
        h2:after {
            content: '';
            position: absolute;
            bottom: -3px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 0;
            width: 120px;
            height: 3px;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #8B4513, #DAA520);
        }
        
        h3 {
            color: #654321;
            font-size: 2rem;
            margin: 35px 0 20px;
            display: flex;
            align-items: center;
        }
        
        h3 i {
            margin-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 15px;
            color: #8B4513;
            background: #F5F5DC;
            padding: 10px;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        p {
            font-size: 1.25rem;
            margin-bottom: 25px;
            text-align: justify;
            color: #444;
            line-height: 1.9;
        }
        
        .highlight-box {
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #FFF8DC, #FAF3E0);
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 5px solid #DAA520;
            padding: 30px;
            border-radius: 15px;
            margin: 30px 0;
            box-shadow: 0 8px 20px rgba(218, 165, 32, 0.15);
            position: relative;
        }
        
        .highlight-box:before {
            content: "✨";
            position: absolute;
            top: -15px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 20px;
            font-size: 2rem;
            color: #DAA520;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 35px;
        }
        
        .stat-item {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            border-top: 5px solid #8B4513;
            transition: all 0.4s ease;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .stat-item:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .stat-item:before {
            content: '';
            position: absolute;
            top: 0;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #8B4513, #DAA520);
        }
        
        .stat-number {
            font-size: 2.8rem;
            font-weight: bold;
            color: #8B4513;
            margin-bottom: 10px;
            display: block;
        }
        
        .stat-label {
            font-size: 1.2rem;
            color: #654321;
        }
        
        .quote {
            font-style: italic;
            text-align: center;
            font-size: 1.5rem;
            color: #654321;
            padding: 40px;
            margin: 50px 0;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #FFF8DC, #FFFAF0);
            border-radius: 20px;
            position: relative;
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 6px solid #DAA520;
            border-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 6px solid #DAA520;
        }
        
        .quote:before, .quote:after {
            content: '"';
            font-size: 4rem;
            color: #8B4513;
            position: absolute;
            opacity: 0.4;
        }
        
        .quote:before {
            top: 15px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 30px;
        }
        
        .quote:after {
            bottom: 15px;
            <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 30px;
        }
        
        .timeline {
            position: relative;
            max-width: 900px;
            margin: 50px auto;
        }
        
        .timeline:before {
            content: '';
            position: absolute;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 50%;
            transform: translateX(<?php echo $current['dir'] == 'rtl' ? '50%' : '-50%'; ?>);
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, #8B4513, #DAA520, #8B4513);
        }
        
        .timeline-item {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 40px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: calc(50% - 40px);
            position: relative;
        }
        
        .timeline-item:nth-child(odd) {
            margin-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: calc(50% + 40px);
        }
        
        .timeline-item:nth-child(even) {
            margin-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: calc(50% + 40px);
        }
        
        .timeline-item:before {
            content: '';
            position: absolute;
            top: 20px;
            width: 20px;
            height: 20px;
            background: #8B4513;
            border-radius: 50%;
        }
        
        .timeline-item:nth-child(odd):before {
            <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: -50px;
        }
        
        .timeline-item:nth-child(even):before {
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: -50px;
        }
        
        .timeline-year {
            font-size: 1.5rem;
            font-weight: bold;
            color: #8B4513;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        
        .conclusion {
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>, #8B4513, #654321);
            color: white;
            padding: 50px;
            border-radius: 20px;
            margin-top: 60px;
            position: relative;
            overflow: hidden;
        }
        
        .conclusion:before {
            content: '';
            position: absolute;
            top: 0;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M30,30 Q50,10 70,30 T90,50 Q70,70 50,90 T30,70 Q10,50 30,30 Z" fill="none" stroke="%23DAA520" stroke-width="0.5" opacity="0.2"/></svg>');
        }
        
        .conclusion h2 {
            color: #FFD700;
            border-bottom-color: #FFD700;
            position: relative;
            z-index: 1;
        }
        
        .conclusion p {
            color: #f8f8f8;
            position: relative;
            z-index: 1;
        }
        
        footer {
            text-align: center;
            margin-top: 80px;
            padding: 40px;
            color: #666;
            border-top: 1px solid #ddd;
            background: #f9f5e9;
            border-radius: 15px;
        }
        
        .footer-icons {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 20px;
            font-size: 1.8rem;
            color: #8B4513;
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
        
        @media (max-width: 992px) {
            header h1 {
                font-size: 2.8rem;
            }
            
            .subtitle {
                font-size: 1.3rem;
            }
            
            h2 {
                font-size: 2rem;
            }
            
            h3 {
                font-size: 1.7rem;
            }
            
            .content-card {
                padding: 30px;
            }
            
            .timeline:before {
                <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 30px;
            }
            
            .timeline-item {
                width: calc(100% - 80px);
                margin-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 80px !important;
                margin-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 0 !important;
            }
            
            .timeline-item:nth-child(odd):before,
            .timeline-item:nth-child(even):before {
                <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: -40px;
                <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: auto;
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
        
        @media (max-width: 768px) {
            header {
                padding: 70px 20px;
            }
            
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
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .bazaar-icon {
                font-size: 2rem;
                gap: 15px;
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
        }
    </style>
</head>

<body>
    <!-- دکمه بازگشت -->
    <a href="index.php" class="back-button">
        <i class="fas fa-landmark"></i>
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
        
        <div class="bazaar-icon">
            <i class="fas fa-store"></i>
            <i class="fas fa-map-marked-alt"></i>
            <i class="fas fa-globe-asia"></i>
            <i class="fas fa-route"></i>
            <i class="fas fa-coins"></i>
        </div>
    </header>
    
    <div class="container">
        <div class="content-card">
            <h2><i class="fas fa-scroll"></i> <?php echo $current['abstract_title']; ?></h2>
            <p><?php echo $current['abstract_content']; ?></p>
            
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number"><?php echo $current['stats']['streets']; ?></span>
                    <span class="stat-label"><?php echo $current['stats_labels']['streets']; ?></span>
                </div>
                
                <div class="stat-item">
                    <span class="stat-number"><?php echo $current['stats']['shops']; ?></span>
                    <span class="stat-label"><?php echo $current['stats_labels']['shops']; ?></span>
                </div>
                
                <div class="stat-item">
                    <span class="stat-number"><?php echo $current['stats']['years']; ?></span>
                    <span class="stat-label"><?php echo $current['stats_labels']['years']; ?></span>
                </div>
                
                <div class="stat-item">
                    <span class="stat-number"><?php echo $current['stats']['visitors']; ?></span>
                    <span class="stat-label"><?php echo $current['stats_labels']['visitors']; ?></span>
                </div>
            </div>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-book-open"></i> <?php echo $current['introduction_title']; ?></h2>
            <p><?php echo $current['introduction_content']; ?></p>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-map"></i> <?php echo $current['geographical_title']; ?></h2>
            <p><?php echo $current['geographical_content']; ?></p>
            
            <div class="highlight-box">
                <h3><i class="fas fa-anchor"></i> <?php echo $current['highlight_box_title']; ?></h3>
                <p><?php echo $current['highlight_box_content']; ?></p>
            </div>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-water"></i> <?php echo $current['natural_access_title']; ?></h2>
            <p><?php echo $current['natural_access_content']; ?></p>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-route"></i> <?php echo $current['human_access_title']; ?></h2>
            <p><?php echo $current['human_access_content']; ?></p>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-city"></i> <?php echo $current['location_title']; ?></h2>
            <p><?php echo $current['location_content']; ?></p>
            
            <div class="quote">
                <?php echo $current['quote']; ?>
            </div>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-history"></i> <?php echo $current['historical_title']; ?></h2>
            
            <div class="timeline">
                <?php foreach($current['timeline'] as $item): ?>
                <div class="timeline-item">
                    <div class="timeline-year"><i class="fas fa-calendar-day"></i> <?php echo $item['year']; ?></div>
                    <p><?php echo $item['content']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-chart-line"></i> <?php echo $current['prosperity_title']; ?></h2>
            <p><?php echo $current['prosperity_content']; ?></p>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-archway"></i> <?php echo $current['spatial_title']; ?></h2>
            <p><?php echo $current['spatial_content']; ?></p>
            
            <div class="highlight-box">
                <h3><i class="fas fa-sitemap"></i> <?php echo $current['spatial_highlight_title']; ?></h3>
                <p><?php echo $current['spatial_highlight_content']; ?></p>
            </div>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-camera"></i> <?php echo $current['today_title']; ?></h2>
            <p><?php echo $current['today_content']; ?></p>
        </div>
        
        <div class="conclusion">
            <h2><i class="fas fa-gem"></i> <?php echo $current['conclusion_title']; ?></h2>
            <p><?php echo $current['conclusion_content']; ?></p>
            
            <div class="quote" style="background: rgba(255, 255, 255, 0.15); color: #FFD700; margin-top: 30px; border-color: #FFD700;">
                <?php echo $current['conclusion_quote']; ?>
            </div>
        </div>
        
        <footer>
            <p><?php echo $current['footer_text']; ?></p>
            <p><?php echo $current['footer_source']; ?></p>
            
            <div class="footer-icons">
                <i class="fas fa-map-marked-alt"></i>
                <i class="fas fa-university"></i>
                <i class="fas fa-landmark"></i>
                <i class="fas fa-globe"></i>
                <i class="fas fa-store-alt"></i>
            </div>
            
            <p style="margin-top: 25px; font-size: 0.9rem;"><?php echo $current['copyright']; ?></p>
        </footer>
    </div>

    <script>
        // انیمیشن اسکرول
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.content-card, .stat-item, .timeline-item');
            
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
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'opacity 0.7s ease, transform 0.7s ease';
                observer.observe(card);
            });
            
            // انیمیشن برای آمار
            const statNumbers = document.querySelectorAll('.stat-number');
            statNumbers.forEach(stat => {
                const originalText = stat.textContent;
                if (originalText.includes('+')) {
                    const num = parseInt(originalText);
                    if (!isNaN(num)) {
                        let counter = 0;
                        const increment = num / 30;
                        const timer = setInterval(() => {
                            counter += increment;
                            if (counter >= num) {
                                counter = num;
                                clearInterval(timer);
                            }
                            stat.textContent = Math.floor(counter) + '+';
                        }, 50);
                    }
                }
            });
            
            // افکت پارالکس برای هدر
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