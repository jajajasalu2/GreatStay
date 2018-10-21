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

Route::get('/protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);

Route::any('/search',function() {
    $query = Input::get('query');
    $location = Location::where('location','LIKE','%'.$query.'%')->first();
    if (is_null($location)) {
        return "It seems there are no rooms available in this location.";
    }
    $location_id = $location->id;
    $apartments = Apartment::where('location_id','=',$location_id)->get();
    return $apartments;
});

Route::get('/apartment/{id}','ApartController@show');

Route::post('/apartment_list','ApartController@list');

Route::get('/add_apartment',function() {
    $locations = Location::all();
    return view('add_apartment')->with('locations',$locations);
});

Route::post('/submit_apartment','ApartController@store');

Route::get('/verify_apartment/{id}',['middleware' => ['auth','admin'],'ApartController@verify']);

Route::post('/book_apartment','DealController@store');

Route::post('/post_review','ReviewController@store');
