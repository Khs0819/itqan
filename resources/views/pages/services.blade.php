@extends('layouts.app')
@section('title', 'الخدمات التعليمية - جمعية إتقان التعليمية')
@section('content')

<x-page-header title="الخدمات التعليمية" subtitle="ماذا نقدم" :breadcrumbs="[['label' => 'الخدمات']]">
    <p class="text-white text-lg max-w-2xl" style="text-shadow: 0 1px 3px rgba(0,0,0,0.3)">نقدم مجموعة شاملة من الخدمات التعليمية المتميزة لخدمة المجتمع.</p>
</x-page-header>

<section class="section section-white">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        @if(isset($services) && $services->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white rounded-2xl p-8 border border-gray-100 hover:border-primary-200 hover:shadow-xl transition-all duration-300 group" x-intersect="$el.classList.add('animate-scale-in')">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary-50 to-primary-100 flex items-center justify-center mb-6 group-hover:from-primary-100 group-hover:to-primary-200 transition-all">
                    @if($service->icon)
                    <img src="{{ asset('storage/' . $service->icon) }}" alt="" class="w-8 h-8">
                    @else
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    @endif
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $service->title }}</h3>
                <p class="text-gray-500 leading-relaxed mb-4">{{ Str::limit($service->description, 150) }}</p>
                @if($service->link)
                <a href="{{ $service->link }}" class="inline-flex items-center gap-2 text-primary-600 font-semibold text-sm hover:text-primary-700 transition-colors">
                    المزيد
                    <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
                @endif
            </div>
            @endforeach
        </div>
        @else
        {{-- Default Services --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                ['title' => 'المنح الدراسية', 'desc' => 'دعم الطلاب المتفوقين بمنح دراسية شاملة في أفضل الجامعات المحلية والدولية.', 'icon' => 'M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z', 'color' => 'primary'],
                ['title' => 'التدريب والتطوير', 'desc' => 'برامج تدريبية متخصصة لتطوير مهارات الكوادر التعليمية والطلاب.', 'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z', 'color' => 'secondary'],
                ['title' => 'الاستشارات التعليمية', 'desc' => 'تقديم استشارات متخصصة للمؤسسات التعليمية لتحسين جودة التعليم ومخرجاته.', 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'color' => 'accent'],
                ['title' => 'البحث العلمي', 'desc' => 'دعم وتمويل البحوث العلمية المتعلقة بتطوير التعليم الجامعي والعالي.', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01', 'color' => 'primary'],
                ['title' => 'الشراكات المؤسسية', 'desc' => 'بناء شراكات استراتيجية مع الجامعات والمؤسسات التعليمية المحلية والدولية.', 'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9', 'color' => 'secondary'],
                ['title' => 'الفعاليات والمؤتمرات', 'desc' => 'تنظيم مؤتمرات وندوات وورش عمل متخصصة في مجال التعليم والتطوير.', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'color' => 'accent']
            ] as $service)
            <div class="bg-white rounded-2xl p-8 border border-gray-100 hover:border-{{ $service['color'] }}-200 hover:shadow-xl transition-all duration-300 group" x-intersect="$el.classList.add('animate-scale-in')">
                <div class="w-16 h-16 rounded-2xl bg-{{ $service['color'] }}-50 flex items-center justify-center mb-6 group-hover:bg-{{ $service['color'] }}-100 transition-colors">
                    <svg class="w-8 h-8 text-{{ $service['color'] }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $service['icon'] }}"/></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $service['title'] }}</h3>
                <p class="text-gray-500 leading-relaxed">{{ $service['desc'] }}</p>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section class="cta-section py-20">
    <div class="max-w-[800px] mx-auto px-6 lg:px-8 text-center relative z-10" x-intersect="$el.classList.add('animate-slide-up')">
        <h2 class="text-3xl font-bold text-white mb-4" style="text-shadow: 0 2px 6px rgba(0,0,0,0.3)">هل تحتاج خدمة تعليمية خاصة؟</h2>
        <p class="text-white text-lg mb-8" style="text-shadow: 0 1px 3px rgba(0,0,0,0.2)">تواصل معنا وسنقدم لك الحل الأمثل لاحتياجاتك التعليمية.</p>
        <a href="/contact" class="hero-btn-primary">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            تواصل معنا
        </a>
    </div>
</section>

@endsection
