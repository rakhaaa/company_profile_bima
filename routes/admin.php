<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| 
| Semua route admin menggunakan middleware: auth, isAdmin
| Prefix: /admin
|
*/

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile & Settings (akan dibuat nanti)
    Route::get('/profile', function() {
        return view('admin.profile.index');
    })->name('profile.index');
    
    Route::get('/profile/edit', function() {
        return view('admin.profile.edit');
    })->name('profile.edit');
    
    Route::get('/settings', function() {
        return view('admin.settings.index');
    })->name('settings.index');
    
    // Services CRUD (akan dibuat nanti)
    Route::resource('services', 'App\Http\Controllers\Admin\ServiceController');
    
    // Clients CRUD (akan dibuat nanti)
    Route::resource('clients', 'App\Http\Controllers\Admin\ClientController');
    
    // Blog CRUD (akan dibuat nanti)
    Route::resource('blog', 'App\Http\Controllers\Admin\BlogController');
    
    // Portfolio CRUD (akan dibuat nanti)
    Route::resource('portfolio', 'App\Http\Controllers\Admin\PortfolioController');
    
    // Career Management (akan dibuat nanti)
    Route::prefix('career')->name('career.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\CareerController@index')->name('index');
        Route::get('/{application}', 'App\Http\Controllers\Admin\CareerController@show')->name('show');
        Route::patch('/{application}/status', 'App\Http\Controllers\Admin\CareerController@updateStatus')->name('update-status');
        Route::delete('/{application}', 'App\Http\Controllers\Admin\CareerController@destroy')->name('destroy');
    });
    
    // Contact Management (akan dibuat nanti)
    Route::prefix('contacts')->name('contacts.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\ContactController@index')->name('index');
        Route::get('/{contact}', 'App\Http\Controllers\Admin\ContactController@show')->name('show');
        Route::patch('/{contact}/status', 'App\Http\Controllers\Admin\ContactController@updateStatus')->name('update-status');
        Route::delete('/{contact}', 'App\Http\Controllers\Admin\ContactController@destroy')->name('destroy');
    });
    
    // Inquiries/RFQ Management (akan dibuat nanti)
    Route::prefix('inquiries')->name('inquiries.')->group(function () {
        Route::get('/', function() {
            return view('admin.inquiries.index');
        })->name('index');
    });
    
    // Media Library (akan dibuat nanti)
    Route::prefix('media')->name('media.')->group(function () {
        Route::get('/', function() {
            return view('admin.media.index');
        })->name('index');
    });
    
});