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
Route::get('/career', function () {
    return view('career');
})->name('career');
Route::get('/services', function () {
    return view('services');
})->name('services');
Route::get('/services/1', function () {
    return view('services');
})->name('services.show');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');
Route::get('/blog', function () {
    return view('blog');
})->name('blog');
