<?php

use App\Http\Controllers\Onboarding\OrganizationOnboardingController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\Onboarding\InvitationOnboardingController;

Route::inertia('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->prefix('onboarding')->name('onboarding.')->group(function () {
    Route::resource('organization', OrganizationOnboardingController::class)
        ->only(['create', 'store'])
        ->middleware('onboarding.incomplete');

    Route::resource('invite', InvitationOnboardingController::class)
        ->only(['create'])
        ->middleware('onboarding.complete');
});

Route::middleware(['auth', 'verified', 'onboarding.complete'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__ . '/settings.php';
