```php
<?php
// hatay.php - تحلیل جامع رستوران هاتای (Hatay Sofrası / Hatay Medeniyetler Mutfağı)
// مدیریت زبان
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'fa';

// تنظیم هدر برای کدگذاری کاراکترها
header('Content-Type: text/html; charset=utf-8');

// اطلاعات کامل رستوران هاتای به سه زبان
$content = [
    'fa' => [
        'lang_code' => 'fa',
        'dir' => 'rtl',
        'title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری و موفقیت رستوران هاتای استانبول',
        'meta_description' => 'تحلیل تأثیر مهاجرت هاتای‌ها به استانبول، مواد اولیه خاص و فرهنگ غذایی آنتاکیا بر شکل‌گیری و محبوبیت رستوران‌های هاتای در استانبول',
        'header_title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری و موفقیت رستوران هاتای استانبول',
        'header_subtitle' => 'رستوران هاتای (Hatay Sofrası) با ارائه غذاهای اصیل منطقه هاتای (آنتاکیا) که تلفیقی از فرهنگ‌های ترکی، عربی و ارمنی است، به یکی از محبوب‌ترین رستوران‌های استانبول تبدیل شده است.',
        'abstract_title' => 'چکیده',
        'abstract_content' => 'رستوران‌های هاتای در استانبول، به ویژه برند «هاتای صفراسی» (Hatay Sofrası) و «هاتای مدنیت‌لر صفراسی» (Hatay Medeniyetler Sofrası)، نمونه‌ای موفق از تأثیر مهاجرت‌های داخلی بر صنعت غذا هستند. هاتای به دلیل موقعیت جغرافیایی خود در مرز سوریه، میراث‌دار تمدن‌های گوناگون و دارای غنی‌ترین فرهنگ غذایی ترکیه است. این مقاله با رویکردی تحلیلی، نقش مهاجرت هاتای‌ها به استانبول، مواد اولیه منحصربه‌فرد (زیتون، انار، سماق، کنته)، و استقبال مردم استانبول از این طعم‌ها را بررسی می‌کند.',
        'stats' => [
            'branches' => '۱۰+',
            'dishes' => '۲۰۰+',
            'years' => '۳۵+',
            'rating' => '۴.۷'
        ],
        'stats_labels' => [
            'branches' => 'شعبه در استانبول',
            'dishes' => 'انواع غذا',
            'years' => 'سال تجربه',
            'rating' => 'امتیاز'
        ],
        'introduction_title' => 'مقدمه',
        'introduction_content' => 'هاتای (آن‌تاکیا) به عنوان یکی از قدیمی‌ترین سکونتگاه‌های جهان، دارای میراث آشپزی غنی و منحصربه‌فردی است. این منطقه به دلیل قرارگیری در مسیر جاده ابریشم و میزبانی از اقوام مختلف (ترک، عرب، ارمنی، یهودی)، غذایی متنوع و پرادویه دارد. در دهه‌های اخیر، مهاجرت گسترده از هاتای به استانبول باعث شکل‌گیری رستوران‌هایی شد که این غذاها را به پایتخت سابق عثمانی آوردند. رستوران‌های هاتای با حفظ اصالت و استفاده از مواد اولیه مستقیم از منطقه خود، توانسته‌اند جایگاه ویژه‌ای در میان استانبولی‌ها پیدا کنند.',
        'geographical_title' => 'موقعیت جغرافیایی هاتای و تأثیر آن بر غذا',
        'geographical_content' => 'هاتای در جنوبی‌ترین نقطه ترکیه و در کنار دریای مدیترانه واقع شده است. آب و هوای مدیترانه‌ای با زمستان‌های معتدل و تابستان‌های گرم، بستر مناسبی برای کشت زیتون، انار، مرکبات و انواع سبزی‌جات فراهم کرده است. همجواری با سوریه و فرهنگ عربی، استفاده گسترده از ادویه‌هایی مانند سماق، زیره، نعناع و فلفل حلب (پول بیبر) را به همراه داشته است. این تنوع اقلیمی و فرهنگی مستقیماً در غذاهای هاتای مانند کبه، بی‌تی‌بیت، زیتون پرورده، اوزکوم، و انواع کباب‌های محلی نمود یافته است.',
        'highlight_box_title' => 'بهشت طعم‌ها',
        'highlight_box_content' => 'غذاهای هاتای ترکیبی از طعم‌های ترش، تند و چرب هستند. استفاده از رب انار، سماق، کنته (کره محلی) و زیتون‌های خاص این منطقه، آن را از سایر غذاهای ترکی متمایز می‌سازد.',
        'natural_access_title' => 'نقش دسترسی به مواد اولیه خاص',
        'natural_access_content' => 'موفقیت رستوران‌های هاتای در استانبول مرهون واردات روزانه مواد اولیه از منطقه هاتای است. زیتون‌های کیراز (گیلاسی)، صابون زیتون، کنته (کره حیوانی محلی)، نعناع خشک شده کوهی، و ادویه‌های دست‌ساز، طعم‌هایی را ایجاد می‌کنند که در استانبول یافت نمی‌شود. برخی از این رستوران‌ها حتی نان‌های مخصوص مانند «بیصی» (Bisi) را مستقیماً از نانوایی‌های آنتاکیا وارد می‌کنند.',
        'human_access_title' => 'نقش دانش مهاجران و زنان هاتایی',
        'human_access_content' => 'بسیاری از دستورپخت‌های هاتای نسل‌به‌نسل در آشپزخانه‌های خانگی منتقل شده‌اند. زنان هاتایی که به استانبول مهاجرت کرده‌اند، با خود این دانش را آورده و در آشپزخانه رستوران‌ها به کار گرفته‌اند. در برخی رستوران‌ها هنوز هم غذاها به دست زنان هاتایی پخته می‌شود که اصالت و کیفیت را تضمین می‌کند.',
        'location_title' => 'موقعیت مکانی رستوران‌های هاتای در استانبول',
        'location_content' => 'بیشتر رستوران‌های هاتای در محله‌هایی متمرکز شده‌اند که مهاجران هاتایی ساکن شده‌اند، مانند محله آکسارای (Aksaray) در منطقه فاتح، محله مرتر (Merdivenköy) در گوازتپه، و محله باغجیلار (Bağcılar). با افزایش شهرت، شعبه‌هایی نیز در مناطق شیک‌تر مانند بشیکتاش و نیسان‌تاشی افتتاح شده‌اند. موقعیت این رستوران‌ها اغلب در دسترس و نزدیک به ایستگاه‌های مترو و حمل‌ونقل عمومی است.',
        'quote' => 'هاتای نه یک شهر، که یک فرهنگ غذایی است؛ استانبول خوشبختانه میزبان این فرهنگ در دل خود شده است.',
        'historical_title' => 'تاریخچه رستوران‌های هاتای در استانبول',
        'timeline' => [
            [
                'year' => '۱۹۸۷ میلادی',
                'content' => 'نخستین رستوران هاتای با نام «هاتای صفراسی» توسط خانواده‌ای از هاتای در منطقه آکسارای افتتاح شد. منوی اولیه شامل ۳۰ نوع غذای محلی بود.'
            ],
            [
                'year' => '۱۹۹۹ میلادی',
                'content' => 'پس از زلزله مرمره، موج جدیدی از مهاجرت هاتایی‌ها به استانبول رخ داد و تعداد رستوران‌های هاتای افزایش یافت.'
            ],
            [
                'year' => '۲۰۰۵ میلادی',
                'content' => 'برند «هاتای مدنیت‌لر صفراسی» با رویکردی گسترده‌تر و منویی شامل بیش از ۱۰۰ نوع غذا فعالیت خود را آغاز کرد.'
            ],
            [
                'year' => '۲۰۱۵ میلادی',
                'content' => 'گسترش شعبه‌ها به مناطق اروپایی و آسیایی استانبول؛ هاتای به عنوان یک سبک غذایی شناخته شده در سراسر شهر تثبیت شد.'
            ],
            [
                'year' => '۲۰۲۳ میلادی',
                'content' => 'پس از زلزله بزرگ قهرمان‌ماراش، موج تازه‌ای از مهاجرت از هاتای به استانبول رخ داد و رستوران‌های هاتای به پناهگاه فرهنگی و غذایی تبدیل شدند.'
            ]
        ],
        'prosperity_title' => 'نقش رستوران‌های هاتای در شبکه غذایی و فرهنگ معاصر استانبول',
        'prosperity_content' => 'رستوران‌های هاتای به یکی از نقاط عطف گردشگری غذایی استانبول تبدیل شده‌اند. بسیاری از گردشگران داخلی و خارجی برای تجربه طعم‌های متفاوت به این رستوران‌ها مراجعه می‌کنند. همچنین، این رستوران‌ها به محلی برای دورهمی هاتایی‌های مهاجر تبدیل شده و هویت فرهنگی آنان را حفظ کرده‌اند. غذاهایی مانند «کبه»، «اوروک» (دلمه برگ مو با ادویه هاتای)، «زیتون پرورده با رب انار» و «بی‌تی‌بیت» (نوعی کباب لقمه) در سراسر شهر شناخته شده‌اند.',
        'spatial_title' => 'سازمان فضایی رستوران‌های هاتای و ارتباط آن با محیط',
        'spatial_content' => 'بسیاری از رستوران‌های هاتای فضایی ساده و بی‌آلایش دارند که یادآور خانه‌های سنتی آنتاکیا است. استفاده از ظروف مسی، دیوارهای سنگی یا آجری، و نورپردازی گرم، حس صمیمیت را القا می‌کند. در برخی شعبه‌ها، بخشی به عنوان «نانوایی» برای پخت نان‌های محلی (بیصی، شللم) در نظر گرفته شده است.',
        'spatial_highlight_title' => 'سفره هاتایی',
        'spatial_highlight_content' => 'چیدمان غذاها بر روی سینی‌های بزرگ مسی و تقسیم آن بین افراد، رسمی هاتایی است که در این رستوران‌ها حفظ شده است. این سبک سرو، حس جمعی و صمیمیت را تقویت می‌کند.',
        'today_title' => 'جایگاه امروزی رستوران‌های هاتای در گردشگری غذایی',
        'today_content' => 'امروزه رستوران‌های هاتای در فهرست توصیه‌های راهنماهای معتبر غذایی مانند میشلن و تایم‌اوت استانبول قرار دارند. غذاهای هاتای به عنوان یکی از غنی‌ترین و متنوع‌ترین غذاهای محلی ترکیه شناخته می‌شود و رستوران‌های آن با وجود رقابت زیاد، همچنان پرطرفدار هستند. منوی صبحانه هاتای (Hatay kahvaltısı) با انواع پنیر، زیتون، کنته و دلمه، به ویژه در آخر هفته‌ها بسیار شلوغ است.',
        'conclusion_title' => 'نتیجه‌گیری',
        'conclusion_content' => 'رستوران‌های هاتای در استانبول نمونه‌ای موفق از پیوند جغرافیا، مهاجرت و فرهنگ غذایی هستند. آن‌ها نه تنها غذا، بلکه هویت و سنت منطقه‌ای را به پایتخت آورده‌اند و توانسته‌اند جایگاه خود را در میان سلیقه‌های متنوع استانبولی باز کنند. این موفقیت نشان‌دهنده ظرفیت بالای غذاهای محلی برای جهانی شدن در چارچوب شهرهای بزرگ است.',
        'conclusion_quote' => 'هاتای در هر کاسه زیتون، در هر لقمه کبه، داستانی از سرزمین خورشید و ادویه را روایت می‌کند.',
        'footer_text' => 'تحلیل جغرافیایی رستوران‌های هاتای استانبول',
        'footer_source' => 'منبع: داده‌های میدانی و منابع محلی',
        'copyright' => '© ۲۰۲۳ - طراحی شده برای ارائه مقاله‌ای در سطح بین‌المللی',
        'lang_switcher' => 'زبان:',
        'back_tooltip' => 'ایاصوفیه'
    ],
    
    'tr' => [
        'lang_code' => 'tr',
        'dir' => 'ltr',
        'title' => 'Hatay Restoranlarının Coğrafi Konum Analizi',
        'meta_description' => 'Hataylıların İstanbul\'a göçü, özgün malzemeler ve Antakya mutfak kültürünün İstanbul\'daki Hatay restoranlarının oluşumu ve popülerliğine etkisinin analizi',
        'header_title' => 'İstanbul\'daki Hatay Restoranlarının Oluşumu, Gelişimi ve Başarısında Coğrafi Konumun Rolünün Analizi',
        'header_subtitle' => 'Hatay Sofrası gibi restoranlar, Türk, Arap ve Ermeni kültürlerinin sentezi olan özgün Hatay (Antakya) yemeklerini sunarak İstanbul\'un en sevilen restoranları arasına girmiştir.',
        'abstract_title' => 'Özet',
        'abstract_content' => 'İstanbul\'daki Hatay restoranları, özellikle Hatay Sofrası ve Hatay Medeniyetler Sofrası markaları, iç göçün gıda sektörüne etkisinin başarılı örnekleridir. Hatay, Suriye sınırındaki coğrafi konumu sayesinde farklı medeniyetlere ev sahipliği yapmış ve Türkiye\'nin en zengin mutfak kültürüne sahip olmuştur. Bu makale, Hataylıların İstanbul\'a göçünün, özgün malzemelerin (zeytin, nar, sumak, künefe peyniri, köy tereyağı) ve İstanbulluların bu lezzetlere olan ilgisinin rolünü analitik bir yaklaşımla incelemektedir.',
        'stats' => [
            'branches' => '10+',
            'dishes' => '200+',
            'years' => '35+',
            'rating' => '4.7'
        ],
        'stats_labels' => [
            'branches' => 'İstanbul Şubesi',
            'dishes' => 'Yemek Çeşidi',
            'years' => 'Yıllık Deneyim',
            'rating' => 'Puan'
        ],
        'introduction_title' => 'Giriş',
        'introduction_content' => 'Hatay (Antakya), dünyanın en eski yerleşim yerlerinden biri olarak zengin ve eşsiz bir mutfak mirasına sahiptir. İpek Yolu üzerindeki konumu ve farklı etnik gruplara (Türk, Arap, Ermeni, Yahudi) ev sahipliği yapması, çeşitli ve baharatlı bir mutfak oluşturmuştur. Son yıllarda Hatay\'dan İstanbul\'a yoğun göç, bu yemekleri eski Osmanlı başkentine taşıyan restoranların açılmasına yol açmıştır. Hatay restoranları, özgünlüklerini koruyarak ve malzemelerini doğrudan bölgeden getirerek İstanbullular arasında özel bir yer edinmiştir.',
        'geographical_title' => 'Hatay\'ın Coğrafi Konumu ve Mutfağa Etkisi',
        'geographical_content' => 'Hatay, Türkiye\'nin en güney noktasında, Akdeniz kıyısında yer alır. Ilıman kışlar ve sıcak yazlarla karakterize Akdeniz iklimi, zeytin, nar, narenciye ve çeşitli sebzelerin yetişmesi için ideal ortam sağlar. Suriye sınırındaki konumu ve Arap kültürüne yakınlık, sumak, kimyon, nane ve Halep biberi gibi baharatların yaygın kullanımını beraberinde getirmiştir. Bu iklimsel ve kültürel çeşitlilik, içli köfte, bi\'tibet, zahter salatası, künefe ve çeşitli yöresel kebaplar gibi Hatay yemeklerinde doğrudan kendini gösterir.',
        'highlight_box_title' => 'Lezzet Cenneti',
        'highlight_box_content' => 'Hatay yemekleri ekşi, acı ve yağlı tatların harmanıdır. Nar ekşisi, sumak, köy tereyağı ve bölgeye özgü zeytinlerin kullanımı, onu diğer Türk mutfaklarından ayırır.',
        'natural_access_title' => 'Özgün Malzemelere Erişimin Rolü',
        'natural_access_content' => 'İstanbul\'daki Hatay restoranlarının başarısı, malzemelerin günlük olarak Hatay bölgesinden getirilmesine dayanır. Kiraz zeytini, Hatay biberi, dağ nanesi, el yapımı baharatlar ve künefe peyniri, İstanbul\'da bulunamayan lezzetleri yaratır. Bazı restoranlar, özel ekmeklerini (Bisi, Şıllım) bile doğrudan Antakya\'daki fırınlardan ithal eder.',
        'human_access_title' => 'Hataylı Göçmenlerin ve Kadınların Bilgi Birikiminin Rolü',
        'human_access_content' => 'Hatay\'a özgü birçok tarif, kuşaktan kuşağa ev mutfaklarında aktarılmıştır. İstanbul\'a göç eden Hataylı kadınlar, bu bilgiyi beraberlerinde getirmiş ve restoran mutfaklarında uygulamışlardır. Bazı restoranlarda yemekler hâlâ Hataylı kadınlar tarafından pişirilmekte, bu da özgünlük ve kaliteyi garanti etmektedir.',
        'location_title' => 'Hatay Restoranlarının İstanbul\'daki Konumu',
        'location_content' => 'Hatay restoranlarının çoğu, Hataylı göçmenlerin yerleştiği bölgelerde yoğunlaşmıştır: Fatih\'te Aksaray, Göztepe\'de Merdivenköy, Bağcılar gibi. Artan popülarite ile Beşiktaş ve Nişantaşı gibi daha lüks semtlerde de şubeler açılmıştır. Restoranlar genellikle toplu taşıma araçlarına yakın, erişilebilir konumlardadır.',
        'quote' => 'Hatay sadece bir şehir değil, bir yemek kültürüdür; İstanbul bu kültürü bağrında ağırlamaktan mutluluk duyar.',
        'historical_title' => 'İstanbul\'da Hatay Restoranlarının Tarihi',
        'timeline' => [
            [
                'year' => '1987',
                'content' => 'İlk Hatay restoranı "Hatay Sofrası" adıyla Hataylı bir aile tarafından Aksaray\'da açıldı. Menü 30 çeşit yöresel yemekten oluşuyordu.'
            ],
            [
                'year' => '1999',
                'content' => 'Marmara Depremi sonrası Hatay\'dan İstanbul\'a yeni bir göç dalgası yaşandı ve Hatay restoranlarının sayısı arttı.'
            ],
            [
                'year' => '2005',
                'content' => '"Hatay Medeniyetler Sofrası" markası, 100\'ün üzerinde yemek çeşidiyle daha geniş bir konseptle faaliyete başladı.'
            ],
            [
                'year' => '2015',
                'content' => 'Şubelerin İstanbul\'un Avrupa ve Asya yakalarına yayılması; Hatay mutfağı şehir genelinde tanınan bir tarz haline geldi.'
            ],
            [
                'year' => '2023',
                'content' => 'Kahramanmaraş merkezli büyük depremlerin ardından Hatay\'dan yeni bir göç dalgası; Hatay restoranları kültürel ve duygusal bir sığınak haline geldi.'
            ]
        ],
        'prosperity_title' => 'Hatay Restoranlarının İstanbul\'un Çağdaş Yemek ve Kültür Ağındaki Rolü',
        'prosperity_content' => 'Hatay restoranları, İstanbul\'un gastronomi turizminin önemli durak noktalarından biri haline gelmiştir. Pek çok yerli ve yabancı turist, farklı lezzetleri deneyimlemek için bu restoranlara gelmektedir. Ayrıca bu restoranlar, göçmen Hataylıların buluşma noktası olmuş ve kültürel kimliklerini korumalarına yardımcı olmuştur. İçli köfte, yaprak sarması, nar ekşili zeytin ezmesi ve künefe tüm şehirde tanınan lezzetler arasına girmiştir.',
        'spatial_title' => 'Hatay Restoranlarının Mekânsal Organizasyonu ve Çevreyle İlişkisi',
        'spatial_content' => 'Birçok Hatay restoranı, geleneksel Antakya evlerini anımsatan sade ve gösterişsiz bir dekora sahiptir. Bakır kaplar, taş veya tuğla duvarlar ve sıcak aydınlatma samimi bir atmosfer yaratır. Bazı şubelerde yöresel ekmeklerin (Bisi, Şıllım) pişirildiği bir fırın bölümü bulunur.',
        'spatial_highlight_title' => 'Hatay Sofrası',
        'spatial_highlight_content' => 'Yemeklerin büyük bakır tepsilerde sunulup ortaklaşa yenmesi, Hatay\'a özgü bir gelenektir. Bu sunum şekli, topluluk ve samimiyet duygusunu güçlendirir.',
        'today_title' => 'Hatay Restoranlarının Günümüz Gastronomi Turizmindeki Yeri',
        'today_content' => 'Günümüzde Hatay restoranları, Michelin ve Timeout İstanbul gibi saygın rehberlerin tavsiye listelerinde yer almaktadır. Hatay mutfağı, Türkiye\'nin en zengin ve en çeşitli yöresel mutfaklarından biri olarak kabul edilmekte ve restoranları yoğun rekabete rağmen popülerliğini korumaktadır. Hatay kahvaltısı, özellikle hafta sonları çeşitli peynirler, zeytinler, köy tereyağı ve sarmalarla dolu menüsüyle büyük ilgi görmektedir.',
        'conclusion_title' => 'Sonuç',
        'conclusion_content' => 'İstanbul\'daki Hatay restoranları, coğrafya, göç ve yemek kültürü arasındaki bağın başarılı bir örneğidir. Bu restoranlar sadece yemek değil, aynı zamanda bir bölgenin kimliğini ve geleneğini de başkente taşımış ve İstanbulluların çeşitli zevkleri arasında kendine yer bulmayı başarmıştır. Bu başarı, yerel mutfakların büyük şehirlerde küreselleşme potansiyelini göstermektedir.',
        'conclusion_quote' => 'Hatay, her zeytin tanesinde, her içli köftede, güneş ve baharat diyarının hikâyesini anlatır.',
        'footer_text' => 'İstanbul Hatay Restoranlarının Coğrafi Analizi',
        'footer_source' => 'Kaynak: Saha verileri ve yerel kaynaklar',
        'copyright' => '© 2023 - Uluslararası düzeyde bir makale sunumu için tasarlandı',
        'lang_switcher' => 'Dil:',
        'back_tooltip' => 'Ayasofya'
    ],
    
    'en' => [
        'lang_code' => 'en',
        'dir' => 'ltr',
        'title' => 'Geographical Location Analysis of Hatay Restaurants in Istanbul',
        'meta_description' => 'Analysis of the impact of migration from Hatay to Istanbul, unique ingredients, and Antakya culinary culture on the formation and popularity of Hatay restaurants in Istanbul',
        'header_title' => 'Analysis of the Role of Geographical Location in the Formation and Success of Hatay Restaurants in Istanbul',
        'header_subtitle' => 'Restaurants like Hatay Sofrası, offering authentic Hatay (Antakya) cuisine—a synthesis of Turkish, Arab, and Armenian cultures—have become some of the most beloved dining spots in Istanbul.',
        'abstract_title' => 'Abstract',
        'abstract_content' => 'Hatay restaurants in Istanbul, particularly brands like Hatay Sofrası and Hatay Medeniyetler Sofrası, are successful examples of the impact of internal migration on the food industry. Due to its geographical location on the Syrian border, Hatay has hosted various civilizations and developed Turkey\'s richest culinary culture. This article analytically examines the role of Hatay migration to Istanbul, the use of unique ingredients (olives, pomegranate, sumac, künefe cheese, local butter), and the reception of these flavors by Istanbulites.',
        'stats' => [
            'branches' => '10+',
            'dishes' => '200+',
            'years' => '35+',
            'rating' => '4.7'
        ],
        'stats_labels' => [
            'branches' => 'Branches in Istanbul',
            'dishes' => 'Dishes',
            'years' => 'Years of Experience',
            'rating' => 'Rating'
        ],
        'introduction_title' => 'Introduction',
        'introduction_content' => 'Hatay (Antakya), one of the world\'s oldest settlements, boasts a rich and unique culinary heritage. Its location on the Silk Road and its history of hosting diverse ethnic groups (Turks, Arabs, Armenians, Jews) have created a varied and spicy cuisine. In recent decades, mass migration from Hatay to Istanbul led to the opening of restaurants that brought these flavors to the former Ottoman capital. By preserving authenticity and sourcing ingredients directly from the region, Hatay restaurants have carved a special place among Istanbulites.',
        'geographical_title' => 'Geographical Location of Hatay and Its Influence on Cuisine',
        'geographical_content' => 'Hatay is located at Turkey\'s southernmost point, on the Mediterranean coast. The Mediterranean climate, with mild winters and hot summers, provides ideal conditions for growing olives, pomegranates, citrus fruits, and various vegetables. Its proximity to Syria and Arab culture has led to the widespread use of spices such as sumac, cumin, mint, and Aleppo pepper. This climatic and cultural diversity is directly reflected in Hatay dishes like kibbeh, bi\'tibet, zahter salad, künefe, and various local kebabs.',
        'highlight_box_title' => 'A Paradise of Flavors',
        'highlight_box_content' => 'Hatay cuisine blends sour, spicy, and fatty tastes. The use of pomegranate molasses, sumac, local butter, and region-specific olives distinguishes it from other Turkish cuisines.',
        'natural_access_title' => 'Role of Access to Unique Ingredients',
        'natural_access_content' => 'The success of Hatay restaurants in Istanbul relies on daily shipments of ingredients from the Hatay region. Cherry olives, Hatay peppers, mountain mint, handmade spices, and künefe cheese create flavors unattainable in Istanbul. Some restaurants even import their special breads (Bisi, Şıllım) directly from bakeries in Antakya.',
        'human_access_title' => 'Role of Knowledge from Hatay Migrants and Women',
        'human_access_content' => 'Many Hatay-specific recipes have been passed down through generations in home kitchens. Hatay women who migrated to Istanbul brought this knowledge with them and applied it in restaurant kitchens. In some restaurants, meals are still cooked by Hatay women, guaranteeing authenticity and quality.',
        'location_title' => 'Location of Hatay Restaurants in Istanbul',
        'location_content' => 'Most Hatay restaurants are concentrated in neighborhoods where Hatay migrants settled: Aksaray in Fatih, Merdivenköy in Göztepe, and Bağcılar. With increasing popularity, branches have also opened in more upscale areas like Beşiktaş and Nişantaşı. The restaurants are generally located near public transport, making them easily accessible.',
        'quote' => 'Hatay is not just a city but a food culture; Istanbul is fortunate to host this culture within its heart.',
        'historical_title' => 'History of Hatay Restaurants in Istanbul',
        'timeline' => [
            [
                'year' => '1987',
                'content' => 'The first Hatay restaurant, "Hatay Sofrası," was opened by a Hatay family in Aksaray. The menu featured 30 local dishes.'
            ],
            [
                'year' => '1999',
                'content' => 'After the Marmara Earthquake, a new wave of migration from Hatay to Istanbul occurred, increasing the number of Hatay restaurants.'
            ],
            [
                'year' => '2005',
                'content' => 'The "Hatay Medeniyetler Sofrası" brand launched with a broader concept and over 100 dishes.'
            ],
            [
                'year' => '2015',
                'content' => 'Branches spread to both the European and Asian sides of Istanbul; Hatay cuisine became recognized throughout the city.'
            ],
            [
                'year' => '2023',
                'content' => 'Following the major earthquakes centered in Kahramanmaraş, a new migration wave from Hatay; Hatay restaurants became cultural and emotional havens.'
            ]
        ],
        'prosperity_title' => 'Role of Hatay Restaurants in Istanbul\'s Contemporary Food and Culture Scene',
        'prosperity_content' => 'Hatay restaurants have become important destinations for culinary tourists in Istanbul. Many local and international visitors come to these restaurants to experience different flavors. Furthermore, they serve as gathering places for migrant Hatay communities, helping preserve their cultural identity. Dishes like kibbeh, stuffed vine leaves, pomegranate molasses olive paste, and künefe have become recognized throughout the city.',
        'spatial_title' => 'Spatial Organization of Hatay Restaurants and Their Relationship with the Environment',
        'spatial_content' => 'Many Hatay restaurants feature a simple, unpretentious decor reminiscent of traditional Antakya homes. Copper utensils, stone or brick walls, and warm lighting create an intimate atmosphere. Some branches include a bakery section where local breads (Bisi, Şıllım) are baked.',
        'spatial_highlight_title' => 'The Hatay Table',
        'spatial_highlight_content' => 'Serving dishes on large copper trays for communal eating is a Hatay tradition preserved in these restaurants. This serving style enhances the sense of community and intimacy.',
        'today_title' => 'Current Role of Hatay Restaurants in Culinary Tourism',
        'today_content' => 'Today, Hatay restaurants appear in the recommendation lists of respected guides like Michelin and Timeout Istanbul. Hatay cuisine is recognized as one of Turkey\'s richest and most diverse regional cuisines, and its restaurants remain popular despite intense competition. The Hatay breakfast, with its variety of cheeses, olives, local butter, and stuffed leaves, is especially crowded on weekends.',
        'conclusion_title' => 'Conclusion',
        'conclusion_content' => 'Hatay restaurants in Istanbul are a successful example of the link between geography, migration, and food culture. They have brought not only food but also the identity and tradition of a region to the metropolis, finding a place among Istanbul\'s diverse tastes. This success demonstrates the potential of local cuisines to globalize within large cities.',
        'conclusion_quote' => 'Hatay tells the story of a land of sun and spice in every olive, every bite of kibbeh.',
        'footer_text' => 'Geographical Analysis of Hatay Restaurants Istanbul',
        'footer_source' => 'Source: Field data and local sources',
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
            background: linear-gradient(rgba(120, 63, 4, 0.85), rgba(85, 45, 3, 0.9)), 
                        url('https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
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
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M20,20 L80,20 L80,80 L20,80 Z" fill="none" stroke="%23D4A373" stroke-width="2" stroke-dasharray="5,5"/></svg>');
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
            background-color: #8B4513;
            color: white;
        }
        
        .restaurant-icon {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 30px 0;
            color: #D4A373;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #8B4513, #C79A6B, #D4A373);
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #8B4513, #C79A6B);
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
            color: #8B4513;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #8B4513, #C79A6B);
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
            background: linear-gradient(to bottom, #8B4513, #C79A6B, #8B4513);
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>, #8B4513, #6B4226);
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
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M30,30 Q50,10 70,30 T90,50 Q70,70 50,90 T30,70 Q10,50 30,30 Z" fill="none" stroke="%23D4A373" stroke-width="0.5" opacity="0.2"/></svg>');
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
            color: #8B4513;
        }
        
        /* دکمه بازگشت */
        .back-button {
            position: fixed;
            bottom: 30px;
            <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 30px;
            background: linear-gradient(135deg, #8B4513, #6B4226);
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
            background: linear-gradient(135deg, #6B4226, #8B4513);
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
            
            .restaurant-icon {
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
        <i class="fas fa-utensil-spoon"></i>
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
        
        <div class="restaurant-icon">
            <i class="fas fa-utensils"></i>
            <i class="fas fa-fire"></i>
            <i class="fas fa-olive"></i>
            <i class="fas fa-pepper-hot"></i>
            <i class="fas fa-bread-slice"></i>
        </div>
    </header>
    
    <div class="container">
        <div class="content-card">
            <h2><i class="fas fa-scroll"></i> <?php echo $current['abstract_title']; ?></h2>
            <p><?php echo $current['abstract_content']; ?></p>
            
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number"><?php echo $current['stats']['branches']; ?></span>
                    <span class="stat-label"><?php echo $current['stats_labels']['branches']; ?></span>
                </div>
                
                <div class="stat-item">
                    <span class="stat-number"><?php echo $current['stats']['dishes']; ?></span>
                    <span class="stat-label"><?php echo $current['stats_labels']['dishes']; ?></span>
                </div>
                
                <div class="stat-item">
                    <span class="stat-number"><?php echo $current['stats']['years']; ?></span>
                    <span class="stat-label"><?php echo $current['stats_labels']['years']; ?></span>
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
            <h2><i class="fas fa-olive"></i> <?php echo $current['natural_access_title']; ?></h2>
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
                <h3><i class="fas fa-utensils"></i> <?php echo $current['spatial_highlight_title']; ?></h3>
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
            
            <div class="quote" style="background: rgba(255, 255, 255, 0.1); color: #D4A373; margin-top: 30px; border-color: #D4A373;">
                <?php echo $current['conclusion_quote']; ?>
            </div>
        </div>
        
        <footer>
            <p><?php echo $current['footer_text']; ?></p>
            <p><?php echo $current['footer_source']; ?></p>
            
            <div class="footer-icons">
                <i class="fas fa-utensils"></i>
                <i class="fas fa-olive"></i>
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
```