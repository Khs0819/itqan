<?php
namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\News;
class NewsController extends Controller
{
    public function index()
    {
        $news = News::published()->latest()->with('category')->paginate(9);
        $featured = News::published()->featured()->latest()->take(3)->get();
        return view('pages.news.index', compact('news', 'featured'));
    }
    public function show(string $slug)
    {
        $article = News::where('slug', $slug)->published()->firstOrFail();
        $article->incrementViews();
        $related = News::published()->where('id', '!=', $article->id)->latest()->take(3)->get();
        return view('pages.news.show', compact('article', 'related'));
    }
}
