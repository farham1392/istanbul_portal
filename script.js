// Istanbul Guide - Data and Helper Functions
// Contains sample data and utility functions

// Sample data for the application
const sampleData = {
    // Places data
    places: [
        {
            id: 1,
            name: "ایاصوفیه",
            description: "موزه تاریخی با معماری بیزانس و عثمانی که در ابتدا کلیسا، سپس مسجد و اکنون موزه است. گنبد عظیم و موزائیک‌های طلایی آن دیدنی است.",
            image: "assets/visit-hagia-sophia-museum.jpg",
            rating: 4.8,
            price: "medium",
            category: "historical",
            district: "sultanahmet",
            tags: ["موزه", "معماری", "بیزانس", "عثمانی"],
            coordinates: { lat: 41.0086, lng: 28.9802 },
            hours: "۹:۰۰ صبح تا ۷:۰۰ عصر",
            duration: "۲-۳ ساعت",
            bestTime: "صبح زود",
            address: "سلطان احمد، استانبول"
        },
        {
            id: 2,
            name: "کاخ توپکاپی",
            description: "کاخ سلطنتی عثمانی که برای ۴۰۰ سال اقامتگاه سلاطین بود. شامل حرمسرا، خزانه جواهرات و نمایشگاه‌های مختلف است.",
            image: "https://images.unsplash.com/photo-1598899134739-24c46f58b8c0?w=600&q=80",
            rating: 4.7,
            price: "medium",
            category: "historical",
            district: "sultanahmet",
            tags: ["کاخ", "عثمانی", "موزه", "سلطنتی"],
            coordinates: { lat: 41.0138, lng: 28.9856 },
            hours: "۹:۰۰ صبح تا ۶:۰۰ عصر",
            duration: "۳-۴ ساعت",
            bestTime: "روزهای هفته",
            address: "سلطان احمد، استانبول"
        },
        {
            id: 3,
            name: "مسجد آبی",
            description: "مسجد سلطان احمد با کاشی‌کاری‌های آبی رنگ داخلی که در قرن ۱۷ ساخته شد و هنوز به عنوان عبادتگاه فعال استفاده می‌شود.",
            image: "https://images.unsplash.com/photo-1548013146-72479768bada?w=600&q=80",
            rating: 4.6,
            price: "free",
            category: "mosque",
            district: "sultanahmet",
            tags: ["مسجد", "معماری اسلامی", "تاریخی"],
            coordinates: { lat: 41.0054, lng: 28.9768 },
            hours: "بین اوقات نماز",
            duration: "۱-۲ ساعت",
            bestTime: "بین نمازها",
            address: "سلطان احمد، استانبول"
        },
        {
            id: 4,
            name: "بازار بزرگ",
            description: "یکی از قدیمی‌ترین و بزرگ‌ترین بازارهای سرپوشیده جهان با بیش از ۴۰۰۰ مغازه برای خرید سوغاتی، فرش و صنایع دستی.",
            image: "https://images.unsplash.com/photo-1511735111819-9a3f7709049c?w=600&q=80",
            rating: 4.4,
            price: "low",
            category: "shopping",
            district: "beyoglu",
            tags: ["بازار", "خرید", "سوغاتی", "صنایع دستی"],
            coordinates: { lat: 41.0108, lng: 28.9682 },
            hours: "۹:۰۰ صبح تا ۷:۰۰ عصر",
            duration: "۲-۴ ساعت",
            bestTime: "صبح‌ها",
            address: "بی‌اوغلو، استانبول"
        },
        {
            id: 5,
            name: "برج گالاتا",
            description: "برج قرون وسطایی با چشم‌انداز پانورامای شهر که در قرن ۱۴ ساخته شد و یکی از نمادهای استانبول است.",
            image: "https://images.unsplash.com/photo-1548588627-d6e1f8c76f15?w=600&q=80",
            rating: 4.5,
            price: "medium",
            category: "historical",
            district: "beyoglu",
            tags: ["برج", "منظره", "عکس‌برداری", "تاریخی"],
            coordinates: { lat: 41.0256, lng: 28.9744 },
            hours: "۹:۰۰ صبح تا ۸:۰۰ عصر",
            duration: "۱-۲ ساعت",
            bestTime: "غروب آفتاب",
            address: "بی‌اوغلو، استانبول"
        },
        {
            id: 6,
            name: "کاخ دلما‌باغچه",
            description: "کاخ مجلل دوره عثمانی متأخر با ترکیبی از معماری عثمانی و اروپایی و بزرگترین چلچراغ کریستالی دنیا.",
            image: "https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=600&q=80",
            rating: 4.6,
            price: "medium",
            category: "historical",
            district: "besiktas",
            tags: ["کاخ", "لوکس", "معماری", "عثمانی"],
            coordinates: { lat: 41.0392, lng: 29.0000 },
            hours: "۹:۰۰ صبح تا ۴:۰۰ عصر",
            duration: "۲-۳ ساعت",
            bestTime: "اول وقت",
            address: "بشیکتاش، استانبول"
        }
    ],

    // Hotels data
    hotels: [
        {
            id: 1,
            name: "هیلتون استانبول بوسفروس",
            image: "https://images.unsplash.com/photo-1566073771259-6a8506099945?w=600&q=80",
            rating: 4.9,
            stars: 5,
            price: 2500,
            amenities: ["استخر", "اسپا", "رستوران", "سالن ورزش", "وای‌فای", "پارکینگ"],
            address: "بی‌اوغلو، استانبول",
            description: "هتل لوکس ۵ ستاره با چشم‌انداز بی‌نظیر از بسفر"
        },
        {
            id: 2,
            name: "فورسیزن استانبول",
            image: "https://images.unsplash.com/photo-1564501049418-3c27787d01e8?w=600&q=80",
            rating: 4.8,
            stars: 5,
            price: 3500,
            amenities: ["استخر", "اسپا", "رستوران میشلن", "سالن ورزش", "خدمات کونسیرژ"],
            address: "سلطان احمد، استانبول",
            description: "هتل لوکس در قلب منطقه تاریخی استانبول"
        },
        {
            id: 3,
            name: "رادیسون بلو استانبول",
            image: "https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=600&q=80",
            rating: 4.3,
            stars: 4,
            price: 1200,
            amenities: ["رستوران", "سالن ورزش", "وای‌فای", "صبحانه رایگان"],
            address: "شیشلی، استانبول",
            description: "هتل ۴ ستاره مدرن در مرکز خرید استانبول"
        },
        {
            id: 4,
            name: "ایرا هتل",
            image: "https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=600&q=80",
            rating: 4.5,
            stars: 3,
            price: 600,
            amenities: ["تراس روف", "صبحانه", "وای‌فای", "منظره مسجد آبی"],
            address: "سلطان احمد، استانبول",
            description: "هتل بوتیک با معماری عثمانی و منظره مسجد آبی"
        }
    ],

    // Restaurants data
    restaurants: [
        {
            id: 1,
            name: "رستوران مشتی",
            cuisine: "ترکی، کباب",
            image: "https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&q=80",
            rating: 4.6,
            priceRange: "متوسط (۸۰-۱۵۰ لیر)",
            address: "امینونو، استانبول",
            specialties: ["کباب آدانا", "کوفته", "باقلوا"]
        },
        {
            id: 2,
            name: "رستوران نورتان",
            cuisine: "غذاهای دریایی",
            image: "https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=600&q=80",
            rating: 4.8,
            priceRange: "بالا (۲۰۰-۴۰۰ لیر)",
            address: "کادیکوی، استانبول",
            specialties: ["ماهی سفید", "میگو", "کالاماری"]
        }
    ],

    // Experiences data
    experiences: [
        {
            id: 1,
            name: "تور دریایی بسفر",
            description: "گشت‌زنی بین قاره‌ای بین اروپا و آسیا",
            image: "https://images.unsplash.com/photo-1598899134739-24c46f58b8c0?w=600&q=80",
            duration: "۳ ساعت",
            type: "گروهی",
            price: "از ۱۵۰ لیر",
            badge: "پرطرفدار"
        },
        {
            id: 2,
            name: "کلاس آشپزی ترکی",
            description: "یادگیری پخت کباب و باقلوا از سرآشپز محلی",
            image: "https://images.unsplash.com/photo-1511735111819-9a3f7709049c?w=600&q=80",
            duration: "۴ ساعت",
            type: "خصوصی",
            price: "از ۳۰۰ لیر",
            badge: "جدید"
        }
    ]
};

// Translation data
const translations = {
    fa: {
        title: "استانبول‌گردی",
        search: "جستجو...",
        noResults: "نتیجه‌ای یافت نشد",
        loading: "در حال بارگذاری...",
        attractions: "جاذبه‌ها",
        hotels: "هتل‌ها",
        restaurants: "رستوران‌ها",
        experiences: "تجربه‌ها",
        virtualTour: "تور مجازی",
        itinerary: "برنامه سفر",
        categories: {
            historical: "تاریخی",
            museum: "موزه",
            mosque: "مسجد",
            shopping: "خرید",
            food: "غذا",
            nature: "طبیعت"
        }
    },
    en: {
        title: "Istanbul Guide",
        search: "Search...",
        noResults: "No results found",
        loading: "Loading...",
        attractions: "Attractions",
        hotels: "Hotels",
        restaurants: "Restaurants",
        experiences: "Experiences",
        virtualTour: "Virtual Tour",
        itinerary: "Travel Itinerary",
        categories: {
            historical: "Historical",
            museum: "Museum",
            mosque: "Mosque",
            shopping: "Shopping",
            food: "Food",
            nature: "Nature"
        }
    },
    tr: {
        title: "İstanbul Rehberi",
        search: "Ara...",
        noResults: "Sonuç bulunamadı",
        loading: "Yükleniyor...",
        attractions: "Gezi Alanları",
        hotels: "Otel",
        restaurants: "Restoran",
        experiences: "Deneyimler",
        virtualTour: "Sanal Tur",
        itinerary: "Seyahat Planı",
        categories: {
            historical: "Tarihi",
            museum: "Müze",
            mosque: "Cami",
            shopping: "Alışveriş",
            food: "Yemek",
            nature: "Doğa"
        }
    }
};

// Utility functions
const Utils = {
    // Format price
    formatPrice(price) {
        if (price === 'free') return 'رایگان';
        if (price === 'low') return 'اقتصادی';
        if (price === 'medium') return 'متوسط';
        if (price === 'high') return 'گران';
        return price;
    },

    // Format rating
    formatRating(rating) {
        return rating.toFixed(1);
    },

    // Generate star icons
    generateStars(count, max = 5) {
        let stars = '';
        for (let i = 0; i < max; i++) {
            if (i < Math.floor(count)) {
                stars += '<i class="fas fa-star"></i>';
            } else if (i < count) {
                stars += '<i class="fas fa-star-half-alt"></i>';
            } else {
                stars += '<i class="far fa-star"></i>';
            }
        }
        return stars;
    },

    // Debounce function
    debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    },

    // Throttle function
    throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    },

    // Format date
    formatDate(date) {
        const options = { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            weekday: 'long'
        };
        return new Date(date).toLocaleDateString('fa-IR', options);
    },

    // Format time
    formatTime(minutes) {
        const hours = Math.floor(minutes / 60);
        const mins = minutes % 60;
        
        if (hours === 0) {
            return `${mins} دقیقه`;
        } else if (mins === 0) {
            return `${hours} ساعت`;
        } else {
            return `${hours} ساعت و ${mins} دقیقه`;
        }
    },

    // Get distance between two coordinates (in km)
    getDistance(lat1, lon1, lat2, lon2) {
        const R = 6371; // Earth's radius in km
        const dLat = this.deg2rad(lat2 - lat1);
        const dLon = this.deg2rad(lon2 - lon1);
        const a = 
            Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.cos(this.deg2rad(lat1)) * Math.cos(this.deg2rad(lat2)) * 
            Math.sin(dLon/2) * Math.sin(dLon/2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
        const d = R * c;
        return d;
    },

    deg2rad(deg) {
        return deg * (Math.PI/180);
    },

    // Generate random ID
    generateId() {
        return '_' + Math.random().toString(36).substr(2, 9);
    },

    // Save to localStorage
    saveToStorage(key, data) {
        try {
            localStorage.setItem(key, JSON.stringify(data));
            return true;
        } catch (error) {
            console.error('Error saving to localStorage:', error);
            return false;
        }
    },

    // Load from localStorage
    loadFromStorage(key) {
        try {
            const data = localStorage.getItem(key);
            return data ? JSON.parse(data) : null;
        } catch (error) {
            console.error('Error loading from localStorage:', error);
            return null;
        }
    },

    // Remove from localStorage
    removeFromStorage(key) {
        try {
            localStorage.removeItem(key);
            return true;
        } catch (error) {
            console.error('Error removing from localStorage:', error);
            return false;
        }
    },

    // Copy to clipboard
    copyToClipboard(text) {
        return navigator.clipboard.writeText(text)
            .then(() => true)
            .catch(() => false);
    },

    // Share content
    async shareContent({ title, text, url }) {
        if (navigator.share) {
            try {
                await navigator.share({ title, text, url });
                return true;
            } catch (error) {
                if (error.name !== 'AbortError') {
                    console.error('Error sharing:', error);
                }
                return false;
            }
        } else {
            // Fallback: copy to clipboard
            return this.copyToClipboard(`${title}\n${text}\n${url}`);
        }
    },

    // Get current position
    getCurrentPosition() {
        return new Promise((resolve, reject) => {
            if (!navigator.geolocation) {
                reject(new Error('Geolocation not supported'));
                return;
            }

            navigator.geolocation.getCurrentPosition(
                position => resolve({
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                    accuracy: position.coords.accuracy
                }),
                error => reject(error),
                {
                    enableHighAccuracy: true,
                    timeout: 5000,
                    maximumAge: 0
                }
            );
        });
    },

    // Calculate ETA
    calculateETA(distanceKm, speedKmh = 30) {
        const hours = distanceKm / speedKmh;
        const minutes = Math.round(hours * 60);
        
        if (minutes < 60) {
            return `${minutes} دقیقه`;
        } else {
            const hrs = Math.floor(minutes / 60);
            const mins = minutes % 60;
            return `${hrs} ساعت${mins > 0 ? ` و ${mins} دقیقه` : ''}`;
        }
    },

    // Format currency
    formatCurrency(amount, currency = 'TRY') {
        const formatter = new Intl.NumberFormat('fa-IR', {
            style: 'currency',
            currency: currency,
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });
        return formatter.format(amount);
    },

    // Get weather icon
    getWeatherIcon(code) {
        const icons = {
            '01d': 'fas fa-sun',
            '01n': 'fas fa-moon',
            '02d': 'fas fa-cloud-sun',
            '02n': 'fas fa-cloud-moon',
            '03d': 'fas fa-cloud',
            '03n': 'fas fa-cloud',
            '04d': 'fas fa-cloud',
            '04n': 'fas fa-cloud',
            '09d': 'fas fa-cloud-rain',
            '09n': 'fas fa-cloud-rain',
            '10d': 'fas fa-cloud-showers-heavy',
            '10n': 'fas fa-cloud-showers-heavy',
            '11d': 'fas fa-bolt',
            '11n': 'fas fa-bolt',
            '13d': 'fas fa-snowflake',
            '13n': 'fas fa-snowflake',
            '50d': 'fas fa-smog',
            '50n': 'fas fa-smog'
        };
        return icons[code] || 'fas fa-cloud';
    },

    // Get category icon
    getCategoryIcon(category) {
        const icons = {
            historical: 'fas fa-landmark',
            museum: 'fas fa-university',
            mosque: 'fas fa-mosque',
            shopping: 'fas fa-shopping-bag',
            food: 'fas fa-utensils',
            nature: 'fas fa-tree',
            park: 'fas fa-leaf',
            palace: 'fas fa-crown',
            bazaar: 'fas fa-store',
            tower: 'fas fa-tower'
        };
        return icons[category] || 'fas fa-map-marker-alt';
    },

    // Get category color
    getCategoryColor(category) {
        const colors = {
            historical: '#7c3aed',
            museum: '#10b981',
            mosque: '#0ea5e9',
            shopping: '#f59e0b',
            food: '#ef4444',
            nature: '#22c55e'
        };
        return colors[category] || '#64748b';
    },

    // Truncate text
    truncateText(text, maxLength = 100) {
        if (text.length <= maxLength) return text;
        return text.substr(0, maxLength) + '...';
    },

    // Validate email
    validateEmail(email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    },

    // Validate phone number (Turkish format)
    validatePhone(phone) {
        const re = /^(\+90|0)?5\d{9}$/;
        return re.test(phone.replace(/\s/g, ''));
    },

    // Parse query parameters
    parseQueryParams() {
        const params = {};
        const queryString = window.location.search.substring(1);
        const pairs = queryString.split('&');
        
        for (const pair of pairs) {
            const [key, value] = pair.split('=');
            if (key) {
                params[decodeURIComponent(key)] = decodeURIComponent(value || '');
            }
        }
        
        return params;
    },

    // Set query parameters
    setQueryParams(params) {
        const searchParams = new URLSearchParams();
        
        for (const [key, value] of Object.entries(params)) {
            if (value !== null && value !== undefined) {
                searchParams.set(key, value);
            }
        }
        
        const newUrl = window.location.pathname + '?' + searchParams.toString();
        window.history.replaceState({}, '', newUrl);
    },

    // Generate QR code URL
    generateQRCodeUrl(text, size = 200) {
        return `https://api.qrserver.com/v1/create-qr-code/?size=${size}x${size}&data=${encodeURIComponent(text)}`;
    },

    // Get browser language
    getBrowserLanguage() {
        const lang = navigator.language || navigator.userLanguage;
        return lang.split('-')[0];
    },

    // Is mobile device
    isMobile() {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    },

    // Is touch device
    isTouchDevice() {
        return 'ontouchstart' in window || navigator.maxTouchPoints > 0;
    },

    // Get screen orientation
    getScreenOrientation() {
        if (screen.orientation) {
            return screen.orientation.type;
        } else if (window.orientation !== undefined) {
            return Math.abs(window.orientation) === 90 ? 'landscape' : 'portrait';
        }
        return 'unknown';
    },

    // Get device pixel ratio
    getDevicePixelRatio() {
        return window.devicePixelRatio || 1;
    },

    // Get viewport dimensions
    getViewportDimensions() {
        return {
            width: window.innerWidth,
            height: window.innerHeight,
            ratio: window.innerWidth / window.innerHeight
        };
    },

    // Scroll to element
    scrollToElement(elementId, offset = 0) {
        const element = document.getElementById(elementId);
        if (element) {
            const elementPosition = element.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - offset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    },

    // Add class with animation
    addClassWithAnimation(element, className) {
        if (element && !element.classList.contains(className)) {
            element.classList.add(className);
            
            // Trigger reflow to restart animation
            void element.offsetWidth;
            
            return new Promise(resolve => {
                const onAnimationEnd = () => {
                    element.removeEventListener('animationend', onAnimationEnd);
                    resolve();
                };
                element.addEventListener('animationend', onAnimationEnd);
            });
        }
        return Promise.resolve();
    },

    // Remove class with animation
    removeClassWithAnimation(element, className) {
        if (element && element.classList.contains(className)) {
            element.classList.remove(className);
            
            return new Promise(resolve => {
                const onAnimationEnd = () => {
                    element.removeEventListener('animationend', onAnimationEnd);
                    resolve();
                };
                element.addEventListener('animationend', onAnimationEnd);
            });
        }
        return Promise.resolve();
    },

    // Create element with attributes
    createElement(tag, attributes = {}, children = []) {
        const element = document.createElement(tag);
        
        // Set attributes
        for (const [key, value] of Object.entries(attributes)) {
            if (key === 'className') {
                element.className = value;
            } else if (key === 'textContent') {
                element.textContent = value;
            } else if (key === 'innerHTML') {
                element.innerHTML = value;
            } else if (key === 'style' && typeof value === 'object') {
                Object.assign(element.style, value);
            } else if (key.startsWith('data-')) {
                element.setAttribute(key, value);
            } else if (key.startsWith('on') && typeof value === 'function') {
                element.addEventListener(key.substring(2).toLowerCase(), value);
            } else if (value !== null && value !== undefined) {
                element.setAttribute(key, value);
            }
        }
        
        // Append children
        if (Array.isArray(children)) {
            children.forEach(child => {
                if (typeof child === 'string') {
                    element.appendChild(document.createTextNode(child));
                } else if (child instanceof Node) {
                    element.appendChild(child);
                }
            });
        }
        
        return element;
    },

    // Remove all children
    removeAllChildren(element) {
        while (element.firstChild) {
            element.removeChild(element.firstChild);
        }
    },

    // Toggle element visibility
    toggleVisibility(element, show) {
        if (element) {
            if (show) {
                element.style.display = '';
                element.setAttribute('aria-hidden', 'false');
            } else {
                element.style.display = 'none';
                element.setAttribute('aria-hidden', 'true');
            }
        }
    },

    // Set element text with i18n
    setElementText(element, key, lang = 'fa') {
        if (element && translations[lang] && translations[lang][key]) {
            element.textContent = translations[lang][key];
        }
    },

    // Get translated text
    getTranslation(key, lang = 'fa') {
        const keys = key.split('.');
        let value = translations[lang];
        
        for (const k of keys) {
            if (value && value[k]) {
                value = value[k];
            } else {
                return key; // Return key if translation not found
            }
        }
        
        return value;
    },

    // Format number with commas
    formatNumber(number) {
        return new Intl.NumberFormat('fa-IR').format(number);
    },

    // Get current time in Istanbul
    getIstanbulTime() {
        const now = new Date();
        const istanbulTime = new Date(now.toLocaleString('en-US', { timeZone: 'Europe/Istanbul' }));
        return istanbulTime;
    },

    // Format time in 12-hour format
    formatTime12Hour(date) {
        return date.toLocaleTimeString('fa-IR', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
        });
    },

    // Format time in 24-hour format
    formatTime24Hour(date) {
        return date.toLocaleTimeString('fa-IR', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        });
    },

    // Get day name in Persian
    getDayName(date) {
        const days = [
            'یکشنبه',
            'دوشنبه',
            'سه‌شنبه',
            'چهارشنبه',
            'پنجشنبه',
            'جمعه',
            'شنبه'
        ];
        return days[date.getDay()];
    },

    // Get month name in Persian
    getMonthName(date) {
        const months = [
            'فروردین',
            'اردیبهشت',
            'خرداد',
            'تیر',
            'مرداد',
            'شهریور',
            'مهر',
            'آبان',
            'آذر',
            'دی',
            'بهمن',
            'اسفند'
        ];
        return months[date.getMonth()];
    },

    // Convert Gregorian to Persian date
    toPersianDate(gregorianDate) {
        // Simple conversion (for demo purposes)
        // In production, use a library like moment-jalaali
        const date = new Date(gregorianDate);
        const persianDate = new Intl.DateTimeFormat('fa-IR', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        }).format(date);
        
        return persianDate;
    },

    // Calculate age from birth date
    calculateAge(birthDate) {
        const today = new Date();
        const birth = new Date(birthDate);
        let age = today.getFullYear() - birth.getFullYear();
        const monthDiff = today.getMonth() - birth.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
            age--;
        }
        
        return age;
    },

    // Generate random color
    getRandomColor() {
        const colors = [
            '#7c3aed', '#0ea5e9', '#10b981', '#f59e0b',
            '#ef4444', '#8b5cf6', '#ec4899', '#06b6d4'
        ];
        return colors[Math.floor(Math.random() * colors.length)];
    },

    // Generate gradient
    generateGradient(color1, color2, angle = 45) {
        return `linear-gradient(${angle}deg, ${color1}, ${color2})`;
    },

    // Create data URL for image
    createImageDataUrl(imageUrl) {
        return new Promise((resolve, reject) => {
            const img = new Image();
            img.crossOrigin = 'Anonymous';
            img.onload = function() {
                const canvas = document.createElement('canvas');
                canvas.width = img.width;
                canvas.height = img.height;
                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0);
                resolve(canvas.toDataURL('image/jpeg'));
            };
            img.onerror = reject;
            img.src = imageUrl;
        });
    },

    // Download file
    downloadFile(content, fileName, contentType = 'text/plain') {
        const blob = new Blob([content], { type: contentType });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = fileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    },

    // Print element
    printElement(elementId) {
        const element = document.getElementById(elementId);
        if (!element) return;

        const printWindow = window.open('', '_blank');
        printWindow.document.write(`
            <html>
                <head>
                    <title>پرینت</title>
                    <style>
                        body { font-family: 'Vazirmatn', sans-serif; direction: rtl; padding: 20px; }
                        @media print {
                            @page { margin: 0; }
                            body { margin: 1.6cm; }
                        }
                    </style>
                </head>
                <body>
                    ${element.innerHTML}
                </body>
            </html>
        `);
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
    },

    // Take screenshot of element
    async takeScreenshot(elementId) {
        const element = document.getElementById(elementId);
        if (!element) return null;

        try {
            const canvas = await html2canvas(element, {
                useCORS: true,
                logging: false,
                scale: 2,
                backgroundColor: '#ffffff'
            });
            return canvas.toDataURL('image/png');
        } catch (error) {
            console.error('Error taking screenshot:', error);
            return null;
        }
    },

    // Vibrate device (if supported)
    vibrate(pattern = 200) {
        if (navigator.vibrate) {
            navigator.vibrate(pattern);
        }
    },

    // Check if online
    isOnline() {
        return navigator.onLine;
    },

    // Get connection info
    getConnectionInfo() {
        if (navigator.connection) {
            return {
                effectiveType: navigator.connection.effectiveType,
                downlink: navigator.connection.downlink,
                rtt: navigator.connection.rtt,
                saveData: navigator.connection.saveData
            };
        }
        return null;
    },

    // Get battery status
    async getBatteryStatus() {
        if (navigator.getBattery) {
            try {
                const battery = await navigator.getBattery();
                return {
                    level: battery.level * 100,
                    charging: battery.charging,
                    chargingTime: battery.chargingTime,
                    dischargingTime: battery.dischargingTime
                };
            } catch (error) {
                console.error('Error getting battery status:', error);
            }
        }
        return null;
    },

    // Get device info
    getDeviceInfo() {
        return {
            userAgent: navigator.userAgent,
            platform: navigator.platform,
            language: navigator.language,
            languages: navigator.languages,
            cookieEnabled: navigator.cookieEnabled,
            doNotTrack: navigator.doNotTrack,
            maxTouchPoints: navigator.maxTouchPoints,
            hardwareConcurrency: navigator.hardwareConcurrency,
            deviceMemory: navigator.deviceMemory
        };
    },

    // Get performance metrics
    getPerformanceMetrics() {
        if (window.performance && window.performance.timing) {
            const timing = window.performance.timing;
            return {
                dns: timing.domainLookupEnd - timing.domainLookupStart,
                tcp: timing.connectEnd - timing.connectStart,
                request: timing.responseStart - timing.requestStart,
                response: timing.responseEnd - timing.responseStart,
                domLoaded: timing.domContentLoadedEventEnd - timing.navigationStart,
                pageLoad: timing.loadEventEnd - timing.navigationStart
            };
        }
        return null;
    },

    // Measure function execution time
    measureExecutionTime(fn) {
        const start = performance.now();
        const result = fn();
        const end = performance.now();
        return {
            result,
            time: end - start
        };
    },

    // Create UUID
    createUUID() {
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            const r = Math.random() * 16 | 0;
            const v = c === 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    },

    // Hash string
    hashString(str) {
        let hash = 0;
        for (let i = 0; i < str.length; i++) {
            const char = str.charCodeAt(i);
            hash = ((hash << 5) - hash) + char;
            hash = hash & hash;
        }
        return Math.abs(hash);
    },

    // Base64 encode
    base64Encode(str) {
        return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g, function(match, p1) {
            return String.fromCharCode('0x' + p1);
        }));
    },

    // Base64 decode
    base64Decode(str) {
        return decodeURIComponent(Array.prototype.map.call(atob(str), function(c) {
            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
        }).join(''));
    },

    // Get file extension
    getFileExtension(filename) {
        return filename.slice((filename.lastIndexOf(".") - 1 >>> 0) + 2);
    },

    // Get file size in human readable format
    formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    },

    // Get MIME type from extension
    getMimeType(extension) {
        const mimeTypes = {
            'jpg': 'image/jpeg',
            'jpeg': 'image/jpeg',
            'png': 'image/png',
            'gif': 'image/gif',
            'pdf': 'application/pdf',
            'doc': 'application/msword',
            'docx': 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xls': 'application/vnd.ms-excel',
            'xlsx': 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'ppt': 'application/vnd.ms-powerpoint',
            'pptx': 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'zip': 'application/zip',
            'txt': 'text/plain',
            'html': 'text/html',
            'css': 'text/css',
            'js': 'application/javascript',
            'json': 'application/json',
            'xml': 'application/xml'
        };
        return mimeTypes[extension.toLowerCase()] || 'application/octet-stream';
    },

    // Validate URL
    isValidUrl(string) {
        try {
            new URL(string);
            return true;
        } catch (_) {
            return false;
        }
    },

    // Sanitize HTML
    sanitizeHTML(html) {
        const temp = document.createElement('div');
        temp.textContent = html;
        return temp.innerHTML;
    },

    // Escape regex
    escapeRegex(string) {
        return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    },

    // Get query string value
    getQueryParam(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    },

    // Set query string value
    setQueryParam(name, value) {
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set(name, value);
        const newUrl = window.location.pathname + '?' + urlParams.toString();
        window.history.replaceState({}, '', newUrl);
    },

    // Remove query string value
    removeQueryParam(name) {
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.delete(name);
        const newUrl = window.location.pathname + (urlParams.toString() ? '?' + urlParams.toString() : '');
        window.history.replaceState({}, '', newUrl);
    },

    // Get hash value
    getHash() {
        return window.location.hash.substring(1);
    },

    // Set hash value
    setHash(value) {
        window.location.hash = value;
    },

    // Remove hash
    removeHash() {
        window.history.replaceState('', document.title, window.location.pathname + window.location.search);
    },

    // Get cookie value
    getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    },

    // Set cookie
    setCookie(name, value, days = 7) {
        const expires = new Date(Date.now() + days * 864e5).toUTCString();
        document.cookie = `${name}=${value}; expires=${expires}; path=/`;
    },

    // Delete cookie
    deleteCookie(name) {
        document.cookie = `${name}=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/`;
    },

    // Get all cookies
    getAllCookies() {
        return document.cookie.split(';').reduce((cookies, cookie) => {
            const [name, value] = cookie.split('=').map(c => c.trim());
            cookies[name] = decodeURIComponent(value);
            return cookies;
        }, {});
    },

    // Clear all cookies
    clearAllCookies() {
        const cookies = document.cookie.split(';');
        for (const cookie of cookies) {
            const eqPos = cookie.indexOf('=');
            const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:00 GMT;path=/';
        }
    },

    // Get session storage value
    getSessionStorage(key) {
        try {
            const value = sessionStorage.getItem(key);
            return value ? JSON.parse(value) : null;
        } catch (error) {
            console.error('Error reading session storage:', error);
            return null;
        }
    },

    // Set session storage value
    setSessionStorage(key, value) {
        try {
            sessionStorage.setItem(key, JSON.stringify(value));
            return true;
        } catch (error) {
            console.error('Error writing to session storage:', error);
            return false;
        }
    },

    // Remove session storage value
    removeSessionStorage(key) {
        try {
            sessionStorage.removeItem(key);
            return true;
        } catch (error) {
            console.error('Error removing from session storage:', error);
            return false;
        }
    },

    // Clear session storage
    clearSessionStorage() {
        try {
            sessionStorage.clear();
            return true;
        } catch (error) {
            console.error('Error clearing session storage:', error);
            return false;
        }
    },

    // Get indexedDB database
    async getIndexedDB(databaseName, storeName) {
        return new Promise((resolve, reject) => {
            const request = indexedDB.open(databaseName, 1);
            
            request.onerror = () => reject(request.error);
            request.onsuccess = () => resolve(request.result);
            
            request.onupgradeneeded = (event) => {
                const db = event.target.result;
                if (!db.objectStoreNames.contains(storeName)) {
                    db.createObjectStore(storeName, { keyPath: 'id' });
                }
            };
        });
    },

    // Add to indexedDB
    async addToIndexedDB(databaseName, storeName, data) {
        const db = await this.getIndexedDB(databaseName, storeName);
        return new Promise((resolve, reject) => {
            const transaction = db.transaction([storeName], 'readwrite');
            const store = transaction.objectStore(storeName);
            const request = store.add(data);
            
            request.onsuccess = () => resolve(request.result);
            request.onerror = () => reject(request.error);
        });
    },

    // Get from indexedDB
    async getFromIndexedDB(databaseName, storeName, id) {
        const db = await this.getIndexedDB(databaseName, storeName);
        return new Promise((resolve, reject) => {
            const transaction = db.transaction([storeName], 'readonly');
            const store = transaction.objectStore(storeName);
            const request = store.get(id);
            
            request.onsuccess = () => resolve(request.result);
            request.onerror = () => reject(request.error);
        });
    },

    // Get all from indexedDB
    async getAllFromIndexedDB(databaseName, storeName) {
        const db = await this.getIndexedDB(databaseName, storeName);
        return new Promise((resolve, reject) => {
            const transaction = db.transaction([storeName], 'readonly');
            const store = transaction.objectStore(storeName);
            const request = store.getAll();
            
            request.onsuccess = () => resolve(request.result);
            request.onerror = () => reject(request.error);
        });
    },

    // Update in indexedDB
    async updateInIndexedDB(databaseName, storeName, data) {
        const db = await this.getIndexedDB(databaseName, storeName);
        return new Promise((resolve, reject) => {
            const transaction = db.transaction([storeName], 'readwrite');
            const store = transaction.objectStore(storeName);
            const request = store.put(data);
            
            request.onsuccess = () => resolve(request.result);
            request.onerror = () => reject(request.error);
        });
    },

    // Delete from indexedDB
    async deleteFromIndexedDB(databaseName, storeName, id) {
        const db = await this.getIndexedDB(databaseName, storeName);
        return new Promise((resolve, reject) => {
            const transaction = db.transaction([storeName], 'readwrite');
            const store = transaction.objectStore(storeName);
            const request = store.delete(id);
            
            request.onsuccess = () => resolve(request.result);
            request.onerror = () => reject(request.error);
        });
    },

    // Clear indexedDB store
    async clearIndexedDB(databaseName, storeName) {
        const db = await this.getIndexedDB(databaseName, storeName);
        return new Promise((resolve, reject) => {
            const transaction = db.transaction([storeName], 'readwrite');
            const store = transaction.objectStore(storeName);
            const request = store.clear();
            
            request.onsuccess = () => resolve(request.result);
            request.onerror = () => reject(request.error);
        });
    }
};

// Make data and utilities globally available
window.sampleData = sampleData;
window.utils = Utils;

// Export for module systems
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        sampleData,
        Utils
    };
}

console.log('📊 Sample data and utilities loaded successfully!');