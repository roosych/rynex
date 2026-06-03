<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ZipCodeController;
use App\Http\Controllers\Admin\BrandController;

// ─── Frontend ────────────────────────────────────────────────────────────────

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/book-service', [BookingController::class, 'index'])->name('booking');
Route::post('/book-service', [BookingController::class, 'store'])->name('booking.store');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// ─── Auth ─────────────────────────────────────────────────────────────────────

Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');

// ─── Admin (protected) ────────────────────────────────────────────────────────

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('services', AdminServiceController::class)->except(['show']);
    Route::post('services/reorder', [AdminServiceController::class, 'reorder'])->name('services.reorder');
    Route::resource('posts', AdminPostController::class)->except(['show']);
    Route::resource('faqs', FaqController::class)->except(['show']);
    Route::resource('brands', BrandController::class)->except(['show']);
    Route::post('zipcodes/bulk-toggle', [ZipCodeController::class, 'bulkToggle'])->name('zipcodes.bulk-toggle');
    Route::resource('zipcodes', ZipCodeController::class)->except(['show']);

    Route::get('bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::get('bookings/{booking}', [AdminBookingController::class, 'show'])->name('bookings.show');
    Route::patch('bookings/{booking}', [AdminBookingController::class, 'update'])->name('bookings.update');
    Route::delete('bookings/{booking}', [AdminBookingController::class, 'destroy'])->name('bookings.destroy');

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::put('profile/name', [ProfileController::class, 'updateName'])->name('profile.name');

    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::get('settings/{group}', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::post('settings/{group}', [SettingsController::class, 'update'])->name('settings.update');
});
