@extends('layouts.app')
@section('title', 'البرامج التعليمية - جمعية إتقان التعليمية')
@section('content')

<x-page-header title="البرامج التعليمية" subtitle="برامجنا" :breadcrumbs="[['label' => 'البرامج']]">
    <p class="text-white/90 text-lg max-w-2xl" style="text-shadow: 0 1px 3px rgba(0,0,0,0.2)">نقدم مجموعة متنوعة من البرامج التعليمية المصممة لتطوير المهارات ورفع الكفاءات.</p>
</x-page-header>

<section class="section section-white">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        {{-- Categories Filter --}}
        @if(isset($categories) && $categories->count())
        <div class="flex flex-wrap gap-3 mb-10" x-intersect="$el.classList.add('animate-slide-up')">
            <a href="/programs" class="px-5 py-2 rounded-full text-sm font-semibold transition-all {{ !request('category') ? 'bg-primary-600 text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-primary-50 hover:text-primary-600' }}">الكل</a>
            @foreach($categories as $cat)
            <a href="/programs?category={{ $cat->slug }}" class="px-5 py-2 rounded-full text-sm font-semibold transition-all {{ request('category') == $cat->slug ? 'bg-primary-600 text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-primary-50 hover:text-primary-600' }}">{{ $cat->name }}</a>
            @endforeach
        </div>
        @endif

        {{-- Programs Grid --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($programs as $program)
            <a href="/programs/{{ $program->slug }}" class="program-card" x-intersect="$el.classList.add('animate-scale-in')">
                <img src="{{ $program->image ? asset('storage/' . $program->image) : asset('images/defaults/program-1.png') }}" alt="{{ $program->title }}" class="w-full h-full object-cover" onerror="this.style.display='none'">
                <div class="overlay"></div>
                <div class="card-content">
                    @if($program->category)
                    <span class="card-number">{{ $program->category->name }}</span>
                    @endif
                    <h3 class="card-title">{{ $program->title }}</h3>
                    <p class="card-desc">{{ Str::limit($program->excerpt, 120) }}</p>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-16">
                <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">لا توجد برامج حالياً</h3>
                <p class="text-gray-500">سيتم إضافة البرامج التعليمية قريباً.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if(isset($programs) && $programs->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $programs->links() }}
        </div>
        @endif
    </div>
</section>

@endsection
