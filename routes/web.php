<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\TripsController;


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
Route::get('booking-result/{id}', [BookingController::class, 'bookingResult'])->name('booking-result');

// Adim Panel
Auth::routes();
Route::get('/home', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('home');

/*Dashboard*/

/*Cars*/
Route::get('cars/search', [CarsController::class, 'search'])->name('cars.search');
Route::get('cars/delete-restore/{id}', [CarsController::class, 'deleteRestoreCar'])->name('cars.delete-restore');
Route::resource('cars', CarsController::class);

/*Booked-Trips*/
Route::get('booked-trips/search', [TripsController::class, 'search'])->name('booked-trips.search');
Route::resource('booked-trips', TripsController::class);




Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('home');
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
