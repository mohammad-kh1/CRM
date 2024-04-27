<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(["middleware"=>["auth","role:admin"]], function () {
    Route::get("users/filter/{filter?}",[UsersController::class,"filter"])->name("users.filter");
    Route::resource('users', UsersController::class)->names('users');
});
