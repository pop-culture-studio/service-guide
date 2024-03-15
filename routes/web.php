<?php

use App\Http\Controllers\SitemapController;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Home::class)->name('home');

Volt::route('s/{facility}', 'facility')
    ->name('facility')
    ->whereUlid('facility');

Volt::route('c/{company}', 'company')
    ->name('company')
    ->whereNumber('company');

Volt::route('contact', 'contact')->name('contact');
Volt::route('map', 'map')->name('map');

Route::get('sitemap.xml', SitemapController::class)->name('sitemap');

//Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

require __DIR__.'/redirect.php';
