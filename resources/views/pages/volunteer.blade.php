@extends('layouts.app')
@section('title', 'التطوع - جمعية إتقان التعليمية')
@section('content')

<x-page-header title="تطوع معنا" subtitle="كن جزءاً من التغيير" :breadcrumbs="[['label' => 'التطوع']]">
    <p class="text-white/90 text-lg max-w-2xl" style="text-shadow: 0 1px 3px rgba(0,0,0,0.2)">انضم إلى فريق المتطوعين وساهم في بناء مستقبل تعليمي أفضل.</p>
</x-page-header>

{{-- Why Volunteer --}}
<section class="section section-white">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div x-intersect="$el.classList.add('animate-slide-up')">
                <div class="section-head">
                    <h4 class="section-subtitle">لماذا التطوع معنا</h4>
                    <h2 class="section-title">أثرك يبدأ من هنا</h2>
                    <p class="section-desc">نؤمن بأن التطوع هو أحد أعظم أشكال العطاء. انضم إلينا لتساهم في تطوير التعليم ودعم الطلاب المتميزين.</p>
                </div>
                <div class="space-y-4">
                    @foreach([
                        ['title' => 'تطوير مهاراتك', 'desc' => 'اكتسب خبرات جديدة ومهارات قيادية وتنظيمية'],
                        ['title' => 'توسيع شبكة علاقاتك', 'desc' => 'تواصل مع قادة ومتخصصين في المجال التعليمي'],
                        ['title' => 'إحداث أثر مجتمعي', 'desc' => 'ساهم في بناء جيل متعلم ومؤهل يخدم الوطن'],
                        ['title' => 'شهادة تطوع معتمدة', 'desc' => 'احصل على شهادة خبرة تطوعية موثقة']
                    ] as $benefit)
                    <div class="about-feature">
                        <div class="about-feature-icon bg-accent-50 text-accent-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <h5 class="font-bold text-gray-900 text-[15px] mb-0.5">{{ $benefit['title'] }}</h5>
                            <p class="text-gray-500 text-sm leading-relaxed">{{ $benefit['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="relative" x-intersect="$el.classList.add('animate-fade-in')">
                <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/defaults/volunteer.jpg') }}" alt="التطوع" class="w-full h-full object-cover" onerror="this.parentElement.style.background='linear-gradient(135deg, #4d95ff, #4f29b6)'; this.style.display='none'">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Volunteer Form --}}
<section class="section section-light">
    <div class="max-w-[800px] mx-auto px-6 lg:px-8">
        <div class="text-center mb-10" x-intersect="$el.classList.add('animate-slide-up')">
            <h4 class="section-subtitle justify-center">سجل الآن</h4>
            <h2 class="section-title text-center">نموذج التسجيل في برنامج التطوع</h2>
        </div>

        @if(session('success'))
        <div class="mb-6 p-4 bg-accent-50 border border-accent-200 rounded-xl text-accent-700 font-medium text-center">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded-2xl border border-gray-100 shadow-lg p-8">
            <form action="{{ route('volunteer.store') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">الاسم الكامل *</label>
                        <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm">
                        @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">البريد الإلكتروني *</label>
                        <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm">
                        @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">رقم الجوال *</label>
                        <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm" dir="ltr">
                        @error('phone')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">المدينة</label>
                        <input type="text" name="city" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm">
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">المؤهل العلمي</label>
                        <input type="text" name="education" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">التخصص</label>
                        <input type="text" name="specialization" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">الخبرات التطوعية السابقة</label>
                    <textarea name="experience" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm resize-none"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">لماذا تريد التطوع معنا؟</label>
                    <textarea name="motivation" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm resize-none"></textarea>
                </div>
                <button type="submit" class="btn-primary">إرسال الطلب</button>
            </form>
        </div>
    </div>
</section>

@endsection
