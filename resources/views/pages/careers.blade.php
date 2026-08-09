@extends('layouts.app')
@section('title', 'الوظائف - جمعية إتقان التعليمية')
@section('content')

<x-page-header title="فرص العمل" subtitle="انضم لفريقنا" :breadcrumbs="[['label' => 'الوظائف']]">
    <p class="text-white/90 text-lg max-w-2xl" style="text-shadow: 0 1px 3px rgba(0,0,0,0.2)">نبحث عن كفاءات متميزة للانضمام إلى فريق عمل جمعية إتقان التعليمية.</p>
</x-page-header>

<section class="section section-white">
    <div class="max-w-[900px] mx-auto px-6 lg:px-8">
        @if(session('success'))
        <div class="mb-6 p-4 bg-accent-50 border border-accent-200 rounded-xl text-accent-700 font-medium text-center">{{ session('success') }}</div>
        @endif

        @forelse($jobs as $job)
        <div class="bg-white rounded-2xl border border-gray-100 hover:border-primary-200 hover:shadow-lg transition-all p-6 mb-6" x-data="{ open: false }" x-intersect="$el.classList.add('animate-slide-up')">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $job->title }}</h3>
                    <div class="flex flex-wrap gap-3">
                        @if($job->type)
                        <span class="px-3 py-1 bg-primary-50 text-primary-600 rounded-full text-xs font-semibold">{{ $job->type }}</span>
                        @endif
                        @if($job->location)
                        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-semibold flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            {{ $job->location }}
                        </span>
                        @endif
                        @if($job->deadline)
                        <span class="px-3 py-1 bg-red-50 text-red-500 rounded-full text-xs font-semibold">آخر موعد: {{ $job->deadline->translatedFormat('d M Y') }}</span>
                        @endif
                    </div>
                </div>
                <button @click="open = !open" class="btn-secondary text-sm py-2 px-5 whitespace-nowrap">
                    <span x-text="open ? 'إخفاء' : 'عرض التفاصيل'"></span>
                </button>
            </div>

            <div x-show="open" x-transition class="border-t border-gray-100 pt-4 mt-4">
                @if($job->description)
                <div class="prose prose-sm max-w-none text-gray-600 mb-6">{!! $job->description !!}</div>
                @endif

                <h4 class="font-bold text-gray-900 mb-4">تقدم لهذه الوظيفة</h4>
                <form action="{{ route('careers.apply', $job->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-4">
                        <input type="text" name="name" placeholder="الاسم الكامل *" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none text-sm">
                        <input type="email" name="email" placeholder="البريد الإلكتروني *" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none text-sm">
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <input type="tel" name="phone" placeholder="رقم الجوال *" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none text-sm" dir="ltr">
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">السيرة الذاتية (PDF) *</label>
                            <input type="file" name="cv" accept=".pdf,.doc,.docx" required class="w-full px-4 py-2 rounded-xl border border-gray-200 text-sm">
                        </div>
                    </div>
                    <textarea name="cover_letter" rows="3" placeholder="رسالة تعريفية (اختياري)" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 outline-none text-sm resize-none"></textarea>
                    <button type="submit" class="btn-primary text-sm">إرسال الطلب</button>
                </form>
            </div>
        </div>
        @empty
        <div class="text-center py-16 bg-gray-50 rounded-2xl border border-gray-100">
            <div class="w-20 h-20 rounded-full bg-primary-50 flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">لا توجد وظائف شاغرة حالياً</h3>
            <p class="text-gray-500 mb-6">تابعنا للاطلاع على أحدث الفرص الوظيفية</p>
            <a href="/contact" class="btn-secondary">تواصل معنا</a>
        </div>
        @endforelse
    </div>
</section>

@endsection
