<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\{TeamMember, GovernanceDocument, Volunteer, JobPosting, Grant, GrantApplication, JobApplication, GalleryAlbum, Service, Faq, Initiative};
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about', [
            'boardMembers' => TeamMember::active()->board()->get(),
            'teamMembers' => TeamMember::active()->team()->get(),
            'founders' => TeamMember::active()->founders()->get(),
        ]);
    }

    public function governance()
    {
        return view('pages.governance', [
            'documents' => GovernanceDocument::active()->get(),
        ]);
    }

    public function volunteer()
    {
        return view('pages.volunteer');
    }

    public function volunteerStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'city' => 'nullable|string|max:100',
            'education' => 'nullable|string|max:100',
            'specialization' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:2000',
            'motivation' => 'nullable|string|max:2000',
        ]);

        Volunteer::create($validated);
        return back()->with('success', 'تم تسجيل طلب التطوع بنجاح. سنتواصل معك قريباً.');
    }

    public function careers()
    {
        return view('pages.careers', [
            'jobs' => JobPosting::active()->latest()->get(),
        ]);
    }

    public function jobApply(Request $request, int $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'cover_letter' => 'nullable|string|max:5000',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $cvPath = $request->file('cv')->store('applications/cvs', 'public');

        JobApplication::create([
            'job_posting_id' => $id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'cover_letter' => $validated['cover_letter'] ?? null,
            'cv_path' => $cvPath,
        ]);

        return back()->with('success', 'تم إرسال طلبك بنجاح!');
    }

    public function grants()
    {
        return view('pages.grants', [
            'grants' => Grant::active()->get(),
        ]);
    }

    public function grantApply(Request $request)
    {
        $validated = $request->validate([
            'grant_id' => 'nullable|exists:grants,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'national_id' => 'nullable|string|max:20',
            'university' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:255',
            'gpa' => 'nullable|string|max:10',
            'purpose' => 'nullable|string|max:2000',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('attachment')) {
            $validated['attachment'] = $request->file('attachment')->store('applications/grants', 'public');
        }

        GrantApplication::create($validated);
        return back()->with('success', 'تم إرسال طلب المنحة بنجاح!');
    }

    public function gallery()
    {
        return view('pages.gallery', [
            'albums' => GalleryAlbum::active()->with('items')->get(),
        ]);
    }

    public function services()
    {
        return view('pages.services', [
            'services' => Service::active()->get(),
            'initiatives' => Initiative::active()->get(),
        ]);
    }

    public function faq()
    {
        return view('pages.faq', ['faqs' => Faq::active()->get()]);
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }
}
