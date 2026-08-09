@extends('layouts.app')
@section('title', 'تواصل معنا - جمعية إتقان التعليمية')
@section('content')

<x-page-header title="تواصل معنا" subtitle="نسعد بتواصلكم" :breadcrumbs="[['label' => 'تواصل معنا']]">
    <p class="text-white/90 text-lg max-w-2xl" style="text-shadow: 0 1px 3px rgba(0,0,0,0.2)">نحن هنا للإجابة على استفساراتكم ومساعدتكم في كل ما يتعلق ببرامجنا وخدماتنا.</p>
</x-page-header>

<section class="section section-white">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">
            {{-- Contact Info --}}
            <div class="lg:col-span-1" x-intersect="$el.classList.add('animate-slide-up')">
                <div class="section-head">
                    <h4 class="section-subtitle">معلومات التواصل</h4>
                    <h2 class="section-title">كيف تصل إلينا</h2>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    @foreach([
                        ['icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z', 'title' => 'العنوان', 'text' => 'الدمام، المملكة العربية السعودية'],
                        ['icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z', 'title' => 'الهاتف', 'text' => '+966 13 000 0000'],
                        ['icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'title' => 'البريد الإلكتروني', 'text' => 'info@itqan-association.com'],
                        ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'ساعات العمل', 'text' => 'الأحد - الخميس: 8:00 ص - 4:00 م']
                    ] as $item)
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-50 border border-gray-100 hover:border-primary-200 transition-colors">
                        <div class="w-12 h-12 rounded-xl bg-primary-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $item['icon'] }}"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm mb-1">{{ $item['title'] }}</h4>
                            <p class="text-gray-500 text-sm">{{ $item['text'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="lg:col-span-2" x-intersect="$el.classList.add('animate-fade-in')">
                @if(session('success'))
                <div class="mb-6 p-4 bg-accent-50 border border-accent-200 rounded-xl text-accent-700 font-medium">
                    {{ session('success') }}
                </div>
                @endif

                <div class="bg-white rounded-2xl border border-gray-100 shadow-lg p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">أرسل لنا رسالة</h3>
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">الاسم الكامل *</label>
                                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm">
                                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">البريد الإلكتروني *</label>
                                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm">
                                @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">رقم الجوال</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm" dir="ltr">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">الموضوع *</label>
                                <input type="text" name="subject" value="{{ old('subject') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm">
                                @error('subject')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">الرسالة *</label>
                            <textarea name="message" rows="5" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none transition-all text-sm resize-none">{{ old('message') }}</textarea>
                            @error('message')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" class="btn-primary">
                            إرسال الرسالة
                            <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
