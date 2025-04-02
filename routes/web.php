<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorAuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\DoctorsPageController;
use Illuminate\Support\Facades\Route;


// Public Routes
Route::get('/', function () {
    return view('public.welcome');
})->name('home');

Route::get('/contact', function () {
    return view('public.contact');
})->name('contact');

Route::get('/about', function () {
    return view('public.about');
})->name('about');

Route::get('/doctor', function () {
    return view('public.doctor');
})->name('doctors');



Route::prefix('public')->group(function () {
    Route::get('/doctors', [DoctorsPageController::class, 'index'])->name('doctorsPage.index');
    Route::get('/doctors/{id}', [DoctorsPageController::class, 'show'])->name('doctorsPage.show');
});



/**
 * Admin Routes
 */
// Guest (unauthenticated) admin routes
Route::middleware('guest:admin')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
});

// Authenticated admin routes
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Resource controllers
    Route::resource('admins', AdminController::class);
    Route::resource('specializations', SpecializationController::class);
    Route::resource('users', UserController::class);
    Route::resource('doctors', DoctorController::class);
    Route::get('/chart', [AdminController::class, 'chart'])->name('admin.chart');
    Route::resource('appointments', AppointmentController::class);
    Route::resource('patients', PatientController::class);
    Route::resource('subscriptions', SubscriptionController::class);
});

/**
 * Doctor Routes
 */
// Guest (unauthenticated) doctor routes
Route::middleware('guest:doctor')->group(function () {
    Route::get('/register-doctor', [DoctorAuthController::class, 'create'])->name('register.doctor');
    Route::post('/register-doctor', [DoctorAuthController::class, 'store'])->name('register.doctor.store');
    Route::get('/doctor/login', [DoctorAuthController::class, 'showLogin'])->name('doctor.login');
    Route::post('/doctor/login', [DoctorAuthController::class, 'login'])->name('doctor.login.submit');
});

// Authenticated doctor routes
Route::prefix('doctor')->middleware('doctor')->group(function () {
    Route::get('/dashboard', [DoctorAuthController::class, 'show'])->name('doctor.dashboard');
    // Route::post('/appointments', [AppointmentController::class , 'store'])->name('doctor.appointments.store');
    Route::put('/appointments/{appointmentId}/update', [AppointmentController::class , 'update'])->name('doctor.appointments.update');
    Route::get('/logout', [DoctorAuthController::class, 'logout'])->name('doctor.logout');
});

/**
 * User Routes
 */
Route::middleware('auth')->group(function () {
    Route::view('/profile', 'public.profile')->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes
require __DIR__.'/auth.php';
