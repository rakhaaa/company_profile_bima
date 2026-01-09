<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\SettingController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/contact/submit', function () {
    return view('contact');
})->name('contact.submit');
Route::get('/career', function () {
    return view('career.index');
})->name('career');
Route::get('/career/id', function () {
    return view('career.show');
})->name('career.show');
Route::get('/career/apply', function () {
    return view('career.index');
})->name('career.apply');
Route::get('/services', function () {
    return view('services.index');
})->name('services');
Route::get('/services/1', function () {
    return view('services.show');
})->name('services.show');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');
Route::get('/blog', function () {
    return view('blog.index');
})->name('blog');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group and "auth" middleware.
|
*/

// Admin Routes - Protected by auth middleware
Route::prefix('admin')->name('admin.')->group(function () {
    
    // ========== DASHBOARD ==========
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // ========== COMPANY PROFILE ==========
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
    });
    
    // ========== SERVICES MANAGEMENT ==========
    Route::prefix('services')->name('services.')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/', [ServiceController::class, 'store'])->name('store');
        Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('edit');
        Route::put('/{service}', [ServiceController::class, 'update'])->name('update');
        Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('destroy');
        Route::patch('/{service}/toggle-status', [ServiceController::class, 'toggleStatus'])->name('toggle-status');
    });
    
    // ========== BLOG MANAGEMENT ==========
    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/create', [BlogController::class, 'create'])->name('create');
        Route::post('/', [BlogController::class, 'store'])->name('store');
        Route::get('/{post}/edit', [BlogController::class, 'edit'])->name('edit');
        Route::put('/{post}', [BlogController::class, 'update'])->name('update');
        Route::delete('/{post}', [BlogController::class, 'destroy'])->name('destroy');
        Route::patch('/{post}/toggle-status', [BlogController::class, 'toggleStatus'])->name('toggle-status');
        
        // Categories
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/', [BlogController::class, 'categories'])->name('index');
            Route::post('/', [BlogController::class, 'storeCategory'])->name('store');
            Route::put('/{category}', [BlogController::class, 'updateCategory'])->name('update');
            Route::delete('/{category}', [BlogController::class, 'destroyCategory'])->name('destroy');
        });
    });
    
    // ========== CLIENT MANAGEMENT ==========
    Route::prefix('clients')->name('clients.')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('index');
        Route::get('/create', [ClientController::class, 'create'])->name('create');
        Route::post('/', [ClientController::class, 'store'])->name('store');
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('edit');
        Route::put('/{client}', [ClientController::class, 'update'])->name('update');
        Route::delete('/{client}', [ClientController::class, 'destroy'])->name('destroy');
        Route::patch('/{client}/toggle-status', [ClientController::class, 'toggleStatus'])->name('toggle-status');
        
        // Testimonials
        Route::prefix('testimonials')->name('testimonials.')->group(function () {
            Route::get('/', [ClientController::class, 'testimonials'])->name('index');
            Route::get('/create', [ClientController::class, 'createTestimonial'])->name('create');
            Route::post('/', [ClientController::class, 'storeTestimonial'])->name('store');
            Route::get('/{testimonial}/edit', [ClientController::class, 'editTestimonial'])->name('edit');
            Route::put('/{testimonial}', [ClientController::class, 'updateTestimonial'])->name('update');
            Route::delete('/{testimonial}', [ClientController::class, 'destroyTestimonial'])->name('destroy');
        });
    });
    
    // ========== PORTFOLIO MANAGEMENT ==========
    Route::prefix('portfolio')->name('portfolio.')->group(function () {
        Route::get('/', [PortfolioController::class, 'index'])->name('index');
        Route::get('/create', [PortfolioController::class, 'create'])->name('create');
        Route::post('/', [PortfolioController::class, 'store'])->name('store');
        Route::get('/{portfolio}/edit', [PortfolioController::class, 'edit'])->name('edit');
        Route::put('/{portfolio}', [PortfolioController::class, 'update'])->name('update');
        Route::delete('/{portfolio}', [PortfolioController::class, 'destroy'])->name('destroy');
        Route::patch('/{portfolio}/toggle-status', [PortfolioController::class, 'toggleStatus'])->name('toggle-status');
    });
    
    // ========== CAREER MANAGEMENT ==========
    Route::prefix('career')->name('career.')->group(function () {
        // Job Listings
        Route::get('/', [CareerController::class, 'index'])->name('index');
        Route::get('/create', [CareerController::class, 'create'])->name('create');
        Route::post('/', [CareerController::class, 'store'])->name('store');
        Route::get('/{job}/edit', [CareerController::class, 'edit'])->name('edit');
        Route::put('/{job}', [CareerController::class, 'update'])->name('update');
        Route::delete('/{job}', [CareerController::class, 'destroy'])->name('destroy');
        Route::patch('/{job}/toggle-status', [CareerController::class, 'toggleStatus'])->name('toggle-status');
        
        // Applications
        Route::prefix('applications')->name('applications.')->group(function () {
            Route::get('/', [CareerController::class, 'applications'])->name('index');
            Route::get('/{application}', [CareerController::class, 'showApplication'])->name('show');
            Route::patch('/{application}/status', [CareerController::class, 'updateApplicationStatus'])->name('update-status');
            Route::delete('/{application}', [CareerController::class, 'destroyApplication'])->name('destroy');
            Route::post('/{application}/notes', [CareerController::class, 'addNote'])->name('add-note');
            Route::get('/{application}/download-cv', [CareerController::class, 'downloadCV'])->name('download-cv');
        });
    });
    
    // ========== INQUIRY MANAGEMENT ==========
    Route::prefix('inquiries')->name('inquiries.')->group(function () {
        Route::get('/', [InquiryController::class, 'index'])->name('index');
        Route::get('/{inquiry}', [InquiryController::class, 'show'])->name('show');
        Route::patch('/{inquiry}/status', [InquiryController::class, 'updateStatus'])->name('update-status');
        Route::delete('/{inquiry}', [InquiryController::class, 'destroy'])->name('destroy');
        Route::post('/{inquiry}/reply', [InquiryController::class, 'reply'])->name('reply');
    });
    
    // ========== CONTACT MESSAGES ==========
    Route::prefix('contacts')->name('contacts.')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::get('/{contact}', [ContactController::class, 'show'])->name('show');
        Route::patch('/{contact}/mark-read', [ContactController::class, 'markAsRead'])->name('mark-read');
        Route::delete('/{contact}', [ContactController::class, 'destroy'])->name('destroy');
        Route::post('/{contact}/reply', [ContactController::class, 'reply'])->name('reply');
    });
    
    // ========== MEDIA LIBRARY ==========
    Route::prefix('media')->name('media.')->group(function () {
        Route::get('/', [MediaController::class, 'index'])->name('index');
        Route::post('/upload', [MediaController::class, 'upload'])->name('upload');
        Route::delete('/{media}', [MediaController::class, 'destroy'])->name('destroy');
        Route::get('/search', [MediaController::class, 'search'])->name('search');
    });
    
    // ========== SETTINGS ==========
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::put('/general', [SettingController::class, 'updateGeneral'])->name('update-general');
        Route::put('/email', [SettingController::class, 'updateEmail'])->name('update-email');
        Route::put('/seo', [SettingController::class, 'updateSeo'])->name('update-seo');
        
        // User Management
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [SettingController::class, 'users'])->name('index');
            Route::get('/create', [SettingController::class, 'createUser'])->name('create');
            Route::post('/', [SettingController::class, 'storeUser'])->name('store');
            Route::get('/{user}/edit', [SettingController::class, 'editUser'])->name('edit');
            Route::put('/{user}', [SettingController::class, 'updateUser'])->name('update');
            Route::delete('/{user}', [SettingController::class, 'destroyUser'])->name('destroy');
        });
    });
});

/*
|--------------------------------------------------------------------------
| Quick Reference - All Admin Route Names
|--------------------------------------------------------------------------
|
| DASHBOARD
| - admin.dashboard
|
| PROFILE
| - admin.profile.index
| - admin.profile.edit
| - admin.profile.update
|
| SERVICES
| - admin.services.index
| - admin.services.create
| - admin.services.store
| - admin.services.edit
| - admin.services.update
| - admin.services.destroy
| - admin.services.toggle-status
|
| BLOG
| - admin.blog.index
| - admin.blog.create
| - admin.blog.store
| - admin.blog.edit
| - admin.blog.update
| - admin.blog.destroy
| - admin.blog.toggle-status
| - admin.blog.categories.index
| - admin.blog.categories.store
| - admin.blog.categories.update
| - admin.blog.categories.destroy
|
| CLIENTS
| - admin.clients.index
| - admin.clients.create
| - admin.clients.store
| - admin.clients.edit
| - admin.clients.update
| - admin.clients.destroy
| - admin.clients.toggle-status
| - admin.clients.testimonials.index
| - admin.clients.testimonials.create
| - admin.clients.testimonials.store
| - admin.clients.testimonials.edit
| - admin.clients.testimonials.update
| - admin.clients.testimonials.destroy
|
| PORTFOLIO
| - admin.portfolio.index
| - admin.portfolio.create
| - admin.portfolio.store
| - admin.portfolio.edit
| - admin.portfolio.update
| - admin.portfolio.destroy
| - admin.portfolio.toggle-status
|
| CAREER
| - admin.career.index
| - admin.career.create
| - admin.career.store
| - admin.career.edit
| - admin.career.update
| - admin.career.destroy
| - admin.career.toggle-status
| - admin.career.applications.index
| - admin.career.applications.show
| - admin.career.applications.update-status
| - admin.career.applications.destroy
| - admin.career.applications.add-note
| - admin.career.applications.download-cv
|
| INQUIRIES (RFQ)
| - admin.inquiries.index
| - admin.inquiries.show
| - admin.inquiries.update-status
| - admin.inquiries.destroy
| - admin.inquiries.reply
|
| CONTACTS
| - admin.contacts.index
| - admin.contacts.show
| - admin.contacts.mark-read
| - admin.contacts.destroy
| - admin.contacts.reply
|
| MEDIA
| - admin.media.index
| - admin.media.upload
| - admin.media.destroy
| - admin.media.search
|
| SETTINGS
| - admin.settings.index
| - admin.settings.update-general
| - admin.settings.update-email
| - admin.settings.update-seo
| - admin.settings.users.index
| - admin.settings.users.create
| - admin.settings.users.store
| - admin.settings.users.edit
| - admin.settings.users.update
| - admin.settings.users.destroy
|
*/
