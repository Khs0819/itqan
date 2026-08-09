<?php
namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email|unique:newsletters,email']);
        Newsletter::create(['email' => $request->email]);
        return back()->with('success', 'تم اشتراكك في النشرة البريدية بنجاح!');
    }
}
