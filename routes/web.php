<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index',[\App\Http\Controllers\TestController::class, 'index']);
Route::get('/log/index',[\App\Http\Controllers\LogController::class, 'index']);
Route::get('/filter/index',[\App\Http\Controllers\FilterController::class, 'index']);
Route::get('/event/index',[\App\Http\Controllers\EventController::class, 'index']);
Route::get('/filter/parse',[\App\Http\Controllers\FilterController::class, 'parseStr']);
Route::get('/test',[\App\Http\Controllers\TestController::class, 'test']);
Route::get('/getToken',[\App\Http\Controllers\TestTokenController::class, 'index']);
Route::get('/parse',[\App\Http\Controllers\TestTokenController::class, 'parseToken']);


Route::get('/hello', function () {
	return 'hello...';
});
