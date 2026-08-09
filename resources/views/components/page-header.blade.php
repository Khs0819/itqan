{{-- Page Header Component - Premium Design with Perfect Contrast --}}
@props([
    'title' => '',
    'subtitle' => '',
    'breadcrumbs' => []
])

<section class="relative pt-28 md:pt-32 pb-16 md:pb-20 overflow-hidden">
    {{-- Background --}}
    <div class="absolute inset-0 bg-gradient-to-bl from-primary-900 via-primary-950 to-secondary-900"></div>

    {{-- Decorative elements --}}
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-accent-400/[0.04] rounded-full blur-[100px] hidden md:block"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-secondary-600/[0.06] rounded-full blur-[80px] hidden md:block"></div>

    {{-- Content --}}
    <div class="max-w-[1320px] mx-auto px-5 md:px-6 lg:px-8 relative z-10 text-center md:text-right">
        @if(!empty($breadcrumbs))
        <nav class="flex items-center justify-center md:justify-start gap-2 text-sm mb-5 md:mb-6" aria-label="Breadcrumb">
            <a href="/" class="text-white/80 hover:text-white transition-colors font-medium">الرئيسية</a>
            @foreach($breadcrumbs as $crumb)
            <svg class="w-4 h-4 text-white/50 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            @if(isset($crumb['url']))
            <a href="{{ $crumb['url'] }}" class="text-white/80 hover:text-white transition-colors font-medium">{{ $crumb['label'] }}</a>
            @else
            <span class="text-white font-semibold">{{ $crumb['label'] }}</span>
            @endif
            @endforeach
        </nav>
        @endif

        @if($subtitle)
        <h4 class="text-accent-400 font-bold text-sm mb-3 flex items-center justify-center md:justify-start gap-2">
            <span class="w-8 h-[2px] bg-accent-400 rounded"></span>
            {{ $subtitle }}
        </h4>
        @endif

        <h1 class="text-2xl sm:text-3xl md:text-5xl font-bold text-white leading-tight" style="text-shadow: 0 2px 8px rgba(0,0,0,0.3)">{{ $title }}</h1>

        @if(isset($slot) && $slot->isNotEmpty())
        <div class="mt-3 md:mt-4">
            {{ $slot }}
        </div>
        @endif
    </div>

    {{-- Bottom wave --}}
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="w-full h-8 md:h-14">
            <path d="M0 60V30C360 50 720 10 1080 30C1260 40 1380 35 1440 30V60H0Z" fill="white"/>
        </svg>
    </div>
</section>
