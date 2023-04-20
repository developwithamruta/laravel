<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManChatController;
use App\Http\Controllers\BotManController;
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

Route::get('/dashboard', function () {
    return view('home');
});

/* Route::match(['get', 'post'], '/botman', 'BotManChatController@handle'); */
Route::match(['get', 'post'], '/botman-chat', 'BotManChatController@invoke');
 


Route::match(['get','post'],'/botman',[BotManController::class,'handle']);