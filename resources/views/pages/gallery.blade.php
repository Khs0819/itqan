@extends('layouts.app')
@section('title', 'معرض الصور - جمعية إتقان التعليمية')
@section('content')

<x-page-header title="معرض الصور" subtitle="أنشطتنا" :breadcrumbs="[['label' => 'المعرض']]">
    <p class="text-white text-lg max-w-2xl" style="text-shadow: 0 1px 3px rgba(0,0,0,0.3)">لقطات من فعاليات وأنشطة جمعية إتقان التعليمية.</p>
</x-page-header>

<section class="section section-white">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        @if(isset($albums) && $albums->count())
        {{-- Albums Grid --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($albums as $album)
            <div class="group rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300 bg-white" x-intersect="$el.classList.add('animate-scale-in')">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ $album->cover ? asset('storage/' . $album->cover) : asset('images/defaults/gallery.jpg') }}" alt="{{ $album->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.parentElement.style.background='linear-gradient(135deg, #1e3a8a, #4f29b6)'; this.style.display='none'">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-5">
                        <span class="text-white text-sm font-medium">{{ $album->photos_count ?? 0 }} صورة</span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-gray-900 mb-1 text-lg">{{ $album->title }}</h3>
                    @if($album->description)
                    <p class="text-gray-500 text-sm line-clamp-2">{{ $album->description }}</p>
                    @endif
                    @if($album->date)
                    <p class="text-primary-600 text-xs font-semibold mt-2">{{ $album->date->translatedFormat('d M Y') }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        {{-- Empty State --}}
        <div class="text-center py-16 bg-gray-50 rounded-2xl border border-gray-100">
            <div class="w-20 h-20 rounded-full bg-primary-50 flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">لا توجد صور حالياً</h3>
            <p class="text-gray-500">سيتم إضافة صور الفعاليات والأنشطة قريباً.</p>
        </div>
        @endif
    </div>
</section>

@endsection
