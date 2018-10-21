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
use App\Apartment;
use App\Location;

Auth::routes();

Route::get('/', function() {
	return view('home');
});

Route::get('/home', function() {
	return view('home');
});

Route::get('/admin', ['middleware' => ['auth', 'admin'], function() {
    $apartments = Apartment::where('verified','=',0)->get();
    return view('admin_dashboard')->with('apartments',$apartments);
}]);

Route::get('/documents/{id}', ['middleware' => ['auth', 'admin'], function($id) {
	$apartment = Apartment::where('id','=',$id)->first();
	$documents = $apartment->documents();
	return view('documents')->with('documents',$documents);
}]);

Route::get('/apartment/{id}','ApartController@show');

Route::post('/apartment_list','ApartController@list');

Route::get('/add_apartment',function() {
    $locations = Location::all();
    return view('add_apartment')->with('locations',$locations);
});

Route::post('/submit_apartment','ApartController@store');

Route::get('/verify_apartment/{id}',['middleware' => ['auth','admin'],'uses'=>'ApartController@verify']);

Route::post('/book_apartment','DealController@store');

Route::post('/post_review','ReviewController@store');

