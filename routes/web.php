<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Laravel 12
|--------------------------------------------------------------------------
| Single file routing - Frontend & Admin routes in one place
*/

// =============================================================================
// AUTHENTICATION ROUTES
// =============================================================================
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// =============================================================================
// FRONTEND ROUTES
// =============================================================================

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Career
Route::get('/career', [CareerController::class, 'index'])->name('career');
Route::post('/career', [CareerController::class, 'store'])->name('career.store');

// Static Pages using Route::view (Laravel 12 feature)
Route::view('/about', 'about')->name('about');
Route::view('/services', 'services')->name('services');
Route::view('/services/{$id}', 'services')->name('services.show');
Route::view('/portfolio', 'portfolio')->name('portfolio');

// =============================================================================
// ADMIN ROUTES
// =============================================================================
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Profile & Settings
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', fn() => view('admin.profile.index'))->name('index');
        Route::get('/edit', fn() => view('admin.profile.edit'))->name('edit');
        Route::patch('/', 'App\Http\Controllers\Admin\ProfileController@update')->name('update');
    });

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', fn() => view('admin.settings.index'))->name('index');
    });

    // Content Management
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('clients', App\Http\Controllers\Admin\ClientController::class);
    Route::resource('hero-slides', App\Http\Controllers\Admin\HeroSlideController::class);
    Route::resource('stats', App\Http\Controllers\Admin\StatController::class);
    Route::resource('why-features', App\Http\Controllers\Admin\WhyFeatureController::class);

    // Blog & Portfolio
    Route::resource('blog', App\Http\Controllers\Admin\BlogController::class);
    Route::resource('portfolio', App\Http\Controllers\Admin\PortfolioController::class);

    // Career Management
    Route::prefix('career')->name('career.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\CareerApplicationController@index')->name('index');
        Route::get('/{application}', 'App\Http\Controllers\Admin\CareerApplicationController@show')->name('show');
        Route::patch('/{application}/status', 'App\Http\Controllers\Admin\CareerApplicationController@updateStatus')->name('update-status');
        Route::patch('/{application}/notes', 'App\Http\Controllers\Admin\CareerApplicationController@updateNotes')->name('update-notes');
        Route::delete('/{application}', 'App\Http\Controllers\Admin\CareerApplicationController@destroy')->name('destroy');
    });

    // Contact Management
    Route::prefix('contacts')->name('contacts.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\ContactSubmissionController@index')->name('index');
        Route::get('/{contact}', 'App\Http\Controllers\Admin\ContactSubmissionController@show')->name('show');
        Route::patch('/{contact}/status', 'App\Http\Controllers\Admin\ContactSubmissionController@updateStatus')->name('update-status');
        Route::patch('/{contact}/notes', 'App\Http\Controllers\Admin\ContactSubmissionController@updateNotes')->name('update-notes');
        Route::delete('/{contact}', 'App\Http\Controllers\Admin\ContactSubmissionController@destroy')->name('destroy');
    });

    // Media Library
    Route::prefix('media')->name('media.')->group(function () {
        Route::get('/', fn() => view('admin.media.index'))->name('index');
        Route::post('/upload', 'App\Http\Controllers\Admin\MediaController@upload')->name('upload');
        Route::delete('/{media}', 'App\Http\Controllers\Admin\MediaController@destroy')->name('destroy');
    });

});
