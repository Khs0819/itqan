import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import intersect from '@alpinejs/intersect';
import focus from '@alpinejs/focus';
import axios from 'axios';

// Alpine.js Plugins
Alpine.plugin(collapse);
Alpine.plugin(intersect);
Alpine.plugin(focus);

// Global Alpine Data
Alpine.data('counter', (target, duration = 2000) => ({
    current: 0,
    target: target,
    init() {
        this.animateCounter();
    },
    animateCounter() {
        const steps = 60;
        const increment = this.target / steps;
        const stepDuration = duration / steps;
        let step = 0;

        const timer = setInterval(() => {
            step++;
            this.current = Math.min(Math.round(increment * step), this.target);
            if (step >= steps) {
                clearInterval(timer);
                this.current = this.target;
            }
        }, stepDuration);
    }
}));

Alpine.data('navbar', () => ({
    scrolled: false,
    mobileOpen: false,
    activeDropdown: null,
    init() {
        window.addEventListener('scroll', () => {
            this.scrolled = window.scrollY > 50;
        });
    },
    toggleDropdown(name) {
        this.activeDropdown = this.activeDropdown === name ? null : name;
    },
    closeAll() {
        this.activeDropdown = null;
        this.mobileOpen = false;
    }
}));

Alpine.data('gallery', () => ({
    lightboxOpen: false,
    currentImage: '',
    currentCaption: '',
    images: [],
    currentIndex: 0,
    openLightbox(src, caption, index) {
        this.currentImage = src;
        this.currentCaption = caption;
        this.currentIndex = index;
        this.lightboxOpen = true;
        document.body.style.overflow = 'hidden';
    },
    closeLightbox() {
        this.lightboxOpen = false;
        document.body.style.overflow = '';
    },
    next() {
        this.currentIndex = (this.currentIndex + 1) % this.images.length;
        this.currentImage = this.images[this.currentIndex].src;
        this.currentCaption = this.images[this.currentIndex].caption;
    },
    prev() {
        this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
        this.currentImage = this.images[this.currentIndex].src;
        this.currentCaption = this.images[this.currentIndex].caption;
    }
}));

Alpine.data('slider', (autoplay = true, interval = 5000) => ({
    current: 0,
    total: 0,
    autoplayTimer: null,
    init() {
        this.total = this.$refs.slides?.children.length || 0;
        if (autoplay && this.total > 1) {
            this.startAutoplay();
        }
    },
    goTo(index) {
        this.current = index;
        this.resetAutoplay();
    },
    next() {
        this.current = (this.current + 1) % this.total;
        this.resetAutoplay();
    },
    prev() {
        this.current = (this.current - 1 + this.total) % this.total;
        this.resetAutoplay();
    },
    startAutoplay() {
        this.autoplayTimer = setInterval(() => this.next(), interval);
    },
    resetAutoplay() {
        if (this.autoplayTimer) {
            clearInterval(this.autoplayTimer);
            if (autoplay) this.startAutoplay();
        }
    }
}));

// Configure Axios
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// CSRF Token
const token = document.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

// Start Alpine
window.Alpine = Alpine;
Alpine.start();
