<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\majorController;
use App\Http\Controllers\registrationsController;
use App\Http\Controllers\RoleController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\DashboardMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/add', [registrationsController::class, 'add_student_old']);
Route::get('/gets', [registrationsController::class, 'getStudent']);
Route::get('/test-insert', [registrationsController::class, 'testInsert']);

Route::middleware([DashboardMiddleware::class])->group(function(){
    Route::prefix('dashboard')->group(function(){
        Route::get('/list/students', [registrationsController::class, 'getStudent']);
        Route::get('profile/{id}', [registrationsController::class, 'getProfile'])->name('profile');
        Route::get('/add/student', [registrationsController::class, 'add_student']);
        Route::get('/update/form/{id}', [registrationsController::class, 'update_form']);
        Route::put('/update/student/{id}', [registrationsController::class, 'update_student']);
        Route::get('/view/student/{id}', [registrationsController::class, 'view_student']);

        Route::get("", [DashboardController::class, "index"])->name("dashboard");
        Route::post('/logout', [LoginPageController::class, 'logout'])->name("logout");

        Route::post('/register/student', [registrationsController::class, 'StudentRegister']);

        Route::get('/account', [LoginPageController::class, 'getAllAccount']);
        Route::get('/profile_image/{id}', [LoginPageController::class, 'serverProfileImage'])->name('profile_image');

        Route::get("/role", [RoleController::class, 'Roles']);
        Route::post('/create/role', [RoleController::class, 'create_role']);

        Route::get("/register", [LoginPageController::class, 'registerPage']);
        Route::post("/register", [LoginPageController::class, 'createAccount'])->name("registerUser");

        Route::get('/major', [majorController::class, 'majors']);
        Route::post('/create/major', [majorController::class, 'create_major']);

    });
});

Route::middleware([AuthMiddleware::class])->group(function(){
    Route::get("/", [LoginPageController::class, "loginPage"])->name("login");
    Route::post("/login", [LoginPageController::class, 'login'])->name("login.send");
});





