<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

// Public routes
Route::get('/', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/fleet', fn() => view('fleet'))->name('fleet');
Route::get('/offers', fn() => view('offers'))->name('offers');
Route::get('/blog', fn() => view('blog'))->name('blog');
Route::get('/team', fn() => view('team'))->name('team');
Route::get('/testimonials', fn() => view('testimonials'))->name('testimonials');
Route::get('/terms', fn() => view('terms'))->name('terms');
Route::get('/contact', fn() => view('contact'))->name('contact');

// Auth routes (guests only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// User routes (logged in users)
Route::middleware('auth')->group(function () {
    Route::resource('bookings', BookingController::class);
});

// Admin routes (admin only)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/bookings', [AdminController::class, 'bookings'])->name('bookings');
    Route::patch('/bookings/{booking}/status', [AdminController::class, 'updateBookingStatus'])->name('bookings.status');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/audit-logs', [AdminController::class, 'auditLogs'])->name('audit-logs');
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');
