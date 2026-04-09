<?php

use App\Http\Controllers\Onboarding\OrganizationOnboardingController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->prefix('onboarding')->name('onboarding.')->group(function () {
    Route::resource('organization', OrganizationOnboardingController::class)->only(['create', 'store']);
});

Route::middleware(['auth', 'verified', 'onboarding.complete'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__ . '/settings.php';
