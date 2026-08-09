@extends('layouts.app')
@section('title', 'عن الجمعية - جمعية إتقان التعليمية')
@section('content')

<x-page-header title="عن الجمعية" subtitle="من نحن" :breadcrumbs="[['label' => 'عن الجمعية']]">
    <p class="text-white/90 text-lg max-w-2xl" style="text-shadow: 0 1px 3px rgba(0,0,0,0.2)">تعرّف على رؤيتنا ورسالتنا وفريق العمل الذي يقود مسيرة التعليم والتطوير.</p>
</x-page-header>

{{-- Vision & Mission --}}
<section class="section section-white">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div x-intersect="$el.classList.add('animate-fade-in')">
                <div class="about-image-holder aspect-[4/3] rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/defaults/about.jpg') }}" alt="جمعية إتقان التعليمية" class="w-full h-full object-cover">
                </div>
                <div class="absolute -top-4 -right-4 w-24 h-24 border-2 border-primary-200 rounded-2xl -z-10 hidden md:block"></div>
            </div>

            <div x-intersect="$el.classList.add('animate-slide-up')">
                <div class="section-head">
                    <h4 class="section-subtitle">التعريف</h4>
                    <h2 class="section-title">جمعية إتقان التعليمية</h2>
                    <p class="section-desc">جمعية أهلية تعليمية تأسست العام 2025م، متخصصة في دعم وتطوير التعليم الجامعي والعالي في المملكة العربية السعودية. نسعى للارتقاء بمنظومة التعليم والمساهمة في بناء جيل متعلم ومؤهل يخدم الوطن وفقاً لرؤية المملكة 2030.</p>
                </div>

                <div class="space-y-4 mb-8">
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-primary-50 border border-primary-100">
                        <div class="w-12 h-12 rounded-xl bg-primary-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">الرؤية</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">الريادة في تطوير التعليم الجامعي والعالي وتحقيق أعلى معايير الجودة والتميز.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-secondary-50 border border-secondary-100">
                        <div class="w-12 h-12 rounded-xl bg-secondary-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">الرسالة</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">تعزيز جودة التعليم الجامعي والعالي من خلال برامج مبتكرة وشراكات فاعلة تُسهم في تمكين الكوادر الوطنية.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Values --}}
<section class="section section-light">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="text-center mb-12" x-intersect="$el.classList.add('animate-slide-up')">
            <h4 class="section-subtitle justify-center">ما يميزنا</h4>
            <h2 class="section-title text-center">قيمنا ومبادئنا</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['title' => 'الإتقان', 'desc' => 'نسعى لتقديم أعمال متقنة تحقق أعلى معايير الجودة في كل ما نقدمه.', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'color' => 'primary'],
                ['title' => 'الشفافية', 'desc' => 'نلتزم بالوضوح والشفافية في جميع تعاملاتنا وأنشطتنا المؤسسية.', 'icon' => 'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z', 'color' => 'secondary'],
                ['title' => 'الابتكار', 'desc' => 'نتبنى الحلول المبتكرة والأساليب الحديثة في تطوير برامجنا التعليمية.', 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'color' => 'accent'],
                ['title' => 'المسؤولية', 'desc' => 'نتحمل مسؤوليتنا تجاه المجتمع ونعمل على تحقيق أثر مستدام وفعّال.', 'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9', 'color' => 'primary']
            ] as $value)
            <div class="bg-white rounded-2xl p-6 border border-gray-100 hover:border-{{ $value['color'] }}-200 hover:shadow-lg transition-all duration-300 group" x-intersect="$el.classList.add('animate-scale-in')">
                <div class="w-14 h-14 rounded-xl bg-{{ $value['color'] }}-50 flex items-center justify-center mb-5 group-hover:bg-{{ $value['color'] }}-100 transition-colors">
                    <svg class="w-7 h-7 text-{{ $value['color'] }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $value['icon'] }}"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $value['title'] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $value['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Founders --}}
@if(isset($founders) && $founders->count())
<section class="section section-white">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="text-center mb-12" x-intersect="$el.classList.add('animate-slide-up')">
            <h4 class="section-subtitle justify-center">المؤسسون</h4>
            <h2 class="section-title text-center">الأعضاء المؤسسون</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($founders as $member)
            <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300 group" x-intersect="$el.classList.add('animate-scale-in')">
                <div class="h-64 overflow-hidden">
                    <img src="{{ $member->photo ? asset('storage/' . $member->photo) : asset('images/defaults/avatar.png') }}" alt="{{ $member->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $member->name }}</h3>
                    <p class="text-primary-600 text-sm font-medium mb-2">{{ $member->position }}</p>
                    @if($member->bio)
                    <p class="text-gray-500 text-sm leading-relaxed">{{ Str::limit($member->bio, 100) }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Board Members --}}
@if(isset($boardMembers) && $boardMembers->count())
<section class="section section-light">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="text-center mb-12" x-intersect="$el.classList.add('animate-slide-up')">
            <h4 class="section-subtitle justify-center">مجلس الإدارة</h4>
            <h2 class="section-title text-center">أعضاء مجلس الإدارة</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($boardMembers as $member)
            <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 hover:shadow-lg transition-all duration-300 text-center group" x-intersect="$el.classList.add('animate-scale-in')">
                <div class="h-48 overflow-hidden">
                    <img src="{{ $member->photo ? asset('storage/' . $member->photo) : asset('images/defaults/avatar.png') }}" alt="{{ $member->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5">
                    <h4 class="font-bold text-gray-900 mb-1">{{ $member->name }}</h4>
                    <p class="text-primary-600 text-sm font-medium">{{ $member->position }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Team Members --}}
@if(isset($teamMembers) && $teamMembers->count())
<section class="section section-white">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="text-center mb-12" x-intersect="$el.classList.add('animate-slide-up')">
            <h4 class="section-subtitle justify-center">فريق العمل</h4>
            <h2 class="section-title text-center">فريقنا المتميز</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($teamMembers as $member)
            <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 hover:shadow-lg transition-all duration-300 text-center group" x-intersect="$el.classList.add('animate-scale-in')">
                <div class="h-48 overflow-hidden">
                    <img src="{{ $member->photo ? asset('storage/' . $member->photo) : asset('images/defaults/avatar.png') }}" alt="{{ $member->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5">
                    <h4 class="font-bold text-gray-900 mb-1">{{ $member->name }}</h4>
                    <p class="text-secondary-600 text-sm font-medium">{{ $member->position }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
