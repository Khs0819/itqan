@extends('layouts.app')
@section('title', 'الحوكمة - جمعية إتقان التعليمية')
@section('content')

<x-page-header title="الحوكمة والشفافية" subtitle="الحوكمة المؤسسية" :breadcrumbs="[['label' => 'الحوكمة']]">
    <p class="text-white/90 text-lg max-w-2xl" style="text-shadow: 0 1px 3px rgba(0,0,0,0.2)">نلتزم بأعلى معايير الشفافية والحوكمة في جميع أعمالنا المؤسسية.</p>
</x-page-header>

<section class="section section-white">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="text-center mb-12" x-intersect="$el.classList.add('animate-slide-up')">
            <h4 class="section-subtitle justify-center">الوثائق والتقارير</h4>
            <h2 class="section-title text-center">وثائق الحوكمة</h2>
            <p class="section-desc mx-auto text-center">تعكس التزامنا بالشفافية والمسؤولية تجاه المجتمع وأصحاب المصلحة.</p>
        </div>

        @if(isset($documents) && $documents->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($documents as $doc)
            <div class="bg-white rounded-2xl border border-gray-100 p-6 hover:shadow-lg hover:border-primary-200 transition-all group" x-intersect="$el.classList.add('animate-scale-in')">
                <div class="w-14 h-14 rounded-xl bg-primary-50 flex items-center justify-center mb-4 group-hover:bg-primary-100 transition-colors">
                    <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $doc->title }}</h3>
                @if($doc->description)
                <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ Str::limit($doc->description, 120) }}</p>
                @endif
                @if($doc->file)
                <a href="{{ asset('storage/' . $doc->file) }}" target="_blank" class="inline-flex items-center gap-2 text-primary-600 font-semibold text-sm hover:text-primary-700 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    تحميل الوثيقة
                </a>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 bg-gray-50 rounded-2xl border border-gray-100">
            <div class="w-20 h-20 rounded-full bg-primary-50 flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">لا توجد وثائق حالياً</h3>
            <p class="text-gray-500">سيتم نشر وثائق الحوكمة قريباً.</p>
        </div>
        @endif
    </div>
</section>

@endsection
