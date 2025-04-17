<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BirthRegistrationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ContactMessageController;

// ==========================
// Public Routes
// ==========================

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Birth Registration
Route::prefix('register')->name('register.')->group(function () {
    Route::get('/', [BirthRegistrationController::class, 'showForm'])->name('form');
    Route::post('/', [BirthRegistrationController::class, 'submitForm'])->name('submit');
});

// Contact Us
Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('/', [ContactController::class, 'submit'])->name('submit');
});

// ==========================
// Admin Routes
// ==========================

Route::prefix('admin')->name('admin.')->group(function () {
    // Redirect /admin to login page
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });

    // Admin Auth Routes (no auth required)
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    // Authenticated Admin Routes
    Route::middleware('auth')->group(function () {
        // Logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Registration Management
        Route::get('/pending-registrations', [RegistrationController::class, 'pending'])->name('pending-registrations');
        Route::get('/approved-registrations', [RegistrationController::class, 'approved'])->name('approved-registrations');
        Route::get('/rejected-registrations', [RegistrationController::class, 'rejected'])->name('rejected-registrations');

        // Actions for approval/rejection
        Route::post('/registrations/{id}/approve', [RegistrationController::class, 'approve'])->name('registrations.approve');
        Route::post('/registrations/{id}/reject', [RegistrationController::class, 'reject'])->name('registrations.reject');

        // 🔶 Print Certificate
        Route::get('/registrations/{id}/print-certificate', [RegistrationController::class, 'print'])->name('registrations.print');

        // Reports
        Route::get('/reports', [ReportsController::class, 'index'])->name('reports');

        // Settings
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

        // Contact Messages
        Route::get('/messages', [ContactMessageController::class, 'index'])->name('messages');
        Route::delete('/messages/{id}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');
    });
});
