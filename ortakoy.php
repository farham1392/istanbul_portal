<?php
// ortakoy.php - تحلیل جامع مسجد اورتاکوی (مجیدیه) - Ortaköy Camii
// مدیریت زبان
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'fa';

// تنظیم هدر برای کدگذاری کاراکترها
header('Content-Type: text/html; charset=utf-8');

// اطلاعات کامل مسجد اورتاکوی به سه زبان
$content = [
    'fa' => [
        'lang_code' => 'fa',
        'dir' => 'rtl',
        'title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری و کارکرد مسجد اورتاکوی (مجیدیه)',
        'meta_description' => 'تحلیل تأثیر موقعیت جغرافیایی، معماری باروک-عثمانی و زندگی مدرن بر ساخت، توسعه و جایگاه امروزی مسجد اورتاکوی استانبول',
        'header_title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری، توسعه و کارکرد مسجد اورتاکوی استانبول',
        'header_subtitle' => 'مسجد اورتاکوی (Ortaköy Camii / Büyük Mecidiye Camii) در کرانه اروپایی بسفر و در مجاورت پل بسفر، نماد پیوند سنت عثمانی با معماری باروک و زندگی مدرن استانبول است.',
        'abstract_title' => 'چکیده',
        'abstract_content' => 'مسجد اورتاکوی به‌فرمان سلطان عبدالمجید یکم در سال‌های ۱۸۵۴ تا ۱۸۵۶ توسط معمار نیکوغوس بالیان ساخته شد. این مسجد با موقعیت ساحلی منحصربه‌فرد خود در کنار آب‌های بسفر و در سایه پل مدرن، به یکی از نمادهای بی‌بدیل استانبول تبدیل شده است. این مقاله با رویکردی تحلیلی، عوامل جغرافیایی، سبک معماری تلفیقی، نقش آن در هویت محله اورتاکوی و جایگاه امروزی مسجد در گردشگری و فرهنگ معاصر ترکیه را بررسی می‌کند.',
        'stats' => [
            'minarets' => '۲',
            'capacity' => '۵۰۰+',
            'years' => '۱۶۵+',
            'visitors' => '۱۰٬۰۰۰+'
        ],
        'stats_labels' => [
            'minarets' => 'مناره',
            'capacity' => 'گنجایش نمازگزار',
            'years' => 'سال تاریخچه',
            'visitors' => 'بازدیدکننده روزانه'
        ],
        'introduction_title' => 'مقدمه',
        'introduction_content' => 'مسجد اورتاکوی که به نام رسمی «مسجد مجیدیه کبیر» (Büyük Mecidiye Camii) نیز شناخته می‌شود، یکی از زیباترین مساجد ساحلی استانبول است. این مسجد در محله اورتاکوی، درست در کنار بسفر و پایانه کشتی‌ها قرار دارد. معماری آن تلفیقی است از سبک باروک عثمانی با عناصر نئوکلاسیک. این مسجد با دو مناره باریک، گنبدی بزرگ و پنجره‌های عریض، نور طبیعی فراوانی را به درون راه می‌دهد. تزئینات داخلی شامل کاشی‌کاری، طلاکاری و منبت‌کاری از هنرمندان ارمنی و ایتالیایی است.',
        'geographical_title' => 'موقعیت جغرافیایی استانبول و تأثیر آن بر مسجد',
        'geographical_content' => 'اورتاکوی در کرانه اروپایی بسفر، میان محله‌های بشیکتاش و کوروچشمه جای گرفته است. مسجد درست در کنار آب و در امتداد خط ساحلی ساخته شده تا جلوه‌ای تماشایی از دریا و پل داشته باشد. این موقعیت، مسجد را به یکی از پربازدیدترین نقاط استانبول تبدیل کرده و چشمانداز آن با پل بسفر در پس‌زمینه، تصویری آشنا از استانبول مدرن را ساخته است.',
        'highlight_box_title' => 'نگین بسفر',
        'highlight_box_content' => 'مسجد اورتاکوی به دلیل موقعیت بی‌نظیرش در کنار آب و همسایگی با پل بسفر، به «نگین بسفر» شهرت یافته است. این مسجد کوچک اما باشکوه، جلوگاه هم‌آغوشی سنت و مدرنیته در استانبول است.',
        'natural_access_title' => 'نقش عوامل طبیعی در انتخاب مکان و طراحی مسجد',
        'natural_access_content' => 'ساخت مسجد بر روی ساحل، معمار را با چالش‌های ژئوتکنیکی و رطوبت مواجه ساخت. نیکوغوس بالیان با استفاده از پی‌های عمیق و سیستم زهکشی پیشرفته، پایداری بنا را تضمین کرد. پنجره‌های بزرگ و بلند برای بهره‌گیری از نور طبیعی و نسیم خنک بسفر طراحی شدند و فضای داخلی را روشن و دلپذیر می‌سازند.',
        'human_access_title' => 'نقش دانش فنی و معماری غربی در شکل‌گیری مسجد',
        'human_access_content' => 'خانواده بالیان که معماران ارمنی دربار عثمانی بودند، با الهام از کلیساهای باروک اروپا و مساجد کلاسیک عثمانی، سبکی منحصربه‌فرد پدید آوردند. مسجد اورتاکوی گنبدی عظیم بر روی چهار طاق دارد و دو مناره باریک آن با تزئینات سنگی ظریف مزین شده‌اند. محراب و منبر از مرمر سفید با کنده‌کاری‌های استادانه ساخته شده است.',
        'location_title' => 'موقعیت مکانی مسجد در بافت شهری امروز',
        'location_content' => 'مسجد اورتاکوی در میدان ساحلی اورتاکوی، در مجاورت کافه‌ها، رستوران‌ها و گالری‌های هنری واقع است. پایانه کشتی‌های عمومی و ایستگاه اتوبوس در نزدیکی آن، دسترسی آسان را ممکن ساخته است. پل بسفر که در سال ۱۹۷۳ افتتاح شد، درست از کنار مسجد می‌گذرد و چشماندازی بی‌نظیر خلق کرده است.',
        'quote' => 'مسجد اورتاکوی چون نگینی بر کرانه بسفر نشسته و هر صبح با اولین نور خورشید، بازتاب گنبدش در آب، استانبول را به روز نو بشارت می‌دهد.',
        'historical_title' => 'تأثیر عوامل جغرافیایی بر توسعه تاریخی مسجد',
        'timeline' => [
            [
                'year' => '۱۸۵۴-۱۸۵۶ میلادی',
                'content' => 'سلطان عبدالمجید یکم دستور ساخت مسجد جدیدی در محله اورتاکوی را به معمار نیکوغوس بالیان می‌دهد. ساخت مسجد طی دو سال به پایان می‌رسد.'
            ],
            [
                'year' => '۱۸۶۲ میلادی',
                'content' => 'نخستین مرمت‌ها به‌دلیل آسیب‌های ناشی از رطوبت دریا انجام می‌شود.'
            ],
            [
                'year'=> '۱۹۶۰-۱۹۶۵ میلادی',
                'content' => 'مرمت اساسی پس از گذشت یک قرن؛ استحکام‌بندی پی و تعویض بخش‌های فرسوده.'
            ],
            [
                'year' => '۱۹۷۳ میلادی',
                'content' => 'افتتاح پل بسفر در کنار مسجد، این بنا را به نماد جهانی استانبول تبدیل می‌کند.'
            ],
            [
                'year' => '۲۰۱۹-۲۰۲۱ میلادی',
                'content' => 'مرمت جامع با حمایت ریاست جمهوری ترکیه؛ کاشی‌ها و تزئینات داخلی بازسازی می‌شوند.'
            ]
        ],
        'prosperity_title' => 'نقش مسجد در هویت محله و اقتصاد گردشگری',
        'prosperity_content' => 'مسجد اورتاکوی نه‌تنها یک مکان مذهبی فعال است، بلکه قلب تپنده محله اورتاکوی به‌شمار می‌رود. بازار صنایع‌دستی، غذاخوری‌های سنتی (به‌ویژه فروشندگان کومپیر و باقلوا) و تورهای گردشگری دریایی همگی پیرامون این مسجد شکل گرفته‌اند. سالانه میلیون‌ها گردشگر داخلی و خارجی از این مسجد بازدید می‌کنند.',
        'spatial_title' => 'سازمان فضایی مسجد و ارتباط آن با محیط جغرافیایی',
        'spatial_content' => 'پلان مسجد مستطیلی با یک گنبد مرکزی به قطر ۱۲ متر است که بر روی چهار دیوار باربر و طاق‌نماها قرار گرفته. دو مناره باریک با یک شرفه (بالکن) در دو سوی ورودی اصلی خودنمایی می‌کنند. شبستان با پنجره‌های سه‌لتی و قوس‌دار نور کافی دریافت می‌کند. حیاط کوچک مسجد با حوضی سنگی، فضایی آرام و دلنشین پدید آورده است.',
        'spatial_highlight_title' => 'نور و آب',
        'spatial_highlight_content' => 'بازی نور بر سطوح مرمرین محراب و انعکاس آب بسفر بر دیوارهای جنوبی، فضایی روحانی و چشم‌نواز آفریده است. معمار با طراحی دقیق پنجره‌ها، نمازگزار را در هر نقطه از شبستان با چشم‌اندازی از دریا و آسمان پیوند می‌زند.',
        'today_title' => 'جایگاه امروزی مسجد اورتاکوی در گردشگری و فرهنگ',
        'today_content' => 'مسجد اورتاکوی امروزه یکی از پرعکس‌ترین بناهای استانبول است. غروب‌ها که پل بسفر چراغانی می‌شود و نور مسجد در آب منعکس می‌گردد، صحنه‌هایی رؤیایی خلق می‌شود. این مسجد همچنین میزبان برنامه‌های فرهنگی و مذهبی ویژه در ماه رمضان و اعیاد اسلامی است.',
        'conclusion_title' => 'نتیجه‌گیری',
        'conclusion_content' => 'مسجد اورتاکوی نمونه‌ای برجسته از تأثیر مستقیم موقعیت جغرافیایی بر هویت و کارکرد یک بنای مذهبی است. این مسجد با وجود ابعاد نسبتاً کوچک، به دلیل قرارگیری در نقطه‌ای راهبردی و طراحی هنرمندانه، به یکی از مهم‌ترین نمادهای استانبول تبدیل شده است. تداوم حیات مذهبی و جذب خیل عظیم گردشگران، گواه انعطاف‌پذیری و معاصرت این میراث ارزشمند است.',
        'conclusion_quote' => 'مسجد اورتاکوی قصیده‌ای است از سنگ و نور که در کنار آب سروده شده؛ یادگار سلطانی رؤیاپرداز و معمار نابغه‌ای که مرزهای مشرق و مغرب را در هم شکست.',
        'footer_text' => 'تحلیل جغرافیایی مسجد اورتاکوی - Ortaköy Camii',
        'footer_source' => 'منبع: داده‌های تاریخی و معماری استانبول',
        'copyright' => '© ۲۰۲۳ - طراحی شده برای ارائه مقاله‌ای در سطح بین‌المللی',
        'lang_switcher' => 'زبان:',
        'back_tooltip' => 'ایاصوفیه'
    ],
    
    'tr' => [
        'lang_code' => 'tr',
        'dir' => 'ltr',
        'title' => 'Ortaköy Camii\'nin (Büyük Mecidiye Camii) Coğrafi Konum Analizi',
        'meta_description' => 'Ortaköy Camii\'nin inşası, gelişimi ve günümüzdeki işlevinde coğrafi konum, Barok-Osmanlı mimarisi ve modern yaşamın etkisi',
        'header_title' => 'Ortaköy Camii\'nin Oluşumu, Gelişimi ve İşleyişinde Coğrafi Konumun Rolünün Analizi',
        'header_subtitle' => 'Ortaköy Camii (Büyük Mecidiye Camii), Boğaziçi\'nin Avrupa yakasında, Boğaz Köprüsü\'nün gölgesinde yer alan, Osmanlı geleneği ile Barok mimarisini ve modern İstanbul yaşamını birleştiren bir semboldür.',
        'abstract_title' => 'Özet',
        'abstract_content' => 'Ortaköy Camii, Sultan Abdülmecid\'in emriyle 1854-1856 yılları arasında Mimar Nikogos Balyan tarafından inşa edilmiştir. Boğaz kıyısındaki eşsiz konumu, onu İstanbul\'un en tanınmış simgelerinden biri haline getirmiştir. Bu makale, coğrafi faktörlerin, eklektik mimari üslubun, caminin Ortaköy semtinin kimliğindeki rolünün ve günümüz Türkiye\'sindeki turistik ve kültürel konumunun analitik bir incelemesini sunmaktadır.',
        'stats' => [
            'minarets' => '2',
            'capacity' => '500+',
            'years' => '165+',
            'visitors' => '10.000+'
        ],
        'stats_labels' => [
            'minarets' => 'Minare',
            'capacity' => 'Kapasite (Kişi)',
            'years' => 'Yıllık Tarih',
            'visitors' => 'Günlük Ziyaretçi'
        ],
        'introduction_title' => 'Giriş',
        'introduction_content' => 'Ortaköy Camii (resmî adıyla Büyük Mecidiye Camii), İstanbul\'un en güzel sahil camilerinden biridir. Ortaköy semtinde, Boğaz\'ın hemen kıyısında ve iskelenin yanında yer alır. Mimarisi Osmanlı Barok üslubu ile Neoklasik unsurların sentezidir. İki ince minaresi, büyük kubbesi ve geniş pencereleri iç mekâna bolca doğal ışık girmesini sağlar. İç dekorasyonda çini işçiliği, altın varak ve Ermeni-İtalyan ustaların el işçiliği dikkat çeker.',
        'geographical_title' => 'İstanbul\'un Coğrafi Konumu ve Camiye Etkisi',
        'geographical_content' => 'Ortaköy, Beşiktaş ile Kuruçeşme arasında, Boğaz\'ın Avrupa kıyısında yer alır. Cami, suyun hemen kenarına, sahil şeridine paralel olarak konumlandırılmıştır; böylece deniz ve köprü manzarası muhteşem bir görüntü oluşturur. Bu konum, camiyi İstanbul\'un en çok ziyaret edilen noktalarından biri yapmış ve Boğaz Köprüsü ile birlikte modern İstanbul\'un simge fotoğraflarından birini oluşturmuştur.',
        'highlight_box_title' => 'Boğaz\'ın İncisi',
        'highlight_box_content' => 'Ortaköy Camii, Boğaz\'daki eşsiz konumu ve Boğaz Köprüsü\'yle komşuluğu nedeniyle "Boğaz\'ın İncisi" olarak anılır. Küçük ama gösterişli bu cami, İstanbul\'da gelenek ve modernitenin kucaklaştığı yerdir.',
        'natural_access_title' => 'Yer Seçiminde ve Cami Tasarımında Doğal Faktörlerin Rolü',
        'natural_access_content' => 'Caminin sahile inşa edilmesi, mimarı jeoteknik ve nem sorunlarıyla karşı karşıya bıraktı. Nikogos Balyan, derin temeller ve gelişmiş drenaj sistemleriyle yapının sağlamlığını garanti altına aldı. Uzun ve geniş pencereler, Boğaz\'ın serin rüzgârından ve doğal ışıktan azami ölçüde yararlanmak için tasarlandı.',
        'human_access_title' => 'Batı Mimarisi ve Balyan Ailesinin Rolü',
        'human_access_content' => 'Osmanlı sarayının Ermeni asıllı mimar ailesi Balyanlar, Avrupa\'daki Barok kiliseler ile klasik Osmanlı camilerinden esinlenerek özgün bir üslup geliştirdi. Ortaköy Camii, dört kemere oturan büyük bir kubbeye ve ince taş işçiliğiyle süslü iki minareye sahiptir. Mihrap ve minber beyaz mermerden ustalıkla oyulmuştur.',
        'location_title' => 'Caminin Günümüz Kentsel Dokusundaki Konumu',
        'location_content' => 'Ortaköy Camii, kafenin, restoranların ve sanat galerilerinin sıralandığı Ortaköy sahil meydanında yer alır. Yakınındaki vapur iskelesi ve otobüs durakları ulaşımı kolaylaştırır. 1973\'te açılan Boğaz Köprüsü, caminin hemen yanından geçerek eşsiz bir fon oluşturur.',
        'quote' => 'Ortaköy Camii, Boğaz\'ın kıyısında bir mücevher gibi oturur ve her sabah güneşin ilk ışıklarıyla kubbesinin sudaki yansıması İstanbul\'a yeni bir günü müjdeler.',
        'historical_title' => 'Coğrafi Faktörlerin Caminin Tarihsel Gelişimine Etkisi',
        'timeline' => [
            [
                'year' => '1854-1856',
                'content' => 'Sultan Abdülmecid, Mimar Nikogos Balyan\'a Ortaköy\'de yeni bir cami inşa etmesini emretti. Cami iki yılda tamamlandı.'
            ],
            [
                'year' => '1862',
                'content' => 'Deniz neminden kaynaklanan hasarlar nedeniyle ilk onarım yapıldı.'
            ],
            [
                'year' => '1960-1965',
                'content' => 'Bir asır sonra kapsamlı restorasyon; temel güçlendirmesi ve hasarlı bölümlerin yenilenmesi.'
            ],
            [
                'year' => '1973',
                'content' => 'Boğaz Köprüsü\'nün açılışıyla cami dünyaca ünlü bir simge haline geldi.'
            ],
            [
                'year' => '2019-2021',
                'content' => 'Cumhurbaşkanlığı desteğiyle kapsamlı restorasyon; çiniler ve iç süslemeler yenilendi.'
            ]
        ],
        'prosperity_title' => 'Caminin Semt Kimliği ve Turizm Ekonomisindeki Rolü',
        'prosperity_content' => 'Ortaköy Camii, aktif bir ibadethane olmasının yanı sıra Ortaköy semtinin kalbidir. El sanatları pazarı, geleneksel yiyecek satıcıları (özellikle kumpir ve baklava) ve deniz turları caminin çevresinde şekillenmiştir. Her yıl milyonlarca yerli ve yabancı turist camiyi ziyaret etmektedir.',
        'spatial_title' => 'Caminin Mekânsal Organizasyonu ve Coğrafi Çevreyle İlişkisi',
        'spatial_content' => 'Cami dikdörtgen planlı olup merkezi kubbe (12 m çapında) dört taşıyıcı duvar ve kemerler üzerine oturur. İki ince minare, ana girişin iki yanında yükselir. İç mekân, üçlü ve kemerli pencerelerle bol ışık alır. Küçük avluda taş bir şadırvan huzurlu bir ortam yaratır.',
        'spatial_highlight_title' => 'Işık ve Su',
        'spatial_highlight_content' => 'Mihrabın mermer yüzeyinde ışığın oyunu ve Boğaz\'ın suyunun güney duvarlarına vuran yansıması manevi ve görsel bir şölen sunar. Mimar, pencerelerin konumunu öyle tasarlamıştır ki ibadet eden herkes denizi ve gökyüzünü görebilir.',
        'today_title' => 'Ortaköy Camii\'nin Günümüz Turizm ve Kültürdeki Yeri',
        'today_content' => 'Ortaköy Camii bugün İstanbul\'un en çok fotoğraflanan yapılarından biridir. Günbatımında Boğaz Köprüsü\'nün ışıkları yandığında ve caminin ışıkları suya yansıdığında ortaya rüya gibi görüntüler çıkar. Cami ayrıca Ramazan ayı ve dini bayramlarda özel kültürel ve dini programlara ev sahipliği yapmaktadır.',
        'conclusion_title' => 'Sonuç',
        'conclusion_content' => 'Ortaköy Camii, coğrafi konumun bir dini yapının kimliği ve işlevi üzerindeki doğrudan etkisinin çarpıcı bir örneğidir. Nispeten küçük boyutlarına rağmen, stratejik noktadaki konumu ve sanatkârane tasarımı sayesinde İstanbul\'un en önemli sembollerinden biri olmuştur. Dini işlevini sürdürmesi ve büyük turist kitlelerini çekmesi, bu değerli mirasın çağdaşlığının ve esnekliğinin kanıtıdır.',
        'conclusion_quote' => 'Ortaköy Camii, su kenarında yazılmış taş ve ışıktan bir kasidedir; hayalperest bir sultan ve Doğu ile Batı\'nın sınırlarını yıkan dâhi bir mimarın mirasıdır.',
        'footer_text' => 'Ortaköy Camii\'nin Coğrafi Analizi',
        'footer_source' => 'Kaynak: İstanbul\'un tarihi ve mimari verileri',
        'copyright' => '© 2023 - Uluslararası düzeyde bir makale sunumu için tasarlandı',
        'lang_switcher' => 'Dil:',
        'back_tooltip' => 'Ayasofya'
    ],
    
    'en' => [
        'lang_code' => 'en',
        'dir' => 'ltr',
        'title' => 'Geographical Location Analysis of Ortaköy Mosque (Büyük Mecidiye Camii) Istanbul',
        'meta_description' => 'Analysis of the impact of geographical location, Baroque-Ottoman architecture, and modern life on the construction, development and current role of Ortaköy Mosque, Istanbul',
        'header_title' => 'Analysis of the Role of Geographical Location in the Formation, Development and Functioning of Ortaköy Mosque Istanbul',
        'header_subtitle' => 'Ortaköy Mosque (Büyük Mecidiye Camii), located on the European shore of the Bosphorus adjacent to the Bosphorus Bridge, symbolizes the synthesis of Ottoman tradition with Baroque architecture and modern Istanbul life.',
        'abstract_title' => 'Abstract',
        'abstract_content' => 'Ortaköy Mosque was commissioned by Sultan Abdülmecid I and built between 1854 and 1856 by the architect Nikogos Balyan. Its unique waterfront location on the Bosphorus has made it one of Istanbul’s most iconic landmarks. This article analytically examines the geographical factors, the eclectic architectural style, the mosque’s role in the identity of the Ortaköy neighborhood, and its current position in Turkish tourism and contemporary culture.',
        'stats' => [
            'minarets' => '2',
            'capacity' => '500+',
            'years' => '165+',
            'visitors' => '10,000+'
        ],
        'stats_labels' => [
            'minarets' => 'Minarets',
            'capacity' => 'Capacity (Worshippers)',
            'years' => 'Years of History',
            'visitors' => 'Daily Visitors'
        ],
        'introduction_title' => 'Introduction',
        'introduction_content' => 'Ortaköy Mosque, officially named Büyük Mecidiye Camii, is one of Istanbul’s most picturesque coastal mosques. It is situated in the Ortaköy district, right on the Bosphorus shore next to the ferry terminal. Its architecture is a synthesis of Ottoman Baroque and Neoclassical elements. The mosque features two slender minarets, a large dome, and wide windows that flood the interior with natural light. Interior decorations include tilework, gilding, and carvings by Armenian and Italian masters.',
        'geographical_title' => 'Geographical Location of Istanbul and Its Influence on the Mosque',
        'geographical_content' => 'Ortaköy is located on the European shore of the Bosphorus, between Beşiktaş and Kuruçeşme. The mosque was built directly on the waterfront, aligned with the shoreline, creating a spectacular view of the sea and the bridge. This location has made the mosque one of the most visited sites in Istanbul and, together with the Bosphorus Bridge, has produced one of the iconic images of modern Istanbul.',
        'highlight_box_title' => 'Jewel of the Bosphorus',
        'highlight_box_content' => 'Ortaköy Mosque is known as the "Jewel of the Bosphorus" due to its unique location on the strait and its proximity to the Bosphorus Bridge. This small but magnificent mosque is where tradition and modernity embrace in Istanbul.',
        'natural_access_title' => 'Role of Natural Factors in Site Selection and Mosque Design',
        'natural_access_content' => 'Building the mosque on the seafront presented geotechnical and humidity challenges. Nikogos Balyan ensured structural stability through deep foundations and an advanced drainage system. Tall, wide windows were designed to maximize natural light and the cooling breeze from the Bosphorus.',
        'human_access_title' => 'Role of Western Architecture and the Balyan Family',
        'human_access_content' => 'The Balyan family, Ottoman court architects of Armenian descent, developed a unique style inspired by European Baroque churches and classical Ottoman mosques. Ortaköy Mosque features a large dome resting on four arches and two slender minarets decorated with fine stone carvings. The mihrab and minbar are masterfully carved from white marble.',
        'location_title' => 'Location of the Mosque in Today’s Urban Fabric',
        'location_content' => 'Ortaköy Mosque stands on the Ortaköy waterfront square, surrounded by cafes, restaurants, and art galleries. The nearby ferry terminal and bus stops provide easy access. The Bosphorus Bridge, opened in 1973, passes directly beside the mosque, creating a stunning backdrop.',
        'quote' => 'Ortaköy Mosque sits like a jewel on the Bosphorus shore, and every morning with the first rays of sun, the reflection of its dome on the water heralds a new day for Istanbul.',
        'historical_title' => 'Impact of Geographical Factors on the Historical Development of the Mosque',
        'timeline' => [
            [
                'year' => '1854-1856 AD',
                'content' => 'Sultan Abdülmecid I commissioned architect Nikogos Balyan to build a new mosque in Ortaköy. The mosque was completed in two years.'
            ],
            [
                'year' => '1862',
                'content' => 'The first restoration was carried out due to damage caused by sea humidity.'
            ],
            [
                'year' => '1960-1965',
                'content' => 'Comprehensive restoration after a century; foundation reinforcement and renewal of decayed parts.'
            ],
            [
                'year' => '1973',
                'content' => 'The opening of the Bosphorus Bridge next to the mosque turns it into a globally recognized symbol.'
            ],
            [
                'year' => '2019-2021',
                'content' => 'A major restoration supported by the Turkish Presidency; tiles and interior decorations were renewed.'
            ]
        ],
        'prosperity_title' => 'Role of the Mosque in Neighborhood Identity and Tourism Economy',
        'prosperity_content' => 'Ortaköy Mosque is not only an active place of worship but also the beating heart of the Ortaköy district. The handicraft market, traditional food vendors (especially baked potatoes and baklava), and Bosphorus boat tours have all developed around the mosque. Millions of domestic and foreign tourists visit the mosque annually.',
        'spatial_title' => 'Spatial Organization of the Mosque and Its Relationship with the Geographical Environment',
        'spatial_content' => 'The mosque has a rectangular plan with a central dome (12 m in diameter) resting on four load-bearing walls and arches. Two slender minarets with single balconies flank the main entrance. The prayer hall receives ample light through triple-arched windows. A small courtyard with a stone fountain creates a peaceful atmosphere.',
        'spatial_highlight_title' => 'Light and Water',
        'spatial_highlight_content' => 'The play of light on the marble surface of the mihrab and the reflection of Bosphorus water on the southern walls create a spiritual and visually enchanting space. The architect carefully positioned the windows so that worshippers can view the sea and sky from any point in the hall.',
        'today_title' => 'Current Role of Ortaköy Mosque in Tourism and Culture',
        'today_content' => 'Ortaköy Mosque is one of the most photographed buildings in Istanbul today. At sunset, when the Bosphorus Bridge lights up and the mosque’s illumination reflects on the water, dreamlike scenes emerge. The mosque also hosts special cultural and religious programs during Ramadan and Islamic holidays.',
        'conclusion_title' => 'Conclusion',
        'conclusion_content' => 'Ortaköy Mosque is a striking example of the direct impact of geographical location on the identity and function of a religious building. Despite its relatively modest size, its strategic location and artistic design have made it one of Istanbul’s most important symbols. Its continued religious function and immense tourist appeal testify to the resilience and contemporaneity of this valuable heritage.',
        'conclusion_quote' => 'Ortaköy Mosque is an ode in stone and light composed by the water’s edge; the legacy of a visionary sultan and a genius architect who dissolved the boundaries between East and West.',
        'footer_text' => 'Geographical Analysis of Ortaköy Mosque',
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
            background: linear-gradient(135deg, #eaf7f5 0%, #d4ece5 100%);
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
            background: linear-gradient(rgba(0, 119, 119, 0.85), rgba(0, 85, 85, 0.9)), 
                        url('https://images.unsplash.com/photo-1568480289192-6b8d5e0a3c2a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
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
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M20,20 L80,20 L80,80 L20,80 Z" fill="none" stroke="%23FFDAB9" stroke-width="2" stroke-dasharray="5,5"/></svg>');
            opacity: 0.15;
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
            background-color: #007777;
            color: white;
        }
        
        .mosque-icon {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 30px 0;
            color: #FFDAB9;
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
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 6px solid #007777;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #007777, #9ACD32, #FFDAB9);
        }
        
        .content-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        h2 {
            color: #007777;
            font-size: 2.5rem;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #b0e0e6;
            position: relative;
        }
        
        h2:after {
            content: '';
            position: absolute;
            bottom: -3px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 0;
            width: 120px;
            height: 3px;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #007777, #9ACD32);
        }
        
        h3 {
            color: #005555;
            font-size: 2rem;
            margin: 35px 0 20px;
            display: flex;
            align-items: center;
        }
        
        h3 i {
            margin-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 15px;
            color: #007777;
            background: #e0f2f1;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #e0f2f1, #c0e0de);
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 5px solid #9ACD32;
            padding: 30px;
            border-radius: 15px;
            margin: 30px 0;
            box-shadow: 0 8px 20px rgba(154, 205, 50, 0.15);
            position: relative;
        }
        
        .highlight-box:before {
            content: "💎";
            position: absolute;
            top: -15px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 20px;
            font-size: 2rem;
            color: #9ACD32;
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
            border-top: 5px solid #007777;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #007777, #9ACD32);
        }
        
        .stat-number {
            font-size: 2.8rem;
            font-weight: bold;
            color: #007777;
            margin-bottom: 10px;
            display: block;
        }
        
        .stat-label {
            font-size: 1.2rem;
            color: #005555;
        }
        
        .quote {
            font-style: italic;
            text-align: center;
            font-size: 1.5rem;
            color: #005555;
            padding: 40px;
            margin: 50px 0;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #e0f2f1, #c0e0de);
            border-radius: 20px;
            position: relative;
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 6px solid #9ACD32;
            border-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 6px solid #9ACD32;
        }
        
        .quote:before, .quote:after {
            content: '"';
            font-size: 4rem;
            color: #007777;
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
            background: linear-gradient(to bottom, #007777, #9ACD32, #007777);
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
            background: #007777;
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
            color: #007777;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        
        .conclusion {
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>, #007777, #005555);
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
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M30,30 Q50,10 70,30 T90,50 Q70,70 50,90 T30,70 Q10,50 30,30 Z" fill="none" stroke="%23FFDAB9" stroke-width="0.5" opacity="0.2"/></svg>');
        }
        
        .conclusion h2 {
            color: #FFDAB9;
            border-bottom-color: #FFDAB9;
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
            background: #eaf7f5;
            border-radius: 15px;
        }
        
        .footer-icons {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 20px;
            font-size: 1.8rem;
            color: #007777;
        }
        
        /* دکمه بازگشت */
        .back-button {
            position: fixed;
            bottom: 30px;
            <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 30px;
            background: linear-gradient(135deg, #007777, #005555);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            box-shadow: 0 6px 15px rgba(0, 119, 119, 0.4);
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .back-button:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 25px rgba(0, 119, 119, 0.6);
            background: linear-gradient(135deg, #005555, #007777);
        }
        
        .back-button .tooltip {
            position: absolute;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 70px;
            background: rgba(0, 119, 119, 0.9);
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
            border-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 6px solid rgba(0, 119, 119, 0.9);
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
            <i class="fas fa-water"></i>
            <i class="fas fa-bridge"></i>
            <i class="fas fa-sun"></i>
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
                <h3><i class="fas fa-gem"></i> <?php echo $current['highlight_box_title']; ?></h3>
                <p><?php echo $current['highlight_box_content']; ?></p>
            </div>
        </div>
        
        <div class="content-card">
            <h2><i class="fas fa-water"></i> <?php echo $current['natural_access_title']; ?></h2>
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
            
            <div class="quote" style="background: rgba(255, 255, 255, 0.1); color: #FFDAB9; margin-top: 30px; border-color: #FFDAB9;">
                <?php echo $current['conclusion_quote']; ?>
            </div>
        </div>
        
        <footer>
            <p><?php echo $current['footer_text']; ?></p>
            <p><?php echo $current['footer_source']; ?></p>
            
            <div class="footer-icons">
                <i class="fas fa-mosque"></i>
                <i class="fas fa-water"></i>
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