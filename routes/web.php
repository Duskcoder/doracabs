<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('/', function () {
    Mail::to('dhivyashree.duskcoder@gmail.com')->send(new ContactMail());
});*/
//For Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('tariff', [HomeController::class, 'tariff'])->name('tariff');

//For Contact Form Page
Route::get('contact', [ContactController::class, 'contactForm'])->name('contact');
Route::post('contact', [ContactController::class, 'storeContactForm'])->name('contact.store');

//For Booking Page
Route::get('book-now', [BookingController::class, 'bookNowStep2'])->name('book-now');
Route::post('store', [BookingController::class, 'store'])->name('booking.store');
Route::get('booking-result/{id}',[BookingController::class, 'bookingResult'])->name('booking-result');