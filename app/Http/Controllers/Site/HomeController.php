<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\{Slider, Statistic, Program, News, Partner, Initiative, SuccessStory, GalleryAlbum, Faq, Setting};

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home', [
            'sliders' => Slider::active()->get(),
            'statistics' => Statistic::active()->get(),
            'programs' => Program::active()->featured()->ordered()->take(6)->get(),
            'news' => News::published()->latest()->take(3)->get(),
            'partners' => Partner::active()->get(),
            'initiatives' => Initiative::active()->take(4)->get(),
            'stories' => SuccessStory::active()->take(6)->get(),
            'albums' => GalleryAlbum::active()->take(6)->get(),
            'faqs' => Faq::active()->take(6)->get(),
        ]);
    }
}
