<?php
// dolmabahce.php - تحلیل جامع کاخ دلمه‌باغچه (Dolmabahçe Sarayı)
// مدیریت زبان
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'fa';

// تنظیم هدر برای کدگذاری کاراکترها
header('Content-Type: text/html; charset=utf-8');

// اطلاعات کامل کاخ دلمه‌باغچه به سه زبان
$content = [
    'fa' => [
        'lang_code' => 'fa',
        'dir' => 'rtl',
        'title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری و کارکرد کاخ دلمه‌باغچه',
        'meta_description' => 'تحلیل تأثیر موقعیت جغرافیایی، معماری مدرن و تحولات سیاسی عثمانی بر ساخت، توسعه و جایگاه امروزی کاخ دلمه‌باغچه استانبول',
        'header_title' => 'تحلیل نقش موقعیت جغرافیایی در شکل‌گیری، توسعه و کارکرد کاخ دلمه‌باغچه استانبول',
        'header_subtitle' => 'کاخ دلمه‌باغچه (Dolmabahçe Sarayı) نخستین کاخ اروپایی‌نمای عثمانی در کرانه اروپایی بسفر است. این کاخ در میانه سده نوزدهم نماد تجدد، نفوذ غرب و افول تدریجی امپراتوری عثمانی به شمار می‌رود.',
        'abstract_title' => 'چکیده',
        'abstract_content' => 'کاخ دلمه‌باغچه به‌فرمان سلطان عبدالمجید یکم میان سال‌های ۱۸۴۳ تا ۱۸۵۶ در زمینی که پیش‌تر خلیج کوچکی برای لنگرگاه کشتی‌ها بود (دلمه‌باغچه = باغچه‌ای پرشده) ساخته شد. موقعیت آن در کرانه اروپایی بسفر، مشرف به تنگه و دور از تپه‌های تاریخی، گسست عمدی از سنت توپکاپی و چرخش به سوی مدرنیته را نشان می‌داد. این مقاله با رویکردی تحلیلی، عوامل جغرافیایی، سبک معماری تلفیقی، ساختار فضایی و نقش این کاخ در تولد جمهوری ترکیه و جایگاه امروزی آن در گردشگری استانبول را بررسی می‌کند.',
        'stats' => [
            'area' => '۴۵٬۰۰۰+',
            'rooms' => '۲۸۵+',
            'years' => '۱۶۵+',
            'visitors' => '۲۵٬۰۰۰+'
        ],
        'stats_labels' => [
            'area' => 'مساحت (متر مربع)',
            'rooms' => 'اتاق و تالار',
            'years' => 'سال تاریخچه',
            'visitors' => 'بازدیدکننده روزانه'
        ],
        'introduction_title' => 'مقدمه',
        'introduction_content' => 'کاخ دلمه‌باغچه در دوره تنظیمات و همزمان با تلاش عثمانی برای هم‌پایی با اروپا ساخته شد. این کاخ جایگزین کاخ توپکاپی شد و تا پایان خلافت، مرکز اداری و سیاسی امپراتوری بود. معماری آن تلفیقی از باروک، روکوکو، نئوکلاسیک و عناصر سنتی عثمانی است. کاخ دارای سه بخش اصلی: مابین همایون (بخش خصوصی)، سلام‌لک (بخش اداری) و حرم‌سرا است. لوستر کریستال ۴٫۵ تنی تالار مراسم و مجموعه ۱۴۰ متری فرش‌های هِرِکه از شاخصه‌های آن است.',
        'geographical_title' => 'موقعیت جغرافیایی استانبول و تأثیر آن بر کاخ',
        'geographical_content' => 'دلمه‌باغچه در منطقه بشیکتاش، بر کرانه اروپایی بسفر و درست در مقابل کوه‌های آسیا بنا شده است. این موقعیت مسطح و نزدیک به آب، برخلاف کاخ‌های پیشین که بر تپه‌ها استوار بودند، بیانگر تغییر نگاه از درون‌گرایی دفاعی به برون‌گرایی نمایشی و ارتباط با جهان خارج بود. باغ‌های پیرامون کاخ نیز با پر کردن خلیج و خاک‌ریزی ایجاد شدند.',
        'highlight_box_title' => 'پیوند شرق و غرب',
        'highlight_box_content' => 'کاخ دلمه‌باغچه نخستین کاخ عثمانی با پلان اروپایی، تزئینات باروک و در عین حال حرم‌سرایی سنتی است. این دوگانگی آشکار کننده تنش میان سنت و تجدد در عصر تنظیمات است.',
        'natural_access_title' => 'نقش عوامل طبیعی در انتخاب مکان کاخ',
        'natural_access_content' => 'پیش از ساخت کاخ، این منطقه خلیج کوچکی بود که کشتی‌های عثمانی در آن پهلو می‌گرفتند و باغ‌های سلطنتی (باغچه) در آن قرار داشت. در سده هفدهم خلیج به‌تدریج پر شد و نام دلمه‌باغچه (پر شده + باغچه) بر آن نهادند. خاک حاصل از گودبرداری‌های دیگر پروژه‌ها برای تسطیح زمین به کار رفت. نزدیکی به دریا و بادهای خنک بسفر، اقلیم مطبوعی برای اقامت سلطان فراهم می‌کرد.',
        'human_access_title' => 'نقش دانش فنی و معماری غربی',
        'human_access_content' => 'معماران ارمنی‌تبار خانواده بالیان (کاراپت و نیکوغوس بالیان) طراحی و ساخت کاخ را بر عهده داشتند. آنان با سفر به اروپا و مطالعه کاخ‌های ورسای، باواریا و وین، سبکی تلفیقی پدید آوردند. نقاشان ایتالیایی، مجسمه‌سازان فرانسوی و طراحان انگلیسی در تزئینات مشارکت داشتند. نخستین سیستم گرمایش مرکزی، گاز و آسانسور در میان کاخ‌های عثمانی در دلمه‌باغچه نصب شد.',
        'location_title' => 'موقعیت مکانی کاخ در بافت شهری',
        'location_content' => 'کاخ دلمه‌باغچه در منطقه بشیکتاش، میان محله‌های مدرن استانبول و در مجاورت مسجد دلمه‌باغچه و برج ساعت جای گرفته است. ورودی اصلی به سوی بسفر گشوده می‌شود و اسکله مخصوص کشتی‌های سلطنتی در کنار آن است. این کاخ امروزه در امتداد ساحل بسفر و در همسایگی هتل‌ها و موزه‌های مهم واقع شده است.',
        'quote' => 'دلمه‌باغچه حاصل رویای سلطانی است که می‌خواست امپراتوری در حال احتضار را در تالارهای بلورین خود جاودانه سازد.',
        'historical_title' => 'تأثیر عوامل جغرافیایی بر توسعه تاریخی کاخ',
        'timeline' => [
            [
                'year' => '۱۸۴۳-۱۸۵۶ میلادی',
                'content' => 'سلطان عبدالمجید یکم دستور ساخت کاخ جدید را در محل خلیج پر شده صادر کرد. معماران بالیان طی ۱۳ سال کاخ را با هزینه‌ای عظیم به پایان رساندند.'
            ],
            [
                'year' => '۱۸۵۶ میلادی',
                'content' => 'دیوان همایونی به کاخ دلمه‌باغچه منتقل شد. این کاخ تا پایان امپراتوری مرکز حکومت باقی ماند.'
            ],
            [
                'year' => '۱۹۱۸-۱۹۲۲ میلادی',
                'content' => 'آخرین سلطان عثمانی، محمد ششم، در دلمه‌باغچه اقامت داشت. پس از لغو سلطنت، کاخ تخلیه شد.'
            ],
            [
                'year' => '۱۹۳۸ میلادی',
                'content' => 'مصطفی کمال آتاتورک در ۱۰ نوامبر ۱۹۳۸ در این کاخ درگذشت. تمام ساعات کاخ در آن لحظه متوقف شد و هنوز در تالار ۷۱ به وقت ۹:۰۵ ثابت مانده‌اند.'
            ],
            [
                'year' => '۱۹۸۴ میلادی',
                'content' => 'کاخ دلمه‌باغچه به موزه تبدیل شد و برای بازدید عمومی گشوده گردید.'
            ]
        ],
        'prosperity_title' => 'نقش کاخ در شبکه قدرت و اقتصاد اواخر عثمانی',
        'prosperity_content' => 'هزینه ساخت کاخ برابر با ۳۵ تن طلا (حدود ۵ میلیون لیره عثمانی) بار سنگینی بر خزانه وارد کرد و موجب استقراض خارجی و تشدید بحران مالی شد. با این حال کاخ به نماد قدرت نمادین و تلاش برای نمایش برابری با اروپا تبدیل گردید. پذیرایی از سفرا و مراسم تشریفاتی در تالار مراسم با لوستر بزرگ برگزار می‌شد.',
        'spatial_title' => 'سازمان فضایی کاخ و ارتباط آن با محیط جغرافیایی',
        'spatial_content' => 'کاخ دلمه‌باغچه در امتداد ساحل و به‌صورت خطی ساخته شده است تا همه اتاق‌ها و تالارها نمای کامل به بسفر داشته باشند. تالار مراسم (Muayede Salonu) با گنبدی به بلندی ۳۶ متر و سطحی ۲٬۰۰۰ متر مربع، بزرگترین تالار بدون ستون در امپراتوری عثمانی بود. پلکان بلورین با طرح نعل‌اسبی، شاهکار هنر شیشه‌گری و آهنگری است.',
        'spatial_highlight_title' => 'نماد تجدد',
        'spatial_highlight_content' => 'دلمه‌باغچه با الهام از کاخ ورسای و اشتفنس‌کیرشه وین طراحی شد، اما درون‌گرایی حرم‌سرا و ارسی‌های چوبی سنت عثمانی را حفظ کرد. این ترکیب منحصربه‌فرد آن را در میان کاخ‌های جهان متمایز می‌سازد.',
        'today_title' => 'جایگاه امروزی کاخ دلمه‌باغچه در گردشگری و فرهنگ',
        'today_content' => 'کاخ دلمه‌باغچه امروزه یکی از پربازدیدترین موزه‌های استانبول است. بخش‌های حرم‌سرا، سلام‌لک، موزه ساعت، و موزه نقاشی در مجموعه قرار دارند. اتاقی که آتاتورک در آن درگذشت، زیارتگاه ترک‌ها است. مراسم ملی و بین‌المللی گاه در محوطه کاخ برگزار می‌شود.',
        'conclusion_title' => 'نتیجه‌گیری',
        'conclusion_content' => 'کاخ دلمه‌باغچه نمایانگر دگرگونی فرهنگ و معماری عثمانی در مسیر غرب‌گرایی است. موقعیت ساحلی و گسست از توپوگرافی دفاعی گذشته، تغییر نگرش از درون‌نگری به نمایش قدرت را نشان می‌دهد. این کاخ هم‌چنان به‌عنوان میراثی بحث‌برانگیز و در عین حال پرجاذبه، گفتگوی میان سنت و تجدد را در ترکیه امروز تداوم می‌بخشد.',
        'conclusion_quote' => 'دلمه‌باغچه آخرین نفس یک امپراتوری و نخستین گام یک جمهوری بود؛ قصری که در کریستال‌هایش شکوه و انحطاط را هم‌زمان می‌توان دید.',
        'footer_text' => 'تحلیل جغرافیایی کاخ دلمه‌باغچه - Dolmabahçe Sarayı',
        'footer_source' => 'منبع: داده‌های تاریخی و معماری استانبول',
        'copyright' => '© ۲۰۲۳ - طراحی شده برای ارائه مقاله‌ای در سطح بین‌المللی',
        'lang_switcher' => 'زبان:',
        'back_tooltip' => 'ایاصوفیه'
    ],
    
    'tr' => [
        'lang_code' => 'tr',
        'dir' => 'ltr',
        'title' => 'Dolmabahçe Sarayı\'nın Coğrafi Konum Analizi',
        'meta_description' => 'Dolmabahçe Sarayı\'nın inşası, gelişimi ve günümüzdeki işlevinde coğrafi konum, modern mimari ve Osmanlı\'nın batılılaşma sürecinin etkisi',
        'header_title' => 'Dolmabahçe Sarayı\'nın Oluşumu, Gelişimi ve İşleyişinde Coğrafi Konumun Rolünün Analizi',
        'header_subtitle' => 'Dolmabahçe Sarayı, Osmanlı İmparatorluğu\'nun Boğaziçi kıyısında inşa ettiği ilk Avrupai tarzdaki saraydır. 19. yüzyıl ortasında modernleşmenin, Batı etkisinin ve imparatorluğun çöküşünün simgesi haline gelmiştir.',
        'abstract_title' => 'Özet',
        'abstract_content' => 'Dolmabahçe Sarayı, Sultan Abdülmecid\'in emriyle 1843-1856 yılları arasında eski bir koyun doldurulmasıyla elde edilen alanda inşa edilmiştir. Boğaziçi\'nin Avrupa yakasında, tarihi yarımadadaki tepelerden uzak bu konum, Topkapı geleneğinden bilinçli bir kopuşu ve moderniteye yönelişi simgeler. Bu makale, coğrafi faktörlerin, eklektik mimari üslubun, mekânsal yapının ve sarayın Türkiye Cumhuriyeti\'nin doğuşundaki rolü ile günümüz İstanbul turizmindeki yerini analitik bir yaklaşımla incelemektedir.',
        'stats' => [
            'area' => '45.000+',
            'rooms' => '285+',
            'years' => '165+',
            'visitors' => '25.000+'
        ],
        'stats_labels' => [
            'area' => 'Alan (m²)',
            'rooms' => 'Oda ve Salon',
            'years' => 'Yıllık Tarih',
            'visitors' => 'Günlük Ziyaretçi'
        ],
        'introduction_title' => 'Giriş',
        'introduction_content' => 'Dolmabahçe Sarayı, Tanzimat döneminde Osmanlı\'nın Avrupa\'ya ayak uydurma çabalarının bir ürünüdür. Topkapı Sarayı\'nın yerini almış ve hilafetin sonuna kadar imparatorluğun idari ve siyasi merkezi olmuştur. Mimarisi Barok, Rokoko, Neoklasik ve geleneksel Osmanlı unsurlarının sentezidir. Saray üç ana bölümden oluşur: Mabeyn-i Hümâyun (idari bölüm), Harem-i Hümâyun (özel bölüm) ve Veliaht Dairesi. 4,5 tonluk kristal avize ve 140 metrelik Hereke halı koleksiyonu en önemli özelliklerindendir.',
        'geographical_title' => 'İstanbul\'un Coğrafi Konumu ve Saraya Etkisi',
        'geographical_content' => 'Dolmabahçe, Beşiktaş ilçesinde, Boğaziçi\'nin Avrupa kıyısında ve Asya yakasındaki tepelerin tam karşısında yer alır. Düz ve suya yakın bu konum, önceki sarayların tepe hakimiyeti anlayışından farklı olarak içe dönük savunmacılıktan dışa dönük gösterişe ve dünyaya açılmaya geçişi yansıtır. Saray bahçeleri de koyun doldurulmasıyla oluşturulmuştur.',
        'highlight_box_title' => 'Doğu ve Batının Birleşimi',
        'highlight_box_content' => 'Dolmabahçe, Avrupa planlı, Barok dekorasyonlu fakat geleneksel bir haremi koruyan ilk Osmanlı sarayıdır. Bu ikilik Tanzimat\'ın gelenek ve modernite arasındaki gerilimini gözler önüne serer.',
        'natural_access_title' => 'Saray Yerinin Seçiminde Doğal Faktörlerin Rolü',
        'natural_access_content' => 'Sarayın inşasından önce bölge, Osmanlı gemilerinin demirlediği küçük bir koy ve padişaha ait has bahçelerdi. 17. yüzyıldan itibaren koy doldurulmaya başlandı ve "Dolmabahçe" adı verildi. Diğer inşaat projelerinden çıkan hafriyat toprağı araziyi düzleştirmekte kullanıldı. Denize yakınlık ve Boğaz\'ın serin rüzgârları padişah için hoş bir iklim sunuyordu.',
        'human_access_title' => 'Batı Mimari Tekniklerinin ve Balyan Ailesinin Rolü',
        'human_access_content' => 'Ermeni asıllı Balyan ailesi mimarları (Karabet ve Nikogos Balyan) sarayın tasarım ve inşasını üstlendi. Avrupa\'ya seyahat ederek Versay, Bavyera ve Viyana saraylarını incelediler ve eklektik bir üslup geliştirdiler. İtalyan ressamlar, Fransız heykeltıraşlar ve İngiliz dekoratörler süslemelere katkıda bulundu. Osmanlı sarayları arasında ilk kez Dolmabahçe\'de merkezi ısıtma, gaz aydınlatması ve asansör kullanıldı.',
        'location_title' => 'Dolmabahçe Sarayı\'nın Kentsel Dokudaki Konumu',
        'location_content' => 'Dolmabahçe Sarayı, Beşiktaş\'ta modern İstanbul semtleri arasında, Dolmabahçe Camii ve Saat Kulesi\'nin yanında yer alır. Ana girişi Boğaz\'a açılır ve yanında padişahın saltanat kayıkları için özel bir iskele bulunur. Günümüzde saray, Boğaz kıyısında oteller ve müzelerle komşudur.',
        'quote' => 'Dolmabahçe, çökmekte olan bir imparatorluğu kristal salonlarında ölümsüzleştirmek isteyen bir sultanın rüyasıdır.',
        'historical_title' => 'Coğrafi Faktörlerin Sarayın Tarihsel Gelişimine Etkisi',
        'timeline' => [
            [
                'year' => '1843-1856',
                'content' => 'Sultan Abdülmecid, doldurulmuş koy üzerinde yeni sarayın inşasını emretti. Balyan mimarları 13 yılda muazzam bir maliyetle sarayı tamamladı.'
            ],
            [
                'year' => '1856',
                'content' => 'Divan-ı Hümayun Dolmabahçe Sarayı\'na taşındı. Saray, imparatorluğun sonuna kadar yönetim merkezi olarak kaldı.'
            ],
            [
                'year' => '1918-1922',
                'content' => 'Son Osmanlı padişahı VI. Mehmed (Vahdettin) Dolmabahçe\'de ikamet etti. Saltanatın kaldırılmasıyla saray boşaltıldı.'
            ],
            [
                'year' => '1938',
                'content' => 'Mustafa Kemal Atatürk, 10 Kasım 1938\'de bu sarayda hayatını kaybetti. Sarayın tüm saatleri o anda durduruldu ve 71 numaralı odada hâlâ 09:05\'i göstermektedir.'
            ],
            [
                'year' => '1984',
                'content' => 'Dolmabahçe Sarayı müzeye dönüştürüldü ve halka açıldı.'
            ]
        ],
        'prosperity_title' => 'Sarayın Geç Osmanlı Güç ve Ekonomi Ağındaki Rolü',
        'prosperity_content' => 'Sarayın inşası 35 ton altına (yaklaşık 5 milyon Osmanlı lirası) mal olarak hazineye ağır bir yük getirmiş ve dış borçlanmayı hızlandırmıştır. Bununla birlikte saray, Batı ile eşitlik çabasının sembolü haline geldi. Büyük kristal avizeli Muayede Salonu\'nda elçi kabulleri ve törenler düzenleniyordu.',
        'spatial_title' => 'Sarayın Mekânsal Organizasyonu ve Coğrafi Çevreyle İlişkisi',
        'spatial_content' => 'Dolmabahçe Sarayı, tüm odalarının Boğaz manzaralı olması için sahile paralel lineer bir planla inşa edilmiştir. 36 metre yüksekliğinde kubbeli Muayede Salonu 2.000 m² alanıyla Osmanlı\'nın en büyük kolonsuz salonudur. Kristal Merdiven at nalı formuyla cam ve demir işçiliğinin şaheseridir.',
        'spatial_highlight_title' => 'Modernleşmenin Simgesi',
        'spatial_highlight_content' => 'Dolmabahçe, Versay ve Viyana\'daki esinlenmelerle tasarlanmış, ancak harem bölümünün içe dönüklüğü ve geleneksel ahşap pencereler (kafes) Osmanlı kimliğini korumuştur. Bu eşsiz sentez onu dünya sarayları arasında özgün kılar.',
        'today_title' => 'Dolmabahçe Sarayı\'nın Günümüz Turizm ve Kültürdeki Yeri',
        'today_content' => 'Dolmabahçe Sarayı bugün İstanbul\'un en çok ziyaret edilen müzelerinden biridir. Harem, Selamlık, Saat Müzesi ve Resim Müzesi kompleks içinde yer alır. Atatürk\'ün öldüğü oda Türkler için bir ziyaretgâhtır. Zaman zaman ulusal ve uluslararası törenler saray bahçesinde düzenlenir.',
        'conclusion_title' => 'Sonuç',
        'conclusion_content' => 'Dolmabahçe Sarayı, Osmanlı kültür ve mimarisinin Batılılaşma yolunda geçirdiği dönüşümü temsil eder. Sahil konumu ve geçmişin savunma topoğrafyasından kopuş, içe dönüklükten güç gösterisine geçişi işaret eder. Saray, tartışmalı fakat büyüleyici mirasıyla bugün Türkiye\'de gelenek ve modernite arasındaki diyaloğu sürdürmektedir.',
        'conclusion_quote' => 'Dolmabahçe, bir imparatorluğun son nefesi ve bir cumhuriyetin ilk adımıdır; kristallerinde ihtişam ve çöküşü aynı anda izleyebileceğiniz bir saray.',
        'footer_text' => 'Dolmabahçe Sarayı\'nın Coğrafi Analizi',
        'footer_source' => 'Kaynak: İstanbul\'un tarihi ve mimari verileri',
        'copyright' => '© 2023 - Uluslararası düzeyde bir makale sunumu için tasarlandı',
        'lang_switcher' => 'Dil:',
        'back_tooltip' => 'Ayasofya'
    ],
    
    'en' => [
        'lang_code' => 'en',
        'dir' => 'ltr',
        'title' => 'Geographical Location Analysis of Dolmabahçe Palace Istanbul',
        'meta_description' => 'Analysis of the impact of geographical location, modern architecture, and Ottoman political transformation on the construction, development and current role of Dolmabahçe Palace, Istanbul',
        'header_title' => 'Analysis of the Role of Geographical Location in the Formation, Development and Functioning of Dolmabahçe Palace Istanbul',
        'header_subtitle' => 'Dolmabahçe Palace, the first European-style Ottoman palace on the European shore of the Bosphorus, embodies the 19th-century modernization, Western influence, and the gradual decline of the Ottoman Empire.',
        'abstract_title' => 'Abstract',
        'abstract_content' => 'Dolmabahçe Palace was commissioned by Sultan Abdülmecid I between 1843 and 1856 on land reclaimed from a small bay used as an anchorage (dolma = filled, bahçe = garden). Its location on the Bosphorus waterfront, away from the historic hills, signified a deliberate break from the Topkapı tradition and a turn toward modernity. This article analytically examines the geographical factors, the eclectic architectural style, the spatial organization, and the palace’s role in the birth of the Turkish Republic and its current position in Istanbul’s tourism landscape.',
        'stats' => [
            'area' => '45,000+',
            'rooms' => '285+',
            'years' => '165+',
            'visitors' => '25,000+'
        ],
        'stats_labels' => [
            'area' => 'Area (m²)',
            'rooms' => 'Rooms & Halls',
            'years' => 'Years of History',
            'visitors' => 'Daily Visitors'
        ],
        'introduction_title' => 'Introduction',
        'introduction_content' => 'Dolmabahçe Palace was built during the Tanzimat era, reflecting the Ottoman effort to keep pace with Europe. It replaced Topkapı Palace and remained the administrative and political center until the end of the caliphate. Its architecture is a synthesis of Baroque, Rococo, Neoclassical, and traditional Ottoman elements. The palace consists of three main sections: Mabeyn-i Hümâyun (administrative), Harem-i Hümâyun (private), and the Crown Prince’s apartment. The 4.5-ton crystal chandelier and the 140-meter Hereke carpet collection are among its highlights.',
        'geographical_title' => 'Geographical Location of Istanbul and Its Influence on the Palace',
        'geographical_content' => 'Dolmabahçe is situated in the Beşiktaş district on the European shore of the Bosphorus, directly opposite the hills of Asia. This flat, waterside location – unlike the hilltop defensive positions of earlier palaces – reflects a shift from introverted fortification to extroverted display and global engagement. The surrounding gardens were also created by landfilling the bay.',
        'highlight_box_title' => 'Synthesis of East and West',
        'highlight_box_content' => 'Dolmabahçe is the first Ottoman palace with a European plan and Baroque decoration while preserving a traditional harem. This duality reveals the tension between tradition and modernity during the Tanzimat period.',
        'natural_access_title' => 'Role of Natural Factors in the Selection of the Palace Site',
        'natural_access_content' => 'Before the palace, the area was a small bay where Ottoman ships anchored, surrounded by imperial gardens (hasbahçe). From the 17th century onward, the bay was gradually filled; hence the name Dolmabahçe (filled garden). Excavation soil from other construction projects was used for leveling. Proximity to the sea and the cool Bosphorus breezes provided a pleasant climate for the sultan.',
        'human_access_title' => 'Role of Western Architectural Knowledge and the Balyan Family',
        'human_access_content' => 'The Armenian-Turkish Balyan family architects (Karabet and Nikogos Balyan) designed and constructed the palace. They traveled to Europe and studied the palaces of Versailles, Bavaria, and Vienna, developing an eclectic style. Italian painters, French sculptors, and English decorators contributed to the ornamentation. Dolmabahçe was the first Ottoman palace to feature central heating, gas lighting, and an elevator.',
        'location_title' => 'Location of Dolmabahçe Palace in the Urban Fabric',
        'location_content' => 'Dolmabahçe Palace is located in Beşiktaş, surrounded by modern Istanbul neighborhoods, adjacent to the Dolmabahçe Mosque and the Clock Tower. Its main entrance opens to the Bosphorus, and a private quay for imperial caïques lies beside it. Today, the palace is situated along the Bosphorus shoreline, neighboring hotels and museums.',
        'quote' => 'Dolmabahçe is the dream of a sultan who sought to immortalize a dying empire in his crystal halls.',
        'historical_title' => 'Impact of Geographical Factors on the Historical Development of the Palace',
        'timeline' => [
            [
                'year' => '1843-1856 AD',
                'content' => 'Sultan Abdülmecid I ordered the construction of a new palace on the reclaimed bay. The Balyan architects completed it in 13 years at enormous cost.'
            ],
            [
                'year' => '1856',
                'content' => 'The Imperial Council moved to Dolmabahçe Palace. It remained the administrative center until the end of the empire.'
            ],
            [
                'year' => '1918-1922',
                'content' => 'The last Ottoman sultan, Mehmed VI, resided in Dolmabahçe. After the abolition of the sultanate, the palace was evacuated.'
            ],
            [
                'year' => '1938',
                'content' => 'Mustafa Kemal Atatürk died in this palace on November 10, 1938. All clocks in the palace were stopped at that moment; in room 71, they still show 09:05.'
            ],
            [
                'year' => '1984',
                'content' => 'Dolmabahçe Palace was converted into a museum and opened to the public.'
            ]
        ],
        'prosperity_title' => 'Role of the Palace in Late Ottoman Power and Economy',
        'prosperity_content' => 'The construction cost of the palace, equivalent to 35 tons of gold (approximately 5 million Ottoman liras), placed a heavy burden on the treasury and accelerated foreign debt. Nevertheless, the palace became a symbol of the Ottoman quest for parity with Europe. Receptions and ceremonies were held in the Ceremonial Hall beneath the colossal crystal chandelier.',
        'spatial_title' => 'Spatial Organization of the Palace and Its Relationship with the Geographical Environment',
        'spatial_content' => 'Dolmabahçe Palace was built on a linear plan parallel to the shoreline so that all rooms and halls enjoy a Bosphorus view. The Ceremonial Hall (Muayede Salonu), with a 36-meter-high dome and an area of 2,000 m², was the largest column-free hall in the Ottoman Empire. The Crystal Staircase, shaped like a horseshoe, is a masterpiece of glass and ironwork.',
        'spatial_highlight_title' => 'Icon of Modernization',
        'spatial_highlight_content' => 'Inspired by Versailles and Vienna, Dolmabahçe nonetheless retained the introverted harem layout and traditional wooden lattice windows (kafes). This unique synthesis distinguishes it among the world’s palaces.',
        'today_title' => 'Current Role of Dolmabahçe Palace in Tourism and Culture',
        'today_content' => 'Dolmabahçe Palace is one of Istanbul’s most visited museums today. The Harem, Selamlık, Clock Museum, and Painting Museum are part of the complex. The room where Atatürk died is a pilgrimage site for Turks. National and international ceremonies are occasionally held in the palace gardens.',
        'conclusion_title' => 'Conclusion',
        'conclusion_content' => 'Dolmabahçe Palace represents the transformation of Ottoman culture and architecture on the path to Westernization. Its waterfront location and departure from the defensive topography of the past signify a shift from introspection to the display of power. As a controversial yet compelling heritage, it continues the dialogue between tradition and modernity in contemporary Turkey.',
        'conclusion_quote' => 'Dolmabahçe is the last breath of an empire and the first step of a republic; a palace where grandeur and decline can be seen simultaneously in its crystals.',
        'footer_text' => 'Geographical Analysis of Dolmabahçe Palace',
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
            background: linear-gradient(135deg, #f0f8ff 0%, #e6f0fa 100%);
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
            background: linear-gradient(rgba(10, 50, 90, 0.85), rgba(5, 35, 70, 0.9)), 
                        url('https://images.unsplash.com/photo-1604773462380-8cccd74bfa8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
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
            background-color: #0A325A;
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
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 6px solid #0A325A;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #0A325A, #B8860B, #DAA520);
        }
        
        .content-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        h2 {
            color: #0A325A;
            font-size: 2.5rem;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #B0E0E6;
            position: relative;
        }
        
        h2:after {
            content: '';
            position: absolute;
            bottom: -3px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 0;
            width: 120px;
            height: 3px;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #0A325A, #B8860B);
        }
        
        h3 {
            color: #0A2F44;
            font-size: 2rem;
            margin: 35px 0 20px;
            display: flex;
            align-items: center;
        }
        
        h3 i {
            margin-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 15px;
            color: #0A325A;
            background: #E6F0FA;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #E6F0FA, #D4E6F1);
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 5px solid #B8860B;
            padding: 30px;
            border-radius: 15px;
            margin: 30px 0;
            box-shadow: 0 8px 20px rgba(184, 134, 11, 0.15);
            position: relative;
        }
        
        .highlight-box:before {
            content: "💎";
            position: absolute;
            top: -15px;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 20px;
            font-size: 2rem;
            color: #B8860B;
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
            border-top: 5px solid #0A325A;
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
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #0A325A, #B8860B);
        }
        
        .stat-number {
            font-size: 2.8rem;
            font-weight: bold;
            color: #0A325A;
            margin-bottom: 10px;
            display: block;
        }
        
        .stat-label {
            font-size: 1.2rem;
            color: #0A2F44;
        }
        
        .quote {
            font-style: italic;
            text-align: center;
            font-size: 1.5rem;
            color: #0A2F44;
            padding: 40px;
            margin: 50px 0;
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>, #E6F0FA, #D4E6F1);
            border-radius: 20px;
            position: relative;
            border-<?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 6px solid #B8860B;
            border-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 6px solid #B8860B;
        }
        
        .quote:before, .quote:after {
            content: '"';
            font-size: 4rem;
            color: #0A325A;
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
            background: linear-gradient(to bottom, #0A325A, #B8860B, #0A325A);
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
            background: #0A325A;
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
            color: #0A325A;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        
        .conclusion {
            background: linear-gradient(to <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>, #0A325A, #05234A);
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
            background: #f0f8ff;
            border-radius: 15px;
        }
        
        .footer-icons {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 20px;
            font-size: 1.8rem;
            color: #0A325A;
        }
        
        /* دکمه بازگشت */
        .back-button {
            position: fixed;
            bottom: 30px;
            <?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 30px;
            background: linear-gradient(135deg, #0A325A, #05234A);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            box-shadow: 0 6px 15px rgba(10, 50, 90, 0.4);
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .back-button:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 25px rgba(10, 50, 90, 0.6);
            background: linear-gradient(135deg, #05234A, #0A325A);
        }
        
        .back-button .tooltip {
            position: absolute;
            <?php echo $current['dir'] == 'rtl' ? 'right' : 'left'; ?>: 70px;
            background: rgba(10, 50, 90, 0.9);
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
            border-<?php echo $current['dir'] == 'rtl' ? 'left' : 'right'; ?>: 6px solid rgba(10, 50, 90, 0.9);
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
        <i class="fas fa-clock"></i>
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
            <i class="fas fa-fort"></i>
            <i class="fas fa-ship"></i>
            <i class="fas fa-crystal"></i>
            <i class="fas fa-crown"></i>
            <i class="fas fa-clock"></i>
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
            
            <div class="quote" style="background: rgba(255, 255, 255, 0.1); color: #FFD700; margin-top: 30px; border-color: #FFD700;">
                <?php echo $current['conclusion_quote']; ?>
            </div>
        </div>
        
        <footer>
            <p><?php echo $current['footer_text']; ?></p>
            <p><?php echo $current['footer_source']; ?></p>
            
            <div class="footer-icons">
                <i class="fas fa-fort"></i>
                <i class="fas fa-crystal"></i>
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