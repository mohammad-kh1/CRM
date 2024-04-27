<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route("dashboard.index");
})->middleware("auth");

Route::get('/login',[AuthController::class,"login"])->name("login")->middleware("guest");
Route::post("/login",[AuthController::class,"auth"])->name("auth");
Route::get("/logout",[AuthController::class,"logout"])->name("logout")->middleware("auth");
