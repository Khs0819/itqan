@extends('layouts.app')
@section('title', 'المنح الدراسية - جمعية إتقان التعليمية')
@section('content')

<x-page-header title="المنح الدراسية" subtitle="فرص تعليمية" :breadcrumbs="[['label' => 'المنح الدراسية']]">
    <p class="text-white/90 text-lg max-w-2xl" style="text-shadow: 0 1px 3px rgba(0,0,0,0.2)">نفتح أبواب المستقبل لأبناء الوطن المتميزين من خلال برامج المنح الدراسية.</p>
</x-page-header>

{{-- Why Our Grants --}}
<section class="section section-white">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="text-center mb-12" x-intersect="$el.classList.add('animate-slide-up')">
            <h4 class="section-subtitle justify-center">لماذا منح إتقان</h4>
            <h2 class="section-title text-center">ندعمك في كل خطوة من رحلتك التعليمية</h2>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-12">
            @foreach([
                ['num' => '200+', 'label' => 'منحة سنوية', 'icon' => 'M12 14l9-5-9-5-9 5 9 5z'],
                ['num' => '85%', 'label' => 'نسبة القبول', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['num' => '30+', 'label' => 'جامعة شريكة', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5'],
                ['num' => '100%', 'label' => 'تغطية شاملة', 'icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z']
            ] as $stat)
            <div class="text-center p-4 rounded-2xl bg-gray-50 border border-gray-100 hover:border-primary-200 transition-all" x-intersect="$el.classList.add('animate-scale-in')">
                <div class="w-10 h-10 rounded-lg bg-primary-50 flex items-center justify-center mx-auto mb-2">
                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $stat['icon'] }}"/></svg>
                </div>
                <div class="text-xl font-bold text-gray-900 mb-0.5">{{ $stat['num'] }}</div>
                <p class="text-gray-500 text-xs">{{ $stat['label'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Available Grants --}}
<section class="section section-light" id="conditions">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="text-center mb-12" x-intersect="$el.classList.add('animate-slide-up')">
            <h4 class="section-subtitle justify-center">المنح المتاحة</h4>
            <h2 class="section-title text-center">اختر المنحة المناسبة لك</h2>
        </div>

        @if(isset($grants) && $grants->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($grants as $grant)
            <div class="bg-white rounded-2xl p-6 border border-gray-100 hover:shadow-lg hover:border-primary-200 transition-all" x-intersect="$el.classList.add('animate-scale-in')">
                <div class="w-12 h-12 rounded-xl bg-primary-50 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $grant->title }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ Str::limit($grant->description, 150) }}</p>
                @if($grant->deadline)
                <p class="text-xs text-red-500 font-semibold mb-4">آخر موعد: {{ $grant->deadline->translatedFormat('d M Y') }}</p>
                @endif
                <a href="#apply" class="btn-secondary text-sm py-2 px-4">تقدم الآن</a>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12 bg-white rounded-2xl border border-gray-100">
            <div class="w-20 h-20 rounded-full bg-primary-50 flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z"/></svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">لا توجد منح متاحة حالياً</h3>
            <p class="text-gray-500">سيتم الإعلان عن المنح الجديدة قريباً. تابعونا.</p>
        </div>
        @endif
    </div>
</section>

{{-- Application Form --}}
<section class="section section-white" id="apply">
    <div class="max-w-[800px] mx-auto px-6 lg:px-8">
        <div class="text-center mb-10" x-intersect="$el.classList.add('animate-slide-up')">
            <h4 class="section-subtitle justify-center">التقديم</h4>
            <h2 class="section-title text-center">نموذج التقديم على المنحة</h2>
        </div>

        @if(session('success'))
        <div class="mb-6 p-4 bg-accent-50 border border-accent-200 rounded-xl text-accent-700 font-medium text-center">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded-2xl border border-gray-100 shadow-lg p-8">
            <form action="{{ route('grants.apply') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @if(isset($grants) && $grants->count())
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">اختر المنحة</label>
                    <select name="grant_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm">
                        <option value="">اختر المنحة المناسبة</option>
                        @foreach($grants as $grant)
                        <option value="{{ $grant->id }}">{{ $grant->title }}</option>
                        @endforeach
                    </select>
                </div>
                @endif
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
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">رقم الهوية</label>
                        <input type="text" name="national_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm" dir="ltr">
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">الجامعة</label>
                        <input type="text" name="university" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">التخصص</label>
                        <input type="text" name="major" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm">
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">المعدل التراكمي</label>
                        <input type="text" name="gpa" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm" dir="ltr">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">مرفق (PDF)</label>
                        <input type="file" name="attachment" accept=".pdf,.doc,.docx" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary-400 outline-none transition-all text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">الغرض من التقديم</label>
                    <textarea name="purpose" rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm resize-none"></textarea>
                </div>
                <button type="submit" class="btn-primary">إرسال الطلب</button>
            </form>
        </div>
    </div>
</section>

@endsection
