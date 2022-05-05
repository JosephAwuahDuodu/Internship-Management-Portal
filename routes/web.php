<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InternshipOfferController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentInternshipOfferController;
use App\Http\Controllers\UserController;
use App\Models\StudentInternshipOffer;
use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('homepage.index'); })->middleware(['auth', 'role_checker'])->name('home');

// ADMIN AREA ROUTES
Route::middleware(['auth', 'admin_access'])->prefix('admin')->group(function () {

    Route::get('/', [HomeController::class, 'admin'])->name('admin');

    Route::resource('internship_offers', InternshipOfferController::class)->only(['show', 'index']);
    Route::post('change_offer_status', [InternshipOfferController::class, 'change_status'])->name('change_offer_status');
    Route::resource('organizations', OrganizationController::class);
    Route::resource('user', UserController::class);
    Route::resource('students', StudentController::class);
    Route::post('add_new_user', [UserController::class, 'add_new_user'])->name('add_new_user');

    // INTERSHIP OFFERS

});


// ORGANIZATION AREA ROUTES
Route::middleware(['auth', 'org_access'])->prefix('org')->group(function () {
    Route::get('/', function () { return view('organization.index'); })->name('org');
    Route::resource('internship_offers', InternshipOfferController::class);
});


// STUDENT AREA ROUTES
Route::middleware(['auth', 'student_access'])->prefix('student')->group(function () {
    // Route::get('/', function () { return view('student.index'); })->name('student');
    Route::get("/", [HomeController::class, "student_home"])->name('student');
    Route::resource("student_internships", StudentInternshipOffer::class);
    Route::resource('/offer_applications', StudentInternshipOfferController::class);
    Route::post('/withdraw_application', [StudentInternshipOfferController::class, 'withdraw_application'])->name('offer_applications.withdraw_application');

});


require __DIR__.'/auth.php';
