<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UserController as AdminUserController; 
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// ======== Home page ========
Route::get('/', [HomeController::class, 'index'])->name('home');
// === Events Search ===
Route::post('/search', [HomeController::class, 'search'])->name('home.search');

// ============== User Dashboard ==============
Route::middleware(['auth','verified'])->group(function () {
    Route::get('dashboard', [HomeController::class,'dashboard'])->name('dashboard');

    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::patch('users/{user}', [UserController::class, 'update'])->name('user.update');

    // ========== Events Handling ==========
    Route::get('user/events', [EventController::class, 'index'])->name('user.events.index');
    Route::post('subscribe/{event}', [EventController::class, 'subscribe'])->name('user.events.subscribe');
});

// ============== Guest Routes ================
Route::middleware('guest')->group(function () 
{
    Route::get('register', [UserController::class, 'create'])->name('register');
    Route::post('register', [UserController::class, 'store'])->name('user.store');
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class,'loginAuth'])->name('login.auth');
});

// ============== Email Verification X Logout X Event Sign up ============
Route::middleware('auth')->group(function() {
    
    Route::get('/verify-email', function () 
    {
        return view('user.verify-email');
    })->name('verification.notice');
     
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) 
    {
        $request->fulfill(); 
        return redirect()->route('home')->with('success', 'Email подтвержден');
    })->middleware('signed')->name('verification.verify');
    
    Route::post('/email/verification-notification', function (Request $request) 
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:3,1')->name('verification.send');

    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});

// ======== admin ===========
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('events', controller: AdminEventController::class);
    Route::post('/users/{id}/block', [AdminUserController::class, 'block'])->name('users.block');
    Route::resource('users', AdminUserController::class);
});