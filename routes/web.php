<?php

use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/allservices', [PageController::class, 'allservices'])->name('allservices');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::post('/book', [BookingController::class, 'store'])->name('book.store');

Route::post('/contact/submit', [ContactController::class, 'store'])->name('contact.submit');

// Admin routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/booking/{id}/status', [AdminBookingController::class, 'updateStatus'])->name('booking.status');

    Route::get('/messages', [MessageController::class, 'index'])->name('messages');
});

require __DIR__ . '/auth.php';
Route::get('/admin/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings');

Route::get('/sitemap.xml', function () {
    return response()->view('sitemap')->header('Content-Type', 'text/xml');
});

// Settings routes
Route::get('/admin/settings', [SettingsController::class, 'index'])->name('admin.settings');

Route::post('/admin/settings', [SettingsController::class, 'update'])->name('admin.settings.update');

Route::post('/admin/settings/reset', [SettingsController::class, 'resetToDefault'])->name('admin.settings.reset');

Route::post('/admin/services/{id}', [SettingsController::class, 'updateService'])->name('admin.service.update');

Route::put('/admin/services/{id}', [SettingsController::class, 'updateService'])->name('admin.service.update');

Route::post('/admin/services', [SettingsController::class, 'createService'])->name('admin.service.create');

Route::delete('/admin/services/{id}', [SettingsController::class, 'deleteService'])->name('admin.service.delete');

Route::post('/admin/media/upload', [SettingsController::class, 'uploadMedia'])->name('admin.media.upload');

Route::post('/admin/services/{id}/image', [SettingsController::class, 'updateServiceImage'])->name('admin.service.image');

Route::put('/admin/password', [SettingsController::class, 'updatePassword'])->name('admin.password.update');
