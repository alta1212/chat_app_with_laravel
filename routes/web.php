<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/',[UserController::class,'login'])->middleware("isLoginNow");
Route::get('/login', [UserController::class,'login'])->middleware("isLoginNow");
Route::get('/signup', [UserController::class,'signup'])->middleware("isLoginNow");
Route::post('/createUser', [UserController::class,'createUser'])->name('auth.createUser');
Route::post('/doLogin', [UserController::class,'doLogin'])->name('auth.doLogin');
Route::get('/profile', [UserController::class,'profile'])->middleware("logIn");
