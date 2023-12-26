<?php

use App\Http\Controllers\Tenancy\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Tenancy\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Tenancy\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Tenancy\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Tenancy\Auth\NewPasswordController;
use App\Http\Controllers\Tenancy\Auth\PasswordController;
use App\Http\Controllers\Tenancy\Auth\PasswordResetLinkController;
use App\Http\Controllers\Tenancy\Auth\RegisteredUserController;
use App\Http\Controllers\Tenancy\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('tenancy.register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('tenancy.login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('tenancy.password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('tenancy.password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('tenancy.password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('tenancy.password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('tenancy.verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('tenancy.verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('tenancy.verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('tenancy.password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('tenancy.password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('tenancy.logout');
});