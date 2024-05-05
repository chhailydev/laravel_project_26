<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginPageController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\DashboardMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware([DashboardMiddleware::class])->group(function(){
    Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");
    Route::post('/logout', [LoginPageController::class, 'logout'])->name("logout");
});

Route::middleware([AuthMiddleware::class])->group(function(){
    Route::get("/", [LoginPageController::class, "loginPage"])->name("login");
    Route::post("/login", [LoginPageController::class, 'login'])->name("login.send");
    Route::get("/register", [LoginPageController::class, 'registerPage']);
    Route::post("/register", [LoginPageController::class, 'registerUser'])->name("registerUser");
});





