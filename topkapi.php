<?php
// topkapi.php - تحلیل جامع کاخ توپکاپی (Topkapı Sarayı)
// مدیریت زبان
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'fa';

// تنظیم هدر برای کدگذاری کاراکترها
header('Content-Type: text/html; charset=utf-8');

// اطلاعات کامل کاخ توپکاپی به سه زبان
$content = [
    'fa' => [
        'lang_code' => 'fa',
        'dir' => 'rtl',
        'title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری و توسعه کاخ توپکاپی',
        'meta_description' => 'تحلیل تأثیر موقعیت جغرافیایی، قدرت سیاسی و معماری عثمانی بر ساخت، توسعه و جایگاه امروزی کاخ توپکاپی استانبول',
        'header_title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری، توسعه و کارکرد کاخ توپکاپی استانبول',
        'header_subtitle' => 'کاخ توپکاپی (Topkapı Sarayı) به‌مدت چهار سده مرکز اداری، سیاسی و آموزشی امپراتوری عثمانی بود. این کاخ در شبه‌جزیره تاریخی استانبول، میان تنگه بسفر، خلیج شاخ طلایی و دریای مرمره جای گرفته و نماد قدرت و شکوه عثمانی به شمار می‌رود.',
        'abstract_title' => 'چکیده',
        'abstract_content' => 'کاخ توپکاپی در سال ۱۴۵۹ میلادی به‌فرمان سلطان محمد فاتح، اندکی پس از فتح قسطنطنیه، بنا نهاده شد. موقعیت راهبردی آن بر فراز تپه آکروپولیس باستانی، تسلط کامل بر گذرگاه‌های آوری و زمینی را ممکن می‌ساخت. این مقاله با رویکردی تحلیلی، نقش عوامل جغرافیایی، سازمان فضایی، ساختار اداری و تحول کاخ از اقامتگاه سلطنتی به موزه‌ای بین‌المللی را بررسی می‌کند.',
        'stats' => [
            'area' => '۷۰۰٬۰۰۰+',
            'rooms' => '۴۰۰+',
            'years' => '۵۶۰+',
            'visitors' => '۳۰٬۰۰۰+'
        ],
        'stats_labels' => [
            'area' => 'مساحت (متر مربع)',
            'rooms' => 'اتاق و تالار',
            'years' => 'سال تاریخچه',
            'visitors' => 'بازدیدکننده روزانه'
        ],
        'introduction_title' => 'مقدمه',
        'introduction_content' => 'کاخ توپکاپی در طول سده‌های پانزدهم تا نوزدهم، قلب امپراتوری عثمانی بود. این کاخ نه‌تنها محل زندگی سلطان و خاندانش، بلکه مرکز دیوان همایونی، آموزش دولتمردان (اند‌رون) و گنجینه‌ای از آثار ارزشمند هنری و دینی بود. مجموعه کاخ شامل چهار حیاط اصلی، حرم‌سرا، اندرون، بیرون، کتابخانه، ضرابخانه و چندین مسجد و بیمارستان است. معماری آن تلفیقی از سنت‌های سلجوقی، بیزانسی و خلاقیت عثمانی است.',
        'geographical_title' => 'موقعیت جغرافیایی استانبول و تأثیر آن بر کاخ',
        'geographical_content' => 'کاخ توپکاپی در نوک شبه‌جزیره تاریخی استانبول، مشرف به تنگه بسفر، خلیج شاخ طلایی و دریای مرمره قرار دارد. این موقعیت نه‌تنها دیدبانی کامل و دفاع طبیعی را فراهم می‌کرد، بلکه نمادی از حاکمیت بر دو قاره آسیا و اروپا بود. نزدیکی به ایاصوفیه و میدان اسب‌دوانی نیز پیوند قدرت سیاسی با مذهب و سنت را نشان می‌داد.',
        'highlight_box_title' => 'نماد اقتدار جهانی',
        'highlight_box_content' => 'کاخ توپکاپی به‌مدت ۴۰۰ سال مرکز خلافت عثمانی و گنجینه امانات مقدس بود. موقعیت آن بر فراز تپه‌ای با چشمانداز بسفر، قدرت فرمانروایی بر دریاها و خشکی‌ها را القا می‌کرد.',
        'natural_access_title' => 'نقش عوامل طبیعی در انتخاب مکان کاخ',
        'natural_access_content' => 'تپه آکروپولیس قدیم که کاخ بر آن ساخته شد، بلندترین نقطه شبه‌جزیره و دارای شیب طبیعی به سوی دریا بود. این پستی‌بلندی‌ها برای ایجاد حیاط‌های پلکانی و باغ‌های معلق بهره گرفته شد. دسترسی به آب شیرین از طریق قنات‌های رومی و حفر چاه‌ها تأمین می‌گردید.',
        'human_access_title' => 'نقش دانش فنی و معماری عثمانی',
        'human_access_content' => 'معماران عثمانی به‌ویژه آل‌الدین و معمار سینان، با تلفیق سنت‌های معماری بیزانسی، سلجوقی و ایرانی، ساختاری ارگانیک و پلکانی پدید آوردند. حیاط‌ها با دروازه‌های یادمانی از هم جدا می‌شدند و هر حیاط کارکردی مشخص (اداری، تشریفاتی، خصوصی و خدماتی) داشت.',
        'location_title' => 'موقعیت مکانی کاخ در بافت شهری',
        'location_content' => 'کاخ توپکاپی در منطقه سلطان‌احمد، میان ایاصوفیه و خلیج شاخ طلایی جای گرفته است. دروازه همایونی (Bab-ı Hümayun) به سوی ایاصوفیه گشوده می‌شود و میدان اسب‌دوانی در نزدیکی آن است. این استقرار، پیوند ناگسستنی قدرت سیاسی با میراث بیزانس را بازمی‌تاباند.',
        'quote' => 'کاخ توپکاپی فقط محل زندگی سلطان نبود؛ دفتر ثبت جهان بود. از اینجا بود که امپراتوری سه قاره را اداره می‌کرد و نامش بر صفحه روزگار نقش می‌بست.',
        'historical_title' => 'تأثیر عوامل جغرافیایی بر توسعه تاریخی کاخ',
        'timeline' => [
            [
                'year' => '۱۴۵۹-۱۴۶۵ میلادی',
                'content' => 'سلطان محمد فاتح دستور ساخت کاخ را در بلندای تپه آکروپولیس داد. کاخ نخستین (چینیلی کوشک) و حیاط اول ساخته شد.'
            ],
            [
                'year' => 'قرن ۱۶ میلادی',
                'content' => 'در دوره سلطان سلیمان قانونی، معمار سینان حرم‌سرا را گسترش داد و بخش‌های جدیدی به کاخ افزود. این دوره اوج شکوه معماری کاخ است.'
            ],
            [
                'year' => '۱۸۵۳-۱۸۵۶ میلادی',
                'content' => 'سلطان عبدالمجید یکم به کاخ تازه‌ساز دولما‌باغچه نقل مکان کرد و توپکاپی به‌تدریج کاربری تشریفاتی و حفاظت از امانات مقدس یافت.'
            ],
            [
                'year' => '۱۹۲۴ میلادی',
                'content' => 'به‌فرمان مصطفی کمال آتاتورک، کاخ توپکاپی به موزه تبدیل شد و برای نخستین بار به روی عموم گشوده گردید.'
            ]
        ],
        'prosperity_title' => 'نقش کاخ در شبکه قدرت و اقتصاد امپراتوری',
        'prosperity_content' => 'کاخ توپکاپی علاوه بر کارکرد سیاسی، مرکز ضرب سکه، تولید آثار هنری، و گنجینه مالی امپراتوری بود. حرم‌سرا کانون تربیت دولتمردان آینده و اندرون آموزش نخبگان را برعهده داشت. این کاخ نماد مشروعیت دینی و دنیوی خاندان عثمانی بود.',
        'spatial_title' => 'سازمان فضایی کاخ و ارتباط آن با محیط جغرافیایی',
        'spatial_content' => 'کاخ توپکاپی از چهار حیاط پلکانی تشکیل شده که هر یک بر روی تراس‌های طبیعی ساخته شده‌اند. حیاط دوم (دیوان همایونی) مرکز اداری، حیاط سوم (اندرون) مرکز آموزشی و حرم‌سرا در کنار آن جای دارد. چشمانداز بی‌نظیر از ایوان بغداد و تراس حرم، تبلور عینی پیوند طبیعت و قدرت است.',
        'spatial_highlight_title' => 'طراحی هوشمندانه',
        'spatial_highlight_content' => 'معماران عثمانی با بهره‌گیری از شیب زمین و ایجاد حیاط‌های پلکانی، فضایی سلسله‌مراتبی خلق کردند که هرچه به حریم خصوصی‌تر نزدیک می‌شویم، دسترسی دشوارتر و معماری فشرده‌تر می‌شود.',
        'today_title' => 'جایگاه امروزی کاخ توپکاپی در گردشگری و فرهنگ',
        'today_content' => 'امروزه کاخ توپکاپی یکی از پربازدیدترین موزه‌های جهان و نماد هویت تاریخی استانبول است. بخش‌های حرم‌سرا، خزانه، کتابخانه احمد سوم، و غرفه امانات مقدس سالانه میلیون‌ها گردشگر را جذب می‌کند. نمایش آثار ارزشمندی چون خنجر توپکاپی و الماس قاشقچی از جذابیت‌های اصلی است.',
        'conclusion_title' => 'نتیجه‌گیری',
        'conclusion_content' => 'کاخ توپکاپی نمونه‌ای کم‌نظیر از تأثیرپذیری معماری از جغرافیا و قدرت سیاسی است. بقای آن در طول پنج سده و تغییر کاربری از اقامتگاه سلطنتی به موزه، نشان‌دهنده انعطاف‌پذیری و ظرفیت‌های بالای این مجموعه برای حفظ هویت و پیوند با جامعه امروز است.',
        'conclusion_quote' => 'کاخ توپکاپی روایتی سنگی از شکوه و افول یک امپراتوری است؛ جایی که هر سنگ آن خاطرات فتح، قدرت و تدبیر را زمزمه می‌کند.',
        'footer_text' => 'تحلیل جغرافیایی کاخ توپکاپی - Topkapı Sarayı',
        'footer_source' => 'منبع: داده‌های تاریخی و باستان‌شناسی استانبول',
        'copyright' => '© ۲۰۲۳ - طراحی شده برای ارائه مقاله‌ای در سطح بین‌المللی',
        'lang_switcher' => 'زبان:',
        'back_tooltip' => 'ایاصوفیه'
    ],
    
    'tr' => [
        'lang_code' => 'tr',
        'dir' => 'ltr',
        'title' => 'Topkapı Sarayı\'nın Coğrafi Konum Analizi',
        'meta_description' => 'Topkapı Sarayı\'nın inşası, gelişimi ve günümüzdeki işlevinde coğrafi konum, siyasi güç ve Osmanlı mimarisinin etkisi',
        'header_title' => 'Topkapı Sarayı\'nın Oluşumu, Gelişimi ve İşleyişinde Coğrafi Konumun Rolünün Analizi',
        'header_subtitle' => 'Topkapı Sarayı, dört yüzyıl boyunca Osmanlı İmparatorluğu\'nun idari, siyasi ve eğitim merkeziydi. Tarihi yarımadada, İstanbul Boğazı, Haliç ve Marmara Denizi\'nin kesiştiği noktada yer alır ve Osmanlı gücünün simgesidir.',
        'abstract_title' => 'Özet',
        'abstract_content' => 'Topkapı Sarayı, 1459 yılında Fatih Sultan Mehmed\'in emriyle, İstanbul\'un fethinden kısa bir süre sonra inşa edilmeye başlanmıştır. Antik akropolis tepesindeki stratejik konumu, deniz ve kara geçitlerine tam hakimiyet sağlıyordu. Bu makale, coğrafi faktörlerin, mekânsal organizasyonun, idari yapının ve sarayın saltanat konutundan uluslararası bir müzeye dönüşümünü analitik bir yaklaşımla incelemektedir.',
        'stats' => [
            'area' => '700.000+',
            'rooms' => '400+',
            'years' => '560+',
            'visitors' => '30.000+'
        ],
        'stats_labels' => [
            'area' => 'Alan (m²)',
            'rooms' => 'Oda ve Salon',
            'years' => 'Yıllık Tarih',
            'visitors' => 'Günlük Ziyaretçi'
        ],
        'introduction_title' => 'Giriş',
        'introduction_content' => 'Topkapı Sarayı, 15. yüzyıldan 19. yüzyıla kadar Osmanlı İmparatorluğu\'nun kalbiydi. Yalnızca padişah ve ailesinin ikametgâhı değil, aynı zamanda Divan-ı Hümayun, devlet adamı yetiştiren Enderun Mektebi ve kutsal emanetlerin muhafaza edildiği hazineydi. Saray kompleksi dört ana avlu, Harem, Enderun, Birun, kütüphane, darphane, camiler ve hastanelerden oluşur. Mimarisi Selçuklu, Bizans ve Osmanlı geleneklerinin sentezidir.',
        'geographical_title' => 'İstanbul\'un Coğrafi Konumu ve Saraya Etkisi',
        'geographical_content' => 'Topkapı Sarayı, tarihi yarımadanın ucunda, İstanbul Boğazı, Haliç ve Marmara Denizi\'ne hakim bir tepede yer alır. Bu konum yalnızca mükemmel gözetleme ve doğal savunma sağlamakla kalmaz, aynı zamanda Asya ve Avrupa kıtaları üzerindeki hâkimiyetin simgesidir. Ayasofya ve Hipodrom\'a yakınlığı, siyasi gücün din ve gelenekle bağını gösterir.',
        'highlight_box_title' => 'Küresel Otoritenin Simgesi',
        'highlight_box_content' => 'Topkapı Sarayı, 400 yıl boyunca Osmanlı Hilafetinin merkezi ve Kutsal Emanetlerin hazinesiydi. Boğaz manzaralı tepe konumu, denizlere ve karalara hükmetme gücünü vurguluyordu.',
        'natural_access_title' => 'Saray Yerinin Seçiminde Doğal Faktörlerin Rolü',
        'natural_access_content' => 'Sarayın üzerine inşa edildiği antik akropolis tepesi, yarımadanın en yüksek noktasıdır ve denize doğru doğal eğime sahiptir. Bu eğim, teraslı avlular ve asma bahçeler oluşturmak için kullanılmıştır. Tatlı suya erişim, Roma su kemerleri ve kuyular aracılığıyla sağlanmıştır.',
        'human_access_title' => 'Osmanlı Mimari Tekniklerinin Rolü',
        'human_access_content' => 'Osmanlı mimarları, özellikle Alaüddin ve Mimar Sinan, Bizans, Selçuklu ve İran mimari geleneklerini sentezleyerek organik ve teraslı bir yapı oluşturdular. Avlular anıtsal kapılarla ayrılmış ve her avlu belirli bir işleve (idari, törensel, özel, hizmet) sahipti.',
        'location_title' => 'Topkapı Sarayı\'nın Kentsel Dokudaki Konumu',
        'location_content' => 'Topkapı Sarayı, Sultanahmet bölgesinde, Ayasofya ile Haliç arasında yer alır. Bab-ı Hümayun, Ayasofya\'ya açılır ve Hipodrom yakınındadır. Bu konum, siyasi gücün Bizans mirasıyla kopmaz bağını yansıtır.',
        'quote' => 'Topkapı Sarayı yalnızca padişahın evi değildi; dünyanın kayıt defteriydi. Buradan üç kıtaya hükmediyor ve adını tarihe yazdırıyordu.',
        'historical_title' => 'Coğrafi Faktörlerin Sarayın Tarihsel Gelişimine Etkisi',
        'timeline' => [
            [
                'year' => '1459-1465 MS',
                'content' => 'Fatih Sultan Mehmed, sarayın inşasını akropolis tepesinde başlattı. İlk saray (Çinili Köşk) ve birinci avlu inşa edildi.'
            ],
            [
                'year' => '16. Yüzyıl',
                'content' => 'Kanuni Sultan Süleyman döneminde Mimar Sinan, Harem\'i genişletti ve saraya yeni bölümler ekledi. Bu dönem saray mimarisinin zirvesidir.'
            ],
            [
                'year' => '1853-1856',
                'content' => 'Sultan Abdülmecid, yeni inşa edilen Dolmabahçe Sarayı\'na taşındı; Topkapı törensel işlev ve Kutsal Emanetlerin korunması amacıyla kullanılmaya devam etti.'
            ],
            [
                'year' => '1924',
                'content' => 'Mustafa Kemal Atatürk\'ün emriyle Topkapı Sarayı müzeye dönüştürüldü ve ilk kez halka açıldı.'
            ]
        ],
        'prosperity_title' => 'Sarayın İmparatorluk Gücü ve Ekonomisindeki Rolü',
        'prosperity_content' => 'Topkapı Sarayı, siyasi işlevinin yanı sıra darphane, sanat eserleri üretim merkezi ve imparatorluk hazinesiydi. Harem, geleceğin devlet adamlarının yetiştiği bir okul, Enderun ise seçkinlerin eğitim merkeziydi. Saray, Osmanlı hanedanının dini ve dünyevi meşruiyetinin simgesiydi.',
        'spatial_title' => 'Sarayın Mekânsal Organizasyonu ve Coğrafi Çevreyle İlişkisi',
        'spatial_content' => 'Topkapı Sarayı, doğal teraslar üzerine inşa edilmiş dört kademeli avludan oluşur. İkinci avlu (Divan-ı Hümayun) idari merkez, üçüncü avlu (Enderun) eğitim merkezi ve Harem bunun yanında yer alır. Bağdat Köşkü ve Harem terasından eşsiz Boğaz manzarası, doğa ve gücün somut birleşimidir.',
        'spatial_highlight_title' => 'Akıllı Tasarım',
        'spatial_highlight_content' => 'Osmanlı mimarları, arazi eğimini kullanarak hiyerarşik bir mekân düzeni oluşturdular; özel alanlara yaklaştıkça erişim zorlaşır ve mimari yoğunlaşır.',
        'today_title' => 'Topkapı Sarayı\'nın Günümüz Turizm ve Kültürdeki Yeri',
        'today_content' => 'Günümüzde Topkapı Sarayı, dünyanın en çok ziyaret edilen müzelerinden biri ve İstanbul\'un tarihi kimliğinin simgesidir. Harem, Hazine, III. Ahmed Kütüphanesi ve Kutsal Emanetler bölümü yılda milyonlarca turist çekmektedir. Topkapı Hançeri ve Kaşıkçı Elması gibi eserler ana cazibe merkezleridir.',
        'conclusion_title' => 'Sonuç',
        'conclusion_content' => 'Topkapı Sarayı, mimarinin coğrafya ve siyasi güçten etkilenmesinin nadir bir örneğidir. Beş yüzyıl boyunca ayakta kalması ve saltanat konutundan müzeye dönüşmesi, bu kompleksin kimliğini koruma ve günümüz toplumuyla bağ kurma kapasitesini göstermektedir.',
        'conclusion_quote' => 'Topkapı Sarayı, bir imparatorluğun ihtişamını ve çöküşünü anlatan taştan bir hikâyedir; her taşı fetih, güç ve kudret anılarını fısıldar.',
        'footer_text' => 'Topkapı Sarayı\'nın Coğrafi Analizi',
        'footer_source' => 'Kaynak: İstanbul\'un tarihi ve arkeolojik verileri',
        'copyright' => '© 2023 - Uluslararası düzeyde bir makale sunumu için tasarlandı',
        'lang_switcher' => 'Dil:',
        'back_tooltip' => 'Ayasofya'
    ],
    
    'en' => [
        'lang_code' => 'en',
        'dir' => 'ltr',
        'title' => 'Geographical Location Analysis of Topkapı Palace Istanbul',
        'meta_description' => 'Analysis of the impact of geographical location, political power, and Ottoman architecture on the construction, development and current role of Topkapı Palace, Istanbul',
        'header_title' => 'Analysis of the Role of Geographical Location in the Formation, Development and Functioning of Topkapı Palace Istanbul',
        'header_subtitle' => 'Topkapı Palace served as the administrative, political and educational center of the Ottoman Empire for four centuries. Located on the historical peninsula of Istanbul at the confluence of the Bosphorus, the Golden Horn and the Sea of Marmara, it symbolizes Ottoman power and grandeur.',
        'abstract_title' => 'Abstract',
        'abstract_content' => 'Topkapı Palace was commissioned by Sultan Mehmed the Conqueror in 1459, shortly after the conquest of Constantinople. Its strategic position atop the ancient acropolis hill provided complete control over maritime and land passages. This article analytically examines the role of geographical factors, spatial organization, administrative structure, and the palace\'s transformation from a royal residence to an international museum.',
        'stats' => [
            'area' => '700,000+',
            'rooms' => '400+',
            'years' => '560+',
            'visitors' => '30,000+'
        ],
        'stats_labels' => [
            'area' => 'Area (m²)',
            'rooms' => 'Rooms & Halls',
            'years' => 'Years of History',
            'visitors' => 'Daily Visitors'
        ],
        'introduction_title' => 'Introduction',
        'introduction_content' => 'Topkapı Palace was the heart of the Ottoman Empire from the 15th to the 19th century. It was not only the residence of the sultan and his family but also the seat of the Imperial Council (Divan-ı Hümayun), the Enderun School for training statesmen, and the treasury holding sacred relics. The palace complex comprises four main courtyards, the Harem, the Enderun (Inner Service), the Birun (Outer Service), libraries, a mint, mosques, and hospitals. Its architecture is a synthesis of Seljuk, Byzantine, and Ottoman traditions.',
        'geographical_title' => 'Geographical Location of Istanbul and Its Influence on the Palace',
        'geographical_content' => 'Topkapı Palace stands at the tip of the historical peninsula, on a hill overlooking the Bosphorus, the Golden Horn, and the Sea of Marmara. This location not only provided excellent surveillance and natural defense but also symbolized sovereignty over two continents, Asia and Europe. Proximity to Hagia Sophia and the Hippodrome reflected the inseparable link between political power, religion, and tradition.',
        'highlight_box_title' => 'Symbol of Global Authority',
        'highlight_box_content' => 'For 400 years, Topkapı Palace was the center of the Ottoman Caliphate and the repository of the Sacred Trusts. Its hilltop position with a panoramic view of the Bosphorus conveyed the power to rule over seas and lands.',
        'natural_access_title' => 'Role of Natural Factors in the Selection of the Palace Site',
        'natural_access_content' => 'The ancient acropolis hill on which the palace was built is the highest point of the peninsula, with a natural slope toward the sea. This topography was utilized to create terraced courtyards and hanging gardens. Fresh water was supplied via Roman aqueducts and wells dug within the complex.',
        'human_access_title' => 'Role of Ottoman Architectural Knowledge',
        'human_access_content' => 'Ottoman architects, particularly Alaüddin and Mimar Sinan, synthesized Byzantine, Seljuk, and Persian architectural traditions to create an organic, terraced structure. Monumental gates separated the courtyards, each with a distinct function (administrative, ceremonial, private, service).',
        'location_title' => 'Location of Topkapı Palace in the Urban Fabric',
        'location_content' => 'Topkapı Palace is situated in the Sultanahmet district, between Hagia Sophia and the Golden Horn. The Imperial Gate (Bab-ı Hümayun) opens toward Hagia Sophia, and the Hippodrome lies nearby. This placement embodies the unbroken bond between Ottoman political power and the Byzantine heritage.',
        'quote' => 'Topkapı Palace was not merely the sultan\'s home; it was the registry office of the world. From here, he governed three continents and inscribed his name in history.',
        'historical_title' => 'Impact of Geographical Factors on the Historical Development of the Palace',
        'timeline' => [
            [
                'year' => '1459-1465 AD',
                'content' => 'Sultan Mehmed the Conqueror ordered the construction of the palace on the acropolis hill. The first palace (Çinili Köşk) and the First Courtyard were built.'
            ],
            [
                'year' => '16th Century',
                'content' => 'During the reign of Sultan Süleyman the Magnificent, Mimar Sinan expanded the Harem and added new sections. This was the golden age of the palace\'s architecture.'
            ],
            [
                'year' => '1853-1856',
                'content' => 'Sultan Abdülmecid I moved to the newly built Dolmabahçe Palace; Topkapı gradually retained only ceremonial functions and the preservation of the Sacred Trusts.'
            ],
            [
                'year' => '1924',
                'content' => 'By the order of Mustafa Kemal Atatürk, Topkapı Palace was converted into a museum and opened to the public for the first time.'
            ]
        ],
        'prosperity_title' => 'Role of the Palace in Imperial Power and Economy',
        'prosperity_content' => 'In addition to its political functions, Topkapı Palace housed the imperial mint, workshops for artistic production, and the state treasury. The Harem was a school for future statesmen, and Enderun trained the elite. The palace symbolized both the religious and secular legitimacy of the Ottoman dynasty.',
        'spatial_title' => 'Spatial Organization of the Palace and Its Relationship with the Geographical Environment',
        'spatial_content' => 'Topkapı Palace consists of four gradually ascending courtyards built on natural terraces. The Second Courtyard (Divan-ı Hümayun) was the administrative center, the Third Courtyard (Enderun) was the educational center, and the Harem adjoins it. The breathtaking view from the Baghdad Kiosk and the Harem Terrace is a tangible manifestation of the union of nature and power.',
        'spatial_highlight_title' => 'Intelligent Design',
        'spatial_highlight_content' => 'Ottoman architects exploited the slope of the land to create a hierarchical spatial order; access becomes progressively more restricted and architecture denser as one approaches the private quarters.',
        'today_title' => 'Current Role of Topkapı Palace in Tourism and Culture',
        'today_content' => 'Today, Topkapı Palace is one of the world\'s most visited museums and a symbol of Istanbul\'s historical identity. The Harem, the Treasury, the Library of Ahmed III, and the Pavilion of the Sacred Trusts attract millions of tourists annually. Exhibits such as the Topkapı Dagger and the Spoonmaker\'s Diamond are major highlights.',
        'conclusion_title' => 'Conclusion',
        'conclusion_content' => 'Topkapı Palace stands as a rare example of architecture deeply influenced by geography and political power. Its survival over five centuries and its transformation from a royal residence to a museum demonstrate the complex\'s adaptability and its capacity to preserve identity while connecting with contemporary society.',
        'conclusion_quote' => 'Topkapı Palace is a stone chronicle of an empire\'s rise and fall; every stone whispers memories of conquest, power, and statecraft.',
        'footer_text' => 'Geographical Analysis of Topkapı Palace',
        'footer_source' => 'Source: Historical and archaeological data of Istanbul',
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
            background: linear-gradient(135deg, #fdf5e6 0%, #faebd7 100%);
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
            background: linear-gradient(rgba(128, 0, 0, 0.85), rgba(85, 0, 0, 0.9)), 
                        url('https://images.unsplash.com/photo-1593540452429-54b7aab1c001?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center 60%;
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
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M20,20 L80,20 L80,80 L20,80 Z" fill="none" stroke="%23FFD700" stroke-width="2" stroke-dasharray="5,5"/></svg>');
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
            background-color: #800000;
            color: white;
        }
        
        .palace-icon {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 30px 0;
            color: #FFD700;
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
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 6px solid #800000;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #800000, #D4AF37, #CD7F32);
        }
        
        .content-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        h2 {
            color: #800000;
            font-size: 2.5rem;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #FFE5B4;
            position: relative;
        }
        
        h2:after {
            content: '';
            position: absolute;
            bottom: -3px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 0;
            width: 120px;
            height: 3px;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #800000, #D4AF37);
        }
        
        h3 {
            color: #5e1914;
            font-size: 2rem;
            margin: 35px 0 20px;
            display: flex;
            align-items: center;
        }
        
        h3 i {
            margin-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 15px;
            color: #800000;
            background: #FFE5B4;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #FFF3E0, #FFE9D1);
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 5px solid #D4AF37;
            padding: 30px;
            border-radius: 15px;
            margin: 30px 0;
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.15);
            position: relative;
        }
        
        .highlight-box:before {
            content: "👑";
            position: absolute;
            top: -15px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 20px;
            font-size: 2rem;
            color: #D4AF37;
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
            border-top: 5px solid #800000;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #800000, #D4AF37);
        }
        
        .stat-number {
            font-size: 2.8rem;
            font-weight: bold;
            color: #800000;
            margin-bottom: 10px;
            display: block;
        }
        
        .stat-label {
            font-size: 1.2rem;
            color: #5e1914;
        }
        
        .quote {
            font-style: italic;
            text-align: center;
            font-size: 1.5rem;
            color: #5e1914;
            padding: 40px;
            margin: 50px 0;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #FFF3E0, #FFE9D1);
            border-radius: 20px;
            position: relative;
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 6px solid #D4AF37;
            border-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 6px solid #D4AF37;
        }
        
        .quote:before, .quote:after {
            content: '"';
            font-size: 4rem;
            color: #800000;
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
            background: linear-gradient(to bottom, #800000, #D4AF37, #800000);
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
            background: #800000;
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
            color: #800000;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        
        .conclusion {
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>, #800000, #5e1914);
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
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M30,30 Q50,10 70,30 T90,50 Q70,70 50,90 T30,70 Q10,50 30,30 Z" fill="none" stroke="%23FFD700" stroke-width="0.5" opacity="0.2"/></svg>');
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
            background: #fdf5e6;
            border-radius: 15px;
        }
        
        .footer-icons {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 20px;
            font-size: 1.8rem;
            color: #800000;
        }
        
        /* دکمه بازگشت */
        .back-button {
            position: fixed;
            bottom: 30px;
            <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 30px;
            background: linear-gradient(135deg, #800000, #5e1914);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            box-shadow: 0 6px 15px rgba(128, 0, 0, 0.4);
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .back-button:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 25px rgba(128, 0, 0, 0.6);
            background: linear-gradient(135deg, #5e1914, #800000);
        }
        
        .back-button .tooltip {
            position: absolute;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 70px;
            background: rgba(128, 0, 0, 0.9);
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
            border-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 6px solid rgba(128, 0, 0, 0.9);
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
            
            .palace-icon {
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
        <i class="fas fa-crown"></i>
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
        
        <div class="palace-icon">
            <i class="fas fa-crown"></i>
            <i class="fas fa-archway"></i>
            <i class="fas fa-mosque"></i>
            <i class="fas fa-fort"></i>
            <i class="fas fa-gem"></i>
        </div>
    </header>
    
    <div class="container">
        <div class="content-card">
            <h2><i class="fas fa-scroll"></i> <?php echo $current['abstract_title']; ?></h2>
            <p><?php echo $current['abstract_content']; ?></p>
            
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number"><?php echo $current['stats']['area']; ?></span>
                    <span class="stat-label"><?php echo $current['stats_labels']['area']; ?></span>
                </div>
                
                <div class="stat-item">
                    <span class="stat-number"><?php echo $current['stats']['rooms']; ?></span>
                    <span class="stat-label"><?php echo $current['stats_labels']['rooms']; ?></span>
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
                <h3><i class="fas fa-globe"></i> <?php echo $current['highlight_box_title']; ?></h3>
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
            
            <div class="quote" style="background: rgba(255, 255, 255, 0.1); color: #FFD700; margin-top: 30px; border-color: #FFD700;">
                <?php echo $current['conclusion_quote']; ?>
            </div>
        </div>
        
        <footer>
            <p><?php echo $current['footer_text']; ?></p>
            <p><?php echo $current['footer_source']; ?></p>
            
            <div class="footer-icons">
                <i class="fas fa-crown"></i>
                <i class="fas fa-mosque"></i>
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
                if (originalText.includes('+')) {
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