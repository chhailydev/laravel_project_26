<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginPageController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get("/", [LoginPageController::class, "loginPage"]);

Route::get("/dashboard", [DashboardController::class, "index"]);

