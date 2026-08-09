@extends('layouts.app')
@section('title', 'جمعية إتقان التعليمية - نستثمر في الإنسان')
@section('content')

{{-- ============================================
    HERO SECTION - Full-Screen Immersive (REDESIGNED)
============================================= --}}
<section class="hero-section" x-data="{ activeSlide: 0, slides: [0,1,2,3] }" x-init="setInterval(() => activeSlide = (activeSlide + 1) % slides.length, 6000)">
    {{-- Background Cover with enhanced overlay --}}
    <div class="hero-cover">
        <img src="{{ asset('images/defaults/hero-bg.jpg') }}" alt="مقر جمعية إتقان التعليمية" class="w-full h-full object-cover">
    </div>

    {{-- Mesh gradient layer --}}
    <div class="hero-mesh"></div>

    {{-- Floating decorative orbs --}}
    <div class="hero-float-orb hero-float-orb--1"></div>
    <div class="hero-float-orb hero-float-orb--2"></div>
    <div class="hero-float-orb hero-float-orb--3"></div>

    {{-- Geometric decorations --}}
    <div class="hero-geometric hero-geometric--diamond"></div>
    <div class="hero-geometric hero-geometric--circle"></div>

    {{-- Hero Content --}}
    <div class="hero-content pt-32 pb-40">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            {{-- Text Side --}}
            <div class="relative z-10">
                <div class="hero-badge mb-6">
                    <span class="w-2 h-2 bg-accent-400 rounded-full animate-pulse"></span>
                    ترخيص وزارة الموارد البشرية رقم 1000755200
                </div>

                <h1 class="hero-title">
                    نستثمر في
                    <span class="highlight">الإنسان</span>
                </h1>

                <p class="hero-desc">
                    جمعية أهلية تعليمية تأسست العام 2025م، تسعى للارتقاء بالتعليم الجامعي والعالي والمساهمة في بناء جيل متعلم ومؤهل يخدم الوطن وفقاً لرؤية 2030.
                </p>

                <div class="hero-actions">
                    <a href="/programs" class="hero-btn-primary">
                        استكشف برامجنا
                        <svg class="w-5 h-5 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a href="/about" class="hero-btn-secondary">
                        تعرف علينا
                    </a>
                </div>
            </div>

            {{-- Visual Side - Redesigned Stats Grid --}}
            <div class="relative">
                <div class="grid grid-cols-2 gap-4">
                    @foreach([
                        ['num' => '15', 'suffix' => '+', 'label' => 'برنامج تعليمي', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                        ['num' => '5000', 'suffix' => '+', 'label' => 'مستفيد', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                        ['num' => '200', 'suffix' => '+', 'label' => 'منحة دراسية', 'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z'],
                        ['num' => '50', 'suffix' => '+', 'label' => 'شراكة مؤسسية', 'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9']
                    ] as $i => $s)
                    <div class="hero-stat-card"
                         x-data="{ count: 0, target: {{ $s['num'] }} }"
                         x-intersect.once="let start = 0; const step = Math.ceil(target / 60); const timer = setInterval(() => { start += step; if (start >= target) { count = target; clearInterval(timer); } else { count = start; }}, 30)">
                        <div class="stat-icon">
                            <svg class="w-6 h-6 text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $s['icon'] }}"/></svg>
                        </div>
                        <div class="stat-number">
                            <span x-text="count">0</span><span class="stat-suffix">{{ $s['suffix'] }}</span>
                        </div>
                        <p class="stat-label">{{ $s['label'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom Wave --}}
    <div class="absolute bottom-0 left-0 right-0 z-10">
        <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="w-full h-16 md:h-20">
            <path d="M0 80V40C240 60 480 20 720 40C960 60 1200 20 1440 40V80H0Z" fill="white"/>
        </svg>
    </div>
</section>

{{-- ============================================
    ABOUT SECTION
============================================= --}}
<section class="section section-white">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
            {{-- Image Side --}}
            <div class="relative" x-intersect="$el.classList.add('animate-fade-in')">
                <div class="about-image-holder aspect-[4/3] rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/defaults/about.jpg') }}" alt="مكتب جمعية إتقان التعليمية" class="w-full h-full object-cover">
                </div>
                {{-- Floating badge --}}
                <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl shadow-xl p-5 border border-gray-100 hidden md:block">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-accent-50 flex items-center justify-center">
                            <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-900">مسجلة رسمياً</p>
                            <p class="text-xs text-gray-500">وزارة الموارد البشرية</p>
                        </div>
                    </div>
                </div>
                {{-- Decorative accent corner --}}
                <div class="absolute -top-4 -right-4 w-24 h-24 border-2 border-primary-200 rounded-2xl -z-10 hidden md:block"></div>
            </div>

            {{-- Text Side --}}
            <div x-intersect="$el.classList.add('animate-slide-up')">
                <div class="section-head">
                    <h4 class="section-subtitle">عن الجمعية</h4>
                    <h2 class="section-title">نحن نعمل لبناء مستقبل تعليمي أفضل</h2>
                    <p class="section-desc">جمعية إتقان التعليمية جمعية أهلية تأسست العام 2025م، متخصصة في دعم وتطوير التعليم الجامعي والعالي في المملكة العربية السعودية.</p>
                </div>

                <div class="grid sm:grid-cols-2 gap-4 mb-8">
                    @foreach([
                        ['title' => 'الرؤية', 'desc' => 'الريادة في تطوير التعليم الجامعي والعالي', 'color' => 'bg-primary-50 text-primary-600'],
                        ['title' => 'الرسالة', 'desc' => 'تعزيز جودة التعليم من خلال برامج مبتكرة', 'color' => 'bg-secondary-50 text-secondary-600'],
                        ['title' => 'القيم', 'desc' => 'الإتقان والشفافية والابتكار في العمل', 'color' => 'bg-accent-50 text-accent-600'],
                        ['title' => 'الأثر', 'desc' => 'بناء جيل متعلم ومؤهل يخدم الوطن', 'color' => 'bg-gray-50 text-gray-600']
                    ] as $feature)
                    <div class="about-feature">
                        <div class="about-feature-icon {{ $feature['color'] }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <h5 class="font-bold text-gray-900 text-[15px] mb-0.5">{{ $feature['title'] }}</h5>
                            <p class="text-gray-500 text-sm leading-relaxed">{{ $feature['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <a href="/about" class="btn-secondary">
                    اعرف أكثر عن الجمعية
                    <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ============================================
    PROGRAMS SECTION
============================================= --}}
<section class="section section-light">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-6 lg:gap-12">
            {{-- Text Column --}}
            <div class="lg:col-span-4" x-intersect="$el.classList.add('animate-slide-up')">
                <div class="section-head lg:sticky lg:top-32">
                    <h4 class="section-subtitle">برامجنا التعليمية</h4>
                    <h2 class="section-title">رحلة عطاء مستمرة لصناعة التنمية والتمكين</h2>
                    <p class="section-desc">نقدم مجموعة من البرامج التعليمية النوعية المصممة لتطوير المهارات ورفع الكفاءات وتأهيل الكوادر الوطنية.</p>
                    <a href="/programs" class="btn-primary mt-6">
                        جميع البرامج
                        <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>

            {{-- Programs Grid --}}
            <div class="lg:col-span-8">
                <div class="grid sm:grid-cols-2 gap-5">
                    @forelse($programs as $program)
                    <a href="/programs/{{ $program->slug }}" class="program-card" x-intersect="$el.classList.add('animate-scale-in')">
                        <img src="{{ $program->image ? asset('storage/' . $program->image) : '' }}" alt="{{ $program->title }}" class="w-full h-full object-cover" onerror="this.parentElement.querySelector('.overlay').style.background='linear-gradient(180deg, rgba(30,58,138,0.3) 0%, rgba(30,58,138,0.9) 100%)'; this.style.display='none'">
                        <div class="overlay"></div>
                        <div class="card-content">
                            @if($program->category)
                            <span class="card-number">{{ $loop->iteration }}</span>
                            @endif
                            <h3 class="card-title">{{ $program->title }}</h3>
                            <p class="card-desc">{{ Str::limit($program->excerpt, 100) }}</p>
                        </div>
                    </a>
                    @empty
                    @foreach([
                        ['title' => 'المنح الدراسية', 'desc' => 'منح دراسية للطلاب المتميزين في أفضل الجامعات المحلية والعالمية', 'img' => 'program-1.png'],
                        ['title' => 'التطوير المهني', 'desc' => 'برامج تدريبية متقدمة لتطوير المهارات المهنية والقيادية', 'img' => 'program-2.png'],
                        ['title' => 'البحث العلمي', 'desc' => 'دعم الأبحاث العلمية والابتكار في المجالات التعليمية', 'img' => 'program-3.png'],
                        ['title' => 'ريادة الأعمال', 'desc' => 'تأهيل رواد الأعمال وتحويل الأفكار إلى مشاريع ناجحة', 'img' => 'program-4.png'],
                        ['title' => 'المهارات الرقمية', 'desc' => 'تطوير المهارات التقنية لمواكبة التحول الرقمي', 'img' => 'program-5.png'],
                        ['title' => 'القيادة التعليمية', 'desc' => 'إعداد قيادات تعليمية قادرة على إحداث التغيير', 'img' => 'program-6.png']
                    ] as $i => $p)
                    <div class="program-card group" x-intersect="$el.classList.add('animate-scale-in')">
                        <img src="{{ asset('images/defaults/' . $p['img']) }}" alt="{{ $p['title'] }}" class="w-full h-full object-cover">
                        <div class="overlay"></div>
                        <div class="card-content">
                            <span class="card-number">{{ $i + 1 }}</span>
                            <h3 class="card-title">{{ $p['title'] }}</h3>
                            <p class="card-desc">{{ $p['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================
    CTA / GRANTS SECTION - REDESIGNED
============================================= --}}
<section class="cta-section py-24 relative">
    {{-- Decorative floating elements --}}
    <div class="absolute top-10 left-10 w-20 h-20 border border-white/[0.06] rounded-full hidden lg:block" style="animation: glow-pulse 5s ease-in-out infinite"></div>
    <div class="absolute bottom-16 right-16 w-12 h-12 border border-accent-400/10 rotate-45 hidden lg:block" style="animation: rotate-slow 20s linear infinite"></div>

    <div class="max-w-[1320px] mx-auto px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
            <div x-intersect="$el.classList.add('animate-slide-up')">
                <h4 class="text-accent-400 font-semibold text-sm mb-4 flex items-center gap-2">
                    <span class="w-8 h-[2px] bg-gradient-to-l from-accent-400 to-transparent rounded"></span>
                    المنح الدراسية
                </h4>
                <h2 class="text-3xl md:text-4xl font-bold text-white leading-tight mb-6">نفتح أبواب المستقبل<br>لأبناء الوطن المتميزين</h2>
                <p class="text-white text-lg leading-relaxed mb-8" style="text-shadow: 0 1px 3px rgba(0,0,0,0.3)">تقدم الجمعية منحاً دراسية للطلاب المتفوقين في مراحل التعليم الجامعي والعالي، بهدف تمكينهم من تحقيق طموحاتهم الأكاديمية والمهنية.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="/grants" class="hero-btn-primary">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        تقدم للمنحة الآن
                    </a>
                    <a href="/grants#conditions" class="hero-btn-secondary">
                        شروط التقديم
                    </a>
                </div>
            </div>

            {{-- Stats Side - REDESIGNED Cards --}}
            <div class="grid grid-cols-2 gap-5" x-intersect="$el.classList.add('animate-fade-in')">
                @foreach([
                    ['num' => '200+', 'label' => 'منحة سنوية', 'icon' => 'M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z'],
                    ['num' => '85%', 'label' => 'نسبة القبول', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['num' => '30+', 'label' => 'جامعة شريكة', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                    ['num' => '100%', 'label' => 'تغطية شاملة', 'icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z']
                ] as $item)
                <div class="cta-stat-card">
                    <div class="cta-icon">
                        <svg class="w-6 h-6 text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $item['icon'] }}"/></svg>
                    </div>
                    <div class="cta-number">{{ $item['num'] }}</div>
                    <p class="cta-label">{{ $item['label'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ============================================
    NEWS SECTION
============================================= --}}
<section class="section section-white">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-start md:items-end justify-between gap-4 mb-8">
            <div x-intersect="$el.classList.add('animate-slide-up')">
                <h4 class="section-subtitle">آخر الأخبار</h4>
                <h2 class="section-title">أخبار وأحداث الجمعية</h2>
            </div>
            <a href="/news" class="btn-secondary">
                جميع الأخبار
                <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
            @forelse($news as $article)
            <article class="news-card" x-intersect="$el.classList.add('animate-scale-in')">
                <div class="card-image">
                    <img src="{{ $article->image ? asset('storage/' . $article->image) : '' }}" alt="{{ $article->title }}" onerror="this.parentElement.style.background='linear-gradient(135deg, #1e3a8a, #4f29b6)'; this.style.display='none'">
                    <span class="card-date">{{ $article->published_at ? $article->published_at->translatedFormat('d M Y') : $article->created_at->translatedFormat('d M Y') }}</span>
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $article->title }}</h3>
                    <p class="card-excerpt">{{ Str::limit($article->excerpt, 120) }}</p>
                    <a href="/news/{{ $article->slug }}" class="card-link">
                        قراءة المزيد
                        <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </article>
            @empty
            @foreach([
                ['title' => 'إتقان توقع شراكة استراتيجية مع جامعة الإمام عبدالرحمن بن فيصل', 'date' => 'يوليو 2025', 'excerpt' => 'وقعت جمعية إتقان التعليمية شراكة استراتيجية مع جامعة الإمام عبدالرحمن بن فيصل لتطوير برامج التعليم العالي.', 'img' => 'news-1.png'],
                ['title' => 'إطلاق برنامج المنح الدراسية للفصل الدراسي الأول 2026', 'date' => 'يونيو 2025', 'excerpt' => 'أعلنت الجمعية عن إطلاق دفعة جديدة من المنح الدراسية لدعم الطلاب المتفوقين في مختلف التخصصات.', 'img' => 'news-2.png'],
                ['title' => 'إتقان تشارك في المنتدى السعودي للتعليم الجامعي', 'date' => 'مايو 2025', 'excerpt' => 'شاركت الجمعية في المنتدى السعودي للتعليم الجامعي بورقة عمل حول مستقبل التعليم العالي في المملكة.', 'img' => 'news-3.png']
            ] as $n)
            <article class="news-card" x-intersect="$el.classList.add('animate-scale-in')">
                <div class="card-image">
                    <img src="{{ asset('images/defaults/' . $n['img']) }}" alt="{{ $n['title'] }}">
                    <span class="card-date">{{ $n['date'] }}</span>
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $n['title'] }}</h3>
                    <p class="card-excerpt">{{ $n['excerpt'] }}</p>
                    <span class="card-link">
                        قراءة المزيد
                        <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </span>
                </div>
            </article>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

{{-- ============================================
    PARTNERS SECTION
============================================= --}}
<section class="section section-light">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="text-center mb-12" x-intersect="$el.classList.add('animate-slide-up')">
            <h4 class="section-subtitle justify-center">شركاؤنا في النجاح</h4>
            <h2 class="section-title text-center">شراكات استراتيجية فاعلة</h2>
        </div>
        <div class="flex flex-wrap items-center justify-center gap-6 md:gap-12">
            @forelse($partners as $partner)
            <div class="partner-logo">
                <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="h-14 w-auto object-contain">
            </div>
            @empty
            @for($i = 1; $i <= 6; $i++)
            <div class="partner-logo !opacity-30">
                <div class="w-32 h-16 bg-gray-200 rounded-xl flex items-center justify-center">
                    <span class="text-gray-400 text-sm font-semibold">شريك {{ $i }}</span>
                </div>
            </div>
            @endfor
            @endforelse
        </div>
    </div>
</section>

{{-- ============================================
    NEWSLETTER CTA - REDESIGNED
============================================= --}}
<section class="newsletter-section py-20">
    {{-- Decorative elements --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] rounded-full border border-white/[0.04] hidden lg:block"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[350px] h-[350px] rounded-full border border-white/[0.06] hidden lg:block"></div>

    <div class="max-w-[700px] mx-auto px-6 text-center relative z-10" x-intersect="$el.classList.add('animate-slide-up')">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/[0.08] rounded-full border border-white/[0.12] mb-6">
            <svg class="w-4 h-4 text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            <span class="text-white text-sm font-semibold">النشرة البريدية</span>
        </div>
        <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">ابقَ على اطلاع</h2>
        <p class="text-white text-lg mb-8" style="text-shadow: 0 1px 3px rgba(0,0,0,0.2)">اشترك في النشرة البريدية لتصلك آخر أخبار الجمعية وبرامجها</p>
        <form action="/newsletter" method="POST" class="flex flex-col sm:flex-row gap-3 max-w-lg mx-auto">
            @csrf
            <input type="email" name="email" placeholder="أدخل بريدك الإلكتروني" required class="newsletter-input flex-1">
            <button type="submit" class="px-8 py-3 bg-white text-primary-900 rounded-xl font-bold text-sm hover:bg-gray-100 transition-all whitespace-nowrap hover:shadow-lg hover:shadow-white/10 hover:-translate-y-0.5">اشترك الآن</button>
        </form>
    </div>
</section>

@endsection