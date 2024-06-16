<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\majorController;
use App\Http\Controllers\registrationsController;
use App\Http\Controllers\RoleController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\DashboardMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});


Route::middleware([DashboardMiddleware::class])->group(function(){
    Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");
    Route::post('/logout', [LoginPageController::class, 'logout'])->name("logout");

    Route::get('/add/student', [registrationsController::class, 'add_student']);
    Route::post('/register/student', [registrationsController::class, 'RegisterStudent']);

    Route::get('/account', [LoginPageController::class, 'getAllAccount']);
    Route::get('/profile_image/{id}', [LoginPageController::class, 'serverProfileImage'])->name('profile_image');

    Route::get("/role", [RoleController::class, 'Roles']);
    Route::post('/create/role', [RoleController::class, 'create_role']);

    Route::get("/register", [LoginPageController::class, 'registerPage']);
    Route::post("/register", [LoginPageController::class, 'createAccount'])->name("registerUser");

    Route::get('/major', [majorController::class, 'majors']);
    Route::post('/create/major', [majorController::class, 'create_major']);
});

Route::middleware([AuthMiddleware::class])->group(function(){
    Route::get("/", [LoginPageController::class, "loginPage"])->name("login");
    Route::post("/login", [LoginPageController::class, 'login'])->name("login.send");
});





