<?php

use Illuminate\Support\Facades\Route;
use Modules\Projects\App\Http\Controllers\ProjectsController;

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

Route::group([], function () {
    Route::get("/projects/filter/{filter?}",[ProjectsController::class,"filter"])->name("projects.filter");
    Route::resource('projects', ProjectsController::class)->names('projects');
});
