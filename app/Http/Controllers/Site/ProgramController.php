<?php
namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\{Program, Category};
class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::active()->ordered()
            ->with('category')
            ->paginate(12);
        $categories = Category::active()->type('programs')->ordered()->get();
        return view('pages.programs.index', compact('programs', 'categories'));
    }
    public function show(string $slug)
    {
        $program = Program::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $related = Program::active()->where('id', '!=', $program->id)
            ->when($program->category_id, fn($q) => $q->where('category_id', $program->category_id))
            ->take(3)->get();
        return view('pages.programs.show', compact('program', 'related'));
    }
}
