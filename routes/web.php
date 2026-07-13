<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/organizations', [AdminController::class, 'organizations'])
    ->name('admin.organizations');

Route::get('/admin/organizations/{organization}', [AdminController::class, 'showOrganization'])
    ->name('admin.organization.show');

Route::post('/admin/organizations/{organization}/approve', [AdminController::class, 'approve'])
    ->name('admin.organization.approve');

Route::post('/admin/organizations/{organization}/reject', [AdminController::class, 'reject'])
    ->name('admin.organization.reject');
});

// Organization Registration Routes
Route::get('/organization/register', [OrganizationController::class, 'create'])
    ->name('organization.register');

Route::post('/organization/register', [OrganizationController::class, 'store'])
    ->name('organization.store');

Route::get('/organization/success', [OrganizationController::class, 'success'])
    ->name('organization.success');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

});

require __DIR__.'/auth.php';