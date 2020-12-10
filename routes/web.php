<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get("/test", function () {
    return view('test');
});
*/

Route::get("/me", function () {
    return "Hello You"; # code
});

//Route::get("/upload", [UserController::class, "uploadAvatar"]);
Route::post("/upload", [UserController::class, "uploadAvatar"]);

Route::get("/user", [UserController::class, "index"]);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
