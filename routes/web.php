<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PageController;
use App\Http\Controllers\Site\NewsController;
use App\Http\Controllers\Site\ProgramController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\NewsletterController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');
// Static Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/governance', [PageController::class, 'governance'])->name('governance');
Route::get('/volunteer', [PageController::class, 'volunteer'])->name('volunteer');
Route::get('/careers', [PageController::class, 'careers'])->name('careers');
Route::get('/grants', [PageController::class, 'grants'])->name('grants');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
// Programs
Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/programs/{slug}', [ProgramController::class, 'show'])->name('programs.show');
// News
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
// Newsletter
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');
// Volunteer Application
Route::post('/volunteer', [PageController::class, 'volunteerStore'])->name('volunteer.store');
// Grant Application
Route::post('/grants/apply', [PageController::class, 'grantApply'])->name('grants.apply');
// Job Application
Route::post('/careers/apply/{id}', [PageController::class, 'jobApply'])->name('careers.apply');
