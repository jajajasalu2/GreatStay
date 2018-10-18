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

Route::get('/', function() {
	return view('home');
});

Route::get('/home', function() {
	return view('home');
});

Route::get('/apartment/{id}','ApartController@show');
Route::post('/apartment_list','ApartController@list');

Route::get('/add_apartment',function() {
    return view('add_apartment');
});

Route::post('/book_apartment','DealController@store');
