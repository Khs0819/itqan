@extends('layouts.app')
@section('title', 'الأخبار - جمعية إتقان التعليمية')
@section('content')

<x-page-header title="أخبار الجمعية" subtitle="آخر الأخبار" :breadcrumbs="[['label' => 'الأخبار']]">
    <p class="text-white/90 text-lg max-w-2xl" style="text-shadow: 0 1px 3px rgba(0,0,0,0.2)">تابع آخر أخبار وفعاليات جمعية إتقان التعليمية.</p>
</x-page-header>

{{-- Featured News --}}
@if(isset($featured) && $featured->count())
<section class="section section-white pb-0">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-6">
            @foreach($featured->take(2) as $i => $article)
            <a href="/news/{{ $article->slug }}" class="relative rounded-2xl overflow-hidden {{ $i === 0 ? 'h-[400px]' : 'h-[400px]' }} group" x-intersect="$el.classList.add('animate-scale-in')">
                <img src="{{ $article->image ? asset('storage/' . $article->image) : asset('images/defaults/news-1.png') }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                    <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-xs font-semibold mb-3">{{ $article->published_at ? $article->published_at->translatedFormat('d M Y') : $article->created_at->translatedFormat('d M Y') }}</span>
                    <h3 class="text-xl font-bold leading-tight mb-2">{{ $article->title }}</h3>
                    <p class="text-white/80 text-sm line-clamp-2">{{ $article->excerpt }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- All News --}}
<section class="section section-white">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($news as $article)
            <article class="news-card" x-intersect="$el.classList.add('animate-scale-in')">
                <div class="card-image">
                    <img src="{{ $article->image ? asset('storage/' . $article->image) : asset('images/defaults/news-1.png') }}" alt="{{ $article->title }}" onerror="this.parentElement.style.background='linear-gradient(135deg, #1e3a8a, #4f29b6)'; this.style.display='none'">
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
            <div class="col-span-full text-center py-16">
                <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">لا توجد أخبار حالياً</h3>
                <p class="text-gray-500">سيتم نشر الأخبار والمستجدات قريباً.</p>
            </div>
            @endforelse
        </div>

        @if(isset($news) && $news->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $news->links() }}
        </div>
        @endif
    </div>
</section>

@endsection
