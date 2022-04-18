<?php

use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () { return view('homepage.index'); })->name('home');

    Route::resource('organizations', OrganizationController::class);
    Route::resource('user', UserController::class);
    // Route::resource('ministries', MinistryController::class);
    // Route::resource('branches', BranchMasterController::class);
    Route::post('add_new_user', [UserController::class, 'add_new_user'])->name('add_new_user');

});

require __DIR__.'/auth.php';
