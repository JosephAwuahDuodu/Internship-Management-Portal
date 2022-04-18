<?php

use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin_access'])->prefix('admin')->group(function () {
    // Route::get('/', function () { return view('homepage.index'); })->name('home');

    Route::get('/', function () { return view('admin.index'); })->name('admin');

    // Route::get('/student', function () { return view('student.index'); })->name('student');

    Route::resource('organizations', OrganizationController::class);
    Route::resource('user', UserController::class);
    Route::post('add_new_user', [UserController::class, 'add_new_user'])->name('add_new_user');
});

Route::middleware(['auth', 'org_access'])->prefix('org')->group(function () {
    Route::get('/', function () { return view('organization.index'); })->name('org');

});

Route::middleware(['auth', 'student_access'])->prefix('student')->group(function () {
    Route::get('/', function () { return view('organization.index'); })->name('org');

});


require __DIR__.'/auth.php';
