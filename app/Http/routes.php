<?php 

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'AdminController@getIndex');


Route::group(['prefix' => 'admin'], function()
{
	Route::get('/', 'AdminController@getIndex');
	Route::resource('pacient', 'PacientsController');
	Route::resource('doctor', 'DoctorsController');
	Route::resource('dates', 'DatesController');

	Route::get('orto', 'DoctorsController@orto_general');
	Route::get('specs', 'DoctorsController@specialits');
	Route::get('find_pacient', 'DatesController@find_pacient');
	Route::get('dates/create/{id}',['as' => 'admin.dates.create_date', 'uses' => 'DatesController@create']);
});

