```php
<?php
// suleymaniye.php - تحلیل جامع مسجد سلیمانیه (Süleymaniye Camii)
// مدیریت زبان
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'fa';

// تنظیم هدر برای کدگذاری کاراکترها
header('Content-Type: text/html; charset=utf-8');

// اطلاعات کامل مسجد سلیمانیه به سه زبان
$content = [
    'fa' => [
        'lang_code' => 'fa',
        'dir' => 'rtl',
        'title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری و کارکرد مسجد سلیمانیه',
        'meta_description' => 'تحلیل تأثیر موقعیت جغرافیایی، مهندسی معمار سینان و قدرت عثمانی بر ساخت، توسعه و جایگاه امروزی مسجد سلیمانیه استانبول',
        'header_title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری، توسعه و کارکرد مسجد سلیمانیه استانبول',
        'header_subtitle' => 'مسجد سلیمانیه (Süleymaniye Camii) شاهکار معمار سینان و نماد طلایی‌ترین دوران امپراتوری عثمانی است. این مسجد بر فراز تپه سوم استانبول، با چشمانداز بسفر و شاخ طلایی، تجلی‌گاه پیوند دین، قدرت و جغرافیا به شمار می‌رود.',
        'abstract_title' => 'چکیده',
        'abstract_content' => 'مسجد سلیمانیه به‌فرمان سلطان سلیمان قانونی در سالهای ۱۵۵۰ تا ۱۵۵۷ توسط معمار سینان ساخته شد. موقعیت آن بر بلندای تپه سوم استانبول، تسلط کامل بر شهر و تنگه‌ها را ممکن می‌ساخت و پیوند خلافت عثمانی با میراث شهری بیزانس را بازمی‌تاباند. این مقاله با رویکردی تحلیلی، نقش عوامل جغرافیایی، نوآوری‌های سازه‌ای معمار سینان، سازمان فضایی مجموعه (کلیه) و تحول مسجد از نماد امپراتوری به میراثی زنده و پویا را بررسی می‌کند.',
        'stats' => [
            'minarets' => '۴',
            'capacity' => '۵٬۰۰۰+',
            'years' => '۴۶۵+',
            'visitors' => '۲۰٬۰۰۰+'
        ],
        'stats_labels' => [
            'minarets' => 'مناره',
            'capacity' => 'گنجایش نمازگزار',
            'years' => 'سال تاریخچه',
            'visitors' => 'بازدیدکننده روزانه'
        ],
        'introduction_title' => 'مقدمه',
        'introduction_content' => 'مسجد سلیمانیه نه تنها یک نیایشگاه، بلکه مجموعه‌ای عظیم (کلیه) شامل مدارس، بیمارستان (دارالشفا)، کتابخانه، حمام، آشپزخانه عمومی (ایماریت)، کاروان‌سرا و بازارچه بود. این مجموعه در سده شانزدهم میلادی مرکز علمی، اجتماعی و خیریه امپراتوری عثمانی به شمار می‌رفت و تا امروز نیز کاربری مذهبی و فرهنگی خود را حفظ کرده است. معماری مسجد تلفیقی از سنت‌های بیزانسی، سلجوقی و نبوغ فردی معمار سینان است.',
        'geographical_title' => 'موقعیت جغرافیایی استانبول و تأثیر آن بر مسجد',
        'geographical_content' => 'تپه سوم استانبول (محله سلیمانیه) یکی از هفت تپه‌ای است که شبه‌جزیره تاریخی بر آن بنا شده است. سینان با درایت کامل مسجد را در بلندترین نقطه این تپه جای داد تا گنبدها و مناره‌های آن از فرسنگ‌ها دورتر دیده شود. این موقعیت نه‌تنها بیانگر قدرت سیاسی و دینی سلطان، بلکه نمایشی از تسلط بر دو قاره و آبراه‌های راهبردی بود.',
        'highlight_box_title' => 'اوج معماری عثمانی',
        'highlight_box_content' => 'مسجد سلیمانیه با گنبدی به بلندی ۵۳ متر و چهار مناره که مجموعاً ده شرفه (بالکن) دارند، نماد دهمین سلطان عثمانی است. سیستم توزیع نور و آکوستیک آن از شگفتی‌های مهندسی سده شانزدهم به شمار می‌رود.',
        'natural_access_title' => 'نقش عوامل طبیعی در انتخاب مکان و پایداری سازه',
        'natural_access_content' => 'سینان با بهره‌گیری از شیب طبیعی زمین و خاک‌برداری هوشمندانه، پی‌های مسجد را تا رسیدن به سنگ بستر کَند و برای استحکام در برابر زلزله، از ترکیب ملات الاستیک و سیستم زهکشی پیشرفته استفاده کرد. چاه‌ها و قنات‌های رومی نیز آب مورد نیاز مجموعه را تأمین می‌کرد.',
        'human_access_title' => 'نقش دانش فنی و نوآوری معمار سینان',
        'human_access_content' => 'معمار سینان با بهره‌گیری از تجربه ساخت مسجد شاهزاده و مسجد سلیمیه، در مسجد سلیمانیه نظام تاق‌بندی جدیدی به کار گرفت که بار گنبد مرکزی را به‌طور یکنواخت بر پایه‌ها و نیم‌گنبدها توزیع می‌کرد. استفاده از ستون‌های گرانیتی برگرفته از بناهای کهن (از جمله کاخ بعلبک و اسکندریه) نیز پیوند میان تمدن‌ها را آشکار می‌سازد.',
        'location_title' => 'موقعیت مکانی مسجد در بافت شهری',
        'location_content' => 'مسجد سلیمانیه در منطقه فاتح، میان بوسفور و شاخ طلایی، و در همسایگی بازار بزرگ استانبول جای گرفته است. بقایای کاخ اسقف اعظم بیزانس و قنات والنس در نزدیکی آن، گویای تداوم تاریخی این مکان مقدس است.',
        'quote' => 'مسجد سلیمانیه نه تنها عبادتگاه، بلکه بیانیه‌ای سنگی از قدرت و ذوق سلیمان قانونی و نبوغ بی‌نظیر معمار سینان است.',
        'historical_title' => 'تأثیر عوامل جغرافیایی بر توسعه تاریخی مسجد',
        'timeline' => [
            [
                'year' => '۱۵۵۰-۱۵۵۷ میلادی',
                'content' => 'سلطان سلیمان قانونی دستور ساخت مسجد سلیمانیه را صادر کرد. معمار سینان در ۵۷ سالگی این شاهکار را در مدت هفت سال به پایان رساند.'
            ],
            [
                'year' => '۱۶۶۰ میلادی',
                'content' => 'آتش‌سوزی گسترده بخش‌هایی از مجموعه را تخریب کرد؛ مرمت آن به‌سرعت انجام شد.'
            ],
            [
                'year' => '۱۷۶۶ میلادی',
                'content' => 'زلزله شدید استانبول به گنبد اصلی آسیب رساند؛ مرمت با نظارت معماران عثمانی صورت گرفت.'
            ],
            [
                'year' => '۲۰۰۷-۲۰۱۰ میلادی',
                'content' => 'گسترده‌ترین مرمت معاصر با حمایت دولت ترکیه و شهرداری استانبول انجام شد و مسجد بار دیگر به روی نمازگزاران و گردشگران گشوده شد.'
            ]
        ],
        'prosperity_title' => 'نقش مسجد در شبکه قدرت، علم و اقتصاد عثمانی',
        'prosperity_content' => 'مجموعه سلیمانیه با دارا بودن چهار مدرسه حقوقی (مذاهب اربعه)، دارالحدیث، دارالطب و مدرسه طب، به بزرگترین دانشگاه عصر خود تبدیل شد. ایماریت روزانه هزاران نفر را اطعام می‌کرد و بیمارستان آن خدمات رایگان به همه مردم ارائه می‌داد. درآمد موقوفات مسجد از بازارها، حمام‌ها و کاروان‌سراها تأمین می‌شد.',
        'spatial_title' => 'سازمان فضایی مسجد و ارتباط آن با محیط جغرافیایی',
        'spatial_content' => 'حیاط مرکزی با ستون‌های مرمرین و وضوخانه هشت‌ضلعی، فضای ورودی را به گنبدخانه پیوند می‌زند. گنبد ۵۳ متری با چهار فیل‌پای عظیم و دو نیم‌گنبد در محور قبله و دو طاق‌نما در طرفین، فضایی سیال و سرشار از نور پدید آورده است. پنجره‌های متعدد با شیشه‌های رنگی و کاشی‌های ازنیک، جلوگاه هنر عثمانی هستند.',
        'spatial_highlight_title' => 'نور و صوت',
        'spatial_highlight_content' => 'سینان با تعبیه ۲۶۰ پنجره و ۱۳۰ دریچه نور، فضای درون را به «نور خداوند» پیوند داد. آکوستیک شگفت‌انگیز با استفاده از خمره‌های سفالی در گنبد و دیوارها حاصل شده است.',
        'today_title' => 'جایگاه امروزی مسجد سلیمانیه در گردشگری و فرهنگ',
        'today_content' => 'مسجد سلیمانیه همچنان یکی از فعال‌ترین مساجد استانبول و مقصد اصلی گردشگران داخلی و خارجی است. آرامگاه سلطان سلیمان و خرم‌سلطان در محوطه پشتی مسجد، سالانه میلیون‌ها بازدیدکننده دارد. این مجموعه نماد همزیستی دین، تاریخ و هنر در قلب استانبول است.',
        'conclusion_title' => 'نتیجه‌گیری',
        'conclusion_content' => 'مسجد سلیمانیه نمونه‌ای کم‌نظیر از پیوند ژرف میان جغرافیا، معماری و قدرت سیاسی است. بقای آن به‌مدت پنج سده و تداوم کاربری مذهبی و فرهنگی، گویای اعتبار و انعطاف‌پذیری این بنای بی‌همتاست. مسجد سلیمانیه نه فقط میراث عثمانی، بلکه میراث مشترک بشریت است.',
        'conclusion_quote' => 'مسجد سلیمانیه چون نگینی بر بلندای استانبول می‌درخشد؛ قصیده‌ای از سنگ و نور که همت سلطان و اندیشه سینان را جاودانه ساخته است.',
        'footer_text' => 'تحلیل جغرافیایی مسجد سلیمانیه - Süleymaniye Camii',
        'footer_source' => 'منبع: داده‌های تاریخی و معماری استانبول',
        'copyright' => '© ۲۰۲۳ - طراحی شده برای ارائه مقاله‌ای در سطح بین‌المللی',
        'lang_switcher' => 'زبان:',
        'back_tooltip' => 'ایاصوفیه'
    ],
    
    'tr' => [
        'lang_code' => 'tr',
        'dir' => 'ltr',
        'title' => 'Süleymaniye Camii\'nin Coğrafi Konum Analizi',
        'meta_description' => 'Süleymaniye Camii\'nin inşası, gelişimi ve günümüzdeki işlevinde coğrafi konum, Mimar Sinan\'ın mühendisliği ve Osmanlı gücünün etkisi',
        'header_title' => 'Süleymaniye Camii\'nin Oluşumu, Gelişimi ve İşleyişinde Coğrafi Konumun Rolünün Analizi',
        'header_subtitle' => 'Süleymaniye Camii, Mimar Sinan\'ın başyapıtı ve Osmanlı İmparatorluğu\'nun en parlak döneminin simgesidir. İstanbul\'un üçüncü tepesinde, Haliç ve Boğaz\'a hakim konumuyla din, güç ve coğrafyanın somut birleşimidir.',
        'abstract_title' => 'Özet',
        'abstract_content' => 'Süleymaniye Camii, Kanuni Sultan Süleyman\'ın emriyle 1550-1557 yılları arasında Mimar Sinan tarafından inşa edilmiştir. İstanbul\'un üçüncü tepesindeki stratejik konumu, şehre ve boğazlara tam hakimiyet sağlıyor ve Osmanlı hilafetinin Bizans kent mirasıyla bağını yansıtıyordu. Bu makale, coğrafi faktörlerin, Mimar Sinan\'ın yapısal yeniliklerinin, külliyenin mekânsal organizasyonunun ve caminin imparatorluk simgesinden yaşayan bir mirasa dönüşümünü analitik bir yaklaşımla incelemektedir.',
        'stats' => [
            'minarets' => '4',
            'capacity' => '5.000+',
            'years' => '465+',
            'visitors' => '20.000+'
        ],
        'stats_labels' => [
            'minarets' => 'Minare',
            'capacity' => 'Kapasite (Kişi)',
            'years' => 'Yıllık Tarih',
            'visitors' => 'Günlük Ziyaretçi'
        ],
        'introduction_title' => 'Giriş',
        'introduction_content' => 'Süleymaniye Camii yalnızca bir ibadethane değil, aynı zamanda medreseler, hastane (darüşşifa), kütüphane, hamam, imaret, kervansaray ve dükkânlardan oluşan devasa bir külliyedir. 16. yüzyılda Osmanlı İmparatorluğu\'nun bilim, sosyal yardım ve kültür merkezi olan külliye, günümüzde de dini ve kültürel işlevini sürdürmektedir. Caminin mimarisi Bizans, Selçuklu gelenekleri ile Mimar Sinan\'ın dehasının sentezidir.',
        'geographical_title' => 'İstanbul\'un Coğrafi Konumu ve Camiye Etkisi',
        'geographical_content' => 'İstanbul\'un üçüncü tepesi (Süleymaniye semti), tarihi yarımadayı oluşturan yedi tepeden biridir. Sinan, camiyi tepenin en yüksek noktasına yerleştirerek kubbeler ve minarelerin kilometrelerce uzaktan görünmesini sağladı. Bu konum yalnızca padişahın siyasi ve dini gücünü değil, aynı zamanda iki kıta ve stratejik su yollarına hakimiyeti de simgeliyordu.',
        'highlight_box_title' => 'Osmanlı Mimarisinin Zirvesi',
        'highlight_box_content' => 'Süleymaniye Camii, 53 metre yüksekliğindeki kubbesi ve toplam on şerefeli dört minaresiyle Kanuni Sultan Süleyman\'ın onuncu padişah oluşunu sembolize eder. Işık dağılımı ve akustik sistemi 16. yüzyıl mühendisliğinin harikalarındandır.',
        'natural_access_title' => 'Yer Seçiminde ve Yapı Sağlamlığında Doğal Faktörlerin Rolü',
        'natural_access_content' => 'Sinan, arazinin doğal eğimini ve akıllıca hafriyatı kullanarak temelleri ana kayaya kadar indirdi; depreme karşı esnek harç ve gelişmiş drenaj sistemi uyguladı. Roma dönemine ait kuyular ve su kemerleri külliyenin su ihtiyacını karşılıyordu.',
        'human_access_title' => 'Mimar Sinan\'ın Teknik Bilgisi ve Yeniliklerinin Rolü',
        'human_access_content' => 'Mimar Sinan, Şehzade Camii ve Selimiye Camii deneyiminden yararlanarak Süleymaniye\'de merkezi kubbe yükünü payandalar ve yarım kubbelerle dengeli bir şekilde dağıtan yeni bir kemer sistemi kullandı. Antik yapılardan (Baalbek Sarayı, İskenderiye) getirilen granit sütunlar, medeniyetler arası bağı gözler önüne serer.',
        'location_title' => 'Süleymaniye Camii\'nin Kentsel Dokudaki Konumu',
        'location_content' => 'Süleymaniye Camii, Fatih ilçesinde, Haliç ile Boğaz arasında, Kapalıçarşı\'nın yakınında yer alır. Yakınındaki Bizans patriklik sarayı kalıntıları ve Valens Su Kemeri, bu kutsal mekânın tarihsel sürekliliğini kanıtlar.',
        'quote' => 'Süleymaniye Camii yalnızca bir ibadethane değil, Kanuni\'nin ihtişamının ve Mimar Sinan\'ın dehasının taşa işlenmiş manifestosudur.',
        'historical_title' => 'Coğrafi Faktörlerin Caminin Tarihsel Gelişimine Etkisi',
        'timeline' => [
            [
                'year' => '1550-1557 MS',
                'content' => 'Kanuni Sultan Süleyman, Süleymaniye Camii\'nin inşasını emretti. Mimar Sinan 57 yaşında bu şaheseri yedi yılda tamamladı.'
            ],
            [
                'year' => '1660',
                'content' => 'Büyük yangın külliyenin bir kısmını tahrip etti; hızla onarıldı.'
            ],
            [
                'year' => '1766',
                'content' => 'Şiddetli deprem ana kubbeye zarar verdi; Osmanlı mimarları tarafından onarıldı.'
            ],
            [
                'year' => '2007-2010',
                'content' => 'Türkiye Cumhuriyeti ve İstanbul Büyükşehir Belediyesi desteğiyle kapsamlı restorasyon yapıldı; cami ibadete ve ziyarete açıldı.'
            ]
        ],
        'prosperity_title' => 'Caminin Osmanlı Gücü, Bilim ve Ekonomi Ağındaki Rolü',
        'prosperity_content' => 'Süleymaniye Külliyesi, dört mezhebe ait hukuk medreseleri, Darülhadis, Darüttıb ve Tıp Medresesi ile döneminin en büyük üniversitesiydi. İmaret her gün binlerce kişiye yemek veriyor, hastane herkese ücretsiz hizmet sunuyordu. Caminin vakıf gelirleri çarşılar, hamamlar ve kervansaraylardan sağlanıyordu.',
        'spatial_title' => 'Caminin Mekânsal Organizasyonu ve Coğrafi Çevreyle İlişkisi',
        'spatial_content' => 'Mermer sütunlu avlu ve sekizgen şadırvan, girişi kubbe mekânına bağlar. 53 metre yüksekliğindeki kubbe dört büyük fil ayağı, kıble yönünde iki yarım kubbe ve yanlarda iki kemerle taşınır. Renkli camlı pencereler ve İznik çinileri Osmanlı sanatının zirvesidir.',
        'spatial_highlight_title' => 'Işık ve Ses',
        'spatial_highlight_content' => 'Sinan, 260 pencere ve 130 ışık boşluğuyla iç mekânı "ilahi nur"la buluşturdu. Kubbe ve duvarlara yerleştirilen seramik küplerle olağanüstü akustik elde edildi.',
        'today_title' => 'Süleymaniye Camii\'nin Günümüz Turizm ve Kültürdeki Yeri',
        'today_content' => 'Süleymaniye Camii, İstanbul\'un en işlek camilerinden biri ve yerli-yabancı turistlerin başlıca uğrak noktasıdır. Arka bahçede Kanuni Sultan Süleyman ve Hürrem Sultan\'ın türbeleri yılda milyonlarca ziyaretçi çekmektedir. Külliye, din, tarih ve sanatın İstanbul\'un kalbindeki uyumunu simgeler.',
        'conclusion_title' => 'Sonuç',
        'conclusion_content' => 'Süleymaniye Camii, coğrafya, mimari ve siyasi güç arasındaki derin bağın ender örneklerindendir. Beş yüzyıldır ayakta kalması ve dini-kültürel işlevini sürdürmesi, bu eşsiz yapının evrenselliğini ve dayanıklılığını kanıtlar. Süleymaniye yalnızca Osmanlı\'nın değil, tüm insanlığın ortak mirasıdır.',
        'conclusion_quote' => 'Süleymaniye Camii, İstanbul\'un tepesinde bir mücevher gibi parlar; padişahın azmini ve Sinan\'ın dehasını ölümsüzleştiren taş ve ışıktan bir kasidedir.',
        'footer_text' => 'Süleymaniye Camii\'nin Coğrafi Analizi',
        'footer_source' => 'Kaynak: İstanbul\'un tarihi ve mimari verileri',
        'copyright' => '© 2023 - Uluslararası düzeyde bir makale sunumu için tasarlandı',
        'lang_switcher' => 'Dil:',
        'back_tooltip' => 'Ayasofya'
    ],
    
    'en' => [
        'lang_code' => 'en',
        'dir' => 'ltr',
        'title' => 'Geographical Location Analysis of Süleymaniye Mosque Istanbul',
        'meta_description' => 'Analysis of the impact of geographical location, Mimar Sinan\'s engineering, and Ottoman power on the construction, development and current role of Süleymaniye Mosque, Istanbul',
        'header_title' => 'Analysis of the Role of Geographical Location in the Formation, Development and Functioning of Süleymaniye Mosque Istanbul',
        'header_subtitle' => 'Süleymaniye Mosque, the masterpiece of Mimar Sinan and symbol of the Ottoman Empire\'s golden age, stands on Istanbul\'s Third Hill overlooking the Golden Horn and the Bosphorus. It embodies the synthesis of religion, power, and geography.',
        'abstract_title' => 'Abstract',
        'abstract_content' => 'Commissioned by Sultan Süleyman the Magnificent and built by Mimar Sinan between 1550 and 1557, the Süleymaniye Mosque occupies the highest point of Istanbul\'s Third Hill. This strategic location provided visual dominance over the city and the straits, linking Ottoman caliphal authority with the Byzantine urban legacy. This article analytically examines the role of geographical factors, Sinan\'s structural innovations, the spatial organization of the külliye (complex), and the mosque\'s transformation from an imperial symbol to a living heritage site.',
        'stats' => [
            'minarets' => '4',
            'capacity' => '5,000+',
            'years' => '465+',
            'visitors' => '20,000+'
        ],
        'stats_labels' => [
            'minarets' => 'Minarets',
            'capacity' => 'Capacity (Worshippers)',
            'years' => 'Years of History',
            'visitors' => 'Daily Visitors'
        ],
        'introduction_title' => 'Introduction',
        'introduction_content' => 'The Süleymaniye Mosque is not merely a place of worship; it is a vast külliye comprising madrasas, a hospital (darüşşifa), a library, a hamam, a public kitchen (imaret), a caravanserai, and shops. In the 16th century, it was the scientific, social, and charitable heart of the Ottoman Empire, and it continues to serve religious and cultural functions today. The architecture represents a synthesis of Byzantine and Seljuk traditions with the individual genius of Mimar Sinan.',
        'geographical_title' => 'Geographical Location of Istanbul and Its Influence on the Mosque',
        'geographical_content' => 'Istanbul\'s Third Hill (Süleymaniye quarter) is one of the seven hills upon which the historical peninsula was built. Sinan deliberately placed the mosque at the hill\'s summit so that its domes and minarets would be visible from miles away. This location not only expressed the Sultan\'s political and religious authority but also symbolized Ottoman dominion over two continents and the strategic waterways.',
        'highlight_box_title' => 'Apex of Ottoman Architecture',
        'highlight_box_content' => 'With its 53-meter-high dome and four minarets bearing a total of ten balconies (şerefe), the Süleymaniye Mosque symbolizes Sultan Süleyman as the tenth Ottoman sultan. Its light distribution and acoustic system are among the marvels of 16th-century engineering.',
        'natural_access_title' => 'Role of Natural Factors in Site Selection and Structural Stability',
        'natural_access_content' => 'Sinan exploited the natural slope of the terrain and executed intelligent excavation to lay the foundations on bedrock; he used flexible mortar and an advanced drainage system to resist earthquakes. Roman-era wells and aqueducts supplied water to the entire complex.',
        'human_access_title' => 'Role of Mimar Sinan\'s Technical Knowledge and Innovations',
        'human_access_content' => 'Drawing on his experience with the Şehzade and Selimiye mosques, Sinan employed a novel system of arches in Süleymaniye that evenly distributes the weight of the central dome onto buttresses and semi-domes. Granite columns taken from ancient structures (the Palace of Baalbek and Alexandria) manifest the continuity of civilizations.',
        'location_title' => 'Location of Süleymaniye Mosque in the Urban Fabric',
        'location_content' => 'The Süleymaniye Mosque is situated in the Fatih district, between the Golden Horn and the Bosphorus, in the vicinity of the Grand Bazaar. Nearby remains of the Byzantine patriarchal palace and the Valens Aqueduct attest to the sacred site\'s historical continuity.',
        'quote' => 'The Süleymaniye Mosque is not only a house of prayer but a stone manifesto of Süleyman the Magnificent\'s ambition and Mimar Sinan\'s unparalleled genius.',
        'historical_title' => 'Impact of Geographical Factors on the Historical Development of the Mosque',
        'timeline' => [
            [
                'year' => '1550-1557 AD',
                'content' => 'Sultan Süleyman the Magnificent ordered the construction of the Süleymaniye Mosque. Mimar Sinan, aged 57, completed this masterpiece in seven years.'
            ],
            [
                'year' => '1660',
                'content' => 'A great fire damaged parts of the külliye; restoration was carried out swiftly.'
            ],
            [
                'year' => '1766',
                'content' => 'A severe earthquake damaged the main dome; it was restored by Ottoman architects.'
            ],
            [
                'year' => '2007-2010',
                'content' => 'The most comprehensive contemporary restoration was undertaken with support from the Turkish government and Istanbul Metropolitan Municipality; the mosque was reopened for worship and tourism.'
            ]
        ],
        'prosperity_title' => 'Role of the Mosque in Ottoman Power, Science, and Economy',
        'prosperity_content' => 'The Süleymaniye Külliye, with its four law madrasas (representing the four Sunni schools), hadith school, medical school, and hospital, constituted the largest university of its era. The imaret fed thousands daily, and the hospital provided free care to all. The mosque\'s endowment revenues came from markets, baths, and caravanserais.',
        'spatial_title' => 'Spatial Organization of the Mosque and Its Relationship with the Geographical Environment',
        'spatial_content' => 'The marble-columned courtyard and octagonal ablution fountain connect the entrance to the domed sanctuary. The 53-meter-high central dome rests on four massive piers, two semi-domes on the qibla axis, and two arched tympana on the sides. Stained-glass windows and Iznik tiles represent the pinnacle of Ottoman decorative arts.',
        'spatial_highlight_title' => 'Light and Acoustics',
        'spatial_highlight_content' => 'Sinan integrated 260 windows and 130 light openings to flood the interior with "divine light". Remarkable acoustics were achieved through ceramic pots embedded in the dome and walls.',
        'today_title' => 'Current Role of Süleymaniye Mosque in Tourism and Culture',
        'today_content' => 'The Süleymaniye Mosque remains one of Istanbul\'s busiest mosques and a prime destination for domestic and international tourists. The tombs of Sultan Süleyman and Hürrem Sultan in the rear garden attract millions of visitors annually. The complex symbolizes the harmonious coexistence of religion, history, and art in the heart of Istanbul.',
        'conclusion_title' => 'Conclusion',
        'conclusion_content' => 'The Süleymaniye Mosque is an exceptional example of the profound interplay between geography, architecture, and political power. Its survival for five centuries and its continued religious and cultural functions attest to its enduring relevance and resilience. Süleymaniye is not only an Ottoman legacy but a shared heritage of humanity.',
        'conclusion_quote' => 'The Süleymaniye Mosque shines like a jewel on Istanbul\'s heights; an ode in stone and light immortalizing the sultan\'s resolve and Sinan\'s vision.',
        'footer_text' => 'Geographical Analysis of Süleymaniye Mosque',
        'footer_source' => 'Source: Historical and architectural data of Istanbul',
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
            background: linear-gradient(135deg, #e8f1e4 0%, #d4e2d4 100%);
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
            background: linear-gradient(rgba(46, 92, 78, 0.9), rgba(34, 68, 58, 0.95)), 
                        url('https://images.unsplash.com/photo-1572855346326-1d504ee5aeb4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center 40%;
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
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M20,20 L80,20 L80,80 L20,80 Z" fill="none" stroke="%23D4AF37" stroke-width="2" stroke-dasharray="5,5"/></svg>');
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
            background-color: #2E5C4E;
            color: white;
        }
        
        .mosque-icon {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 30px 0;
            color: #D4AF37;
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
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 6px solid #2E5C4E;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #2E5C4E, #B68B5C, #D4AF37);
        }
        
        .content-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        h2 {
            color: #2E5C4E;
            font-size: 2.5rem;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #D4E6C3;
            position: relative;
        }
        
        h2:after {
            content: '';
            position: absolute;
            bottom: -3px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 0;
            width: 120px;
            height: 3px;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #2E5C4E, #B68B5C);
        }
        
        h3 {
            color: #1D3E3C;
            font-size: 2rem;
            margin: 35px 0 20px;
            display: flex;
            align-items: center;
        }
        
        h3 i {
            margin-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 15px;
            color: #2E5C4E;
            background: #E8F1E4;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #F0F7E9, #E8F1E4);
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 5px solid #B68B5C;
            padding: 30px;
            border-radius: 15px;
            margin: 30px 0;
            box-shadow: 0 8px 20px rgba(182, 139, 92, 0.15);
            position: relative;
        }
        
        .highlight-box:before {
            content: "🕌";
            position: absolute;
            top: -15px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 20px;
            font-size: 2rem;
            color: #B68B5C;
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
            border-top: 5px solid #2E5C4E;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #2E5C4E, #B68B5C);
        }
        
        .stat-number {
            font-size: 2.8rem;
            font-weight: bold;
            color: #2E5C4E;
            margin-bottom: 10px;
            display: block;
        }
        
        .stat-label {
            font-size: 1.2rem;
            color: #1D3E3C;
        }
        
        .quote {
            font-style: italic;
            text-align: center;
            font-size: 1.5rem;
            color: #1D3E3C;
            padding: 40px;
            margin: 50px 0;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #F0F7E9, #E8F1E4);
            border-radius: 20px;
            position: relative;
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 6px solid #B68B5C;
            border-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 6px solid #B68B5C;
        }
        
        .quote:before, .quote:after {
            content: '"';
            font-size: 4rem;
            color: #2E5C4E;
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
            background: linear-gradient(to bottom, #2E5C4E, #B68B5C, #2E5C4E);
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
            background: #2E5C4E;
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
            color: #2E5C4E;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        
        .conclusion {
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>, #2E5C4E, #1D3E3C);
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
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M30,30 Q50,10 70,30 T90,50 Q70,70 50,90 T30,70 Q10,50 30,30 Z" fill="none" stroke="%23D4AF37" stroke-width="0.5" opacity="0.2"/></svg>');
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
            background: #e8f1e4;
            border-radius: 15px;
        }
        
        .footer-icons {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 20px;
            font-size: 1.8rem;
            color: #2E5C4E;
        }
        
        /* دکمه بازگشت */
        .back-button {
            position: fixed;
            bottom: 30px;
            <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 30px;
            background: linear-gradient(135deg, #2E5C4E, #1D3E3C);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            box-shadow: 0 6px 15px rgba(46, 92, 78, 0.4);
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .back-button:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 25px rgba(46, 92, 78, 0.6);
            background: linear-gradient(135deg, #1D3E3C, #2E5C4E);
        }
        
        .back-button .tooltip {
            position: absolute;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 70px;
            background: rgba(46, 92, 78, 0.9);
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
            border-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 6px solid rgba(46, 92, 78, 0.9);
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
            
            .mosque-icon {
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
        <i class="fas fa-mosque"></i>
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
        
        <div class="mosque-icon">
            <i class="fas fa-mosque"></i>
            <i class="fas fa-dome"></i>
            <i class="fas fa-minaret"></i>
            <i class="fas fa-archway"></i>
            <i class="fas fa-star-and-crescent"></i>
        </div>
    </header>
    
    <div class="container">
        <div class="content-card">
            <h2><i class="fas fa-scroll"></i> <?php echo $current['abstract_title']; ?></h2>
            <p><?php echo $current['abstract_content']; ?></p>
            
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number"><?php echo $current['stats']['minarets']; ?></span>
                    <span class="stat-label"><?php echo $current['stats_labels']['minarets']; ?></span>
                </div>
                
                <div class="stat-item">
                    <span class="stat-number"><?php echo $current['stats']['capacity']; ?></span>
                    <span class="stat-label"><?php echo $current['stats_labels']['capacity']; ?></span>
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
                <h3><i class="fas fa-crown"></i> <?php echo $current['highlight_box_title']; ?></h3>
                <p><?php echo $current['highlight_box_content']; ?></p>
            </div>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-mountain"></i> <?php echo $current['natural_access_title']; ?></h2>
            <p><?php echo $current['natural_access_content']; ?></p>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-hard-hat"></i> <?php echo $current['human_access_title']; ?></h2>
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
                <h3><i class="fas fa-lightbulb"></i> <?php echo $current['spatial_highlight_title']; ?></h3>
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
            
            <div class="quote" style="background: rgba(255, 255, 255, 0.1); color: #FFD700; margin-top: 30px; border-color: #FFD700;">
                <?php echo $current['conclusion_quote']; ?>
            </div>
        </div>
        
        <footer>
            <p><?php echo $current['footer_text']; ?></p>
            <p><?php echo $current['footer_source']; ?></p>
            
            <div class="footer-icons">
                <i class="fas fa-mosque"></i>
                <i class="fas fa-university"></i>
                <i class="fas fa-landmark"></i>
                <i class="fas fa-globe"></i>
                <i class="fas fa-draw-polygon"></i>
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
            
            // انیمیشن برای آمار (اعداد)
            const statNumbers = document.querySelectorAll('.stat-number');
            statNumbers.forEach(stat => {
                const originalText = stat.textContent;
                if (originalText.includes('+') || originalText.includes('٬')) {
                    const num = parseInt(originalText.replace(/[^\d-]/g, ''));
                    if (!isNaN(num)) {
                        let counter = 0;
                        const increment = num / 30;
                        const timer = setInterval(() => {
                            counter += increment;
                            if (counter >= num) {
                                counter = num;
                                clearInterval(timer);
                            }
                            // حفظ علامت + و ارقام
                            if (originalText.includes('٬') || originalText.includes('۰')) {
                                // برای فارسی: نمایش ساده با اعداد فارسی
                                stat.textContent = Math.floor(counter).toLocaleString('fa-IR') + '+';
                            } else {
                                stat.textContent = Math.floor(counter) + '+';
                            }
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
