<?php

use App\Http\Controllers\superadmin\users\PermissionController;
use App\Http\Controllers\superadmin\users\RoleController;
use App\Http\Controllers\superadmin\users\UserController;
use App\Http\Controllers\superadmin\InstituteController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
});


//Super Admin
Route::middleware(['auth:sanctum','role:Super-Admin'])->prefix('superadmin')->name('superadmin.')->group(function(){
    Route::get('dashboard',[DashboardController::class,'superadmin'])->name('dashboard');
    Route::resource('institute',InstituteController::class);
    
    //users, roles and permissions
    Route::resource('users',UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});


Route::middleware(['auth:sanctum'])->prefix('institute')->name('institute.')->group(function(){
    Route::get('dashboard',[DashboardController::class,'institute'])->name('dashboard');
    
    //users, roles and permissions
    Route::resource('users',UserController::class);
    Route::resource('roles',RoleController::class);
    Route::resource('permissions',PermissionController::class);   
});
