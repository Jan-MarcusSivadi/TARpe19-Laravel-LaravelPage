<?php

use App\Http\Controllers\TodoController;

Route::resource("/todo", TodoController::class);
// Route::get("/todos", [TodoController::class, "index"])->name('todo.index');
// Route::get("/todos/create", [TodoController::class, "create"]);
// Route::post("/todos/create", [TodoController::class, "store"]);
// Route::get("/todos/{todo}/edit", [TodoController::class, "edit"]);
// Route::patch("/todos/{todo}/update", [TodoController::class, "update"])->name('todo.update');

Route::put("/todos/{todo}/complete", [TodoController::class, "complete"])->name('todo.complete');
Route::delete("/todos/{todo}/incomplete", [TodoController::class, "incomplete"])->name('todo.incomplete');
Route::delete("/todos/{todo}/delete", [TodoController::class, "delete"])->name('todo.delete');


/*use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
