<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;


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


// Password Reset Routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');

Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

Route::post('password/reset', [ResetPasswordController::class, 'reset'])
    ->name('password.update');



// Forgot Password routes
// Route::get('/forgot-password', [App\Http\Controllers\Auth\AuthController::class, 'showForgotPasswordForm'])->name('password.request');
// Route::post('/forgot-password', [App\Http\Controllers\Auth\AuthController::class, 'sendResetLinkEmail'])->name('password.email');

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





Route::get('admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'adminLoginForm'])->name('admin.login');
Route::post('admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('login.submit');



// Admin Routes
Route::prefix('admin')->group(function () {
    Route::post('logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('logout');

    // Protecting admin routes using the 'admin' middleware
    Route::middleware(['admin'])->group(function () { // Admin Profile Routes

        Route::get('/profile', [App\Http\Controllers\Admin\AdminController::class, 'editProfile'])->name('admin.profile');
        Route::post('/profile/update', [App\Http\Controllers\Admin\AdminController::class, 'updateProfile'])->name('admin.profile.update');
        Route::post('/profile/password', [App\Http\Controllers\Admin\AdminController::class, 'updatePassword'])->name('admin.profile.password.update');
        Route::put('/admin/user/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateUser'])->name('admin.updateUser');

        Route::get('/change/user/password/page/{id}', [App\Http\Controllers\Admin\AdminController::class, 'showResetPasswordForm'])->name('admin.change.user.password.page');
        Route::post('/user-password-reset', [App\Http\Controllers\Admin\AdminController::class, 'resetPassword'])->name('admin.user.password_reset');

        Route::post('/admin/update-user', [App\Http\Controllers\Admin\AdminController::class, 'adminUpdateUser'])->name('admin.updateUser');


        Route::post('/update/earning-balance', [App\Http\Controllers\Admin\BalanceController::class, 'updateEarningBalance'])->name('update.earning.balance');
        Route::post('/update/withdrawal-balance', [App\Http\Controllers\Admin\BalanceController::class, 'updateWithdrawalBalance'])->name('update.withdrawal.balance');
        Route::post('/update/deposit-balance', [App\Http\Controllers\Admin\BalanceController::class, 'updateDepositBalance'])->name('update.deposit.balance');





        Route::post('/update/mining-balance', [App\Http\Controllers\Admin\BalanceController::class, 'updateMiningBalance'])->name('update.mining.balance');
        Route::post('/update/referral-balance', [App\Http\Controllers\Admin\BalanceController::class, 'updateReferralBalance'])->name('update.referral.balance');
        Route::post('/update/profit-balance', [App\Http\Controllers\Admin\BalanceController::class, 'updateProfitBalance'])->name('update.profit.balance');
        Route::post('/update/staking-balance', [App\Http\Controllers\Admin\BalanceController::class, 'updateStakingBalance'])->name('update.staking.balance');
        Route::post('/update/trading-balance', [App\Http\Controllers\Admin\BalanceController::class, 'updateTradingBalance'])->name('update.trading.balance');


        Route::get('/home', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.home');
        Route::get('/manage-users', [App\Http\Controllers\Admin\AdminController::class, 'manageUsersPage'])->name('manage.users.page');
        Route::get('getusers', [App\Http\Controllers\Admin\AdminController::class, 'getUsers'])->name('admin.getusers');
        Route::get('/manage-deposit', [App\Http\Controllers\Admin\AdminController::class, 'manageDepositsPage'])->name('manage.deposits.page');
        Route::get('/manage-withdrawals', [App\Http\Controllers\Admin\AdminController::class, 'manageWithdrawalsPage'])->name('manage.withdrawals.page');
        Route::get('/view-deposit/{id}/', [App\Http\Controllers\Admin\AdminController::class, 'viewDeposit']);
        Route::get('process-deposit/{id}', [App\Http\Controllers\Admin\AdminController::class, 'processDeposit'])->name('admin.process-deposit');
        Route::get('delete-deposit/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteDeposit'])->name('admin.delete-deposit');
        Route::get('/view-withdrawal/{user_id}/{withdrawal_id}', [App\Http\Controllers\Admin\AdminController::class, 'viewWithdrawal']);
        Route::get('/manage-kyc', [App\Http\Controllers\Admin\AdminController::class, 'manageKycPage'])->name('manage.kyc.page');
        Route::get('/accept-kyc/{id}/', [App\Http\Controllers\Admin\AdminController::class, 'acceptKyc']);
        Route::get('/reject-kyc/{id}/', [App\Http\Controllers\Admin\AdminController::class, 'rejectKyc']);
        Route::get('/reset-password/{user}', [App\Http\Controllers\Admin\AdminController::class, 'resetUserPassword'])->name('reset.password');
        Route::get('/clear-account/{id}', [App\Http\Controllers\Admin\AdminController::class, 'clearAccount'])->name('clear.account');

        Route::get('/{user}/impersonate',  [App\Http\Controllers\Admin\AdminController::class, 'impersonate'])->name('users.impersonate');
        Route::get('/leave-impersonate',  [App\Http\Controllers\Admin\AdminController::class, 'leaveImpersonate'])->name('users.leave-impersonate');

        Route::post('/edit-user/{user}', [App\Http\Controllers\Admin\AdminController::class, 'editUser'])->name('edit.user');
        Route::post('/add-new-user',  [App\Http\Controllers\Admin\AdminController::class, 'newUser'])->name('add.user');
        Route::get('/delete-user/{user}',  [App\Http\Controllers\Admin\AdminController::class, 'deleteUser'])->name('delete.user');
        Route::match(['get', 'post'], '/send-mail', [App\Http\Controllers\Admin\AdminController::class, 'sendMail'])->name('admin.send.mail');
        // Route for viewing user details
        Route::get('/user/{id}', [App\Http\Controllers\Admin\AdminController::class, 'viewUser'])->name('admin.user.view');
        Route::post('/transfer/suspend/{id}', [App\Http\Controllers\Admin\AdminController::class, 'suspendTransfer'])->name('transfer.suspend');
        Route::post('/transfer/unblock/{id}', [App\Http\Controllers\Admin\AdminController::class, 'unblockTransfer'])->name('transfer.unblock');
        Route::post('/account/suspend/{id}', [App\Http\Controllers\Admin\AdminController::class, 'suspendAccount'])->name('account.suspend');
        Route::post('/account/unblock/{id}', [App\Http\Controllers\Admin\AdminController::class, 'unblockAccount'])->name('account.unblock');

        // Define the route for opening an account
        Route::get('/user/open', [App\Http\Controllers\Admin\AdminController::class, 'openAccount'])->name('admin.user.open');



        // Route for viewing user details
        Route::get('/credit-user/{id}', [App\Http\Controllers\Admin\AdminController::class, 'creditUserPage'])->name('admin.credit.user.page');

        Route::post('credit-debit', [App\Http\Controllers\Admin\AdminController::class, 'creditDebit'])->name('credit-debit');


        // Route::post('/credit-user', [AdminController::class, 'creditUser'])->name('credit_user');


        // Route for updating user details
        Route::post('/user/update/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateUserDetail'])->name('update_user_detail');

        // Route for updating bank details
        Route::post('/user/update/bank/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateBankDetail'])->name('update_bank_detail');

        // Route for fund user
        Route::get('/user/fund/{accountnumber}/{id}', [App\Http\Controllers\Admin\AdminController::class, 'fundUser'])->name('fund_user');

        // Route for user transaction history
        Route::get('/user/transaction/{id}', [App\Http\Controllers\Admin\AdminController::class, 'userTransaction'])->name('user_transaction');

        // Route for user transfer tracking
        Route::get('/user/transfer/tracking/{id}', [App\Http\Controllers\Admin\AdminController::class, 'userTransferTracking'])->name('user_transfer_tracking');

        // Route for debit user
        Route::get('/user/debit/{accountnumber}/{id}', [App\Http\Controllers\Admin\AdminController::class, 'debitUser'])->name('debit_user');

        // Route for changing user photo
        Route::get('/user/photo/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updatePhoto'])->name('update_photo');

        // Route for user activity
        Route::get('/user/activity/{id}', [App\Http\Controllers\Admin\AdminController::class, 'userActivity'])->name('user_activity');

        // Route for user password reset
        Route::get('/user/password/reset/{userid}', [App\Http\Controllers\Admin\AdminController::class, 'userPasswordReset'])->name('user_password_reset');


        // Route for changing email user
        Route::get('/send/email', [App\Http\Controllers\Admin\AdminController::class, 'sendEmailPage'])->name('send.email');
        Route::post('/send/email', [App\Http\Controllers\Admin\AdminController::class, 'sendEmail'])->name('send.mail');

        // logo favicon settings
        Route::get('/branding', [App\Http\Controllers\Admin\BrandingController::class, 'index'])->name('branding.index');
        Route::post('/branding/update', [App\Http\Controllers\Admin\BrandingController::class, 'update'])->name('branding.update');

        Route::get('/smtp-settings', [App\Http\Controllers\Admin\SmtpSettingController::class, 'index'])->name('smtp.settings');
        Route::post('/smtp-settings', [App\Http\Controllers\Admin\SmtpSettingController::class, 'update'])->name('smtp.update');

        // Wallet resource routes
        Route::resource('wallets', App\Http\Controllers\Admin\WalletController::class);
        // Deposit resource routes
        Route::resource('deposits', App\Http\Controllers\Admin\DepositController::class);
        Route::patch('deposits/{deposit}/approve', [App\Http\Controllers\Admin\DepositController::class, 'approve'])->name('deposits.approve');

        // Withdrawal resource routes
        Route::resource('withdrawals', App\Http\Controllers\Admin\WithdrawalController::class);
        Route::patch('withdrawals/{withdrawal}/approve', [App\Http\Controllers\Admin\WithdrawalController::class, 'approve'])->name('withdrawals.approve');

        //kyc resource routes
        Route::resource('kyc', App\Http\Controllers\Admin\KycController::class);
        Route::get('kyc/{id}/approve', [App\Http\Controllers\Admin\KycController::class, 'approve'])->name('kyc.approve');

        //trade resource routes
        // Resource routes for Stock
        Route::resource('stock', App\Http\Controllers\Admin\StockController::class);
        Route::resource('traders', App\Http\Controllers\Admin\TraderController::class);

        // Payment Methods Routes
        Route::get('/payment', [App\Http\Controllers\Admin\PaymentSettingController::class, 'index'])->name('payment.index'); // This is crucial
        Route::get('/payment/create', [App\Http\Controllers\Admin\PaymentSettingController::class, 'create'])->name('payment.create');
        Route::post('/payment', [App\Http\Controllers\Admin\PaymentSettingController::class, 'store'])->name('payment.store');
        Route::get('/payment/{id}/edit', [App\Http\Controllers\Admin\PaymentSettingController::class, 'edit'])->name('payment.edit');
        Route::put('/payment/{id}', [App\Http\Controllers\Admin\PaymentSettingController::class, 'update'])->name('payment.update');
        Route::delete('/payment/{id}', [App\Http\Controllers\Admin\PaymentSettingController::class, 'destroy'])->name('payment.destroy');


        // Route::get('admin/stock/{stock}/edit', [StockController::class, 'edit'])->name('stock.edit');

        // Route::get('/stock/{stock}/edit', [StockController::class, 'edit'])->name('stock.edit'); // Edit route
        // Route::delete('/stock/{stock}', [StockController::class, 'destroy'])->name('stock.destroy'); // Destroy route

        Route::get('/stock-history', [App\Http\Controllers\Admin\AdminController::class, 'viewStockHistory'])->name('admin.stock.history');

        Route::get('/trade-histories', [App\Http\Controllers\Admin\AdminController::class, 'viewTradeHistory'])->name('admin.trade_histories');

        Route::get('/trading-plans/create', [App\Http\Controllers\Admin\TradingPlanController::class, 'create'])->name('admin.create-trading-plan');
        Route::post('/trading-plans/store', [App\Http\Controllers\Admin\TradingPlanController::class, 'store'])->name('admin.store-trading-plan');

        Route::post('/add-signal-strength', [App\Http\Controllers\Admin\AdminController::class, 'addSignalStrength'])->name('admin.add_signal_strength');
        Route::get('/user/{id}/trades', [App\Http\Controllers\Admin\TradeController::class, 'index'])->name('admin.user.trades');
        Route::post('/trades', [App\Http\Controllers\Admin\TradeController::class, 'store'])->name('admin.trades.store');
        Route::put('/trades/{trade}', [App\Http\Controllers\Admin\TradeController::class, 'update'])->name('admin.trades.update');
        Route::delete('/trades/{trade}', [App\Http\Controllers\Admin\TradeController::class, 'destroy'])->name('admin.trades.destroy');


        // admin Plans Routes
        Route::get('/plans', [App\Http\Controllers\Admin\TradingPlanController::class, 'index'])->name('admin.plans.index');
        Route::get('/plans/create', [App\Http\Controllers\Admin\TradingPlanController::class, 'create'])->name('admin.plans.create');
        Route::post('/plans', [App\Http\Controllers\Admin\TradingPlanController::class, 'store'])->name('admin.plans.store');
        Route::get('/plans/{plan}/edit', [App\Http\Controllers\Admin\TradingPlanController::class, 'edit'])->name('admin.plans.edit');
        Route::put('/plans/{plan}', [App\Http\Controllers\Admin\TradingPlanController::class, 'update'])->name('admin.plans.update');
        Route::delete('/plans/{plan}', [App\Http\Controllers\Admin\TradingPlanController::class, 'destroy'])->name('admin.plans.destroy');


        // Deposits Routes
        Route::get('/deposits', [App\Http\Controllers\Admin\DepositController::class, 'index'])->name('admin.deposits.index');
        Route::post('/deposits/{id}/approve', [App\Http\Controllers\Admin\DepositController::class, 'approve'])->name('admin.deposits.approve');
        Route::post('/deposits/{id}/reject', [App\Http\Controllers\Admin\DepositController::class, 'reject'])->name('admin.deposits.reject');


        // Withdrawals Routes
        Route::get('/withdrawals', [App\Http\Controllers\Admin\WithdrawalController::class, 'index'])->name('admin.withdrawals.index');
        Route::post('/withdrawals/{id}/approve', [App\Http\Controllers\Admin\WithdrawalController::class, 'approve'])->name('admin.withdrawals.approve');
        Route::post('/withdrawals/{id}/reject', [App\Http\Controllers\Admin\WithdrawalController::class, 'reject'])->name('admin.withdrawals.reject');


        // Trading Histories Routes
        Route::get('/trading-histories', [App\Http\Controllers\Admin\TradingHistoryController::class, 'index'])->name('admin.trading-histories.index');
        Route::post('/trading-histories', [App\Http\Controllers\Admin\TradingHistoryController::class, 'store'])->name('admin.trading-histories.store');
        Route::put('/trading-histories/{id}', [App\Http\Controllers\Admin\TradingHistoryController::class, 'update'])->name('admin.trading-histories.update');
        Route::delete('/trading-histories/{id}', [App\Http\Controllers\Admin\TradingHistoryController::class, 'destroy'])->name('admin.trading-histories.destroy');


        // Plan Histories Routes

        Route::get('/plan-histories', [App\Http\Controllers\Admin\PlanHistoryController::class, 'index'])->name('admin.plan-histories.index');
        Route::post('/plan-histories', [App\Http\Controllers\Admin\PlanHistoryController::class, 'store'])->name('admin.plan-histories.store');
        Route::put('/plan-histories/{id}', [App\Http\Controllers\Admin\PlanHistoryController::class, 'update'])->name('admin.plan-histories.update');
        Route::delete('/plan-histories/{id}', [App\Http\Controllers\Admin\PlanHistoryController::class, 'destroy'])->name('admin.plan-histories.destroy');


        // kyc Histories Routes

        Route::get('kyc-verifications', [App\Http\Controllers\Admin\KycVerificationController::class, 'index'])->name('admin.kyc-verifications.index');

        // Approval routes
        Route::post('kyc-verifications/{id}/approve', [App\Http\Controllers\Admin\KycVerificationController::class, 'approve'])
            ->name('admin.kyc-verifications.approve');

        // Rejection routes
        Route::post('kyc-verifications/{id}/reject', [App\Http\Controllers\Admin\KycVerificationController::class, 'reject'])
            ->name('admin.kyc-verifications.reject');



        // User specific Trading Histories Routes
        Route::prefix('users/{user}/trading-histories')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\UserTradingHistoryController::class, 'index'])->name('admin.users.trading-histories.index');
            Route::get('/create', [App\Http\Controllers\Admin\UserTradingHistoryController::class, 'create'])->name('admin.users.trading-histories.create');
            Route::post('/', [App\Http\Controllers\Admin\UserTradingHistoryController::class, 'store'])->name('admin.users.trading-histories.store');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\UserTradingHistoryController::class, 'edit'])->name('admin.users.trading-histories.edit');
            Route::put('/{id}', [App\Http\Controllers\Admin\UserTradingHistoryController::class, 'update'])->name('admin.users.trading-histories.update');
            Route::delete('/{id}', [App\Http\Controllers\Admin\UserTradingHistoryController::class, 'destroy'])->name('admin.users.trading-histories.destroy');
        });

        Route::get('/user/{user}/create', [App\Http\Controllers\Admin\UserTradingHistoryController::class, 'create'])->name('admin.trades.create');
        Route::post('/store', [App\Http\Controllers\Admin\UserTradingHistoryController::class, 'store'])->name('admin.trade.history.store');
        Route::get('/{trade}/edit', [App\Http\Controllers\Admin\UserTradingHistoryController::class, 'edit'])->name('admin.trades.edit');
        Route::put('/{trade}', [App\Http\Controllers\Admin\UserTradingHistoryController::class, 'update'])->name('admin.trade.history.update');
        Route::delete('/{trade}', [App\Http\Controllers\Admin\UserTradingHistoryController::class, 'destroy'])->name('admin.trade.history.destroy');

        // Users Routes
        Route::get('/users', [App\Http\Controllers\Admin\ManageUserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/create', [App\Http\Controllers\Admin\ManageUserController::class, 'create'])->name('admin.users.create');
        Route::post('/users', [App\Http\Controllers\Admin\ManageUserController::class, 'store'])->name('admin.users.store');
        Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\ManageUserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{user}', [App\Http\Controllers\Admin\ManageUserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [App\Http\Controllers\Admin\ManageUserController::class, 'destroy'])->name('admin.users.destroy');



        // User Deposits Routes
        Route::prefix('users/{user}/deposits')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ManageUserDepositController::class, 'index'])->name('admin.users.deposits.index');
            Route::get('/create', [App\Http\Controllers\Admin\ManageUserDepositController::class, 'create'])->name('admin.users.deposits.create');
            Route::post('/', [App\Http\Controllers\Admin\ManageUserDepositController::class, 'store'])->name('admin.users.deposits.store');
            Route::get('/{deposit}/edit', [App\Http\Controllers\Admin\ManageUserDepositController::class, 'edit'])->name('admin.users.deposits.edit');
            Route::put('/{deposit}', [App\Http\Controllers\Admin\ManageUserDepositController::class, 'update'])->name('admin.users.deposits.update');
            Route::delete('/{deposit}', [App\Http\Controllers\Admin\ManageUserDepositController::class, 'destroy'])->name('admin.users.deposits.destroy');
            Route::post('/{deposit}/approve', [App\Http\Controllers\Admin\ManageUserDepositController::class, 'approve'])->name('admin.users.deposits.approve');
            Route::post('/{deposit}/reject', [App\Http\Controllers\Admin\ManageUserDepositController::class, 'reject'])->name('admin.users.deposits.reject');
        });

        // Withdrawals Routes
        Route::prefix('users/{user}/withdrawals')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ManageUserWithdrawalController::class, 'index'])->name('admin.users.withdrawals.index');
            Route::get('/create', [App\Http\Controllers\Admin\ManageUserWithdrawalController::class, 'create'])->name('admin.users.withdrawals.create');
            Route::post('/', [App\Http\Controllers\Admin\ManageUserWithdrawalController::class, 'store'])->name('admin.users.withdrawals.store');
            Route::get('/{withdrawal}/edit', [App\Http\Controllers\Admin\ManageUserWithdrawalController::class, 'edit'])->name('admin.users.withdrawals.edit');
            Route::put('/{withdrawal}', [App\Http\Controllers\Admin\ManageUserWithdrawalController::class, 'update'])->name('admin.users.withdrawals.update');
            Route::delete('/{withdrawal}', [App\Http\Controllers\Admin\ManageUserWithdrawalController::class, 'destroy'])->name('admin.users.withdrawals.destroy');
            Route::post('/{withdrawal}/approve', [App\Http\Controllers\Admin\ManageUserWithdrawalController::class, 'approve'])->name('admin.users.withdrawals.approve');
            Route::post('/{withdrawal}/reject', [App\Http\Controllers\Admin\ManageUserWithdrawalController::class, 'reject'])->name('admin.users.withdrawals.reject');
        });



        // Identity Verification Routes
        Route::prefix('users/{user}/identity-verifications')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ManageUserIdentityVerificationController::class, 'index'])->name('admin.users.identity-verifications.index');
            Route::get('/{verification}', [App\Http\Controllers\Admin\ManageUserIdentityVerificationController::class, 'show'])->name('admin.users.identity-verifications.show');
            Route::post('/{verification}/approve', [App\Http\Controllers\Admin\ManageUserIdentityVerificationController::class, 'approve'])->name('admin.users.identity-verifications.approve');
            Route::post('/{verification}/reject', [App\Http\Controllers\Admin\ManageUserIdentityVerificationController::class, 'reject'])->name('admin.users.identity-verifications.reject');
            Route::delete('/{id}', [App\Http\Controllers\Admin\ManageUserIdentityVerificationController::class, 'destroy'])
                ->name('admin.users.identity-verifications.destroy');
        });


        // address Verification Routes
        Route::prefix('users/{user}/address-verifications')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ManageUserAddressVerificationController::class, 'index'])->name('admin.users.address-verifications.index');
            Route::get('/{verification}', [App\Http\Controllers\Admin\ManageUserAddressVerificationController::class, 'show'])->name('admin.users.address-verifications.show');
            Route::post('/{verification}/approve', [App\Http\Controllers\Admin\ManageUserAddressVerificationController::class, 'approve'])->name('admin.users.address-verifications.approve');
            Route::post('/{verification}/reject', [App\Http\Controllers\Admin\ManageUserAddressVerificationController::class, 'reject'])->name('admin.users.address-verifications.reject');
            Route::delete('/{id}', [App\Http\Controllers\Admin\ManageUserAddressVerificationController::class, 'destroy'])
                ->name('admin.users.address-verifications.destroy');
        });
    });
});
