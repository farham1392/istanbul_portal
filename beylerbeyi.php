<?php
// basta.php - تحلیل جامع رستوران Basta Neo Bistro
// مدیریت زبان
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'fa';

// تنظیم هدر برای کدگذاری کاراکترها
header('Content-Type: text/html; charset=utf-8');

// اطلاعات کامل رستوران Basta Neo Bistro به سه زبان
$content = [
    'fa' => [
        'lang_code' => 'fa',
        'dir' => 'rtl',
        'title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری و موفقیت رستوران Basta Neo Bistro',
        'meta_description' => 'تحلیل تأثیر موقعیت جغرافیایی، فلسفه آشپزی تلفیقی و تجربه بین‌المللی سرآشپزها بر شکل‌گیری و محبوبیت رستوران Basta Neo Bistro استانبول',
        'header_title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری و موفقیت رستوران Basta Neo Bistro استانبول',
        'header_subtitle' => 'رستوران Basta Neo Bistro در محله کادیکوی (Kadıköy) استانبول، با تلفیق ماهرانه سنت‌های آشپزی ترکی و اروپایی، به یکی از مقاصد محبوب غذایی در سمت آسیایی شهر تبدیل شده است.',
        'abstract_title' => 'چکیده',
        'abstract_content' => 'رستوران Basta Neo Bistro در سال ۲۰۱۶ توسط دو سرآشپز جوان و بااستعداد، کان ساکاریا (Kaan Sakarya) و درین آریباس (Derin Arıbaş) تأسیس شد. این دو سرآشپز که تجربه کار در رستوران‌های معتبر و ستاره‌دار میشلن در فرانسه را در کارنامه خود دارند، با هدف ارائه تفسیری مدرن از غذاهای خیابانی ترکی با تکنیک‌های بین‌المللی، این بیسترو را در محله پرجنب‌وجوش کادیکوی راه‌اندازی کردند. این مقاله با رویکردی تحلیلی، نقش موقعیت جغرافیایی در سمت آسیایی، فلسفه آشپزی تلفیقی، تأثیر تجربه بین‌المللی سرآشپزها و جایگاه این رستوران در صحنه غذایی معاصر استانبول را بررسی می‌کند.',
        'stats' => [
            'founded' => '۲۰۱۶',
            'chefs' => '۲',
            'awards' => 'میشلن',
            'rating' => '۴.۸'
        ],
        'stats_labels' => [
            'founded' => 'سال تأسیس',
            'chefs' => 'سرآشپز بنیانگذار',
            'awards' => 'راهنمای میشلن',
            'rating' => 'امتیاز'
        ],
        'introduction_title' => 'مقدمه',
        'introduction_content' => 'Basta Neo Bistro در خیابان اپراتور جمیل توپوزلو (Operatör Cemil Topuzlu Caddesi) در محله کادیکوی واقع شده است. این رستوران با فضای صمیمی و دیزاین صنعتی-مینیمال، تجربه‌ای متفاوت از غذاخوری را ارائه می‌دهد. منوی فصلی رستوران که بر اساس تازه‌ترین مواد اولیه بازار طراحی می‌شود، تلفیقی خلاقانه از طعم‌های ترکی و تکنیک‌های فرانسوی است. سرآشپزها با الهام از غذاهای خیابانی استانبول، نسخه‌های مدرن و ظریفی از آنها را با ارائه‌ای هنرمندانه سرو می‌کنند.',
        'geographical_title' => 'موقعیت جغرافیایی کادیکوی و تأثیر آن بر رستوران',
        'geographical_content' => 'کادیکوی به عنوان قلب تپنده سمت آسیایی استانبول، در سال‌های اخیر به مرکز مهمی برای رستوران‌های مدرن و کافه‌های مستقل تبدیل شده است. موقعیت ساحلی این محله در کنار دریای مرمره، دسترسی آسان به مواد اولیه تازه دریایی را فراهم می‌کند. Basta Neo Bistro با قرارگیری در خیابان اصلی و پرتردد این محله، از یک سو به راحتی برای ساکنان محلی قابل دسترس است و از سوی دیگر با فاصله‌ای معقول از مرکز توریستی استانبول، توانسته مخاطبانی را جذب کند که به دنبال تجربه‌های اصیل‌تر غذایی هستند.',
        'highlight_box_title' => 'تلفیق شرق و غرب',
        'highlight_box_content' => 'Basta Neo Bistro نمونه‌ای موفق از تلفیق سنت‌های آشپزی ترکی با تکنیک‌های مدرن اروپایی است. غذاهایی مانند هوموس با گوشت خشک‌شده و راویولی پیاز، نشان‌دهنده خلاقیت سرآشپزها در بازآفرینی طعم‌های آشناست.',
        'natural_access_title' => 'نقش دسترسی به مواد اولیه تازه و محلی',
        'natural_access_content' => 'موقعیت کادیکوی در نزدیکی بازارهای محلی و اسکله ماهی‌گیری، دسترسی سرآشپزها را به تازه‌ترین مواد اولیه فصلی ممکن می‌سازد. منوی رستوران که به طور مرتب با تغییر فصل به‌روز می‌شود، منعکس‌کننده این مزیت جغرافیایی است. ماهی‌های تازه صیدشده، سبزیجات محلی و محصولات لبنی باکیفیت از ارکان اصلی غذاهای این رستوران هستند.',
        'human_access_title' => 'نقش دانش فنی و تجربه بین‌المللی سرآشپزها',
        'human_access_content' => 'کان ساکاریا و درین آریباس هر دو در رستوران‌های مطرح اروپایی، به ویژه در فرانسه، آموزش دیده و تجربه کسب کرده‌اند. درین آریباس در مؤسسه معروف پل بوکوز (Institut Paul Bocuse) تحصیل کرده است. این پیشینه قوی، به آن‌ها امکان داده تا تکنیک‌های پیشرفته آشپزی فرانسوی را با مواد اولیه محلی ترکی و دانش سنتی آشپزی آناتولی تلفیق کنند. حضور یکی از سرآشپزها در آشپزخانه در طول شب، نشان‌دهنده تعهد آن‌ها به کیفیت و ثبات غذاهاست.',
        'location_title' => 'موقعیت مکانی رستوران در بافت شهری امروز',
        'location_content' => 'رستوران در منطقه چفته‌هاوزولار (Çiftehavuzlar) واقع شده و با نمای شیشه‌ای و آشپزخانه باز خود، فضایی پرانرژی و زنده را خلق کرده است. صندلی‌های کنار کانتر به مهمانان امکان تماشای نزدیک فرآیند آشپزی را می‌دهد. با این حال، قرارگیری در خیابان اصلی ممکن است گاهی با سر و صدای ترافیک همراه باشد، اما کیفیت غذاها این نقص جزئی را جبران می‌کند [citation:5].',
        'quote' => 'Basta Neo Bistro فراتر از یک رستوران، تجربه‌ای است از سفر دو سرآشپز جوان میان فرهنگ‌های غذایی شرق و غرب که در هر بشقاب روایت می‌شود.',
        'historical_title' => 'سیر تحول رستوران از ۲۰۱۶ تا امروز',
        'timeline' => [
            [
                'year' => '۲۰۱۶ میلادی',
                'content' => 'تأسیس برند Basta ابتدا با مفهوم غذاهای خیابانی (Basta Food) در کادیکوی که رویکردی تازه به این سبک غذایی ارائه داد.'
            ],
            [
                'year' => '۲۰۲۰-۲۰۲۱ میلادی',
                'content' => 'گشایش Basta Neo Bistro در محله فenerbahçe با مفهوم بیسترو و منوی گسترده‌تر همراه با سرویس شراب.'
            ],
            [
                'year' => '۲۰۲۳ میلادی',
                'content' => 'کسب جایزه Travellers\' Choice از Tripadvisor و قرار گرفتن در میان ۱۰٪ برتر رستوران‌های جهان [citation:6].'
            ],
            [
                'year' => '۲۰۲۴-۲۰۲۵ میلادی',
                'content' => 'ادامه فعالیت موفق با منوهای فصلی و تثبیت جایگاه به عنوان یکی از بهترین بیستروهای استانبول.'
            ]
        ],
        'prosperity_title' => 'نقش رستوران در شبکه غذایی و فرهنگ معاصر استانبول',
        'prosperity_content' => 'Basta Neo Bistro به بخش مهمی از هویت غذایی مدرن کادیکوی تبدیل شده و در شکل‌گیری صحنه غذاهای خلاقانه در سمت آسیایی استانبول نقش مؤثری داشته است. این رستوران با جذب مخاطبان محلی و بین‌المللی، به رونق اقتصادی محله و جذب گردشگران غذایی کمک کرده است. منوی محدود اما حساب‌شده شراب نیز تجربه غذاخوری را تکمیل می‌کند.',
        'spatial_title' => 'سازمان فضایی رستوران و ارتباط آن با محیط',
        'spatial_content' => 'فضای داخلی Basta Neo Bistro با دیزاین مینیمال و صنعتی، شامل آشپزخانه باز، کانتر طولانی و چند میز کوچک است. پنجره‌های بزرگ رو به خیابان، مرز بین فضای داخلی و خارجی را کمرنگ کرده و حیات خیابانی کادیکوی را به داخل می‌آورد. نورپردازی هوشمند و موسیقی زمینه مناسب، فضایی صمیمی و در عین حال پرانرژی خلق کرده است.',
        'spatial_highlight_title' => 'آشپزخانه باز؛ تئاتر غذا',
        'spatial_highlight_content' => 'طراحی آشپزخانه باز به مهمانان امکان می‌دهد تا فرآیند خلق غذاها را از نزدیک مشاهده کنند. این ویژگی نه‌تنها به شفافیت و اعتماد می‌انجامد، بلکه تجربه غذاخوری را به یک اجرای زنده هنری تبدیل می‌کند.',
        'today_title' => 'جایگاه امروزی Basta Neo Bistro در گردشگری غذایی',
        'today_content' => 'امروزه Basta Neo Bistro به یکی از مقاصد اصلی گردشگران غذایی که به استانبول سفر می‌کنند تبدیل شده است. توصیه‌های پی‌در‌پی در راهنماهای معتبری مانند میشلن [citation:1] و نظرات مثبت کاربران در پلتفرم‌های بین‌المللی، بر محبوبیت آن افزوده است. غذاهایی مانند بریوش شیرین با مربای گوجه و استراکیاتلا، پان کن توماته با آنچوی، و هوموس با گوشت خشک‌شده از جمله محبوب‌ترین آیتم‌های منو هستند.',
        'conclusion_title' => 'نتیجه‌گیری',
        'conclusion_content' => 'رستوران Basta Neo Bistro نمونه‌ای موفق از تأثیر هم‌افزایی موقعیت جغرافیایی، دانش فنی بین‌المللی و خلاقیت فردی در صنعت رستوران‌داری است. این رستوران با تکیه بر مواد اولیه محلی و تکنیک‌های جهانی، توانسته هویتی منحصربه‌فرد برای خود ایجاد کند و به یکی از نمادهای صحنه غذایی مدرن استانبول تبدیل شود. موفقیت آن نشان‌دهنده ظرفیت بالای استانبول برای شکل‌دهی به تجربه‌های غذایی اصیل و خلاقانه است.',
        'conclusion_quote' => 'Basta Neo Bistro روایتگر داستانی است از بازگشت دو سرآشپز به ریشه‌های خود، با چمدانی پر از تجربه و نگاهی نو به میراث غذایی غنی سرزمینشان.',
        'footer_text' => 'تحلیل جغرافیایی رستوران Basta Neo Bistro - کادیکوی',
        'footer_source' => 'منبع: داده‌های میدانی و نظرات کاربران',
        'copyright' => '© ۲۰۲۳ - طراحی شده برای ارائه مقاله‌ای در سطح بین‌المللی',
        'lang_switcher' => 'زبان:',
        'back_tooltip' => 'ایاصوفیه'
    ],
    
    'tr' => [
        'lang_code' => 'tr',
        'dir' => 'ltr',
        'title' => 'Basta Neo Bistro Restoranının Coğrafi Konum Analizi',
        'meta_description' => 'Basta Neo Bistro\'nün kuruluşu, gelişimi ve başarısında coğrafi konum, füzyon mutfak felsefesi ve şeflerin uluslararası deneyiminin etkisi',
        'header_title' => 'Basta Neo Bistro Restoranının Oluşumu, Gelişimi ve Başarısında Coğrafi Konumun Rolünün Analizi',
        'header_subtitle' => 'Kadıköy\'ün hareketli semtinde konumlanan Basta Neo Bistro, Türk ve Avrupa mutfak geleneklerini ustalıkla harmanlayarak İstanbul\'un Asya yakasının en popüler gastronomi noktalarından biri haline gelmiştir.',
        'abstract_title' => 'Özet',
        'abstract_content' => 'Basta Neo Bistro, iki genç ve yetenekli şef Kaan Sakarya ve Derin Arıbaş tarafından 2016 yılında kurulmuştur. Fransa\'daki Michelin yıldızlı restoranlarda deneyim kazanmış olan bu şefler, Türk sokak lezzetlerini uluslararası tekniklerle yorumlamak amacıyla bu bistroyu Kadıköy\'de açmışlardır. Bu makale, Asya yakasındaki coğrafi konumun rolünü, füzyon mutfak felsefesini, şeflerin uluslararası deneyiminin etkisini ve restoranın İstanbul\'un çağdaş yemek sahnesindeki yerini analitik bir yaklaşımla incelemektedir.',
        'stats' => [
            'founded' => '۲۰۱۶',
            'chefs' => '۲',
            'awards' => 'Michelin',
            'rating' => '۴.۸'
        ],
        'stats_labels' => [
            'founded' => 'Kuruluş Yılı',
            'chefs' => 'Kurucu Şef',
            'awards' => 'Michelin Rehberi',
            'rating' => 'Puan'
        ],
        'introduction_title' => 'Giriş',
        'introduction_content' => 'Basta Neo Bistro, Kadıköy\'de Operatör Cemil Topuzlu Caddesi üzerinde yer almaktadır. Samimi atmosferi ve endüstriyel-minimal tasarımıyla farklı bir yemek deneyimi sunar. Mevsimlik menüsü, en taze malzemelerle hazırlanan yemekler, Türk lezzetleriyle Fransız tekniklerinin yaratıcı bir sentezidir. Şefler, İstanbul sokak lezzetlerinden ilham alarak onların modern ve sofistike versiyonlarını sanatsal sunumlarla hazırlamaktadır.',
        'geographical_title' => 'Kadıköy\'ün Coğrafi Konumu ve Restorana Etkisi',
        'geographical_content' => 'Kadıköy, İstanbul\'un Asya yakasının kalbi olarak son yıllarda modern restoranların ve bağımsız kafelerin önemli bir merkezi haline gelmiştir. Marmara Denizi kıyısındaki konumu, taze deniz ürünlerine kolay erişim sağlar. Basta Neo Bistro\'nun bu hareketli caddedeki konumu, hem yerel sakinler için kolay ulaşılabilir olmasını sağlamış hem de turistik merkezden makul uzaklığı sayesinde daha otantik lezzet deneyimleri arayanları cezbetmiştir.',
        'highlight_box_title' => 'Doğu ve Batının Füzyonu',
        'highlight_box_content' => 'Basta Neo Bistro, Türk mutfak gelenekleriyle modern Avrupa tekniklerinin başarılı bir sentezidir. Pastırmalı humus ve soğan raviolisi gibi yemekler, şeflerin tanıdık tatları yeniden yorumlamadaki yaratıcılığını gösterir.',
        'natural_access_title' => 'Taze ve Yerel Malzemelere Erişimin Rolü',
        'natural_access_content' => 'Kadıköy\'ün yerel pazarlara ve balıkçı barınağına yakınlığı, şeflerin en taze mevsimlik malzemelere erişimini kolaylaştırmaktadır. Mevsimlere göre düzenli olarak güncellenen menü, bu coğrafi avantajı yansıtır. Taze avlanmış balıklar, yerel sebzeler ve kaliteli süt ürünleri restoran mutfağının temel taşlarıdır.',
        'human_access_title' => 'Şeflerin Uluslararası Deneyimi ve Teknik Bilgisinin Rolü',
        'human_access_content' => 'Kaan Sakarya ve Derin Arıbaş, özellikle Fransa\'da olmak üzere Avrupa\'nın önde gelen restoranlarında eğitim almış ve deneyim kazanmışlardır. Derin Arıbaş, ünlü Institut Paul Bocuse\'de okumuştur. Bu güçlü geçmiş, gelişmiş Fransız mutfak tekniklerini yerel Türk malzemeleri ve Anadolu\'nun geleneksel mutfak bilgisiyle harmanlamalarını sağlamıştır. Şeflerden birinin akşam boyunca mutfakta bulunması, yemeklerin kalitesine ve tutarlılığına olan bağlılıklarını gösterir.',
        'location_title' => 'Restoranın Günümüz Kentsel Dokusundaki Konumu',
        'location_content' => 'Restoran, Çiftehavuzlar bölgesinde yer almakta olup cam cephesi ve açık mutfağıyla enerjik ve canlı bir alan yaratmıştır. Tezgah kenarındaki koltuklar, konukların pişirme sürecini yakından izlemesine olanak tanır. Bununla birlikte, ana cadde üzerindeki konumu zaman zaman trafik gürültüsüne maruz kalmasına neden olsa da, yemeklerin kalitesi bu küçük kusuru fazlasıyla telafi etmektedir.',
        'quote' => 'Basta Neo Bistro, iki genç şefin Doğu ve Batı mutfak kültürleri arasında yaptığı ve her tabakta anlatılan bir yolculuğun öyküsüdür.',
        'historical_title' => 'Restoranın 2016\'dan Günümüze Gelişim Süreci',
        'timeline' => [
            [
                'year' => '2016',
                'content' => 'Basta markasının önce Kadıköy\'de sokak yemeği konseptiyle (Basta Food) kurulması ve bu tarza yeni bir soluk getirmesi.'
            ],
            [
                'year' => '2020-2021',
                'content' => 'Fenerbahçe\'de Basta Neo Bistro\'nun açılması; daha geniş menü ve şarap servisiyle bistro konseptine geçiş.'
            ],
            [
                'year' => '2023',
                'content' => 'Tripadvisor\'dan Travellers\' Choice ödülü alınması ve dünyadaki restoranların ilk %10\'u arasına girmesi.'
            ],
            [
                'year' => '2024-2025',
                'content' => 'Mevsimlik menülerle başarılı faaliyetlerin sürdürülmesi ve İstanbul\'un en iyi bistrolarından biri konumunun pekiştirilmesi.'
            ]
        ],
        'prosperity_title' => 'Restoranın İstanbul\'un Çağdaş Yemek ve Kültür Ağındaki Rolü',
        'prosperity_content' => 'Basta Neo Bistro, Kadıköy\'ün modern yemek kimliğinin önemli bir parçası haline gelmiş ve İstanbul\'un Asya yakasında yaratıcı yemek sahnesinin şekillenmesinde etkili olmuştur. Yerel ve uluslararası ziyaretçileri çekerek semtin ekonomik canlılığına ve gastronomi turizmine katkıda bulunmaktadır. Sınırlı ama özenle seçilmiş şarap menüsü de yemek deneyimini tamamlamaktadır.',
        'spatial_title' => 'Restoranın Mekânsal Organizasyonu ve Çevreyle İlişkisi',
        'spatial_content' => 'Basta Neo Bistro\'nün endüstriyel-minimal iç mekânı, açık mutfak, uzun tezgah ve birkaç küçük masadan oluşur. Caddeye bakan büyük pencereler, iç ve dış mekân arasındaki sınırı bulanıklaştırarak Kadıköy\'ün sokak hayatını içeri taşır. Akıllı aydınlatma ve uygun fon müziği, samimi ve enerjik bir atmosfer yaratır.',
        'spatial_highlight_title' => 'Açık Mutfak; Yemek Tiyatrosu',
        'spatial_highlight_content' => 'Açık mutfak tasarımı, konukların yemeklerin yaratım sürecini yakından izlemesine olanak tanır. Bu özellik yalnızca şeffaflık ve güven sağlamakla kalmaz, aynı zamanda yemek deneyimini canlı bir sanat performansına dönüştürür.',
        'today_title' => 'Basta Neo Bistro\'nün Günümüz Gastronomi Turizmindeki Yeri',
        'today_content' => 'Basta Neo Bistro bugün İstanbul\'a gelen gastronomi turistlerinin başlıca uğrak noktalarından biri haline gelmiştir. Michelin gibi saygın rehberlerdeki tavsiyeler ve uluslararası platformlardaki olumlu kullanıcı yorumları popülerliğini artırmıştır. Domates reçelli ve stracciatella peynirli tatlı briyöş, tuzlu hamsili pan con tomate ve pastırmalı humus en sevilen menü öğeleri arasındadır.',
        'conclusion_title' => 'Sonuç',
        'conclusion_content' => 'Basta Neo Bistro, coğrafi konum, uluslararası teknik bilgi ve bireysel yaratıcılığın sinerjisinin restoran işletmeciliğindeki başarılı bir örneğidir. Yerel malzemeler ve küresel tekniklere dayanarak kendine özgü bir kimlik oluşturmuş ve İstanbul\'un modern yemek sahnesinin simgelerinden biri haline gelmiştir. Başarısı, kentin otantik ve yaratıcı yemek deneyimleri üretme kapasitesinin yüksek olduğunu göstermektedir.',
        'conclusion_quote' => 'Basta Neo Bistro, iki şefin deneyim dolu bir bavulla köklerine dönüşünün ve ülkelerinin zengin mutfak mirasına yeni bir bakış açısıyla yaklaşmalarının öyküsünü anlatır.',
        'footer_text' => 'Basta Neo Bistro Coğrafi Analizi - Kadıköy',
        'footer_source' => 'Kaynak: Saha verileri ve kullanıcı yorumları',
        'copyright' => '© 2023 - Uluslararası düzeyde bir makale sunumu için tasarlandı',
        'lang_switcher' => 'Dil:',
        'back_tooltip' => 'Ayasofya'
    ],
    
    'en' => [
        'lang_code' => 'en',
        'dir' => 'ltr',
        'title' => 'Geographical Location Analysis of Basta Neo Bistro Restaurant',
        'meta_description' => 'Analysis of the impact of geographical location, fusion culinary philosophy, and chefs\' international experience on the formation and popularity of Basta Neo Bistro, Istanbul',
        'header_title' => 'Analysis of the Role of Geographical Location in the Formation and Success of Basta Neo Bistro Restaurant Istanbul',
        'header_subtitle' => 'Located in Istanbul\'s vibrant Kadıköy district, Basta Neo Bistro masterfully blends Turkish and European culinary traditions, becoming one of the most popular food destinations on the city\'s Asian side.',
        'abstract_title' => 'Abstract',
        'abstract_content' => 'Basta Neo Bistro was founded in 2016 by two young and talented chefs, Kaan Sakarya and Derin Arıbaş. Having honed their skills in Michelin-starred restaurants in France, they opened this bistro in Kadıköy with the aim of offering a modern interpretation of Turkish street food using international techniques. This article analytically examines the role of its geographical location on the Asian side, its fusion culinary philosophy, the impact of the chefs\' international experience, and the restaurant\'s position in Istanbul\'s contemporary food scene.',
        'stats' => [
            'founded' => '۲۰۱۶',
            'chefs' => '۲',
            'awards' => 'Michelin',
            'rating' => '۴.۸'
        ],
        'stats_labels' => [
            'founded' => 'Founded',
            'chefs' => 'Founder Chefs',
            'awards' => 'Michelin Guide',
            'rating' => 'Rating'
        ],
        'introduction_title' => 'Introduction',
        'introduction_content' => 'Basta Neo Bistro is located on Operatör Cemil Topuzlu Street in the Kadıköy district. With its intimate atmosphere and industrial-minimalist design, it offers a unique dining experience. The seasonal menu, based on the freshest market ingredients, is a creative synthesis of Turkish flavors and French techniques. Inspired by Istanbul\'s street food, the chefs prepare modern and refined versions of them with artistic presentations.',
        'geographical_title' => 'Geographical Location of Kadıköy and Its Influence on the Restaurant',
        'geographical_content' => 'Kadıköy, as the beating heart of Istanbul\'s Asian side, has become a major hub for modern restaurants and independent cafes in recent years. Its coastal location on the Sea of Marmara provides easy access to fresh seafood. Basta Neo Bistro\'s location on this bustling main street makes it easily accessible to local residents, while its reasonable distance from the tourist center attracts those seeking more authentic culinary experiences.',
        'highlight_box_title' => 'Fusion of East and West',
        'highlight_box_content' => 'Basta Neo Bistro is a successful example of blending Turkish culinary traditions with modern European techniques. Dishes like hummus with pastırma (dried cured beef) and onion ravioli demonstrate the chefs\' creativity in reinterpreting familiar flavors.',
        'natural_access_title' => 'Role of Access to Fresh, Local Ingredients',
        'natural_access_content' => 'Kadıköy\'s proximity to local markets and the fishing pier enables the chefs to access the freshest seasonal ingredients. The menu, which is regularly updated with the seasons, reflects this geographical advantage. Freshly caught fish, local vegetables, and high-quality dairy products are fundamental to the restaurant\'s cuisine.',
        'human_access_title' => 'Role of the Chefs\' International Experience and Technical Knowledge',
        'human_access_content' => 'Kaan Sakarya and Derin Arıbaş both trained and gained experience in leading European restaurants, particularly in France. Derin Arıbaş studied at the renowned Institut Paul Bocuse. This strong background allows them to blend advanced French culinary techniques with local Turkish ingredients and the traditional culinary knowledge of Anatolia. The presence of one of the chefs in the kitchen throughout the evening demonstrates their commitment to quality and consistency.',
        'location_title' => 'Location of the Restaurant in Today’s Urban Fabric',
        'location_content' => 'The restaurant is located in the Çiftehavuzlar area, and its glass facade and open kitchen create an energetic and vibrant space. Counter seats allow guests to watch the cooking process up close. However, its location on the main street may sometimes expose it to traffic noise, but the quality of the food more than compensates for this minor drawback [citation:5].',
        'quote' => 'Basta Neo Bistro is more than a restaurant; it is the story of two young chefs\' journey between the food cultures of East and West, told on every plate.',
        'historical_title' => 'Restaurant Timeline from 2016 to Today',
        'timeline' => [
            [
                'year' => '2016',
                'content' => 'The Basta brand was first established in Kadıköy with a street food concept (Basta Food), bringing a fresh approach to this style of cuisine.'
            ],
            [
                'year' => '2020-2021',
                'content' => 'Basta Neo Bistro opened in the Fenerbahçe neighborhood with a broader bistro concept and wine service.'
            ],
            [
                'year' => '2023',
                'content' => 'Received the Travellers\' Choice award from Tripadvisor, ranking among the top 10% of restaurants worldwide [citation:6].'
            ],
            [
                'year' => '2024-2025',
                'content' => 'Continued successful operation with seasonal menus, solidifying its position as one of Istanbul\'s best bistros.'
            ]
        ],
        'prosperity_title' => 'Role of the Restaurant in Istanbul\'s Contemporary Food and Culture Scene',
        'prosperity_content' => 'Basta Neo Bistro has become an important part of Kadıköy\'s modern culinary identity and has played a significant role in shaping the creative food scene on Istanbul\'s Asian side. By attracting local and international visitors, it contributes to the neighborhood\'s economic vitality and food tourism. The limited but carefully selected wine menu complements the dining experience.',
        'spatial_title' => 'Spatial Organization of the Restaurant and Its Relationship with the Environment',
        'spatial_content' => 'The industrial-minimalist interior of Basta Neo Bistro consists of an open kitchen, a long counter, and a few small tables. Large windows facing the street blur the boundary between inside and outside, bringing the street life of Kadıköy indoors. Intelligent lighting and suitable background music create an intimate yet energetic atmosphere.',
        'spatial_highlight_title' => 'Open Kitchen: The Theater of Food',
        'spatial_highlight_content' => 'The open kitchen design allows guests to observe the food creation process up close. This feature not only ensures transparency and trust but also transforms the dining experience into a live artistic performance.',
        'today_title' => 'Current Role of Basta Neo Bistro in Culinary Tourism',
        'today_content' => 'Today, Basta Neo Bistro has become one of the main destinations for culinary tourists visiting Istanbul. Recommendations in respected guides like Michelin [citation:1] and positive user reviews on international platforms have increased its popularity. Dishes like sweet brioche with tomato jam and stracciatella, pan con tomate with salted anchovies, and hummus with pastırma are among the most popular menu items.',
        'conclusion_title' => 'Conclusion',
        'conclusion_content' => 'Basta Neo Bistro stands as a successful example of the synergy between geographical location, international technical knowledge, and individual creativity in the restaurant industry. Relying on local ingredients and global techniques, it has forged a unique identity and become an icon of Istanbul\'s modern food scene. Its success demonstrates the city\'s high capacity for generating authentic and creative culinary experiences.',
        'conclusion_quote' => 'Basta Neo Bistro tells the story of two chefs returning to their roots with a suitcase full of experience and a new perspective on their homeland\'s rich culinary heritage.',
        'footer_text' => 'Geographical Analysis of Basta Neo Bistro - Kadıköy',
        'footer_source' => 'Source: Field data and user reviews',
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
            background: linear-gradient(135deg, #f5efe8 0%, #e8dfd2 100%);
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
            background: linear-gradient(rgba(70, 60, 50, 0.85), rgba(50, 40, 30, 0.9)), 
                        url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
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
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M20,20 L80,20 L80,80 L20,80 Z" fill="none" stroke="%23E6B17E" stroke-width="2" stroke-dasharray="5,5"/></svg>');
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
            background-color: #8B5A2B;
            color: white;
        }
        
        .bistro-icon {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 30px 0;
            color: #E6B17E;
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
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 6px solid #8B5A2B;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #8B5A2B, #C79A6B, #E6B17E);
        }
        
        .content-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        h2 {
            color: #8B5A2B;
            font-size: 2.5rem;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #f0e0d0;
            position: relative;
        }
        
        h2:after {
            content: '';
            position: absolute;
            bottom: -3px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 0;
            width: 120px;
            height: 3px;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #8B5A2B, #C79A6B);
        }
        
        h3 {
            color: #6B4226;
            font-size: 2rem;
            margin: 35px 0 20px;
            display: flex;
            align-items: center;
        }
        
        h3 i {
            margin-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 15px;
            color: #8B5A2B;
            background: #f5efe8;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #f5efe8, #ece1d5);
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 5px solid #C79A6B;
            padding: 30px;
            border-radius: 15px;
            margin: 30px 0;
            box-shadow: 0 8px 20px rgba(199, 154, 107, 0.15);
            position: relative;
        }
        
        .highlight-box:before {
            content: "🍽️";
            position: absolute;
            top: -15px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 20px;
            font-size: 2rem;
            color: #C79A6B;
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
            border-top: 5px solid #8B5A2B;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #8B5A2B, #C79A6B);
        }
        
        .stat-number {
            font-size: 2.8rem;
            font-weight: bold;
            color: #8B5A2B;
            margin-bottom: 10px;
            display: block;
        }
        
        .stat-label {
            font-size: 1.2rem;
            color: #6B4226;
        }
        
        .quote {
            font-style: italic;
            text-align: center;
            font-size: 1.5rem;
            color: #6B4226;
            padding: 40px;
            margin: 50px 0;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #f5efe8, #ece1d5);
            border-radius: 20px;
            position: relative;
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 6px solid #C79A6B;
            border-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 6px solid #C79A6B;
        }
        
        .quote:before, .quote:after {
            content: '"';
            font-size: 4rem;
            color: #8B5A2B;
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
            background: linear-gradient(to bottom, #8B5A2B, #C79A6B, #8B5A2B);
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
            background: #8B5A2B;
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
            color: #8B5A2B;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        
        .conclusion {
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>, #8B5A2B, #6B4226);
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
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M30,30 Q50,10 70,30 T90,50 Q70,70 50,90 T30,70 Q10,50 30,30 Z" fill="none" stroke="%23E6B17E" stroke-width="0.5" opacity="0.2"/></svg>');
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
            background: #f5efe8;
            border-radius: 15px;
        }
        
        .footer-icons {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 20px;
            font-size: 1.8rem;
            color: #8B5A2B;
        }
        
        /* دکمه بازگشت */
        .back-button {
            position: fixed;
            bottom: 30px;
            <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 30px;
            background: linear-gradient(135deg, #8B5A2B, #6B4226);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            box-shadow: 0 6px 15px rgba(139, 90, 43, 0.4);
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .back-button:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 25px rgba(139, 90, 43, 0.6);
            background: linear-gradient(135deg, #6B4226, #8B5A2B);
        }
        
        .back-button .tooltip {
            position: absolute;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 70px;
            background: rgba(139, 90, 43, 0.9);
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
            border-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 6px solid rgba(139, 90, 43, 0.9);
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
            
            .bistro-icon {
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
        <i class="fas fa-utensils"></i>
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
        
        <div class="bistro-icon">
            <i class="fas fa-utensils"></i>
            <i class="fas fa-fire"></i>
            <i class="fas fa-wine-glass-alt"></i>
            <i class="fas fa-leaf"></i>
            <i class="fas fa-egg"></i>
        </div>
    </header>
    
    <div class="container">
        <div class="content-card">
            <h2><i class="fas fa-scroll"></i> <?php echo $current['abstract_title']; ?></h2>
            <p><?php echo $current['abstract_content']; ?></p>
            
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number"><?php echo $current['stats']['founded']; ?></span>
                    <span class="stat-label"><?php echo $current['stats_labels']['founded']; ?></span>
                </div>
                
                <div class="stat-item">
                    <span class="stat-number"><?php echo $current['stats']['chefs']; ?></span>
                    <span class="stat-label"><?php echo $current['stats_labels']['chefs']; ?></span>
                </div>
                
                <div class="stat-item">
                    <span class="stat-number"><?php echo $current['stats']['awards']; ?></span>
                    <span class="stat-label"><?php echo $current['stats_labels']['awards']; ?></span>
                </div>
                
                <div class="stat-item">
                    <span class="stat-number"><?php echo $current['stats']['rating']; ?></span>
                    <span class="stat-label"><?php echo $current['stats_labels']['rating']; ?></span>
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
                <h3><i class="fas fa-theater-masks"></i> <?php echo $current['spatial_highlight_title']; ?></h3>
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
            
            <div class="quote" style="background: rgba(255, 255, 255, 0.1); color: #E6B17E; margin-top: 30px; border-color: #E6B17E;">
                <?php echo $current['conclusion_quote']; ?>
            </div>
        </div>
        
        <footer>
            <p><?php echo $current['footer_text']; ?></p>
            <p><?php echo $current['footer_source']; ?></p>
            
            <div class="footer-icons">
                <i class="fas fa-utensils"></i>
                <i class="fas fa-wine-glass-alt"></i>
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