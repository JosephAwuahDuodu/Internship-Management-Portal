<?php

use App\Http\Controllers\InternshipOfferController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('homepage.index'); })->middleware(['auth', 'role_checker'])->name('home');

Route::middleware(['auth', 'admin_access'])->prefix('admin')->group(function () {

    Route::get('/', function () { return view('admin.index'); })->name('admin');

    Route::resource('organizations', OrganizationController::class);
    Route::resource('user', UserController::class);
    Route::post('add_new_user', [UserController::class, 'add_new_user'])->name('add_new_user');
});

Route::middleware(['auth', 'org_access'])->prefix('org')->group(function () {
    Route::get('/', function () { return view('organization.index'); })->name('org');
    Route::resource('internship_offers', InternshipOfferController::class);
});

Route::middleware(['auth', 'student_access'])->prefix('student')->group(function () {
    Route::get('/', function () { return view('organization.index'); })->name('student');

});


require __DIR__.'/auth.php';
