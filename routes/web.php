<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController as FrontendContactController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\JobApplicationController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/services', [App\Http\Controllers\ServicesController::class, 'index'])->name('services');
Route::get('/services/{slug}', [App\Http\Controllers\ServicesController::class, 'show'])->name('services.show');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', [FrontendContactController::class, 'index'])->name('contact');
Route::post('/contact', [FrontendContactController::class, 'store'])->name('contact.store');

Route::get('/career', function () {
    return view('career');
})->name('career');

Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Services Management
    Route::resource('services', ServiceController::class);
    Route::post('services/{service}/toggle', [ServiceController::class, 'toggleStatus'])
        ->name('services.toggle');

    // Clients Management
    // Route::resource('clients', ClientController::class);
    // Route::post('clients/{client}/toggle', [ClientController::class, 'toggleStatus'])
    //     ->name('clients.toggle');

    // Hero Slides Management
    // Route::resource('hero-slides', HeroSlideController::class);
    // Route::post('hero-slides/{heroSlide}/toggle', [HeroSlideController::class, 'toggleStatus'])
    //     ->name('hero-slides.toggle');

    // Contacts Management
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::patch('contacts/{contact}/status', [AdminContactController::class, 'updateStatus'])->name('contacts.updateStatus');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
    Route::post('contacts/bulk-delete', [AdminContactController::class, 'bulkDelete'])->name('contacts.bulkDelete');

    // Job Applications Management
    // Route::resource('job-applications', JobApplicationController::class)->only(['index', 'show', 'destroy']);
    // Route::patch('job-applications/{jobApplication}/status', [JobApplicationController::class, 'updateStatus'])
    //     ->name('job-applications.updateStatus');
});