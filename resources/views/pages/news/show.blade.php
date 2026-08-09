@extends('layouts.app')
@section('title', $article->title . ' - جمعية إتقان التعليمية')
@section('content')

<x-page-header :title="$article->title" subtitle="الأخبار" :breadcrumbs="[['label' => 'الأخبار', 'url' => '/news'], ['label' => Str::limit($article->title, 40)]]" />

<section class="section section-white">
    <div class="max-w-[900px] mx-auto px-6 lg:px-8">
        {{-- Meta --}}
        <div class="flex flex-wrap items-center gap-4 mb-8 text-sm text-gray-500">
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                {{ $article->published_at ? $article->published_at->translatedFormat('d M Y') : $article->created_at->translatedFormat('d M Y') }}
            </span>
            @if($article->views)
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                {{ $article->views }} مشاهدة
            </span>
            @endif
            @if($article->category)
            <span class="px-3 py-1 bg-primary-50 text-primary-600 rounded-full text-xs font-semibold">{{ $article->category->name }}</span>
            @endif
        </div>

        {{-- Featured Image --}}
        @if($article->image)
        <div class="rounded-2xl overflow-hidden mb-8 shadow-lg">
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-[400px] object-cover">
        </div>
        @endif

        {{-- Content --}}
        <div class="prose prose-lg max-w-none text-gray-600 leading-loose mb-12">
            {!! $article->content !!}
        </div>

        {{-- Share --}}
        <div class="flex items-center gap-4 py-6 border-t border-gray-200">
            <span class="text-sm font-semibold text-gray-700">مشاركة:</span>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}" target="_blank" class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-primary-50 hover:text-primary-600 transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
            </a>
            <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->url()) }}" target="_blank" class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-green-50 hover:text-green-600 transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- Related News --}}
@if(isset($related) && $related->count())
<section class="section section-light">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="section-title">أخبار ذات صلة</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($related as $rel)
            <article class="news-card" x-intersect="$el.classList.add('animate-scale-in')">
                <div class="card-image">
                    <img src="{{ $rel->image ? asset('storage/' . $rel->image) : asset('images/defaults/news-1.png') }}" alt="{{ $rel->title }}">
                    <span class="card-date">{{ $rel->published_at ? $rel->published_at->translatedFormat('d M Y') : $rel->created_at->translatedFormat('d M Y') }}</span>
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $rel->title }}</h3>
                    <a href="/news/{{ $rel->slug }}" class="card-link">
                        قراءة المزيد
                        <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
