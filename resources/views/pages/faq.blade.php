@extends('layouts.app')
@section('title', 'الأسئلة الشائعة - جمعية إتقان التعليمية')
@section('content')

<x-page-header title="الأسئلة الشائعة" subtitle="مركز المساعدة" :breadcrumbs="[['label' => 'الأسئلة الشائعة']]">
    <p class="text-white text-lg max-w-2xl" style="text-shadow: 0 1px 3px rgba(0,0,0,0.3)">إجابات على أكثر الأسئلة شيوعاً حول الجمعية وبرامجها وخدماتها.</p>
</x-page-header>

<section class="section section-white">
    <div class="max-w-[800px] mx-auto px-6 lg:px-8">
        @if(isset($faqs) && $faqs->count())
        <div class="space-y-4">
            @foreach($faqs as $i => $faq)
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden hover:border-primary-200 transition-colors" x-data="{ open: {{ $i === 0 ? 'true' : 'false' }} }" x-intersect="$el.classList.add('animate-slide-up')">
                <button @click="open = !open" class="w-full flex items-center justify-between gap-4 p-6 text-right">
                    <h3 class="text-base font-bold text-gray-900">{{ $faq->question }}</h3>
                    <svg class="w-5 h-5 text-primary-500 flex-shrink-0 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-collapse>
                    <div class="px-6 pb-6 text-gray-500 leading-relaxed border-t border-gray-50 pt-4">
                        {!! $faq->answer !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        {{-- Default FAQs --}}
        <div class="space-y-4">
            @foreach([
                ['q' => 'ما هي جمعية إتقان التعليمية؟', 'a' => 'جمعية أهلية تعليمية متخصصة في دعم وتطوير التعليم الجامعي والعالي في المملكة العربية السعودية، تأسست العام 2025م بهدف الارتقاء بمنظومة التعليم.'],
                ['q' => 'كيف يمكنني التقدم للمنح الدراسية؟', 'a' => 'يمكنك التقدم للمنح الدراسية من خلال زيارة صفحة المنح الدراسية في موقعنا وتعبئة نموذج التقديم مع إرفاق المستندات المطلوبة. يتم مراجعة الطلبات بشكل دوري.'],
                ['q' => 'ما هي شروط الحصول على منحة دراسية؟', 'a' => 'تشمل الشروط الأساسية: أن يكون المتقدم سعودي الجنسية، حاصل على معدل تراكمي لا يقل عن 3.5، ومنتظم في دراسته الجامعية. للمزيد من التفاصيل يرجى مراجعة صفحة المنح.'],
                ['q' => 'كيف يمكنني التطوع مع الجمعية؟', 'a' => 'نرحب بالمتطوعين دائماً! يمكنك التسجيل من خلال صفحة التطوع في موقعنا. نوفر فرص تطوعية متنوعة تناسب مختلف المهارات والتخصصات.'],
                ['q' => 'هل تقبل الجمعية التبرعات؟', 'a' => 'نعم، تقبل الجمعية التبرعات المالية والعينية. يمكنك التواصل معنا عبر صفحة التواصل أو الاتصال مباشرة لمعرفة طرق التبرع المتاحة.'],
                ['q' => 'ما هي ساعات العمل الرسمية؟', 'a' => 'ساعات العمل الرسمية من الأحد إلى الخميس، من الساعة 8:00 صباحاً حتى 4:00 مساءً. يمكنكم التواصل معنا عبر البريد الإلكتروني في أي وقت.'],
                ['q' => 'هل يوجد فروع أخرى للجمعية؟', 'a' => 'حالياً المقر الرئيسي للجمعية في مدينة الدمام. نعمل على التوسع مستقبلاً لتغطية مناطق أخرى في المملكة.'],
                ['q' => 'كيف يمكنني متابعة أخبار الجمعية؟', 'a' => 'يمكنك متابعة أخبارنا من خلال الاشتراك في النشرة البريدية عبر موقعنا، أو متابعة حساباتنا الرسمية في منصات التواصل الاجتماعي.']
            ] as $i => $faq)
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden hover:border-primary-200 transition-colors" x-data="{ open: {{ $i === 0 ? 'true' : 'false' }} }" x-intersect="$el.classList.add('animate-slide-up')">
                <button @click="open = !open" class="w-full flex items-center justify-between gap-4 p-6 text-right">
                    <h3 class="text-base font-bold text-gray-900">{{ $faq['q'] }}</h3>
                    <svg class="w-5 h-5 text-primary-500 flex-shrink-0 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-collapse>
                    <div class="px-6 pb-6 text-gray-500 leading-relaxed border-t border-gray-50 pt-4">
                        {{ $faq['a'] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        {{-- Contact CTA --}}
        <div class="mt-12 text-center p-8 bg-gray-50 rounded-2xl border border-gray-100" x-intersect="$el.classList.add('animate-fade-in')">
            <h3 class="text-lg font-bold text-gray-900 mb-2">لم تجد إجابة لسؤالك؟</h3>
            <p class="text-gray-500 mb-4">تواصل معنا مباشرة وسنسعد بمساعدتك.</p>
            <a href="/contact" class="btn-primary">تواصل معنا</a>
        </div>
    </div>
</section>

@endsection
