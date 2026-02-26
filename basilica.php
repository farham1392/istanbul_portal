<?php
// basilica.php - تحلیل جامع مخزن باسیلیکا (Basilica Cistern)
// مدیریت زبان
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'fa';

// تنظیم هدر برای کدگذاری کاراکترها
header('Content-Type: text/html; charset=utf-8');

// اطلاعات کامل مخزن باسیلیکا به سه زبان
$content = [
    'fa' => [
        'lang_code' => 'fa',
        'dir' => 'rtl',
        'title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری و کارکرد مخزن باسیلیکا (یرباتان)',
        'meta_description' => 'تحلیل تأثیر موقعیت جغرافیایی، منابع آب و مهندسی بیزانس بر ساخت، توسعه و جایگاه امروزی مخزن باسیلیکا استانبول',
        'header_title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری، توسعه و کارکرد مخزن باسیلیکا استانبول',
        'header_subtitle' => 'مخزن باسیلیکا (یرباتان سارنیجی) یکی از بزرگ‌ترین و خوش‌ترین آب‌انبارهای سرپوشیده باستانی استانبول است که در سده ششم میلادی به دستور ژوستینین یکم برای تأمین آب کاخ بزرگ و بناهای پیرامون ساخته شد.',
        'abstract_title' => 'چکیده',
        'abstract_content' => 'مخزن باسیلیکا، واقع در قلب شبه‌جزیره تاریخی استانبول، نمونه‌ای شاخص از مهندسی بیزانس و زیرساخت شهری است. ساخت آن در عصر ژوستینین یکم با بهره‌گیری از موقعیت راهبردی شهر، منابع آب پیرامون و میراث معماری رومی صورت گرفت. این مقاله با رویکردی تحلیلی، عوامل جغرافیایی، سامانه آبرسانی، سازمان فضایی و تبدیل این آب‌انبار از یک تأسیسات صرفاً کاربردی به یکی از مهم‌ترین میراث‌های فرهنگی و جاذبه‌های گردشگری استانبول را بررسی می‌کند.',
        'stats' => [
            'columns' => '۳۳۶+',
            'capacity' => '۸۰٬۰۰۰+',
            'years' => '۱۵۰۰+',
            'visitors' => '۱۰٬۰۰۰+'
        ],
        'stats_labels' => [
            'columns' => 'ستون مرمری',
            'capacity' => 'گنجایش (متر مکعب)',
            'years' => 'سال تاریخچه',
            'visitors' => 'بازدیدکننده روزانه'
        ],
        'introduction_title' => 'مقدمه',
        'introduction_content' => 'مخزن باسیلیکا که به نام یرباتان (زمین فرو رفته) نیز شناخته می‌شود، در دوران امپراتوری روم شرقی (بیزانس) و در حدود سال ۵۳۲ میلادی ساخته شد. این سازه عظیم زیرزمینی با ۱۴۰ متر درازا و ۷۰ متر پهنا، گنجایشی نزدیک به ۸۰٬۰۰۰ متر مکعب آب داشته است. آب مورد نیاز از طریق قنات والنس و سایر آبراهه‌ها از جنگل بلگراد تأمین می‌شد و پس از تصفیه، در اختیار کاخ بزرگ امپراتوران و مراکز مهم شهر قرار می‌گرفت. مخزن باسیلیکا نه تنها یک شاهکار مهندسی، بلکه نمادی از پیوند جغرافیا، سیاست و فناوری در جهان پیشامدرن است.',
        'geographical_title' => 'موقعیت جغرافیایی استانبول و تأثیر آن بر مخزن',
        'geographical_content' => 'استانبول به دلیل قرارگیری در میان دو قاره و بر سر تنگه بسفر، همواره از اهمیت سوقالجیشی برخوردار بوده، اما مسئله تأمین آب شیرین برای جمعیت رو به رشد آن چالشی اساسی بود. موقعیت شهر در نزدیکی جنگل‌های بلگراد و شیب طبیعی زمین امکان احداث قنات‌های طولانی را فراهم کرد. مخزن باسیلیکا در پست‌ترین نقطه منطقه سلطان‌احمد ساخته شد تا آب به‌راحتی از قنات‌ها به درون آن جریان یابد.',
        'highlight_box_title' => 'شاهکار مهندسی آب بیزانس',
        'highlight_box_content' => 'مخزن باسیلیکا نشان‌دهنده اوج دانش هیدرولیک بیزانسی است؛ آبی که از بیش از ۲۰ کیلومتر دورتر از طریق قنات‌ها آورده می‌شد، در این فضای ستون‌دار ذخیره و سپس توزیع می‌گشت.',
        'natural_access_title' => 'نقش دسترسی‌های طبیعی و منابع آب',
        'natural_access_content' => 'جنگل بلگراد با بارش فراوان و جریان‌های دائمی، منبع اصلی آب استانبول بود. قنات والنس (بوزدوغان) که در سده چهارم میلادی ساخته شد، آب را به منطقه تپه‌های شهر می‌رساند و از آنجا با شبکه‌ای از لوله‌های سفالی و سربی به مخازن توزیع می‌کرد. وجود سفره‌های زیرزمینی نیز بر ژرفا و ساختار مخزن باسیلیکا تأثیر مستقیم گذاشت.',
        'human_access_title' => 'نقش دانش فنی و معماری انسانی',
        'human_access_content' => 'مهندسان بیزانس با بهره‌گیری از مصالح بازیافتی – از جمله ستون‌های معابد پیشین رومی – ۳۳۶ ستون مرمرین را در ۱۲ ردیف منظم برپا کردند. سرستون‌های معروف مدوسا که به‌صورت وارونه و خوابیده در دو گوشه شمال‌غربی قرار گرفته‌اند، نمونه‌ای از تلفیق اساطیر یونانی با معماری کاربردی است. ملات ضدآب و طاق‌های آجری نیز پایداری سازه را برای پانزده قرن تضمین کرده است.',
        'location_title' => 'موقعیت مکانی مخزن در بافت شهری',
        'location_content' => 'مخزن باسیلیکا در جنوب‌غربی ایاصوفیه، در منطقه سلطان‌احمد و در زیر «استوای باسیلیکا» (بازار ستون‌دار عمومی) قرار داشت. این موقعیت مرکزی، دسترسی سریع کاخ بزرگ، هیپودروم و ایاصوفیه به آب پالوده را ممکن می‌ساخت. امروزه ورودی مخزن در خیابان یرباتان واقع است و با گذر از پله‌های سنگی می‌توان به فضای اسرارآمیز آن وارد شد.',
        'quote' => 'مخزن باسیلیکا تنها یک آب‌انبار کهن نیست؛ کلیسای خاموش ستون‌هاست که نبوغ و بلندپروازی تمدن بیزانس را بازمی‌تاباند.',
        'historical_title' => 'تأثیر عوامل جغرافیایی بر توسعه تاریخی مخزن',
        'timeline' => [
            [
                'year' => '۵۳۲-۵۴۲ میلادی',
                'content' => 'ساخت مخزن باسیلیکا به فرمان ژوستینین یکم آغاز شد. ستون‌ها و سرستون‌های مرمری از بناهای کهن رومی و آناتولی گردآوری و در ۱۲ ردیف چیده شدند.'
            ],
            [
                'year' => 'قرن ۱۶ میلادی',
                'content' => 'پس از فتح قسطنطنیه، مخزن همچنان برای آبرسانی به توپکاپی استفاده می‌شد، اما دانش آن در میان عامه کمرنگ شد. جهانگردان اروپایی در سفرنامه‌های خود از «کاخ زیرزمینی» یاد کرده‌اند.'
            ],
            [
                'year' => '۱۹۸۵-۱۹۸۸ میلادی',
                'content' => 'شهرداری استانبول عملیات پاکسازی گسترده، نصب کف‌پوش و سکوهای چوبی و روشنایی مدرن را به انجام رساند و مخزن را به روی عموم گشود.'
            ],
            [
                'year' => 'امروز',
                'content' => 'مخزن باسیلیکا یکی از پربازدیدترین موزه‌های استانبول است و میزبان رویدادهای فرهنگی، کنسرت‌ها و نمایشگاه‌های هنری بین‌المللی می‌باشد.'
            ]
        ],
        'prosperity_title' => 'نقش مخزن در شبکه آبرسانی شهری',
        'prosperity_content' => 'در کنار ده‌ها مخزن دیگر (مانند فیلوکسینوس، تئودوسیوس)، مخزن باسیلیکا بخش حیاتی سیستم آبرسانی قسطنطنیه بود. این مخزن در دوران محاصره‌ها و خشکسالی‌ها، امنیت آبی قصر امپراتور و محله‌های اطراف را تضمین می‌کرد و نمادی از قدرت و ماندگاری دولت به‌شمار می‌رفت.',
        'spatial_title' => 'سازمان فضایی مخزن و ارتباط آن با محیط جغرافیایی',
        'spatial_content' => 'پلان مستطیل‌شکل مخزن با زاویه کمی از شمال به جنوب امتداد یافته و از شیب طبیعی زمین پیروی می‌کند. ستون‌ها با فواصل ۸/۴ متری، طاق‌های آجری و سقف گنبدی‌شکل را نگه داشته‌اند. انعکاس نور بر سطح آب و ردیف‌های بی‌پایان ستون‌ها، فضایی رؤیایی و عمیقاً جغرافیایی پدید آورده است.',
        'spatial_highlight_title' => 'طراحی هوشمندانه',
        'spatial_highlight_content' => 'استفاده از ملات ضدآب، چیدمان ستون‌ها به‌گونه‌ای که فشار را به�طور یکنواخت توزیع کند، و کاربرد هنرمندانه سرستون‌های مدوسا، از جمله ویژگی‌هایی است که مخزن باسیلیکا را به اثری بی‌نظیر در تاریخ معماری جهان تبدیل کرده است.',
        'today_title' => 'جایگاه امروزی مخزن باسیلیکا در گردشگری و فرهنگ',
        'today_content' => 'امروزه مخزن باسیلیکا با جذب سالانه میلیون‌ها بازدیدکننده، به یکی از نمادهای چندلایه تاریخی استانبول بدل شده است. نورپردازی مدرن، ماهی‌های شناور، و صدای چکیدن قطرات آب، فضایی عرفانی خلق می‌کند. نمایشگاه‌های هنری مانند «قطره‌های روشن» نیز به غنای فرهنگی آن افزوده است.',
        'conclusion_title' => 'نتیجه‌گیری',
        'conclusion_content' => 'مخزن باسیلیکا نمونه‌ای درخشان از پیوند جغرافیا، مهندسی و تاریخ است. بقای آن طی پانزده قرن نه تنها مرهون استحکام سازه، بلکه حاصل سازگاری با بستر طبیعی و پاسخ به نیازهای انسانی است. امروز این مکان از یک تأسیسات زیربنایی به میراثی زنده و جاذبه‌ای جهانی بدل گشته که داستان آب، سنگ و نور را روایت می‌کند.',
        'conclusion_quote' => 'مخزن باسیلیکا شاهد خاموش پانزده قرن تاریخ استانبول است؛ جایی که آب، سنگ و نور در هم می‌آمیزند تا از تاب‌آوری و خلاقیت انسان سخن بگویند.',
        'footer_text' => 'تحلیل جغرافیایی مخزن باسیلیکا - یرباتان سارنیجی',
        'footer_source' => 'منبع: داده‌های تاریخی و باستان‌شناسی استانبول',
        'copyright' => '© ۲۰۲۳ - طراحی شده برای ارائه مقاله‌ای در سطح بین‌المللی',
        'lang_switcher' => 'زبان:',
        'back_tooltip' => 'ایاصوفیه'
    ],
    
    'tr' => [
        'lang_code' => 'tr',
        'dir' => 'ltr',
        'title' => 'Yerebatan Sarnıcı\'nın Coğrafi Konum Analizi',
        'meta_description' => 'Yerebatan Sarnıcı\'nın inşası, gelişimi ve günümüzdeki işlevinde coğrafi konum, su kaynakları ve Bizans mühendisliğinin etkisi',
        'header_title' => 'Yerebatan Sarnıcı\'nın Oluşumu, Gelişimi ve İşleyişinde Coğrafi Konumun Rolünün Analizi',
        'header_subtitle' => 'Yerebatan Sarnıcı (Basilika Sarnıcı), İstanbul\'un en büyük ve en iyi korunmuş antik yer altı sarnıçlarından biridir. MS 6. yüzyılda İmparator I. Justinianus tarafından Büyük Saray ve çevresindeki yapıların su ihtiyacını karşılamak üzere inşa edilmiştir.',
        'abstract_title' => 'Özet',
        'abstract_content' => 'Yerebatan Sarnıcı, İstanbul\'un tarihi yarımadasının kalbinde yer alan, Bizans mühendisliği ve kentsel altyapısının dikkat çekici bir örneğidir. I. Justinianus döneminde inşa edilen sarnıç, kentin stratejik coğrafi konumundan, çevredeki su kaynaklarından ve Roma mimari mirasından yararlanılarak yapılmıştır. Bu makale, coğrafi faktörlerin, su tedarik sistemlerinin, mekânsal organizasyonun ve sarnıcın faydacı bir su deposundan önemli bir kültürel miras ve turistik cazibe merkezine dönüşümünü analitik bir yaklaşımla incelemektedir.',
        'stats' => [
            'columns' => '336+',
            'capacity' => '80.000+',
            'years' => '1500+',
            'visitors' => '10.000+'
        ],
        'stats_labels' => [
            'columns' => 'Mermer Sütun',
            'capacity' => 'Kapasite (m³)',
            'years' => 'Yıllık Tarih',
            'visitors' => 'Günlük Ziyaretçi'
        ],
        'introduction_title' => 'Giriş',
        'introduction_content' => 'Yerebatan Sarnıcı, Bizans İmparatorluğu döneminde, yaklaşık MS 532 yılında inşa edilmiştir. 140 metre uzunluğunda ve 70 metre genişliğindeki bu devasa yeraltı yapısı yaklaşık 80.000 metreküp su kapasitesine sahiptir. Su, Belgrad Ormanı\'ndan Valens Su Kemeri ve diğer kanallar aracılığıyla getirilmiş, sarnıçta depolandıktan sonra imparatorluk sarayına ve önemli kamu binalarına dağıtılmıştır. Yerebatan, yalnızca bir mühendislik harikası değil, aynı zamanda coğrafya, siyaset ve teknolojinin iç içe geçtiği bir simgedir.',
        'geographical_title' => 'İstanbul\'un Coğrafi Konumu ve Sarnıca Etkisi',
        'geographical_content' => 'İstanbul, iki kıta arasındaki stratejik konumu nedeniyle her zaman önemli bir merkez olmuştur, ancak artan nüfus için tatlı su temini ciddi bir sorundu. Şehrin Belgrad Ormanı\'na yakınlığı ve doğal eğim, uzun su kemerlerinin inşasını mümkün kılmıştır. Yerebatan Sarnıcı, Sultanahmet bölgesinin en alçak noktasına inşa edilerek suyun kemerlerden kolayca akması sağlanmıştır.',
        'highlight_box_title' => 'Bizans Hidrolik Mühendisliğinin Başyapıtı',
        'highlight_box_content' => 'Yerebatan Sarnıcı, Bizans su yönetiminin zirvesini temsil eder; 20 kilometreden fazla mesafeden kemerlerle getirilen su, bu sütunlu mekânda depolanır ve dağıtılırdı.',
        'natural_access_title' => 'Doğal Su Kaynaklarının Rolü',
        'natural_access_content' => 'Belgrad Ormanı, bol yağışı ve kalıcı akarsularıyla İstanbul\'un ana su kaynağıydı. MS 4. yüzyılda inşa edilen Valens Kemeri (Bozdoğan Kemeri), suyu kent tepelerine taşır ve oradan pişmiş toprak ve kurşun borularla sarnıçlara ulaştırırdı. Yeraltı su seviyesi de sarnıcın derinliğini ve yapısını doğrudan etkilemiştir.',
        'human_access_title' => 'İnsan Becerisi ve Mimari Tekniklerin Rolü',
        'human_access_content' => 'Bizans mühendisleri, önceki Roma yapılarından devşirilmiş malzemelerle – 336 mermer sütun – 12 düzenli sıra oluşturdular. Kuzeybatı köşesinde ters ve yan duran ünlü Medusa başlıkları, Yunan mitolojisi ile işlevsel mimarinin birleşimini sergiler. Su geçirmez harç ve tuğla tonozlar, yapının on beş yüzyıl boyunca ayakta kalmasını sağlamıştır.',
        'location_title' => 'Yerebatan Sarnıcı\'nın Kentsel Dokudaki Konumu',
        'location_content' => 'Sarnıç, Ayasofya\'nın güneybatısında, Sultanahmet Meydanı yakınında ve antik Basilika Stoası\'nın (sütunlu pazar yeri) altında yer alır. Bu merkezi konum, Büyük Saray, Hipodrom ve Ayasofya\'ya filtrelenmiş suyun hızla ulaşmasını sağlamıştır. Günümüzde sarnıcın girişi Yerebatan Caddesi üzerindedir ve taş merdivenlerden inilerek mistik atmosfere adım atılır.',
        'quote' => 'Yerebatan Sarnıcı yalnızca antik bir su deposu değildir; sütunlardan oluşan sessiz bir katedral gibidir ve Bizans uygarlığının dehasını yansıtır.',
        'historical_title' => 'Coğrafi Faktörlerin Sarnıcın Tarihsel Gelişimine Etkisi',
        'timeline' => [
            [
                'year' => 'MS 532-542',
                'content' => 'I. Justinianus\'un emriyle Yerebatan Sarnıcı\'nın inşası başladı. Mermer sütunlar ve başlıklar eski Roma ve Anadolu yapılarından toplandı ve 12 sıra halinde düzenlendi.'
            ],
            [
                'year' => '16. Yüzyıl',
                'content' => 'İstanbul\'un fethinden sonra sarnıç, Topkapı Sarayı\'na su sağlamaya devam etti, ancak varlığı halk arasında unutulmaya yüz tuttu. Avrupalı seyyahlar seyahatnamelerinde «yeraltı sarayı» olarak bahsettiler.'
            ],
            [
                'year' => '1985-1988',
                'content' => 'İstanbul Büyükşehir Belediyesi tarafından kapsamlı bir temizlik, ahşap yürüyüş yolları ve modern aydınlatma sistemi kurulumu gerçekleştirildi; sarnıç müze olarak ziyarete açıldı.'
            ],
            [
                'year' => 'Günümüz',
                'content' => 'Yerebatan Sarnıcı, İstanbul\'un en çok ziyaret edilen turistik mekânlarından biridir; uluslararası kültürel etkinliklere, konserlere ve sanat sergilerine ev sahipliği yapmaktadır.'
            ]
        ],
        'prosperity_title' => 'Sarnıcın Kentsel Su Şebekesindeki Rolü',
        'prosperity_content' => 'Philoxenos, Theodosius gibi diğer sarnıçlarla birlikte Yerebatan, Konstantinopolis\'in su sisteminin hayati bir parçasıydı. Kuşatmalar ve kuraklıklar sırasında imparatorluk sarayına ve çevre mahallelere su güvencesi sağlamış, devletin gücünün ve sürekliliğinin simgesi olmuştur.',
        'spatial_title' => 'Sarnıcın Mekânsal Organizasyonu ve Coğrafi Çevreyle İlişkisi',
        'spatial_content' => 'Dikdörtgen planlı sarnıç, kuzey-güney doğrultusunda hafif bir açıyla uzanır ve doğal arazi eğimini takip eder. Sütunlar 4.80 metre aralıklarla yerleştirilmiş, tuğla tonozları ve kubbeli tavanı taşımaktadır. Su yüzeyindeki ışık yansımaları ve sonsuz sütun sıraları, derin coğrafi ve rüya gibi bir atmosfer yaratır.',
        'spatial_highlight_title' => 'Akıllı Tasarım',
        'spatial_highlight_content' => 'Su geçirmez harç kullanımı, sütunların basıncı eşit dağıtacak şekilde düzenlenmesi ve Medusa başlıklarının sanatsal yerleştirilmesi, Yerebatan Sarnıcı\'nı dünya mimarlık tarihinde eşsiz bir konuma taşımıştır.',
        'today_title' => 'Yerebatan Sarnıcı\'nın Günümüz Turizm ve Kültürdeki Yeri',
        'today_content' => 'Günümüzde Yerebatan Sarnıcı, yılda milyonlarca ziyaretçi çekerek İstanbul\'un çok katmanlı tarihinin simgelerinden biri haline gelmiştir. Modern aydınlatma, yüzen balıklar ve damlayan suyun sesi mistik bir ortam oluşturmaktadır. «Aydınlık Damlalar» gibi sanat sergileri kültürel zenginliğine katkıda bulunmaktadır.',
        'conclusion_title' => 'Sonuç',
        'conclusion_content' => 'Yerebatan Sarnıcı, coğrafya, mühendislik ve tarihin iç içe geçtiği seçkin bir örnektir. On beş yüzyıl boyunca ayakta kalması yalnızca yapısal sağlamlığına değil, aynı zamanda doğal çevreye uyum ve insan ihtiyaçlarına verdiği cevaplara bağlıdır. Bugün bu mekân, altyapı tesisinden yaşayan bir mirasa ve küresel bir cazibe merkezine dönüşerek su, taş ve ışığın hikâyesini anlatmaktadır.',
        'conclusion_quote' => 'Yerebatan Sarnıcı, İstanbul\'un on beş yüzyıllık tarihinin sessiz tanığıdır; su, taş ve ışığın birleştiği, insanın dayanıklılığını ve yaratıcılığını fısıldayan bir mekândır.',
        'footer_text' => 'Yerebatan Sarnıcı\'nın Coğrafi Analizi',
        'footer_source' => 'Kaynak: İstanbul\'un tarihi ve arkeolojik verileri',
        'copyright' => '© 2023 - Uluslararası düzeyde bir makale sunumu için tasarlandı',
        'lang_switcher' => 'Dil:',
        'back_tooltip' => 'Ayasofya'
    ],
    
    'en' => [
        'lang_code' => 'en',
        'dir' => 'ltr',
        'title' => 'Geographical Location Analysis of the Basilica Cistern Istanbul',
        'meta_description' => 'Analysis of the impact of geographical location, water resources, and Byzantine engineering on the construction, development and current role of the Basilica Cistern (Yerebatan) Istanbul',
        'header_title' => 'Analysis of the Role of Geographical Location in the Formation, Development and Functioning of the Basilica Cistern Istanbul',
        'header_subtitle' => 'The Basilica Cistern (Yerebatan Sarnıcı) is one of the largest and best-preserved ancient underground cisterns in Istanbul, built in the 6th century AD by Emperor Justinian I to provide water filtration for the Great Palace and surrounding buildings.',
        'abstract_title' => 'Abstract',
        'abstract_content' => 'The Basilica Cistern, located in the heart of Istanbul\'s historical peninsula, is a remarkable example of Byzantine engineering and urban infrastructure. Its construction under Emperor Justinian I utilized the city\'s strategic geographical position, nearby water sources, and Roman architectural heritage. This article analyzes the geographical factors, water supply systems, spatial organization, and the cistern\'s transformation from a utilitarian water reservoir to a major cultural heritage site and tourist attraction.',
        'stats' => [
            'columns' => '336+',
            'capacity' => '80,000+',
            'years' => '1,500+',
            'visitors' => '10,000+'
        ],
        'stats_labels' => [
            'columns' => 'Marble Columns',
            'capacity' => 'Capacity (m³)',
            'years' => 'Years of History',
            'visitors' => 'Daily Visitors'
        ],
        'introduction_title' => 'Introduction',
        'introduction_content' => 'The Basilica Cistern, also known as Yerebatan Sarayı (Sunken Palace), was constructed around 532 AD under the Byzantine Emperor Justinian I. This massive underground structure, measuring 140 meters by 70 meters, has a storage capacity of approximately 80,000 cubic meters of water. Water was channeled from the Belgrade Forest via the Valens Aqueduct and other conduits, then distributed to the Great Palace and nearby buildings. The cistern is not only an engineering masterpiece but also a symbol of the interplay between geography, politics, and technology in the pre-modern world.',
        'geographical_title' => 'Istanbul\'s Geographical Position and Its Influence on the Cistern',
        'geographical_content' => 'Istanbul\'s strategic location between two continents has always given it geopolitical significance, but supplying fresh water to its growing population was a persistent challenge. The city\'s proximity to the Belgrade Forest and the natural slope of the terrain enabled the construction of long-distance aqueducts. The Basilica Cistern was built at the lowest point of the Sultanahmet area to facilitate gravity-fed water flow from the aqueducts.',
        'highlight_box_title' => 'Masterpiece of Byzantine Hydraulic Engineering',
        'highlight_box_content' => 'The Basilica Cistern exemplifies the advanced water management systems of Constantinople, drawing water from the Belgrade Forest through a network of aqueducts spanning over 20 kilometers.',
        'natural_access_title' => 'Role of Natural Water Sources in the Cistern\'s Construction',
        'natural_access_content' => 'The Belgrade Forest, with its abundant rainfall and perennial streams, was the primary water source for Istanbul. The Valens Aqueduct (Bozdoğan Kemeri), built in the 4th century, carried water to the city hills, from where it was distributed via terracotta and lead pipes to numerous cisterns. The underground water table also directly influenced the cistern\'s depth and structural design.',
        'human_access_title' => 'Role of Human Ingenuity and Architectural Techniques',
        'human_access_content' => 'Byzantine engineers employed recycled materials – 336 marble columns, many taken from earlier Roman temples and buildings – arranged in 12 symmetrical rows. The famous Medusa heads used as column bases (one upside down, one sideways) demonstrate the blending of Greek mythology with functional architecture. Waterproof mortar and brick vaults have ensured the structure\'s stability for fifteen centuries.',
        'location_title' => 'Location of the Basilica Cistern in the Urban Fabric',
        'location_content' => 'The cistern is located southwest of Hagia Sophia, in the Sultanahmet district, beneath the ancient Stoa Basilica (a public colonnaded market). Its proximity to the Great Palace, Hippodrome, and Hagia Sophia provided a secure and concealed water reservoir for the imperial center. Today, the entrance is on Yerebatan Caddesi, and visitors descend stone steps into the atmospheric hall.',
        'quote' => 'The Basilica Cistern is not merely an ancient water tank; it is a silent cathedral of columns, reflecting the ingenuity and ambition of Byzantine civilization.',
        'historical_title' => 'Impact of Geographical Factors on the Historical Development of the Cistern',
        'timeline' => [
            [
                'year' => '532-542 AD',
                'content' => 'Emperor Justinian I orders the construction of the Basilica Cistern to meet the water demands of the growing capital. It is built using recycled Roman columns and materials from earlier structures.'
            ],
            [
                'year' => '16th Century',
                'content' => 'After the Ottoman conquest, the cistern continues to supply water to Topkapı Palace, but its existence becomes known only to few. Western travelers rediscover it and describe it as the "Underground Palace".'
            ],
            [
                'year' => '1985-1988',
                'content' => 'Major restoration by the Istanbul Metropolitan Municipality cleans the cistern, installs walkways and modern lighting, and opens it to the public as a museum.'
            ],
            [
                'year' => 'Today',
                'content' => 'The Basilica Cistern is one of Istanbul\'s most visited tourist sites, hosting millions of visitors annually, cultural events, concerts, and art installations.'
            ]
        ],
        'prosperity_title' => 'Role of the Cistern in the Urban Water Network',
        'prosperity_content' => 'Along with other cisterns (e.g., Philoxenos, Theodosius), the Basilica Cistern was a vital component of Constantinople\'s water supply system. It ensured water security for the imperial palace and surrounding neighborhoods during sieges and droughts, symbolizing the power and continuity of the state.',
        'spatial_title' => 'Spatial Organization of the Cistern and Its Relationship with the Geographical Environment',
        'spatial_content' => 'The rectangular plan (140m x 70m) follows the natural slope of the land. The forest of 336 columns, each 9 meters high, supports a brick-vaulted ceiling. The columns are spaced at 4.80m intervals, creating a mesmerizing perspective of symmetrical rows. The reflection of light on the water and the rhythmic repetition of columns produce a uniquely atmospheric space deeply connected to its geographical context.',
        'spatial_highlight_title' => 'Intelligent Design',
        'spatial_highlight_content' => 'The cistern\'s design incorporates waterproof brick mortar, columns arranged to distribute load evenly, and the artistic placement of Medusa heads. These features make the Basilica Cistern an unparalleled achievement in the history of world architecture.',
        'today_title' => 'Current Role of the Basilica Cistern in Tourism and Culture',
        'today_content' => 'Today, the Basilica Cistern is not only a major tourist attraction but also a unique venue for concerts, art exhibitions, and cultural events. Its mystical ambiance attracts millions of visitors from around the world. Installations such as "Drops of Light" add contemporary artistic dimensions to this ancient space.',
        'conclusion_title' => 'Conclusion',
        'conclusion_content' => 'The Basilica Cistern stands as a testament to the interplay between geography, engineering, and history. Its enduring legacy over fifteen centuries is due not only to its structural robustness but also to its adaptation to the natural environment and its response to human needs. Today, it has evolved from an infrastructure facility into a living heritage and a global attraction that tells the story of water, stone, and light.',
        'conclusion_quote' => 'The Basilica Cistern is a silent witness to fifteen centuries of Istanbul\'s history, where water, stone, and light converge to tell a story of human resilience and creativity.',
        'footer_text' => 'Geographical Analysis of the Basilica Cistern - Yerebatan Sarnıcı',
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
            background: linear-gradient(135deg, #e8f0f7 0%, #d4e3ed 100%);
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
            background: linear-gradient(rgba(0, 51, 102, 0.8), rgba(2, 64, 89, 0.9)), 
                        url('https://images.unsplash.com/photo-1568480289192-6b8d5e0a3c2a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center 30%;
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
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M20,20 L80,20 L80,80 L20,80 Z" fill="none" stroke="%23A9C9E0" stroke-width="2" stroke-dasharray="5,5"/></svg>');
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
            background-color: #024059;
            color: white;
        }
        
        .cistern-icon {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 30px 0;
            color: #A9C9E0;
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
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 6px solid #024059;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #024059, #3f7e9c, #6fa3c0);
        }
        
        .content-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        h2 {
            color: #024059;
            font-size: 2.5rem;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #b0d4e8;
            position: relative;
        }
        
        h2:after {
            content: '';
            position: absolute;
            bottom: -3px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 0;
            width: 120px;
            height: 3px;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #024059, #3f7e9c);
        }
        
        h3 {
            color: #0a3144;
            font-size: 2rem;
            margin: 35px 0 20px;
            display: flex;
            align-items: center;
        }
        
        h3 i {
            margin-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 15px;
            color: #024059;
            background: #e1ecf4;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #ebf5fa, #d4e7f0);
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 5px solid #3f7e9c;
            padding: 30px;
            border-radius: 15px;
            margin: 30px 0;
            box-shadow: 0 8px 20px rgba(63, 126, 156, 0.15);
            position: relative;
        }
        
        .highlight-box:before {
            content: "💧";
            position: absolute;
            top: -15px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 20px;
            font-size: 2rem;
            color: #3f7e9c;
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
            border-top: 5px solid #024059;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #024059, #3f7e9c);
        }
        
        .stat-number {
            font-size: 2.8rem;
            font-weight: bold;
            color: #024059;
            margin-bottom: 10px;
            display: block;
        }
        
        .stat-label {
            font-size: 1.2rem;
            color: #0a3144;
        }
        
        .quote {
            font-style: italic;
            text-align: center;
            font-size: 1.5rem;
            color: #0a3144;
            padding: 40px;
            margin: 50px 0;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #ebf5fa, #d4e7f0);
            border-radius: 20px;
            position: relative;
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 6px solid #3f7e9c;
            border-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 6px solid #3f7e9c;
        }
        
        .quote:before, .quote:after {
            content: '"';
            font-size: 4rem;
            color: #024059;
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
            background: linear-gradient(to bottom, #024059, #3f7e9c, #024059);
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
            background: #024059;
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
            color: #024059;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        
        .conclusion {
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>, #024059, #0a3144);
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
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M30,30 Q50,10 70,30 T90,50 Q70,70 50,90 T30,70 Q10,50 30,30 Z" fill="none" stroke="%23A9C9E0" stroke-width="0.5" opacity="0.2"/></svg>');
        }
        
        .conclusion h2 {
            color: #FFD966;
            border-bottom-color: #FFD966;
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
            background: #e8f0f7;
            border-radius: 15px;
        }
        
        .footer-icons {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 20px;
            font-size: 1.8rem;
            color: #024059;
        }
        
        /* دکمه بازگشت */
        .back-button {
            position: fixed;
            bottom: 30px;
            <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 30px;
            background: linear-gradient(135deg, #024059, #0a3144);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            box-shadow: 0 6px 15px rgba(2, 64, 89, 0.4);
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .back-button:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 25px rgba(2, 64, 89, 0.6);
            background: linear-gradient(135deg, #0a3144, #024059);
        }
        
        .back-button .tooltip {
            position: absolute;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 70px;
            background: rgba(2, 64, 89, 0.9);
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
            border-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 6px solid rgba(2, 64, 89, 0.9);
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
            
            .cistern-icon {
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
        <i class="fas fa-archway"></i>
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
        
        <div class="cistern-icon">
            <i class="fas fa-water"></i>
            <i class="fas fa-columns"></i>
            <i class="fas fa-fish"></i>
            <i class="fas fa-droplet"></i>
            <i class="fas fa-archway"></i>
        </div>
    </header>
    
    <div class="container">
        <div class="content-card">
            <h2><i class="fas fa-scroll"></i> <?php echo $current['abstract_title']; ?></h2>
            <p><?php echo $current['abstract_content']; ?></p>
            
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number"><?php echo $current['stats']['columns']; ?></span>
                    <span class="stat-label"><?php echo $current['stats_labels']['columns']; ?></span>
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
                <h3><i class="fas fa-trowel"></i> <?php echo $current['highlight_box_title']; ?></h3>
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
            
            <div class="quote" style="background: rgba(255, 255, 255, 0.1); color: #FFD966; margin-top: 30px; border-color: #FFD966;">
                <?php echo $current['conclusion_quote']; ?>
            </div>
        </div>
        
        <footer>
            <p><?php echo $current['footer_text']; ?></p>
            <p><?php echo $current['footer_source']; ?></p>
            
            <div class="footer-icons">
                <i class="fas fa-water"></i>
                <i class="fas fa-columns"></i>
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
                            // حفظ علامت + و ارقام فارسی/لاتین
                            if (originalText.includes('٬') || originalText.includes('۰')) {
                                // برای فارسی: نمایش با اعداد فارسی ساده‌سازی شده
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