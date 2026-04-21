<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\MessageController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/book', [BookingController::class, 'store'])->name('book.store');
Route::post('/contact/submit', [ContactController::class, 'store'])->name('contact.submit');

// Admin routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/booking/{id}/status', [AdminBookingController::class, 'updateStatus'])->name('booking.status');
    Route::get('/messages', [MessageController::class, 'index'])->name('messages');
});

require __DIR__.'/auth.php';
