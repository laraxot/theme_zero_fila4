// Alpine.js Components for Theme One

document.addEventListener('alpine:init', () => {
    // Dark mode switcher
    Alpine.data('darkMode', () => ({
        isDark: false,
        
        init() {
            this.isDark = localStorage.getItem('darkMode') === 'true' || 
                          window.matchMedia('(prefers-color-scheme: dark)').matches;
            this.updateTheme();
        },
        
        toggle() {
            this.isDark = !this.isDark;
            localStorage.setItem('darkMode', this.isDark);
            this.updateTheme();
        },
        
        updateTheme() {
            if (this.isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
    }));

    // Mobile menu
    Alpine.data('mobileMenu', () => ({
        isOpen: false,
        
        toggle() {
            this.isOpen = !this.isOpen;
        },
        
        close() {
            this.isOpen = false;
        }
    }));

    // Search functionality
    Alpine.data('search', () => ({
        query: '',
        results: [],
        isSearching: false,
        
        async search() {
            if (this.query.length < 2) {
                this.results = [];
                return;
            }
            
            this.isSearching = true;
            
            try {
                const response = await fetch(`/api/search?q=${encodeURIComponent(this.query)}`);
                const data = await response.json();
                this.results = data.results || [];
            } catch (error) {
                console.error('Search error:', error);
                this.results = [];
            } finally {
                this.isSearching = false;
            }
        },
        
        clear() {
            this.query = '';
            this.results = [];
        }
    }));

    // Form validation
    Alpine.data('formValidation', () => ({
        errors: {},
        isValid: true,
        
        validate(field, rules) {
            const value = this.$refs[field]?.value || '';
            let fieldErrors = [];
            
            if (rules.required && !value) {
                fieldErrors.push('Questo campo è obbligatorio');
            }
            
            if (rules.email && value && !this.isValidEmail(value)) {
                fieldErrors.push('Inserisci un indirizzo email valido');
            }
            
            if (rules.minLength && value.length < rules.minLength) {
                fieldErrors.push(`Minimo ${rules.minLength} caratteri`);
            }
            
            this.errors[field] = fieldErrors;
            this.isValid = Object.keys(this.errors).every(key => this.errors[key].length === 0);
            
            return fieldErrors.length === 0;
        },
        
        isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        },
        
        clearErrors() {
            this.errors = {};
            this.isValid = true;
        }
    }));

    // Notification system
    Alpine.data('notifications', () => ({
        notifications: [],
        
        add(message, type = 'info', duration = 5000) {
            const id = Date.now();
            const notification = {
                id,
                message,
                type,
                duration
            };
            
            this.notifications.push(notification);
            
            if (duration > 0) {
                setTimeout(() => {
                    this.remove(id);
                }, duration);
            }
            
            return id;
        },
        
        remove(id) {
            this.notifications = this.notifications.filter(n => n.id !== id);
        },
        
        success(message, duration = 5000) {
            return this.add(message, 'success', duration);
        },
        
        error(message, duration = 5000) {
            return this.add(message, 'error', duration);
        },
        
        warning(message, duration = 5000) {
            return this.add(message, 'warning', duration);
        },
        
        info(message, duration = 5000) {
            return this.add(message, 'info', duration);
        }
    }));

    // Lazy loading for images
    Alpine.data('lazyImage', () => ({
        loaded: false,
        error: false,
        
        load() {
            const img = this.$el;
            const src = img.dataset.src;
            
            if (!src) return;
            
            const image = new Image();
            image.onload = () => {
                img.src = src;
                this.loaded = true;
            };
            image.onerror = () => {
                this.error = true;
            };
            image.src = src;
        }
    }));

    // Smooth scrolling
    Alpine.data('smoothScroll', () => ({
        scrollTo(target) {
            const element = document.querySelector(target);
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    }));
});
