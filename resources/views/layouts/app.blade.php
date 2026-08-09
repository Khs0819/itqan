<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'جمعية إتقان التعليمية')</title>
    <meta name="description" content="@yield('meta_description', 'جمعية إتقان التعليمية - نستثمر في الإنسان. جمعية أهلية تعليمية تسعى للارتقاء بالتعليم الجامعي والعالي.')">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', 'جمعية إتقان التعليمية')">
    <meta property="og:description" content="@yield('og_description', 'نستثمر في الإنسان')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="ar_SA">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="antialiased overflow-x-hidden" x-data="{ mobileOpen: false, scrolled: false }"
      x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })">

    {{-- Skip to Content --}}
    <a href="#main-content" class="skip-to-content">تخطي إلى المحتوى الرئيسي</a>

    {{-- ===== HEADER ===== --}}
    <header class="header-section" :class="scrolled ? 'scrolled' : ''">
        <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                {{-- Logo --}}
                <a href="/" class="flex-shrink-0 relative z-10">
                    <img src="{{ asset('images/logo.png') }}" alt="جمعية إتقان التعليمية" class="h-14 w-auto"
                         :class="scrolled ? '' : 'brightness-0 invert'"
                         style="transition: filter 0.4s ease">
                </a>

                {{-- Desktop Navigation --}}
                <nav class="hidden lg:flex items-center gap-1" x-data="{ activeMenu: null }">
                    <a href="/" class="px-4 py-2 text-[15px] font-medium transition-colors duration-300"
                       :class="scrolled ? 'text-gray-700 hover:text-primary-600' : 'text-white/90 hover:text-white'">الرئيسية</a>

                    {{-- About Dropdown --}}
                    <div class="relative" @mouseenter="activeMenu = 'about'" @mouseleave="activeMenu = null">
                        <button class="px-4 py-2 text-[15px] font-medium transition-colors duration-300 flex items-center gap-1"
                                :class="scrolled ? 'text-gray-700 hover:text-primary-600' : 'text-white/90 hover:text-white'">
                            عن الجمعية
                            <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="activeMenu === 'about' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="activeMenu === 'about'"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="absolute top-full right-0 mt-2 w-52 bg-white rounded-xl shadow-xl border border-gray-100/80 py-2 z-50" x-cloak>
                            <a href="/about" class="block px-5 py-2.5 text-[14px] text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">نشأة الجمعية</a>
                            <a href="/about#vision" class="block px-5 py-2.5 text-[14px] text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">الرؤية والرسالة</a>
                            <a href="/about#goals" class="block px-5 py-2.5 text-[14px] text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">الأهداف</a>
                            <a href="/about#board" class="block px-5 py-2.5 text-[14px] text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">مجلس الإدارة</a>
                        </div>
                    </div>

                    <a href="/programs" class="px-4 py-2 text-[15px] font-medium transition-colors duration-300"
                       :class="scrolled ? 'text-gray-700 hover:text-primary-600' : 'text-white/90 hover:text-white'">البرامج</a>

                    {{-- Services Dropdown --}}
                    <div class="relative" @mouseenter="activeMenu = 'services'" @mouseleave="activeMenu = null">
                        <button class="px-4 py-2 text-[15px] font-medium transition-colors duration-300 flex items-center gap-1"
                                :class="scrolled ? 'text-gray-700 hover:text-primary-600' : 'text-white/90 hover:text-white'">
                            الخدمات
                            <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="activeMenu === 'services' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="activeMenu === 'services'"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="absolute top-full right-0 mt-2 w-52 bg-white rounded-xl shadow-xl border border-gray-100/80 py-2 z-50" x-cloak>
                            <a href="/grants" class="block px-5 py-2.5 text-[14px] text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">المنح الدراسية</a>
                            <a href="/volunteer" class="block px-5 py-2.5 text-[14px] text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">تطوع معنا</a>
                            <a href="/careers" class="block px-5 py-2.5 text-[14px] text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">الوظائف</a>
                            <a href="/services" class="block px-5 py-2.5 text-[14px] text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">الخدمات التعليمية</a>
                        </div>
                    </div>

                    <a href="/news" class="px-4 py-2 text-[15px] font-medium transition-colors duration-300"
                       :class="scrolled ? 'text-gray-700 hover:text-primary-600' : 'text-white/90 hover:text-white'">الأخبار</a>
                    <a href="/governance" class="px-4 py-2 text-[15px] font-medium transition-colors duration-300"
                       :class="scrolled ? 'text-gray-700 hover:text-primary-600' : 'text-white/90 hover:text-white'">الحوكمة</a>
                    <a href="/contact" class="px-4 py-2 text-[15px] font-medium transition-colors duration-300"
                       :class="scrolled ? 'text-gray-700 hover:text-primary-600' : 'text-white/90 hover:text-white'">تواصل معنا</a>
                </nav>

                {{-- Header Tools --}}
                <div class="hidden lg:flex items-center gap-3">
                    <a href="/grants" class="btn-primary">
                        <span>منصة المنح</span>
                        <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

                {{-- Mobile Menu Toggle --}}
                <button @click="mobileOpen = !mobileOpen" class="lg:hidden p-2 rounded-lg transition-colors"
                        :class="scrolled ? 'text-gray-700' : 'text-white'">
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="mobileOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="lg:hidden bg-white border-t border-gray-100 shadow-lg" x-cloak>
            <div class="max-w-[1320px] mx-auto px-6 py-4 space-y-1">
                <a href="/" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 rounded-lg font-medium">الرئيسية</a>
                <a href="/about" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 rounded-lg font-medium">عن الجمعية</a>
                <a href="/programs" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 rounded-lg font-medium">البرامج</a>
                <a href="/grants" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 rounded-lg font-medium">المنح الدراسية</a>
                <a href="/news" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 rounded-lg font-medium">الأخبار</a>
                <a href="/governance" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 rounded-lg font-medium">الحوكمة</a>
                <a href="/contact" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 rounded-lg font-medium">تواصل معنا</a>
                <div class="pt-3 border-t border-gray-100">
                    <a href="/grants" class="block w-full text-center px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl">منصة المنح</a>
                </div>
            </div>
        </div>
    </header>

    {{-- ===== MAIN CONTENT ===== --}}
    <main id="main-content" role="main">
        @yield('content')
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="footer">
        {{-- Animated gradient line --}}
        <div class="footer-gradient-line"></div>

        <div class="max-w-[1320px] mx-auto px-6 lg:px-8 pt-16 pb-8">
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-12">

                {{-- About Column --}}
                <div class="col-span-2 lg:col-span-1">
                    <img src="{{ asset('images/logo-white.png') }}" alt="جمعية إتقان التعليمية" class="h-12 md:h-16 w-auto mb-4">
                    <p class="footer-text mb-6">جمعية أهلية تعليمية تأسست العام 2025م، تسعى للارتقاء بالتعليم الجامعي والعالي والمساهمة في تطوير النظام التعليمي وفقًا لرؤية السعودية 2030.</p>
                    <div class="flex gap-2">
                        <a href="#" class="footer-social" aria-label="تويتر">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        <a href="#" class="footer-social" aria-label="انستقرام">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="#" class="footer-social" aria-label="واتساب">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h4 class="footer-heading">روابط سريعة</h4>
                    <ul class="space-y-2">
                        <li><a href="/about" class="footer-link">عن الجمعية</a></li>
                        <li><a href="/programs" class="footer-link">البرامج</a></li>
                        <li><a href="/news" class="footer-link">الأخبار</a></li>
                        <li><a href="/gallery" class="footer-link">المعرض</a></li>
                        <li><a href="/governance" class="footer-link">الحوكمة</a></li>
                        <li><a href="/contact" class="footer-link">تواصل معنا</a></li>
                    </ul>
                </div>

                {{-- Services --}}
                <div>
                    <h4 class="footer-heading">خدماتنا</h4>
                    <ul class="space-y-2">
                        <li><a href="/grants" class="footer-link">المنح الدراسية</a></li>
                        <li><a href="/volunteer" class="footer-link">التطوع</a></li>
                        <li><a href="/careers" class="footer-link">الوظائف</a></li>
                        <li><a href="/services" class="footer-link">الخدمات التعليمية</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div class="col-span-2 lg:col-span-1">
                    <h4 class="footer-heading">تواصل معنا</h4>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-start gap-3">
                            <svg class="w-4 h-4 text-primary-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="footer-text">الدمام، المملكة العربية السعودية</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-4 h-4 text-primary-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span class="footer-text">info@itqan-association.com</span>
                        </div>
                    </div>
                    {{-- Newsletter --}}
                    <h5 class="text-white text-xs font-bold mb-2">النشرة البريدية</h5>
                    <form action="/newsletter" method="POST" class="flex gap-2">
                        @csrf
                        <input type="email" name="email" placeholder="بريدك الإلكتروني" required class="newsletter-input flex-1">
                        <button type="submit" class="px-4 py-2 bg-primary-600 hover:bg-primary-500 text-white rounded-lg text-xs font-semibold transition-colors">اشترك</button>
                    </form>
                </div>
            </div>

            {{-- Bottom Bar --}}
            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-white/60 text-sm">© {{ date('Y') }} جمعية إتقان التعليمية. جميع الحقوق محفوظة. ترخيص رقم 1000755200</p>
                <div class="flex items-center gap-6 text-sm">
                    <a href="/privacy" class="text-white/60 hover:text-white transition-colors">سياسة الخصوصية</a>
                    <a href="/terms" class="text-white/60 hover:text-white transition-colors">الشروط والأحكام</a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
