<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\articleController;
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
    return view('layouts.layout');
});
Route::view("/","home");
Route::view("/home","home")->name("home");
Route::view("/about","about");
Route::resource('articleModel',articleController::class);
Auth::routes();
Route::middleware(["auth"])->group(function(){
    Route::view("/article","article");
});
//Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
