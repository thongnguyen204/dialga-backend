<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*********** Auth **********/
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])
->middleware('auth:sanctum')
->name('logout');
Route::post('/test-post-api', function () {
    return 'post';
});
Route::get('/test-get-api', function () {
    return 'get';
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
