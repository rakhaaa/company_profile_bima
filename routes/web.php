<?php

use Illuminate\Support\Facades\Route;

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
