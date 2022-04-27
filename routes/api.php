<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TestController;
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

/********* Article **********/
Route::apiResource('articles', ArticleController::class)
    ->middleware('auth:sanctum');

/********* testing **********/
Route::post('test-upload', [TestController::class, 'uploadImg']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
