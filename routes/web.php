<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/services', fn() => view('services'))->name('services');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
// Old admin removed — Filament handles /admin now
