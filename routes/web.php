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

Auth::routes();

Route::get('/', 'Admin\HomeController@index')->name('home');

Route::get("/logged-in", function () {
  return view("home");
})->name('login-page');

Route::get("{any?}", function () {
  return view("vue");
})->where("any", ".*");
