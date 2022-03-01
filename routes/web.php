<?php

use App\Http\Controllers\AddController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserCabController;
use App\Http\Controllers\UserController;
use App\Models\kvartira;
use App\Models\User;
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

Route::get('/', function(){
    return view('welcome');
});



Route::post('/check', [AddController::class, 'add']);
