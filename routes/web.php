<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\articleController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\tagController;
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
Route::get('/', function () {
    return redirect()->route('articleModel.index');
});
Route::get('/home', function () {
    return redirect()->route('articleModel.index');
})->name("home");
//Route::view("/home","home")->name("home");
Route::view("/about","about");
Route::get("/show_article/{id}", [articleController::class,"show_article"])->name("show-article");
Route::resource('articleModel',articleController::class);

Route::resource("tagModel",tagController::class);
Auth::routes();
Route::middleware(["auth"])->group(function(){
    Route::view("/article","article");
});
//Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
