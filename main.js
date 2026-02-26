// Istanbul Guide - Main JavaScript File
// Professional Implementation with Simple Virtual Tour

class IstanbulGuide {
    constructor() {
        this.config = {
            API_BASE: 'https://farhamzamani.com',
            DEFAULT_LANGUAGE: 'fa',
            MAP_CENTER: [41.0082, 28.9784],
            MAP_ZOOM: 13,
            ENABLE_VOICE_SEARCH: true,
            ANIMATION_DURATION: 300
        };

        this.state = {
            language: localStorage.getItem('language') || this.config.DEFAULT_LANGUAGE,
            theme: localStorage.getItem('theme') || 'light',
            currentTab: 'home',
            searchQuery: '',
            selectedPlace: null,
            favorites: JSON.parse(localStorage.getItem('favorites')) || [],
            itinerary: [],
            virtualTour: {
                currentPlace: 'hagia_sophia',
                currentImage: 0,
                autoRotate: false
            }
        };

        this.cache = {
            places: [],
            hotels: [],
            restaurants: []
        };

        this.init();
    }

    // Initialize application
    init() {
        console.log('🚀 Istanbul Guide Initializing...');
        
        // Initialize components
        this.initPreloader();
        this.initNavigation();
        this.initHeroSlider();
        this.initSearch();
        this.initTheme();
        this.initMap();
        this.initSimpleVirtualTour();
        this.initPlanner();
        this.initAIAssistant();
        this.initFilters();
        this.initEventListeners();
        this.initScrollEffects();
        this.initHorizontalScroll(); // اضافه شده
        
        // Load initial data
        this.loadInitialData();
        
        // Update UI
        this.updateUI();
        
        console.log('✅ Istanbul Guide initialized successfully!');
    }

    // ===== PRELOADER =====
    initPreloader() {
        const preloader = document.getElementById('preloader');
        if (preloader) {
            setTimeout(() => {
                preloader.style.opacity = '0';
                setTimeout(() => {
                    preloader.style.display = 'none';
                }, 500);
            }, 1000);
        }
    }

    // ===== NAVIGATION =====
    initNavigation() {
        // Smooth scrolling for nav links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const section = link.dataset.section;
                this.scrollToSection(section);
                
                // Update active nav link
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                link.classList.add('active');
                
                // Update current tab
                this.state.currentTab = section;
            });
        });

        // Language selector
        document.querySelectorAll('.language-dropdown a').forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                const lang = item.dataset.lang;
                this.changeLanguage(lang);
            });
        });

        // Language dropdown toggle
        document.querySelector('.current-language').addEventListener('click', (e) => {
            e.stopPropagation();
            document.querySelector('.language-dropdown').classList.toggle('show');
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', () => {
            document.querySelector('.language-dropdown').classList.remove('show');
            document.querySelector('.user-dropdown').classList.remove('show');
        });
    }

    // ===== HERO SLIDER =====
    initHeroSlider() {
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        const prevBtn = document.querySelector('.hero-prev');
        const nextBtn = document.querySelector('.hero-next');
        
        if (!slides.length) return;
        
        let currentSlide = 0;
        const totalSlides = slides.length;

        // Show slide function
        const showSlide = (index) => {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            
            slides[index].classList.add('active');
            dots[index].classList.add('active');
            currentSlide = index;
        };

        // Next slide
        const nextSlide = () => {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        };

        // Previous slide
        const prevSlide = () => {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            showSlide(currentSlide);
        };

        // Event listeners
        if (nextBtn) nextBtn.addEventListener('click', nextSlide);
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);

        // Dot click events
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => showSlide(index));
        });

        // Auto slide
        setInterval(nextSlide, 5000);
    }

    // ===== SEARCH =====
    initSearch() {
        const searchToggle = document.getElementById('searchToggle');
        const closeSearch = document.getElementById('closeSearch');
        const searchOverlay = document.getElementById('searchOverlay');
        const searchInput = document.querySelector('.search-input');
        const searchButton = document.querySelector('.search-button');
        const voiceSearchBtn = document.querySelector('.search-voice');

        // Toggle search overlay
        if (searchToggle) {
            searchToggle.addEventListener('click', () => {
                searchOverlay.classList.add('active');
                searchInput?.focus();
            });
        }

        // Close search
        if (closeSearch) {
            closeSearch.addEventListener('click', () => {
                searchOverlay.classList.remove('active');
            });
        }

        // Close on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                searchOverlay.classList.remove('active');
            }
        });

        // Voice search
        if (voiceSearchBtn && this.config.ENABLE_VOICE_SEARCH) {
            voiceSearchBtn.addEventListener('click', () => this.initVoiceSearch());
        }

        // Search suggestions
        document.querySelectorAll('.tag').forEach(tag => {
            tag.addEventListener('click', (e) => {
                e.preventDefault();
                if (searchInput) {
                    searchInput.value = tag.textContent;
                    this.performSearch(searchInput.value);
                }
            });
        });

        // Search input with debounce
        if (searchInput) {
            let searchTimeout;
            searchInput.addEventListener('input', (e) => {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    this.state.searchQuery = e.target.value;
                    this.performSearch(e.target.value);
                }, 300);
            });
        }

        // Search button
        if (searchButton) {
            searchButton.addEventListener('click', () => {
                if (searchInput) {
                    this.performSearch(searchInput.value);
                }
            });
        }
    }

    // ===== THEME =====
    initTheme() {
        const themeToggle = document.getElementById('themeToggle');
        if (!themeToggle) return;

        const themeIcon = themeToggle.querySelector('i');
        const currentTheme = localStorage.getItem('theme') || 'light';

        // Set initial theme
        document.documentElement.setAttribute('data-theme', currentTheme);
        themeIcon.className = currentTheme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';

        // Toggle theme
        themeToggle.addEventListener('click', () => {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            
            document.documentElement.setAttribute('data-theme', newTheme);
            themeIcon.className = newTheme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
            localStorage.setItem('theme', newTheme);
            
            // Add transition effect
            document.documentElement.classList.add('theme-transition');
            setTimeout(() => {
                document.documentElement.classList.remove('theme-transition');
            }, 300);
        });
    }

    // ===== MAP =====
    initMap() {
        if (typeof L === 'undefined') {
            console.warn('Leaflet library not loaded');
            return;
        }

        // Create map instance
        this.map = L.map('map').setView(this.config.MAP_CENTER, this.config.MAP_ZOOM);

        // Add tile layer
        L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
            subdomains: 'abcd',
            maxZoom: 20
        }).addTo(this.map);

        // Add sample markers
        this.addMapMarkers();

        // Map controls
        const locateBtn = document.getElementById('locateMe');
        const zoomInBtn = document.getElementById('zoomIn');
        const zoomOutBtn = document.getElementById('zoomOut');
        const layersBtn = document.getElementById('mapLayers');

        if (locateBtn) {
            locateBtn.addEventListener('click', () => {
                this.map.locate({setView: true, maxZoom: 16});
            });
        }

        if (zoomInBtn) zoomInBtn.addEventListener('click', () => this.map.zoomIn());
        if (zoomOutBtn) zoomOutBtn.addEventListener('click', () => this.map.zoomOut());
        if (layersBtn) layersBtn.addEventListener('click', () => this.toggleMapLayers());

        // Add locate control
        if (L.control.locate) {
            L.control.locate({
                position: 'topleft',
                strings: {
                    title: "نمایش موقعیت من"
                },
                locateOptions: {
                    maxZoom: 16
                }
            }).addTo(this.map);
        }
    }

    addMapMarkers() {
        const places = [
            {
                name: 'ایاصوفیه',
                lat: 41.0086,
                lng: 28.9802,
                category: 'historical',
                description: 'موزه و مسجد تاریخی'
            },
            {
                name: 'کاخ توپکاپی',
                lat: 41.0138,
                lng: 28.9856,
                category: 'historical',
                description: 'کاخ سلطنتی عثمانی'
            },
            {
                name: 'مسجد آبی',
                lat: 41.0054,
                lng: 28.9768,
                category: 'mosque',
                description: 'مسجد تاریخی با کاشی‌های آبی'
            },
            {
                name: 'بازار بزرگ',
                lat: 41.0108,
                lng: 28.9682,
                category: 'shopping',
                description: 'بازار سرپوشیده تاریخی'
            },
            {
                name: 'برج گالاتا',
                lat: 41.0256,
                lng: 28.9744,
                category: 'historical',
                description: 'برج قرون وسطایی'
            },
            {
                name: 'کاخ دلما‌باغچه',
                lat: 41.0392,
                lng: 29.0000,
                category: 'historical',
                description: 'کاخ مجلل عثمانی'
            },
            {
                name: 'مسجد سلیمانیه',
                lat: 41.0160,
                lng: 28.9639,
                category: 'mosque',
                description: 'مسجد تاریخی سلیمانیه'
            },
            {
                name: 'آب انبار باسیلیکا',
                lat: 41.0083,
                lng: 28.9778,
                category: 'historical',
                description: 'آب انبار زیرزمینی بیزانس'
            },
            {
                name: 'موزه هنرهای اسلامی',
                lat: 41.0061,
                lng: 28.9714,
                category: 'museum',
                description: 'موزه هنرهای اسلامی و ترکی'
            }
        ];

        const categoryColors = {
            historical: '#7c3aed',
            museum: '#10b981',
            mosque: '#0ea5e9',
            shopping: '#f59e0b',
            food: '#ef4444',
            nature: '#22c55e'
        };

        places.forEach(place => {
            const marker = L.marker([place.lat, place.lng]).addTo(this.map);
            marker.bindPopup(`
                <div class="map-popup">
                    <h4>${place.name}</h4>
                    <p>${place.description}</p>
                    <button onclick="guide.showPlaceDetails('${place.name}')" class="popup-btn">
                        مشاهده جزئیات
                    </button>
                </div>
            `);
        });
    }

    // ===== SIMPLE VIRTUAL TOUR =====
    initSimpleVirtualTour() {
        console.log('🎮 Initializing Simple Virtual Tour...');
        
        // Tour data with Unsplash images
        this.virtualTours = {
            hagia_sophia: {
                name: 'ایاصوفیه',
                images: [
                    'https://images.unsplash.com/photo-1527838832700-5059252407fa?w=1200&q=80',
                    'https://images.unsplash.com/photo-1598899134739-24c46f58b8c0?w=1200&q=80',
                    'https://images.unsplash.com/photo-1548013146-72479768bada?w=1200&q=80',
                    'https://images.unsplash.com/photo-1516542076529-1ea3854896f2?w=1200&q=80'
                ],
                description: 'تور تصویری 360 درجه از موزه تاریخی ایاصوفیه'
            },
            blue_mosque: {
                name: 'مسجد آبی',
                images: [
                    'https://images.unsplash.com/photo-1548013146-72479768bada?w=1200&q=80',
                    'https://images.unsplash.com/photo-1511735111819-9a3f7709049c?w=1200&q=80',
                    'https://images.unsplash.com/photo-1548588627-d6e1f8c76f15?w=1200&q=80',
                    'https://images.unsplash.com/photo-1564501049418-3c27787d01e8?w=1200&q=80'
                ],
                description: 'تور تصویری از مسجد سلطان احمد'
            },
            topkapi: {
                name: 'کاخ توپکاپی',
                images: [
                    'https://images.unsplash.com/photo-1598899134739-24c46f58b8c0?w=1200&q=80',
                    'https://images.unsplash.com/photo-1527838832700-5059252407fa?w=1200&q=80',
                    'https://images.unsplash.com/photo-1548013146-72479768bada?w=1200&q=80',
                    'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1200&q=80'
                ],
                description: 'گالری تصاویر کاخ سلطنتی عثمانی'
            },
            grand_bazaar: {
                name: 'بازار بزرگ',
                images: [
                    'https://images.unsplash.com/photo-1511735111819-9a3f7709049c?w=1200&q=80',
                    'https://images.unsplash.com/photo-1548588627-d6e1f8c76f15?w=1200&q=80',
                    'https://images.unsplash.com/photo-1527838832700-5059252407fa?w=1200&q=80',
                    'https://images.unsplash.com/photo-1598899134739-24c46f58b8c0?w=1200&q=80'
                ],
                description: 'گردش مجازی در بازار بزرگ استانبول'
            }
        };

        // Initialize the tour
        this.renderVirtualTour();

        // Add event listeners for place buttons
        document.querySelectorAll('.place-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const place = btn.dataset.place;
                this.changeVirtualTourPlace(place);
                
                // Update active button
                document.querySelectorAll('.place-btn').forEach(b => {
                    b.classList.remove('active');
                });
                btn.classList.add('active');
            });
        });

        // Add event listeners for tour controls
        document.querySelectorAll('.tour-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const action = e.currentTarget.id;
                if (action === 'prevTour') {
                    this.prevTourImage();
                } else if (action === 'nextTour') {
                    this.nextTourImage();
                }
            });
        });

        // Add event listeners for virtual tour action buttons
        document.querySelectorAll('.action-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const text = e.currentTarget.textContent.toLowerCase();
                if (text.includes('vr')) {
                    this.toggleVRMode();
                } else if (text.includes('تمام صفحه')) {
                    this.toggleFullscreen();
                } else if (text.includes('صوتی')) {
                    this.toggleAudioGuide();
                }
            });
        });

        // Auto-rotate toggle
        const autoRotateBtn = document.querySelector('.action-btn[data-action="auto-rotate"]');
        if (autoRotateBtn) {
            autoRotateBtn.addEventListener('click', () => this.toggleAutoRotate());
        }
    }

    renderVirtualTour() {
        const container = document.getElementById('virtualViewer');
        if (!container) return;

        const tour = this.virtualTours[this.state.virtualTour.currentPlace];
        const currentImage = tour.images[this.state.virtualTour.currentImage];

        container.innerHTML = `
            <div class="simple-virtual-tour">
                <div class="tour-viewer">
                    <img src="${currentImage}" 
                         alt="${tour.name}" 
                         class="tour-image"
                         id="tourImage">
                    
                    <div class="tour-overlay">
                        <div class="tour-info">
                            <h3>${tour.name}</h3>
                            <p>${tour.description}</p>
                            <div class="image-counter">
                                تصویر ${this.state.virtualTour.currentImage + 1} از ${tour.images.length}
                            </div>
                        </div>
                        
                        <div class="tour-controls-overlay">
                            <button class="tour-control-btn prev-image">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                            <button class="tour-control-btn next-image">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="tour-control-btn zoom-in">
                                <i class="fas fa-search-plus"></i>
                            </button>
                            <button class="tour-control-btn zoom-out">
                                <i class="fas fa-search-minus"></i>
                            </button>
                            <button class="tour-control-btn fullscreen">
                                <i class="fas fa-expand"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="hotspots">
                        <div class="hotspot" style="top: 30%; left: 40%;" data-info="گنبد اصلی">
                            <div class="hotspot-marker"></div>
                        </div>
                        <div class="hotspot" style="top: 60%; left: 60%;" data-info="موزائیک‌های طلایی">
                            <div class="hotspot-marker"></div>
                        </div>
                    </div>
                </div>
                
                <div class="tour-thumbnails">
                    ${tour.images.map((img, index) => `
                        <div class="thumbnail ${index === this.state.virtualTour.currentImage ? 'active' : ''}" 
                             data-index="${index}">
                            <img src="${img}" alt="تصویر ${index + 1}">
                        </div>
                    `).join('')}
                </div>
            </div>
        `;

        // Add event listeners for new elements
        this.initVirtualTourEvents();
    }

    initVirtualTourEvents() {
        // Previous/next image buttons
        document.querySelector('.prev-image')?.addEventListener('click', () => this.prevTourImage());
        document.querySelector('.next-image')?.addEventListener('click', () => this.nextTourImage());

        // Thumbnail click
        document.querySelectorAll('.thumbnail').forEach(thumb => {
            thumb.addEventListener('click', () => {
                const index = parseInt(thumb.dataset.index);
                this.goToTourImage(index);
            });
        });

        // Zoom controls
        document.querySelector('.zoom-in')?.addEventListener('click', () => this.zoomTourImage(1.2));
        document.querySelector('.zoom-out')?.addEventListener('click', () => this.zoomTourImage(0.8));

        // Fullscreen
        document.querySelector('.fullscreen')?.addEventListener('click', () => this.toggleFullscreen());

        // Hotspots
        document.querySelectorAll('.hotspot').forEach(hotspot => {
            hotspot.addEventListener('click', (e) => {
                e.stopPropagation();
                const info = hotspot.dataset.info;
                this.showHotspotInfo(info);
            });
        });

        // Mouse wheel zoom
        const tourImage = document.getElementById('tourImage');
        if (tourImage) {
            tourImage.addEventListener('wheel', (e) => {
                e.preventDefault();
                const delta = e.deltaY > 0 ? 0.9 : 1.1;
                this.zoomTourImage(delta);
            });
        }

        // Drag to pan
        let isDragging = false;
        let startX, startY, translateX = 0, translateY = 0;

        if (tourImage) {
            tourImage.addEventListener('mousedown', (e) => {
                isDragging = true;
                startX = e.clientX - translateX;
                startY = e.clientY - translateY;
                tourImage.style.cursor = 'grabbing';
            });

            document.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                e.preventDefault();
                translateX = e.clientX - startX;
                translateY = e.clientY - startY;
                tourImage.style.transform = `translate(${translateX}px, ${translateY}px)`;
            });

            document.addEventListener('mouseup', () => {
                isDragging = false;
                if (tourImage) tourImage.style.cursor = 'grab';
            });
        }
    }

    changeVirtualTourPlace(place) {
        if (this.virtualTours[place]) {
            this.state.virtualTour.currentPlace = place;
            this.state.virtualTour.currentImage = 0;
            this.renderVirtualTour();
        }
    }

    prevTourImage() {
        const tour = this.virtualTours[this.state.virtualTour.currentPlace];
        this.state.virtualTour.currentImage = 
            (this.state.virtualTour.currentImage - 1 + tour.images.length) % tour.images.length;
        this.updateTourImage();
    }

    nextTourImage() {
        const tour = this.virtualTours[this.state.virtualTour.currentPlace];
        this.state.virtualTour.currentImage = 
            (this.state.virtualTour.currentImage + 1) % tour.images.length;
        this.updateTourImage();
    }

    goToTourImage(index) {
        const tour = this.virtualTours[this.state.virtualTour.currentPlace];
        if (index >= 0 && index < tour.images.length) {
            this.state.virtualTour.currentImage = index;
            this.updateTourImage();
        }
    }

    updateTourImage() {
        const tour = this.virtualTours[this.state.virtualTour.currentPlace];
        const tourImage = document.getElementById('tourImage');
        const thumbnails = document.querySelectorAll('.thumbnail');
        const imageCounter = document.querySelector('.image-counter');

        if (tourImage) {
            tourImage.src = tour.images[this.state.virtualTour.currentImage];
            tourImage.style.transform = 'translate(0, 0) scale(1)';
        }

        if (imageCounter) {
            imageCounter.textContent = 
                `تصویر ${this.state.virtualTour.currentImage + 1} از ${tour.images.length}`;
        }

        thumbnails.forEach((thumb, index) => {
            thumb.classList.toggle('active', index === this.state.virtualTour.currentImage);
        });
    }

    zoomTourImage(factor) {
        const tourImage = document.getElementById('tourImage');
        if (!tourImage) return;

        const currentTransform = tourImage.style.transform;
        const scaleMatch = currentTransform.match(/scale\(([^)]+)\)/);
        const translateMatch = currentTransform.match(/translate\(([^)]+)\)/);
        
        let currentScale = scaleMatch ? parseFloat(scaleMatch[1]) : 1;
        const translate = translateMatch ? translateMatch[1] : '0px, 0px';

        currentScale = Math.max(0.5, Math.min(3, currentScale * factor));
        tourImage.style.transform = `translate(${translate}) scale(${currentScale})`;
    }

    toggleFullscreen() {
        const tourViewer = document.querySelector('.tour-viewer');
        if (!document.fullscreenElement) {
            tourViewer?.requestFullscreen().catch(err => {
                console.error('Error entering fullscreen:', err);
            });
        } else {
            document.exitFullscreen();
        }
    }

    toggleVRMode() {
        alert('حالت VR در نسخه فعلی در دسترس نیست. به زودی اضافه خواهد شد.');
    }

    toggleAudioGuide() {
        alert('راهنمای صوتی در حال توسعه است.');
    }

    toggleAutoRotate() {
        this.state.virtualTour.autoRotate = !this.state.virtualTour.autoRotate;
        
        if (this.state.virtualTour.autoRotate) {
            this.autoRotateInterval = setInterval(() => {
                this.nextTourImage();
            }, 3000);
        } else {
            clearInterval(this.autoRotateInterval);
        }
    }

    showHotspotInfo(info) {
        // Create a simple modal for hotspot info
        const modal = document.createElement('div');
        modal.className = 'hotspot-modal';
        modal.innerHTML = `
            <div class="modal-content">
                <button class="close-btn">&times;</button>
                <h4>اطلاعات</h4>
                <p>${info}</p>
            </div>
        `;
        
        document.body.appendChild(modal);
        
        modal.querySelector('.close-btn').addEventListener('click', () => {
            modal.remove();
        });
        
        // Auto remove after 3 seconds
        setTimeout(() => {
            if (modal.parentNode) {
                modal.remove();
            }
        }, 3000);
    }

    // ===== TRAVEL PLANNER =====
    initPlanner() {
        // Day selection
        document.querySelectorAll('.day-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.day-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                this.updatePlannerPreview();
            });
        });

        // Interest selection
        document.querySelectorAll('.interest-tag').forEach(tag => {
            tag.addEventListener('click', () => {
                tag.classList.toggle('selected');
                this.updatePlannerPreview();
            });
        });

        // Budget range
        const budgetRange = document.querySelector('.budget-range');
        if (budgetRange) {
            budgetRange.addEventListener('input', () => {
                this.updatePlannerPreview();
            });
        }

        // Generate itinerary button
        const generateBtn = document.querySelector('.generate-itinerary');
        if (generateBtn) {
            generateBtn.addEventListener('click', () => this.generateItinerary());
        }
    }

    updatePlannerPreview() {
        const selectedDays = document.querySelector('.day-btn.active')?.textContent || '۳ روز';
        const selectedInterests = Array.from(document.querySelectorAll('.interest-tag.selected'))
            .map(tag => tag.textContent);
        const budget = document.querySelector('.budget-range')?.value || 50;

        const preview = this.generatePreview(selectedDays, selectedInterests, budget);
        const previewContainer = document.querySelector('.itinerary-preview');
        if (previewContainer) {
            previewContainer.innerHTML = preview;
        }
    }

    generatePreview(days, interests, budget) {
        let preview = '';
        
        if (days.includes('۱')) {
            preview = `
                <div class="preview-day">
                    <h4>روز اول: قلب تاریخی استانبول</h4>
                    <ul>
                        <li><i class="fas fa-clock"></i> ۹:۰۰ صبح: ایاصوفیه</li>
                        <li><i class="fas fa-clock"></i> ۱۱:۰۰ صبح: کاخ توپکاپی</li>
                        ${interests.includes('غذا') ? '<li><i class="fas fa-clock"></i> ۲:۰۰ بعدازظهر: ناهار در رستوران محلی</li>' : ''}
                        <li><i class="fas fa-clock"></i> ۴:۰۰ بعدازظهر: مسجد آبی</li>
                        ${budget > 50 ? '<li><i class="fas fa-clock"></i> ۷:۰۰ عصر: شام در رستوران لوکس</li>' : '<li><i class="fas fa-clock"></i> ۷:۰۰ عصر: شام در منطقه سلطان احمد</li>'}
                    </ul>
                </div>
            `;
        } else if (days.includes('۳')) {
            preview = `
                <div class="preview-day">
                    <h4>روز اول: تاریخی</h4>
                    <ul>
                        <li><i class="fas fa-clock"></i> ۹:۰۰ صبح: ایاصوفیه</li>
                        <li><i class="fas fa-clock"></i> ۱۱:۰۰ صبح: کاخ توپکاپی</li>
                        <li><i class="fas fa-clock"></i> ۲:۰۰ بعدازظهر: ناهار</li>
                        <li><i class="fas fa-clock"></i> ۴:۰۰ بعدازظهر: مسجد آبی</li>
                    </ul>
                </div>
                <div class="preview-day">
                    <h4>روز دوم: فرهنگی</h4>
                    <ul>
                        <li><i class="fas fa-clock"></i> ۱۰:۰۰ صبح: بازار بزرگ</li>
                        <li><i class="fas fa-clock"></i> ۱:۰۰ بعدازظهر: خرید</li>
                        <li><i class="fas fa-clock"></i> ۳:۰۰ بعدازظهر: موزه</li>
                        <li><i class="fas fa-clock"></i> ۶:۰۰ عصر: برج گالاتا</li>
                    </ul>
                </div>
            `;
        } else {
            preview = `
                <div class="preview-day">
                    <h4>برنامه سفر پیشنهادی</h4>
                    <p>برنامه‌ریزی سفری شخصی‌سازی شده بر اساس انتخاب‌های شما:</p>
                    <ul>
                        <li><i class="fas fa-calendar"></i> مدت سفر: ${days}</li>
                        <li><i class="fas fa-heart"></i> علاقه‌مندی‌ها: ${interests.join(', ') || 'عمومی'}</li>
                        <li><i class="fas fa-money-bill-wave"></i> سطح بودجه: ${budget > 70 ? 'لوکس' : budget > 40 ? 'متوسط' : 'اقتصادی'}</li>
                    </ul>
                    <p>برای تولید برنامه کامل، دکمه "تولید برنامه سفر" را بزنید.</p>
                </div>
            `;
        }
        
        return preview;
    }

    generateItinerary() {
        const generateBtn = document.querySelector('.generate-itinerary');
        if (!generateBtn) return;

        // Show loading state
        const originalText = generateBtn.innerHTML;
        generateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> در حال تولید...';
        generateBtn.disabled = true;

        // Simulate API call
        setTimeout(() => {
            const itinerary = this.createCompleteItinerary();
            this.showItineraryModal(itinerary);
            
            // Reset button
            generateBtn.innerHTML = originalText;
            generateBtn.disabled = false;
        }, 1500);
    }

    createCompleteItinerary() {
        return `
            <div class="complete-itinerary">
                <div class="itinerary-header">
                    <h3><i class="fas fa-map-marked-alt"></i> برنامه سفر استانبول</h3>
                    <p>برنامه ۳ روزه شخصی‌سازی شده</p>
                </div>
                
                <div class="itinerary-day">
                    <h4><i class="fas fa-sun"></i> روز اول: قلب تاریخی</h4>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="time">۹:۰۰ صبح</div>
                            <div class="activity">
                                <strong>ایاصوفیه</strong>
                                <p>بازدید از موزه تاریخی</p>
                                <span class="duration"><i class="fas fa-clock"></i> ۲ ساعت</span>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="time">۱۱:۰۰ صبح</div>
                            <div class="activity">
                                <strong>کاخ توپکاپی</strong>
                                <p>کاخ سلطنتی عثمانی</p>
                                <span class="duration"><i class="fas fa-clock"></i> ۳ ساعت</span>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="time">۲:۰۰ بعدازظهر</div>
                            <div class="activity">
                                <strong>ناهار</strong>
                                <p>رستوران محلی در سلطان احمد</p>
                                <span class="cost"><i class="fas fa-lira-sign"></i> ۵۰-۱۰۰ لیر</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="itinerary-summary">
                    <h4><i class="fas fa-chart-pie"></i> خلاصه هزینه‌ها</h4>
                    <div class="cost-summary">
                        <div class="cost-item">
                            <span>ورودی جاذبه‌ها:</span>
                            <span>۲۵۰ لیر</span>
                        </div>
                        <div class="cost-item">
                            <span>غذا و نوشیدنی:</span>
                            <span>۱۵۰ لیر</span>
                        </div>
                        <div class="cost-item">
                            <span>حمل و نقل:</span>
                            <span>۵۰ لیر</span>
                        </div>
                        <div class="cost-item total">
                            <span>مجموع روزانه:</span>
                            <span>۴۵۰ لیر</span>
                        </div>
                    </div>
                </div>
                
                <div class="itinerary-tips">
                    <h4><i class="fas fa-lightbulb"></i> نکات سفر</h4>
                    <ul>
                        <li>کارت حمل و نقل استانبول (Istanbulkart) بخرید</li>
                        <li>از اپلیکیشن BiTaksi برای تاکسی استفاده کنید</li>
                        <li>پوشش مناسب برای ورود به مساجد همراه داشته باشید</li>
                        <li>آب معدنی ارزان‌تر از سوپرمارکت‌ها بخرید</li>
                    </ul>
                </div>
            </div>
        `;
    }

    showItineraryModal(content) {
        // Remove existing modal
        const existingModal = document.querySelector('.itinerary-modal');
        if (existingModal) existingModal.remove();

        // Create new modal
        const modal = document.createElement('div');
        modal.className = 'itinerary-modal';
        modal.innerHTML = `
            <div class="modal-content">
                <div class="modal-header">
                    <h2><i class="fas fa-route"></i> برنامه سفر استانبول</h2>
                    <button class="close-modal">&times;</button>
                </div>
                <div class="modal-body">
                    ${content}
                </div>
                <div class="modal-footer">
                    <button class="modal-btn print-btn">
                        <i class="fas fa-print"></i> چاپ
                    </button>
                    <button class="modal-btn save-btn">
                        <i class="fas fa-save"></i> ذخیره
                    </button>
                    <button class="modal-btn share-btn">
                        <i class="fas fa-share-alt"></i> اشتراک
                    </button>
                </div>
            </div>
        `;

        document.body.appendChild(modal);

        // Add event listeners
        modal.querySelector('.close-modal').addEventListener('click', () => {
            modal.remove();
        });

        modal.querySelector('.print-btn').addEventListener('click', () => {
            window.print();
        });

        modal.querySelector('.save-btn').addEventListener('click', () => {
            alert('برنامه سفر ذخیره شد!');
        });

        modal.querySelector('.share-btn').addEventListener('click', () => {
            this.shareItinerary();
        });

        // Close on outside click
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.remove();
            }
        });
    }

    shareItinerary() {
        if (navigator.share) {
            navigator.share({
                title: 'برنامه سفر استانبول',
                text: 'برنامه سفر شخصی‌سازی شده من برای استانبول',
                url: window.location.href
            });
        } else {
            alert('برای اشتراک‌گذاری، لینک زیر را کپی کنید:\n' + window.location.href);
        }
    }

    // ===== AI ASSISTANT =====
    initAIAssistant() {
        const assistant = document.getElementById('aiAssistant');
        const chatInput = document.getElementById('chatInput');
        const sendBtn = document.getElementById('sendMessage');
        const quickBtns = document.querySelectorAll('.quick-btn');
        const minimizeBtn = assistant?.querySelector('.minimize-btn');
        const closeBtn = assistant?.querySelector('.close-btn');

        if (!assistant) return;

        // Toggle assistant
        assistant.querySelector('.assistant-header').addEventListener('click', (e) => {
            if (!e.target.closest('.assistant-actions')) {
                assistant.classList.toggle('active');
            }
        });

        // Send message function
        const sendMessage = () => {
            const message = chatInput?.value.trim();
            if (!message) return;

            this.addChatMessage('user', message);
            chatInput.value = '';
            
            // Simulate AI response
            setTimeout(() => {
                const response = this.generateAIResponse(message);
                this.addChatMessage('ai', response);
            }, 1000);
        };

        // Add message to chat
        this.addChatMessage = (sender, text) => {
            const chatMessages = document.getElementById('chatMessages');
            if (!chatMessages) return;

            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${sender}`;
            messageDiv.innerHTML = `
                <div class="message-content">${text}</div>
            `;
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        };

        // Event listeners
        if (sendBtn) sendBtn.addEventListener('click', sendMessage);
        if (chatInput) {
            chatInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') sendMessage();
            });
        }

        // Quick questions
        quickBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const question = btn.dataset.question;
                if (chatInput) {
                    chatInput.value = question;
                    sendMessage();
                }
            });
        });

        // Minimize/close
        if (minimizeBtn) {
            minimizeBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                assistant.classList.toggle('minimized');
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                assistant.classList.remove('active');
            });
        }

        // Show assistant after 3 seconds
        setTimeout(() => {
            assistant.classList.add('active');
        }, 3000);
    }

    // generateAIResponse(message) {
    //     const responses = {
    //         'سلام': 'سلام! 👋 خوش آمدید! چطور می‌تونم در سفر به استانبول کمکتون کنم؟',
    //         'هتل': 'هتل‌های لوکس زیادی در استانبول داریم. کدام منطقه رو ترجیح می‌دید؟ سلطان احمد، تکسیم یا بسفر؟',
    //         'غذا': 'استانبول بهشت غذاهای خیابانیه! پیشنهاد می‌کنم حتما دونر، باقلوا و چای ترکی رو امتحان کنید.',
    //         'جاذبه': 'ایاصوفیه، کاخ توپکاپی و مسجد آبی معروف‌ترین‌ها هستن. دوست دارید بیشتر در مورد کدوم بدونید؟',
    //         'قیمت': 'ورودی موزه‌ها بین ۵۰-۲۰۰ لیر، هتل‌ها از ۵۰۰ لیر به بالا، و غذا از ۵۰ لیر به بالا قیمت دارن.',
    //         'تور': 'تورهای دریایی بسفر، تورهای تاریخی و تورهای غذایی محبوب‌ترین‌ها هستن.',
    //         'متشکرم': 'خواهش می‌کنم! 🥰 اگه سوال دیگه‌ای دارید، در خدمتم.',
    //         'خداحافظ': 'خداحافظ! سفر خوبی داشته باشید. ✨'
    //     };

    //     message = message.toLowerCase();
        
    //     for (const [key, response] of Object.entries(responses)) {
    //         if (message.includes(key.toLowerCase())) {
    //             return response;
    //         }
    //     }

    //     return 'متأسفانه سوال شما رو کامل متوجه نشدم. می‌تونید در مورد هتل‌ها، جاذبه‌ها، غذاها یا برنامه‌ریزی سفر بپرسید.';
    // }

    // ===== FILTERS =====
    initFilters() {
        // Category filter
        const categoryFilter = document.querySelector('#categoryFilter, .filter-select');
        if (categoryFilter) {
            categoryFilter.addEventListener('change', () => this.applyFilters());
        }

        // District filter
        const districtFilter = document.querySelector('#districtFilter');
        if (districtFilter) {
            districtFilter.addEventListener('change', () => this.applyFilters());
        }

        // Price buttons
        document.querySelectorAll('.price-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.price-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                this.applyFilters();
            }.bind(this));
        });

        // Rating filter
        const ratingFilter = document.querySelector('#ratingFilter');
        if (ratingFilter) {
            ratingFilter.addEventListener('change', () => this.applyFilters());
        }

        // Reset filters
        const resetBtn = document.getElementById('resetFilters');
        if (resetBtn) {
            resetBtn.addEventListener('click', () => this.resetFilters());
        }
    }

    applyFilters() {
        // Get filter values
        const searchTerm = this.state.searchQuery.toLowerCase();
        const category = document.querySelector('#categoryFilter, .filter-select')?.value || 'all';
        const district = document.querySelector('#districtFilter')?.value || 'all';
        const price = document.querySelector('.price-btn.active')?.dataset.price;
        const rating = parseFloat(document.querySelector('#ratingFilter')?.value || '0');

        // Filter places (sample logic)
        const filtered = this.cache.places.filter(place => {
            // Search filter
            if (searchTerm && !place.name.fa.toLowerCase().includes(searchTerm) && 
                !place.description.fa.toLowerCase().includes(searchTerm)) {
                return false;
            }

            // Category filter
            if (category !== 'all' && !place.category.includes(category)) {
                return false;
            }

            // District filter
            if (district !== 'all' && place.district.fa !== district) {
                return false;
            }

            // Price filter
            if (price && price !== 'all' && place.price !== price) {
                return false;
            }

            // Rating filter
            if (rating > 0 && place.rating < rating) {
                return false;
            }

            return true;
        });

        // Update UI with filtered results
        this.renderPlaces(filtered);
    }

    resetFilters() {
        // Reset all filter inputs
        const searchInput = document.querySelector('.search-input');
        if (searchInput) searchInput.value = '';
        
        const categoryFilter = document.querySelector('#categoryFilter, .filter-select');
        if (categoryFilter) categoryFilter.value = 'all';
        
        const districtFilter = document.querySelector('#districtFilter');
        if (districtFilter) districtFilter.value = 'all';
        
        const ratingFilter = document.querySelector('#ratingFilter');
        if (ratingFilter) ratingFilter.value = '0';
        
        document.querySelectorAll('.price-btn').forEach(btn => {
            btn.classList.remove('active');
        });

        // Reset search query
        this.state.searchQuery = '';
        
        // Reload all places
        this.loadInitialData();
    }

    // ===== EVENT LISTENERS =====
    initEventListeners() {
        // Window resize
        window.addEventListener('resize', () => {
            if (this.map) {
                this.map.invalidateSize();
            }
        });

        // Scroll events
        window.addEventListener('scroll', () => {
            this.handleScroll();
        });

        // Click events for modals
        document.addEventListener('click', (e) => {
            // Close modals when clicking outside
            if (e.target.classList.contains('modal')) {
                e.target.remove();
            }
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            // Ctrl/Cmd + K for search
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                document.getElementById('searchToggle')?.click();
            }
            
            // Esc to close modals
            if (e.key === 'Escape') {
                const modals = document.querySelectorAll('.modal');
                modals.forEach(modal => modal.remove());
            }
        });
    }

    // ===== SCROLL EFFECTS =====
    initScrollEffects() {
        // Add scroll animations
        this.animateOnScroll();
        window.addEventListener('scroll', () => this.animateOnScroll());
    }

    handleScroll() {
        const nav = document.querySelector('.floating-nav');
        const scrollTop = window.pageYOffset;
        
        if (scrollTop > 100) {
            nav?.classList.add('scrolled');
        } else {
            nav?.classList.remove('scrolled');
        }
    }

    animateOnScroll() {
        const elements = document.querySelectorAll('.fade-in');
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (elementTop < windowHeight - 100) {
                element.classList.add('animated');
            }
        });
    }

    // ===== SCROLL HORIZONTAL FUNCTIONS =====
    initHorizontalScroll() {
        this.initPlacesScrollControls();
    }

    initPlacesScrollControls() {
        const placesGrid = document.getElementById('placesGrid');
        if (!placesGrid) return;

        // اضافه کردن کنترل‌های اسکرول به DOM
        const scrollControls = `
            <div class="scroll-controls">
                <button class="scroll-btn prev">
                    <i class="fas fa-chevron-right"></i>
                </button>
                <button class="scroll-btn next">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>
            <div class="scroll-indicator" id="scrollIndicator"></div>
        `;

        // اضافه کردن کنترل‌ها به بخش places
        const placesSection = document.querySelector('.discover-section');
        if (placesSection) {
            placesSection.insertAdjacentHTML('beforeend', scrollControls);
            
            // ایجاد نشانگرهای موقعیت
            this.createScrollIndicators();
            
            // افزودن event listeners
            this.initScrollEvents();
        }
    }

    createScrollIndicators() {
        const placesGrid = document.getElementById('placesGrid');
        const scrollIndicator = document.getElementById('scrollIndicator');
        if (!placesGrid || !scrollIndicator) return;

        // تعداد کارت‌های قابل نمایش در یک صفحه
        const cardWidth = 320;
        const gap = 25;
        const containerWidth = placesGrid.clientWidth;
        const cardsPerPage = Math.floor(containerWidth / (cardWidth + gap));
        const totalCards = this.cache.places.length;
        const totalPages = Math.ceil(totalCards / cardsPerPage);

        // پاک کردن نشانگرهای قبلی
        scrollIndicator.innerHTML = '';

        // ایجاد نشانگرهای جدید
        for (let i = 0; i < totalPages; i++) {
            const dot = document.createElement('div');
            dot.className = `indicator-dot ${i === 0 ? 'active' : ''}`;
            dot.dataset.page = i;
            dot.addEventListener('click', () => this.scrollToPage(i));
            scrollIndicator.appendChild(dot);
        }
    }

    initScrollEvents() {
        const prevBtn = document.querySelector('.scroll-btn.prev');
        const nextBtn = document.querySelector('.scroll-btn.next');
        const placesGrid = document.getElementById('placesGrid');

        if (!placesGrid) return;

        const cardWidth = 320;
        const gap = 25;
        const scrollAmount = cardWidth + gap;

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                placesGrid.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
                this.updateScrollIndicator();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                placesGrid.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
                this.updateScrollIndicator();
            });
        }

        // اسکرول با ماوس/لمس
        let isDown = false;
        let startX;
        let scrollLeft;

        placesGrid.addEventListener('mousedown', (e) => {
            isDown = true;
            placesGrid.classList.add('active');
            startX = e.pageX - placesGrid.offsetLeft;
            scrollLeft = placesGrid.scrollLeft;
        });

        placesGrid.addEventListener('mouseleave', () => {
            isDown = false;
            placesGrid.classList.remove('active');
        });

        placesGrid.addEventListener('mouseup', () => {
            isDown = false;
            placesGrid.classList.remove('active');
        });

        placesGrid.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - placesGrid.offsetLeft;
            const walk = (x - startX) * 2; // سرعت اسکرول
            placesGrid.scrollLeft = scrollLeft - walk;
            this.updateScrollIndicator();
        });

        // اسکرول با چرخ ماوس
        placesGrid.addEventListener('wheel', (e) => {
            e.preventDefault();
            placesGrid.scrollLeft += e.deltaY * 0.5;
            this.updateScrollIndicator();
        });

        // به‌روزرسانی خودکار نشانگر موقعیت
        placesGrid.addEventListener('scroll', () => {
            this.updateScrollIndicator();
        });

        // به‌روزرسانی هنگام تغییر سایز پنجره
        window.addEventListener('resize', () => {
            setTimeout(() => {
                this.createScrollIndicators();
                this.updateScrollIndicator();
            }, 300);
        });
    }

    updateScrollIndicator() {
        const placesGrid = document.getElementById('placesGrid');
        const dots = document.querySelectorAll('.indicator-dot');
        
        if (!placesGrid || !dots.length) return;

        const cardWidth = 320;
        const gap = 25;
        const containerWidth = placesGrid.clientWidth;
        const cardsPerPage = Math.floor(containerWidth / (cardWidth + gap));
        
        // محاسبه صفحه فعلی
        const scrollPosition = placesGrid.scrollLeft;
        const currentPage = Math.round(scrollPosition / (containerWidth - 100));
        const totalPages = Math.ceil(this.cache.places.length / cardsPerPage);
        
        // به‌روزرسانی نقاط فعال
        dots.forEach((dot, index) => {
            if (index === Math.min(currentPage, totalPages - 1)) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    scrollToPage(page) {
        const placesGrid = document.getElementById('placesGrid');
        if (!placesGrid) return;

        const cardWidth = 320;
        const gap = 25;
        const containerWidth = placesGrid.clientWidth;
        const cardsPerPage = Math.floor(containerWidth / (cardWidth + gap));
        
        const scrollPosition = page * (cardsPerPage * (cardWidth + gap));
        
        placesGrid.scrollTo({
            left: scrollPosition,
            behavior: 'smooth'
        });
    }

    // ===== DATA LOADING =====
    loadInitialData() {
        console.log('📦 Loading initial data...');
        
        // Load places data
        this.loadPlacesData();
        
        // Load hotels data
        this.loadHotelsData();
        
        // Update stats
        this.updateStats();
    }

    loadPlacesData() {
        // استفاده از داده‌های واقعی از data.js
        if (typeof placesData !== 'undefined') {
            this.cache.places = placesData.map(place => {
                // تبدیل category به آرایه اگر رشته است
                if (typeof place.category === 'string') {
                    place.category = [place.category];
                }
                
                // اطمینان از وجود tags
                if (!place.tags || !Array.isArray(place.tags)) {
                    place.tags = ['تاریخی'];
                }
                
                return place;
            });
        } else {
            // Fallback: داده‌های نمونه
            this.cache.places = [
                {
                    id: 1,
                    name: {fa: 'ایاصوفیه'},
                    description: {fa: 'موزه تاریخی با معماری بیزانس و عثمانی'},
                    image: 'assets/download (10).jpg',
                    rating: 4.8,
                    price: 'medium',
                    category: ['historical'],
                    district: {fa: 'سلطان احمد'},
                    tags: ['موزه', 'تاریخی', 'معماری'],
                    reviewCount: 12500
                },
                // ... سایر مکان‌های نمونه
            ];
        }
        
        // نمایش همه مکان‌ها (11 مکان)
        this.renderPlaces(this.cache.places);
    }

    loadHotelsData() {
        // Sample hotels data
        this.cache.hotels = [
            {
                id: 1,
                name: 'هیلتون استانبول',
                image: 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800&q=80',
                rating: 4.9,
                stars: 5,
                price: 2500,
                amenities: ['استخر', 'اسپا', 'رستوران']
            },
            {
                id: 2,
                name: 'هتل بوتیک استانبول',
                image: 'https://images.unsplash.com/photo-1564501049418-3c27787d01e8?w=800&q=80',
                rating: 4.5,
                stars: 4,
                price: 1200,
                amenities: ['صبحانه', 'وای‌فای', 'تراس']
            }
        ];
        
        // Render hotels
        this.renderHotels(this.cache.hotels);
    }

    // ===== RENDER FUNCTIONS =====
    renderPlaces(places) {
        const container = document.getElementById('placesGrid');
        if (!container) return;

        if (places.length === 0) {
            container.innerHTML = `
                <div class="no-results">
                    <i class="fas fa-search"></i>
                    <h3>نتیجه‌ای یافت نشد</h3>
                    <p>لطفاً عبارت جستجو یا فیلترها را تغییر دهید.</p>
                </div>
            `;
            return;
        }

        container.innerHTML = places.map(place => `
            <div class="place-card fade-in">
                <div class="place-image" style="background-image: url('${place.image || 'https://images.unsplash.com/photo-1527838832700-5059252407fa?w=800&q=80'}')">
                    <span class="place-badge">${this.getCategoryName(place.category[0])}</span>
                </div>
                <div class="place-content">
                    <h3 class="place-title">${place.name.fa || place.name}</h3>
                    <p class="place-description">${this.truncateText(place.description.fa || place.description, 120)}</p>
                    <div class="place-meta">
                        <div class="place-rating">
                            <i class="fas fa-star"></i>
                            <span>${place.rating}</span>
                            <small>(${place.reviewCount ? this.formatNumber(place.reviewCount) : '۱۰۰+'})</small>
                        </div>
                        <div class="place-price">
                            ${this.formatPrice(place.price)}
                        </div>
                    </div>
                    <div class="place-tags">
                        ${Array.isArray(place.tags.fa || place.tags) ? 
                            (place.tags.fa || place.tags).slice(0, 3).map(tag => `
                                <span class="tag">${tag}</span>
                            `).join('') : ''}
                    </div>
                    <div class="place-actions">
                        <button class="action-btn favorite-btn" data-id="${place.id}" title="افزودن به علاقه‌مندی‌ها">
                            <i class="fas fa-heart"></i>
                        </button>
                        <button class="action-btn share-btn" data-id="${place.id}" title="اشتراک‌گذاری">
                            <i class="fas fa-share-alt"></i>
                        </button>
                        <button class="action-btn details-btn" data-id="${place.id}" title="جزئیات بیشتر">
                            <i class="fas fa-info-circle"></i>
                        </button>
                        <button class="action-btn map-btn" data-lat="${place.coordinates?.lat}" data-lng="${place.coordinates?.lng}" title="نمایش روی نقشه">
                            <i class="fas fa-map-marker-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        `).join('');

        // Add event listeners to buttons
        this.initPlaceCardEvents();
        
        // به‌روزرسانی نشانگرهای اسکرول
        setTimeout(() => {
            this.createScrollIndicators();
            this.updateScrollIndicator();
        }, 100);
    }

    renderHotels(hotels) {
        const container = document.getElementById('hotelsGrid');
        if (!container) return;

        container.innerHTML = hotels.map(hotel => `
            <div class="hotel-card fade-in">
                <div class="hotel-image" style="background-image: url('${hotel.image}')">
                    <span class="hotel-badge">${hotel.rating}★</span>
                </div>
                <div class="hotel-content">
                    <h3 class="hotel-title">${hotel.name}</h3>
                    <div class="hotel-stars">
                        ${'★'.repeat(hotel.stars)}
                    </div>
                    <div class="hotel-amenities">
                        ${hotel.amenities.map(amenity => `
                            <span class="amenity">${amenity}</span>
                        `).join('')}
                    </div>
                    <div class="hotel-price">
                        <div class="price-amount">${hotel.price} لیر</div>
                        <button class="book-btn" data-id="${hotel.id}">رزرو آنلاین</button>
                    </div>
                </div>
            </div>
        `).join('');

        // Add event listeners
        document.querySelectorAll('.book-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const hotelId = e.currentTarget.dataset.id;
                this.bookHotel(hotelId);
            });
        });
    }

    initPlaceCardEvents() {
        // Favorite buttons
        document.querySelectorAll('.favorite-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const placeId = e.currentTarget.dataset.id;
                this.toggleFavorite(placeId);
            });
        });

        // Share buttons
        document.querySelectorAll('.share-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const placeId = e.currentTarget.dataset.id;
                this.sharePlace(placeId);
            });
        });

        // Details buttons
        document.querySelectorAll('.details-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const placeId = e.currentTarget.dataset.id;
                this.showPlaceDetails(placeId);
            });
        });

        // Map buttons
        document.querySelectorAll('.map-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const lat = e.currentTarget.dataset.lat;
                const lng = e.currentTarget.dataset.lng;
                if (lat && lng) {
                    this.map.setView([lat, lng], 16);
                }
            });
        });

        // Card click
        document.querySelectorAll('.place-card').forEach(card => {
            card.addEventListener('click', (e) => {
                if (!e.target.closest('.action-btn')) {
                    const placeId = card.querySelector('.details-btn')?.dataset.id;
                    if (placeId) this.showPlaceDetails(placeId);
                }
            });
        });
    }

    // ===== UTILITY FUNCTIONS =====
    scrollToSection(sectionId) {
        const section = document.getElementById(sectionId);
        if (section) {
            window.scrollTo({
                top: section.offsetTop - 80,
                behavior: 'smooth'
            });
        }
    }

    changeLanguage(lang) {
        this.state.language = lang;
        localStorage.setItem('language', lang);
        
        // Update UI language
        const currentLang = document.querySelector('.current-language span');
        const languages = {
            fa: 'فارسی',
            en: 'English',
            tr: 'Türkçe',
            ar: 'العربية'
        };
        
        if (currentLang) {
            currentLang.textContent = languages[lang] || 'فارسی';
        }
        
        // Update RTL/LTR direction
        if (['fa', 'ar'].includes(lang)) {
            document.documentElement.dir = 'rtl';
        } else {
            document.documentElement.dir = 'ltr';
        }
        
        // Reload content with new language
        this.loadInitialData();
    }

    initVoiceSearch() {
        if (!('webkitSpeechRecognition' in window) && !('SpeechRecognition' in window)) {
            alert('مرورگر شما از تشخیص صدا پشتیبانی نمی‌کند.');
            return;
        }

        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        const recognition = new SpeechRecognition();
        
        recognition.lang = 'fa-IR';
        recognition.interimResults = false;
        recognition.maxAlternatives = 1;

        const searchInput = document.querySelector('.search-input');
        
        if (searchInput) {
            recognition.start();
            searchInput.placeholder = 'در حال گوش کردن...';

            recognition.onresult = (event) => {
                const transcript = event.results[0][0].transcript;
                searchInput.value = transcript;
                searchInput.placeholder = 'جستجو...';
                this.performSearch(transcript);
            };

            recognition.onerror = () => {
                searchInput.placeholder = 'جستجو...';
            };

            recognition.onend = () => {
                searchInput.placeholder = 'جستجو...';
            };
        }
    }

    performSearch(query) {
        if (!query.trim()) {
            this.renderPlaces(this.cache.places);
            return;
        }
        
        console.log('Searching for:', query);
        
        // Filter places based on query
        const results = this.cache.places.filter(place => {
            const name = place.name.fa || place.name;
            const description = place.description.fa || place.description;
            const tags = place.tags.fa || place.tags;
            
            return name.toLowerCase().includes(query.toLowerCase()) ||
                   description.toLowerCase().includes(query.toLowerCase()) ||
                   (Array.isArray(tags) && tags.some(tag => tag.toLowerCase().includes(query.toLowerCase())));
        });
        
        this.renderPlaces(results);
        
        // Update search results count
        const resultsCount = document.getElementById('attractionsCount');
        if (resultsCount) {
            resultsCount.textContent = results.length;
        }
    }

    updateStats() {
        // Update quick stats
        const totalPlaces = document.getElementById('totalPlaces');
        const totalHotels = document.getElementById('totalHotels');
        const totalRestaurants = document.getElementById('totalRestaurants');
        const totalDistricts = document.getElementById('totalDistricts');
        
        if (totalPlaces) totalPlaces.textContent = this.cache.places.length;
        if (totalHotels) totalHotels.textContent = this.cache.hotels.length;
        if (totalRestaurants) totalRestaurants.textContent = '۸۰۰+';
        if (totalDistricts) totalDistricts.textContent = '۳۹';
    }

    updateUI() {
        // Update active tab
        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.toggle('active', link.dataset.section === this.state.currentTab);
        });
        
        // Update language selector
        const langSelect = document.querySelector('.current-language span');
        if (langSelect) {
            const languages = {
                fa: 'فارسی',
                en: 'English',
                tr: 'Türkçe',
                ar: 'العربية'
            };
            langSelect.textContent = languages[this.state.language] || 'فارسی';
        }
    }

    renderFilteredPlaces(places) {
        // Update places grid with filtered results
        this.renderPlaces(places);
        
        // Update results count
        const resultsCount = document.getElementById('attractionsCount');
        if (resultsCount) {
            resultsCount.textContent = places.length;
        }
    }

    toggleFavorite(placeId) {
        const index = this.state.favorites.indexOf(placeId);
        const btn = document.querySelector(`.favorite-btn[data-id="${placeId}"]`);
        
        if (index === -1) {
            this.state.favorites.push(placeId);
            if (btn) {
                btn.innerHTML = '<i class="fas fa-heart" style="color: #ef4444;"></i>';
                btn.title = 'حذف از علاقه‌مندی‌ها';
            }
        } else {
            this.state.favorites.splice(index, 1);
            if (btn) {
                btn.innerHTML = '<i class="fas fa-heart"></i>';
                btn.title = 'افزودن به علاقه‌مندی‌ها';
            }
        }
        
        localStorage.setItem('favorites', JSON.stringify(this.state.favorites));
    }

    sharePlace(placeId) {
        const place = this.cache.places.find(p => p.id == placeId);
        if (!place) return;
        
        const shareData = {
            title: place.name.fa || place.name,
            text: place.description.fa || place.description,
            url: window.location.href
        };
        
        if (navigator.share) {
            navigator.share(shareData);
        } else {
            // Fallback: copy to clipboard
            navigator.clipboard.writeText(`${place.name.fa} - ${place.description.fa}`);
            alert('لینک کپی شد!');
        }
    }

    showPlaceDetails(placeId) {
        const place = this.cache.places.find(p => p.id == placeId);
        if (!place) return;

        // Remove existing modal
        const existingModal = document.querySelector('.place-modal');
        if (existingModal) existingModal.remove();

        // Create modal
        const modal = document.createElement('div');
        modal.className = 'place-modal';
        modal.innerHTML = `
            <div class="modal-content">
                <div class="modal-header">
                    <h2>${place.name.fa || place.name}</h2>
                    <button class="close-modal">&times;</button>
                </div>
                <div class="modal-body">
                    <img src="${place.image || 'https://images.unsplash.com/photo-1527838832700-5059252407fa?w=800&q=80'}" 
                         alt="${place.name.fa || place.name}" 
                         class="modal-image">
                    <div class="modal-info">
                        <p>${place.description.fa || place.description}</p>
                        <div class="modal-details">
                            <div class="detail-item">
                                <i class="fas fa-star"></i>
                                <span>امتیاز: ${place.rating} (${place.reviewCount ? this.formatNumber(place.reviewCount) : '۱۰۰+'} نظر)</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-tag"></i>
                                <span>دسته‌بندی: ${this.getCategoryName(place.category[0])}</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>منطقه: ${place.district.fa || place.district}</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-clock"></i>
                                <span>ساعت کاری: ${place.openingHours?.fa || '۹:۰۰ صبح تا ۶:۰۰ عصر'}</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-money-bill"></i>
                                <span>هزینه: ${this.formatPrice(place.price)}</span>
                            </div>
                        </div>
                        <div class="modal-tags">
                            ${Array.isArray(place.tags.fa || place.tags) ? 
                                (place.tags.fa || place.tags).map(tag => `<span class="tag">${tag}</span>`).join('') : ''}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="modal-btn add-to-itinerary" data-id="${place.id}">
                        <i class="fas fa-plus"></i> افزودن به برنامه سفر
                    </button>
                    <button class="modal-btn get-directions" data-lat="${place.coordinates?.lat}" data-lng="${place.coordinates?.lng}">
                        <i class="fas fa-directions"></i> مسیریابی
                    </button>
                    <button class="modal-btn save-place" data-id="${place.id}">
                        <i class="fas fa-bookmark"></i> ذخیره مکان
                    </button>
                </div>
            </div>
        `;

        document.body.appendChild(modal);

        // Add event listeners
        modal.querySelector('.close-modal').addEventListener('click', () => {
            modal.remove();
        });

        modal.querySelector('.add-to-itinerary').addEventListener('click', () => {
            this.addToItinerary(place.id);
            modal.remove();
        });

        modal.querySelector('.get-directions').addEventListener('click', () => {
            this.getDirections(place);
            modal.remove();
        });

        modal.querySelector('.save-place').addEventListener('click', () => {
            this.toggleFavorite(place.id);
            modal.remove();
        });

        // Close on outside click
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.remove();
            }
        });
    }

    addToItinerary(placeId) {
        const place = this.cache.places.find(p => p.id == placeId);
        if (place) {
            this.state.itinerary.push(place);
            alert(`${place.name.fa || place.name} به برنامه سفر اضافه شد!`);
        }
    }

    getDirections(place) {
        if (place.coordinates) {
            const lat = place.coordinates.lat;
            const lng = place.coordinates.lng;
            
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                    const userLat = position.coords.latitude;
                    const userLng = position.coords.longitude;
                    const url = `https://www.google.com/maps/dir/${userLat},${userLng}/${lat},${lng}`;
                    window.open(url, '_blank');
                }, () => {
                    const url = `https://www.google.com/maps/search/?api=1&query=${lat},${lng}`;
                    window.open(url, '_blank');
                });
            } else {
                const url = `https://www.google.com/maps/search/?api=1&query=${lat},${lng}`;
                window.open(url, '_blank');
            }
        } else {
            alert('مختصات مکان در دسترس نیست.');
        }
    }

    bookHotel(hotelId) {
        const hotel = this.cache.hotels.find(h => h.id == hotelId);
        if (!hotel) return;

        // Create booking modal
        const modal = document.createElement('div');
        modal.className = 'booking-modal';
        modal.innerHTML = `
            <div class="modal-content">
                <div class="modal-header">
                    <h2>رزرو ${hotel.name}</h2>
                    <button class="close-modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="booking-form">
                        <div class="form-group">
                            <label>تاریخ ورود:</label>
                            <input type="date" required>
                        </div>
                        <div class="form-group">
                            <label>تاریخ خروج:</label>
                            <input type="date" required>
                        </div>
                        <div class="form-group">
                            <label>تعداد مهمان:</label>
                            <select required>
                                <option value="1">۱ نفر</option>
                                <option value="2">۲ نفر</option>
                                <option value="3">۳ نفر</option>
                                <option value="4">۴ نفر</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>تعداد اتاق:</label>
                            <select required>
                                <option value="1">۱ اتاق</option>
                                <option value="2">۲ اتاق</option>
                                <option value="3">۳ اتاق</option>
                            </select>
                        </div>
                        <div class="price-summary">
                            <h4>خلاصه هزینه:</h4>
                            <div class="price-item">
                                <span>قیمت هر شب:</span>
                                <span>${hotel.price} لیر</span>
                            </div>
                            <div class="price-item">
                                <span>مالیات و هزینه‌ها:</span>
                                <span>${Math.round(hotel.price * 0.1)} لیر</span>
                            </div>
                            <div class="price-item total">
                                <span>مجموع:</span>
                                <span>${Math.round(hotel.price * 1.1)} لیر</span>
                            </div>
                        </div>
                        <button type="submit" class="submit-booking">
                            <i class="fas fa-check"></i> تأیید رزرو
                        </button>
                    </form>
                </div>
            </div>
        `;

        document.body.appendChild(modal);

        // Add event listeners
        modal.querySelector('.close-modal').addEventListener('click', () => {
            modal.remove();
        });

        modal.querySelector('.booking-form').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('رزرو شما با موفقیت ثبت شد!');
            modal.remove();
        });

        // Close on outside click
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.remove();
            }
        });
    }

    // Helper functions
    getCategoryName(category) {
        const categories = {
            'historical': 'تاریخی',
            'museum': 'موزه',
            'mosque': 'مسجد',
            'bazaar': 'بازار',
            'palace': 'کاخ',
            'park': 'پارک',
            'shopping': 'خرید',
            'food': 'غذا',
            'nature': 'طبیعت'
        };
        return categories[category] || category;
    }

    formatPrice(price) {
        const prices = {
            'free': 'رایگان',
            'low': 'اقتصادی',
            'medium': 'متوسط',
            'high': 'گران'
        };
        return prices[price] || price;
    }

    truncateText(text, maxLength = 100) {
        if (!text) return '';
        if (text.length <= maxLength) return text;
        return text.substr(0, maxLength) + '...';
    }

    formatNumber(num) {
        if (!num) return '۰';
        return new Intl.NumberFormat('fa-IR').format(num);
    }

    toggleMapLayers() {
        // Toggle between map layers
        alert('تغییر لایه نقشه به زودی اضافه خواهد شد.');
    }

    // ===== CLEANUP =====
    destroy() {
        // Clean up intervals
        if (this.autoRotateInterval) {
            clearInterval(this.autoRotateInterval);
        }
        
        // Remove event listeners
        document.removeEventListener('scroll', this.handleScroll);
        window.removeEventListener('resize', this.handleResize);
        
        console.log('🧹 Istanbul Guide cleaned up.');
    }
}

// Initialize the application when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    // Create global instance
    window.guide = new IstanbulGuide();
    
    // Add some global helper functions
    window.showPlaceDetails = (placeId) => {
        if (window.guide) {
            window.guide.showPlaceDetails(placeId);
        }
    };
    
    window.bookHotel = (hotelId) => {
        if (window.guide) {
            window.guide.bookHotel(hotelId);
        }
    };
    
    // Make guide accessible globally
    console.log('🌍 Istanbul Guide is ready!');
});

// Add CSS for animations and transitions
const additionalStyles = `
    .theme-transition {
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    
    .fade-in.animated {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* استایل‌های جدید برای اسکرول افقی */
    .places-section {
        position: relative;
        overflow: hidden;
    }
    
    .places-grid {
        display: flex;
        gap: 25px;
        padding: 20px 0;
        overflow-x: auto;
        overflow-y: hidden;
        scroll-behavior: smooth;
        scrollbar-width: thin;
        scrollbar-color: var(--color-primary) var(--color-gray-100);
        -webkit-overflow-scrolling: touch;
        margin: 0 -20px;
        padding: 20px;
    }
    
    .places-grid::-webkit-scrollbar {
        height: 8px;
    }
    
    .places-grid::-webkit-scrollbar-track {
        background: var(--color-gray-100);
        border-radius: 10px;
        margin: 0 20px;
    }
    
    .places-grid::-webkit-scrollbar-thumb {
        background: var(--color-primary);
        border-radius: 10px;
    }
    
    .places-grid::-webkit-scrollbar-thumb:hover {
        background: var(--color-primary-dark);
    }
    
    /* کارت مکان‌ها برای اسکرول افقی */
    .place-card {
        flex: 0 0 auto;
        width: 320px;
        background: var(--color-white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        height: 420px;
        display: flex;
        flex-direction: column;
    }
    
    .place-card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }
    
    /* کنترل‌های اسکرول */
    .scroll-controls {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        transform: translateY(-50%);
        display: flex;
        justify-content: space-between;
        pointer-events: none;
        z-index: 10;
        padding: 0 10px;
    }
    
    .scroll-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: var(--color-white);
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        color: var(--color-primary);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        pointer-events: all;
        font-size: 1.2rem;
    }
    
    .scroll-btn:hover {
        background: var(--color-primary);
        color: white;
        transform: scale(1.1);
    }
    
    .scroll-btn.prev {
        margin-right: auto;
    }
    
    .scroll-btn.next {
        margin-left: auto;
    }
    
    /* نشانگر موقعیت اسکرول */
    .scroll-indicator {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-top: 20px;
    }
    
    .indicator-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: var(--color-gray-300);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .indicator-dot.active {
        background: var(--color-primary);
        transform: scale(1.3);
    }
    
    /* استایل برای حالت تاریک */
    [data-theme="dark"] .place-card {
        background: var(--color-gray-800);
        box-shadow: 0 5px 20px rgba(0,0,0,0.3);
    }
    
    [data-theme="dark"] .scroll-btn {
        background: var(--color-gray-800);
        color: var(--color-white);
    }
    
    [data-theme="dark"] .scroll-btn:hover {
        background: var(--color-primary);
    }
    
    [data-theme="dark"] .indicator-dot {
        background: var(--color-gray-600);
    }
    
    /* استایل‌های باقیمانده کارت */
    .place-image {
        height: 200px;
        background-size: cover;
        background-position: center;
        position: relative;
    }
    
    .place-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--color-primary);
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .place-content {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .place-title {
        margin: 0 0 10px 0;
        font-size: 1.2rem;
        color: var(--color-gray-900);
    }
    
    .place-description {
        color: var(--color-gray-600);
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 15px;
        flex: 1;
    }
    
    .place-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .place-rating {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #f59e0b;
        font-weight: 600;
    }
    
    .place-rating small {
        color: var(--color-gray-500);
        font-size: 0.8rem;
    }
    
    .place-price {
        background: var(--color-gray-100);
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--color-gray-700);
    }
    
    .place-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 15px;
    }
    
    .place-tags .tag {
        background: var(--color-gray-100);
        color: var(--color-gray-700);
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 0.75rem;
    }
    
    .place-actions {
        display: flex;
        gap: 10px;
        margin-top: auto;
    }
    
    .action-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: none;
        background: var(--color-gray-100);
        color: var(--color-gray-700);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .action-btn:hover {
        background: var(--color-primary);
        color: white;
        transform: scale(1.1);
    }
    
    [data-theme="dark"] .place-title {
        color: var(--color-white);
    }
    
    [data-theme="dark"] .place-description {
        color: var(--color-gray-400);
    }
    
    [data-theme="dark"] .place-price {
        background: var(--color-gray-700);
        color: var(--color-gray-300);
    }
    
    [data-theme="dark"] .place-tags .tag {
        background: var(--color-gray-700);
        color: var(--color-gray-300);
    }
    
    [data-theme="dark"] .action-btn {
        background: var(--color-gray-700);
        color: var(--color-gray-300);
    }
    
    .simple-virtual-tour {
        position: relative;
        width: 100%;
        height: 500px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    
    .tour-viewer {
        position: relative;
        width: 100%;
        height: 100%;
        background: #000;
    }
    
    .tour-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
        cursor: grab;
    }
    
    .tour-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0.7) 0%, transparent 30%, transparent 70%, rgba(0,0,0,0.7) 100%);
        pointer-events: none;
    }
    
    .tour-info {
        position: absolute;
        top: 20px;
        right: 20px;
        color: white;
        max-width: 300px;
        pointer-events: none;
    }
    
    .tour-info h3 {
        margin-bottom: 5px;
        font-size: 1.5rem;
    }
    
    .image-counter {
        margin-top: 10px;
        font-size: 0.9rem;
        opacity: 0.8;
    }
    
    .tour-controls-overlay {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
        pointer-events: all;
    }
    
    .tour-control-btn {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        border: none;
        color: white;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }
    
    .tour-control-btn:hover {
        background: var(--color-primary);
        transform: scale(1.1);
    }
    
    .hotspots {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    
    .hotspot {
        position: absolute;
        cursor: pointer;
        transform: translate(-50%, -50%);
    }
    
    .hotspot-marker {
        width: 20px;
        height: 20px;
        background: var(--color-primary);
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 0 10px rgba(124, 58, 237, 0.5);
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.2); }
    }
    
    .tour-thumbnails {
        position: absolute;
        bottom: 20px;
        right: 20px;
        display: flex;
        gap: 10px;
        max-width: 200px;
        overflow-x: auto;
        padding: 10px;
        background: rgba(0,0,0,0.7);
        border-radius: 10px;
        backdrop-filter: blur(10px);
    }
    
    .thumbnail {
        width: 60px;
        height: 40px;
        border-radius: 5px;
        overflow: hidden;
        cursor: pointer;
        opacity: 0.6;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }
    
    .thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .thumbnail:hover,
    .thumbnail.active {
        opacity: 1;
        transform: scale(1.1);
        border: 2px solid var(--color-primary);
    }
    
    .hotspot-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10000;
    }
    
    .hotspot-modal .modal-content {
        background: white;
        padding: 20px;
        border-radius: 10px;
        max-width: 300px;
        position: relative;
    }
    
    .hotspot-modal .close-btn {
        position: absolute;
        top: 10px;
        left: 10px;
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
    }
    
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        backdrop-filter: blur(5px);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10000;
        animation: fadeIn 0.3s ease;
    }
    
    .modal-content {
        background: var(--color-white);
        border-radius: 20px;
        padding: 30px;
        max-width: 600px;
        width: 90%;
        max-height: 80vh;
        overflow-y: auto;
        animation: slideUp 0.3s ease;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    }
    
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--color-gray-200);
    }
    
    .modal-header h2 {
        margin: 0;
        color: var(--color-gray-900);
    }
    
    .close-modal {
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
        color: var(--color-gray-600);
        transition: color 0.3s ease;
    }
    
    .close-modal:hover {
        color: var(--color-primary);
    }
    
    .modal-body {
        margin-bottom: 20px;
    }
    
    .modal-footer {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
        padding-top: 20px;
        border-top: 1px solid var(--color-gray-200);
    }
    
    .modal-btn {
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .modal-btn.print-btn {
        background: var(--color-gray-200);
        color: var(--color-gray-800);
    }
    
    .modal-btn.save-btn {
        background: var(--color-primary);
        color: white;
    }
    
    .modal-btn.share-btn {
        background: var(--color-secondary);
        color: white;
    }
    
    .modal-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes slideUp {
        from {
            transform: translateY(50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    
    .no-results {
        grid-column: 1 / -1;
        text-align: center;
        padding: 40px;
        color: var(--color-gray-600);
    }
    
    .no-results i {
        font-size: 3rem;
        margin-bottom: 20px;
        color: var(--color-gray-400);
    }
    
    .scrolled {
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(20px) !important;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1) !important;
    }
    
    [data-theme="dark"] .scrolled {
        background: rgba(15, 23, 42, 0.95) !important;
    }
`;

// Add styles to document
const styleSheet = document.createElement('style');
styleSheet.textContent = additionalStyles;
document.head.appendChild(styleSheet);