<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
//project routes
use App\Http\Controllers\TourController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Minitravels\VoucherController;
use App\Http\Controllers\Minitravels\HotelController;
use App\Http\Controllers\Minitravels\FlightController;
use App\Http\Controllers\Minitravels\BookingController;
use App\Http\Controllers\Minitravels\ClientController;
use App\Http\Controllers\Minitravels\PackageController;
use App\Http\Controllers\Minitravels\PaymentController;
use App\Http\Controllers\Minitravels\SupportController;

Route::get('/', function () {
  return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
  ->middleware(['auth', 'verified'])
  ->name('dashboard');

Route::middleware(['auth'])->group(function () {
  Route::redirect('settings', 'settings/profile');

  Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
  Volt::route('settings/password', 'settings.password')->name('settings.password');

  // Tour Operator System
  Route::resource('tours', TourController::class);
  Route::resource('agencies', AgencyController::class);
  Route::resource('destinations', DestinationController::class);
  Route::resource('guides', GuideController::class);
  Route::resource('reports', ReportController::class);
  // MiniTravels
  Route::prefix('minitravels')->group(function () {
    Route::resource('vouchers', VoucherController::class);
    Route::resource('hotels', HotelController::class);
    Route::resource('flights', FlightController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('support', SupportController::class);
    
  });
});

require __DIR__ . '/auth.php';
