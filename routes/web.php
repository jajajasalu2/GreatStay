<?php

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
use Illuminate\Support\Facades\Input;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/apartment/{id}','ApartController@show');

Route::get('/add_apartment',function() {
    return view('add_apartment');
});