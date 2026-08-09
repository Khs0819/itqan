@extends('layouts.app')
@section('title', $program->title . ' - جمعية إتقان التعليمية')
@section('content')

<x-page-header :title="$program->title" subtitle="البرامج التعليمية" :breadcrumbs="[['label' => 'البرامج', 'url' => '/programs'], ['label' => $program->title]]" />

<section class="section section-white">
    <div class="max-w-[1320px] mx-auto px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">
            {{-- Main Content --}}
            <div class="lg:col-span-2">
                @if($program->image)
                <div class="rounded-2xl overflow-hidden mb-8 shadow-lg">
                    <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" class="w-full h-[400px] object-cover">
                </div>
                @endif

                <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed">
                    {!! $program->content !!}
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-1">
                <div class="sticky top-28 space-y-6">
                    {{-- Program Details Card --}}
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 text-lg">تفاصيل البرنامج</h3>
                        <div class="space-y-4">
                            @if($program->category)
                            <div class="flex items-center justify-between py-2 border-b border-gray-200">
                                <span class="text-sm text-gray-500">التصنيف</span>
                                <span class="text-sm font-semibold text-primary-600">{{ $program->category->name }}</span>
                            </div>
                            @endif
                            @if($program->duration)
                            <div class="flex items-center justify-between py-2 border-b border-gray-200">
                                <span class="text-sm text-gray-500">المدة</span>
                                <span class="text-sm font-semibold text-gray-900">{{ $program->duration }}</span>
                            </div>
                            @endif
                            @if($program->location)
                            <div class="flex items-center justify-between py-2 border-b border-gray-200">
                                <span class="text-sm text-gray-500">الموقع</span>
                                <span class="text-sm font-semibold text-gray-900">{{ $program->location }}</span>
                            </div>
                            @endif
                        </div>
                        <a href="/contact" class="btn-primary w-full justify-center mt-6">
                            سجل اهتمامك
                        </a>
                    </div>

                    {{-- Related Programs --}}
                    @if(isset($related) && $related->count())
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 text-lg">برامج ذات صلة</h3>
                        <div class="space-y-4">
                            @foreach($related as $rel)
                            <a href="/programs/{{ $rel->slug }}" class="flex items-center gap-3 group">
                                <div class="w-16 h-16 rounded-xl overflow-hidden flex-shrink-0">
                                    <img src="{{ $rel->image ? asset('storage/' . $rel->image) : asset('images/defaults/program-1.png') }}" alt="{{ $rel->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-gray-900 group-hover:text-primary-600 transition-colors line-clamp-2">{{ $rel->title }}</h4>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
