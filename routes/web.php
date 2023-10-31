<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Institute\AuthController as InstituteAuthController;
use App\Http\Controllers\Institute\DashboardController as InstituteDashboardController;
use App\Http\Controllers\Institute\FeeTypeController as InstituteFeeTypeController;
use App\Http\Controllers\Institute\GuardianController as InstituteGuardianController;
use App\Http\Controllers\Institute\InvoiceController as InstituteInvoiceController;
use App\Http\Controllers\Institute\SchoolClassController as InstituteSchoolClassController;
use App\Http\Controllers\Institute\SectionController as InstituteSectionController;
use App\Http\Controllers\Institute\StudentController as InstituteStudentController;
use App\Http\Controllers\Institute\SubjectController as InstituteSubjectController;
use App\Http\Controllers\Institute\SyllabusController as InstituteSyllabusController;
use App\Http\Controllers\Institute\AssignmentController as InstituteAssignmentController;
use App\Http\Controllers\Institute\TeacherController as InstituteTeacherController;
use App\Http\Controllers\Institute\users\RoleController as InstituteRoleController;
use App\Http\Controllers\Institute\users\UserController as InstituteUserController;
use App\Http\Controllers\Institute\users\PermissionController as InstitutePermissionController;

use App\Http\Controllers\Superadmin\DashboardController as SuperadminDashboardController;
use App\Http\Controllers\Superadmin\AuthController as SuperadminAuthController;
use App\Http\Controllers\Superadmin\InstituteController as SuperadminInstituteController;
use App\Http\Controllers\Superadmin\users\RoleController as SuperadminRoleController;
use App\Http\Controllers\Superadmin\users\UserController as SuperadminUserController;
use App\Http\Controllers\Superadmin\users\PermissionController as SuperadminPermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('login');
});

Route::get('home', function () {
    return redirect('login');
})->name('home');

Route::get('dashboard', function () {
    return redirect('institute/dashboard');
})->name('dashboard');

// ============================== Super Admin ==============================
Route::prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/', [SuperadminAuthController::class, 'index'])->name('index')->middleware('guest');
    Route::post('/login', [SuperadminAuthController::class, 'login'])->name('login')->middleware('guest');
    Route::get('logout', [SuperadminAuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth:superadmin'])->group(function () {
        Route::get('dashboard', [SuperadminDashboardController::class, 'index'])->name('dashboard');

        //Institute
        Route::resource('institute', SuperadminInstituteController::class);

        //users, roles and permissions
        Route::resource('users', SuperadminUserController::class);
        Route::resource('roles', SuperadminRoleController::class);
        Route::resource('permissions', SuperadminPermissionController::class);
    });
});


// ============================== Institute ==============================
Route::prefix('institute')->name('institute.')->group(function () {
    Route::get('/', [instituteAuthController::class, 'index'])->name('index')->middleware('guest');
    Route::post('/login', [InstituteAuthController::class, 'login'])->name('login')->middleware('guest');
    Route::get('logout', [InstituteAuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth:web'])->group(function () {
        Route::get('dashboard', [InstituteDashboardController::class, 'index'])->name('dashboard');

        //Student
        Route::resource('student', InstituteStudentController::class);

        //Fee Type
        Route::resource('fee-type', InstituteFeeTypeController::class);

        //Guardian
        Route::resource('guardian', InstituteGuardianController::class);

        //Invoice
        Route::resource('invoice', InstituteInvoiceController::class);

        //Invoice
        Route::resource('class', InstituteSchoolClassController::class);

        //Section
        Route::resource('section', InstituteSectionController::class);

        //Subject
        Route::resource('subject', InstituteSubjectController::class);

        //Teacher
        Route::resource('teacher', InstituteTeacherController::class);

        //Syllabus
        Route::resource('syllabus', InstituteSyllabusController::class);
        
        //Assignment 
        Route::resource('assignment',InstituteAssignmentController::class);

        //users, roles and permissions
        Route::resource('users', InstituteUserController::class);
        Route::resource('roles', InstituteRoleController::class);
        Route::resource('permissions', InstitutePermissionController::class);
    });
});