<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\FleetController;

// Public routes
Route::get('/',            fn() => view('home'))->name('home');
Route::get('/welcome',     fn() => view('welcome'))->name('welcome');
Route::get('/about',       fn() => view('about'))->name('about');
Route::get('/fleet',       fn() => view('fleet'))->name('fleet');
Route::get('/offers',      fn() => view('offers'))->name('offers');
Route::get('/blog',        fn() => view('blog'))->name('blog');
Route::get('/team',        fn() => view('team'))->name('team');
Route::get('/testimonials',fn() => view('testimonials'))->name('testimonials');
Route::get('/terms',       fn() => view('terms'))->name('terms');
Route::get('/contact',     fn() => view('contact'))->name('contact');
Route::get('/booking', [BookingController::class, 'index'])
    ->middleware('auth')
    ->name('bookings.index');

// Cars
Route::get('/cars', [CarController::class, 'index'])
    ->name('cars');

Route::get('/cars/{id}', [CarController::class, 'show'])
    ->name('cars.show');

// Auth routes (guests only)
Route::middleware('guest')->group(function () {
    Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',   [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register',[AuthController::class, 'register']);
});

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink']);

Route::get('/reset-password',  [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// User routes (logged in users)
Route::middleware('auth')->group(function () {
    Route::resource('bookings', BookingController::class);
});

// Admin routes (admin only)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Bookings
    Route::get('/bookings',                    [AdminController::class, 'bookings'])->name('bookings');
    Route::patch('/bookings/{booking}/status', [AdminController::class, 'updateBookingStatus'])->name('bookings.status');

    // Users CRUD
    Route::get('/users',          [AdminController::class, 'users'])->name('users');
    Route::post('/users',         [AdminController::class, 'storeUser'])->name('users.store');
    Route::put('/users/{user}',   [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}',[AdminController::class, 'destroyUser'])->name('users.destroy');

    // Audit Logs
    Route::get('/audit-logs', [AdminController::class, 'auditLogs'])->name('audit-logs');

    // Fleet / Cars
    Route::get('/fleet',               [FleetController::class, 'index'])->name('fleet');
    Route::get('/fleet/create',        [FleetController::class, 'create'])->name('fleet.create');
    Route::post('/fleet',              [FleetController::class, 'store'])->name('fleet.store');
    Route::get('/fleet/{car}/edit',    [FleetController::class, 'edit'])->name('fleet.edit');
    Route::put('/fleet/{car}',         [FleetController::class, 'update'])->name('fleet.update');
    Route::delete('/fleet/{car}',      [FleetController::class, 'destroy'])->name('fleet.destroy');
    Route::patch('/fleet/{car}/toggle',[FleetController::class, 'toggleAvailability'])->name('fleet.toggle');
});
