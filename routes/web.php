<?php

use App\Http\Controllers\Apps\MainController;
use App\Http\Controllers\Guest\DefaultController;
use App\Http\Middleware\PermissionMiddleware;
use Illuminate\Support\Facades\Route;

// Anybody could get here...
Route::middleware('guest')->group(function() {
    // Default routing for anybody as landing page
    Route::get('/', [DefaultController::class, 'index'])->middleware(PermissionMiddleware::class)->name('index');
    
    Route::prefix('guest')->group(function() {
        // Routing for guest's information
        Route::get('info', [DefaultController::class, 'info'])->name('guest.info');
        // Routing for guest to get more info from customer support
        Route::get('cs', [DefaultController::class, 'cs'])->name('guest.cs');
        Route::post('cs', [DefaultController::class, 'doCs'])->name('guest.doCs');
    });

    Route::prefix('auth')->group(function() {
        // Routing for authentication
        Route::get('login', [DefaultController::class, 'login'])->name('login');
        Route::post('login', [DefaultController::class, 'doLogin'])->name('guest.doLogin');
        // Routing for reseting password
        Route::get('reset', [DefaultController::class, 'reset'])->name('guest.reset');
        Route::post('reset', [DefaultController::class, 'doReset'])->name('guest.doReset');      
        // Routing for registering
        Route::get('register', [DefaultController::class, 'register'])->name('guest.register');
        Route::post('register', [DefaultController::class, 'doRegister'])->name('guest.doRegister');
        // Routing for verifying
        Route::get('verify/{id}/{token}', [DefaultController::class, 'verify'])->name('guest.verification');
    });
});

// Authenticated user(s) could get here...
Route::middleware('auth')->group(function() {
    // Default route for all authenticated user(s)
    Route::get('/dashboard', [MainController::class, 'notif']);
    Route::prefix('dashboard')->group(function() {
        // Get notification at first time sign in
        Route::get('notif', [MainController::class, 'notif'])->name('auth.notif');
        // Profile page for managing self profile
        Route::get('profile', [MainController::class, 'profile'])->name('auth.profile');
    });

    Route::prefix('auth')->group(function() {
        // Logout
        Route::get('logout', [MainController::class, 'logout'])->name('auth.logout');
    });
});
