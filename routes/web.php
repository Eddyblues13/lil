<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home.homepage');
});

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/plan', function () {
    return view('home.plan');
});

Route::get('/faq', function () {
    return view('home.faq');
});

Route::get('/terms', function () {
    return view('home.terms');
});

Route::get('/contact', function () {
    return view('home.contact');
});

Route::get('/plan', function () {
    return view('home.plan');
});

Route::get('/company-license', function () {
    return view('home.company-license');
});



// Login routes (only accessible to guests)
Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login.page');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
});

// Registration routes (only accessible to guests)
Route::middleware('guest')->group(function () {
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.submit');
});

// Referral signup route (only accessible to guests)
Route::middleware('guest')->group(function () {
    Route::get('/signup/{referral_code}', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('referral.signup');
});





// Forgot Password routes
Route::get('/forgot-password', [App\Http\Controllers\Auth\AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [App\Http\Controllers\Auth\AuthController::class, 'sendResetLinkEmail'])->name('password.email');

// Password Reset routes
Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [App\Http\Controllers\Auth\AuthController::class, 'reset'])->name('password.update');
Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('user.logout');

// Email & User Verification
Route::get('user/v', [App\Http\Controllers\Auth\EmailVerificationController::class, 'emailVerify'])->name('email_verify');
Route::get('user/ver', [App\Http\Controllers\Auth\EmailVerificationController::class, 'userVerify'])->name('user_verify');
Route::get('/verify/{id}', [App\Http\Controllers\Auth\EmailVerificationController::class, 'verify'])->name('verify');
Route::post('/verify-code', [App\Http\Controllers\Auth\EmailVerificationController::class, 'verifyCode'])->name('verify.code');
Route::get('/resend-verification-code', [App\Http\Controllers\Auth\EmailVerificationController::class, 'resendVerificationCode'])->name('resend.verification.code');
Route::post('/skip-code', [App\Http\Controllers\Auth\EmailVerificationController::class, 'skipCode'])->name('skip.code');



Route::prefix('user')->middleware('user')->group(function () {
    Route::get('/home', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('home');

    // Deposit
    Route::get('/deposit', [App\Http\Controllers\User\DepositController::class, 'create'])->name('deposit');
    Route::post('/deposit', [App\Http\Controllers\User\DepositController::class, 'store'])->name('deposit.store');
    // Withdraw
    Route::get('/withdraw', [App\Http\Controllers\User\WithdrawController::class, 'index'])->name('withdraw');
    Route::get('/withdraw', [App\Http\Controllers\User\WithdrawController::class, 'index'])->name('withdraw');
    Route::post('/withdraw/submit', [App\Http\Controllers\User\WithdrawController::class, 'submitWithdrawal'])->name('withdraw.submit');

    // Invest
    Route::get('/invest', [App\Http\Controllers\User\InvestController::class, 'index'])->name('invest');
    Route::get('/invest', [App\Http\Controllers\User\InvestController::class, 'index'])->name('invest');
    Route::post('/invest', [App\Http\Controllers\User\InvestController::class, 'invest'])->name('invest.submit');

    // Transaction History
    Route::get('/transactions', [App\Http\Controllers\User\TransactionController::class, 'index'])->name('transactions');

    // Profile
    Route::get('/profile', [App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile');

    // Settings
    Route::get('/settings', [App\Http\Controllers\User\ProfileController::class, 'showSettings'])->name('settings');
    Route::put('/settings/update', [App\Http\Controllers\User\ProfileController::class, 'updateSettings'])->name('settings.update');

    // Account Verification

    Route::get('/verification', [App\Http\Controllers\User\KycController::class, 'showForm'])->name('verification');
    Route::post('/kyc/submit', [App\Http\Controllers\User\KycController::class, 'submit'])->name('kyc.submit');
    Route::get('/kyc/status', [App\Http\Controllers\User\KycController::class, 'status'])->name('kyc.status');
});
