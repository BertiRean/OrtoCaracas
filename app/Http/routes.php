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
	Route::resource('exams', 'ExamsController');
	Route::resource('earnings', 'EarningsController');
	Route::resource('consults', 'ConsultsController');
	Route::resource('expenses', 'ExpenseController');

	Route::get('odon', 'DoctorsController@orto_general');
	Route::get('specs', 'DoctorsController@specialits');
	Route::get('dates/create/{id}',['as' => 'admin.dates.create_date', 'uses' => 'DatesController@create']);

	// View Pacient Consults Route
	Route::get('consult/view_pacient/{id}', function($id)
	{
		return App::make('App\Http\Controllers\ConsultsController')->view_pacient($id);
	})->name('admin.consults.view_pacient');


	// View Doctor Consults Route
	Route::get('consult/view_doctor/{id}', function($id)
	{
		return App::make('App\Http\Controllers\ConsultsController')->view_doctor($id);
	})->name('admin.consults.view_doctor');

	// Consults Route Create
	Route::get('consults/create/{id}', function($id)
	{
		return App::make('App\Http\Controllers\ConsultsController')->create($id);
	})->name('admin.consults.create_consult');

	// Exams Route Create
	Route::get('exams/create/{id}/{spec_id}', function ($id, $spec_id)
	{
		return App::make('App\Http\Controllers\ExamsController')->create($id, $spec_id);
	})->name('admin.exams.create_exam');

	// Radio Routes //
	Route::get('rad-odon', function()
	{
		return App::make('App\Http\Controllers\ExamsController')->index_by_type(1);
	});

	Route::get('rad-med', function()
	{
		return App::make('App\Http\Controllers\ExamsController')->index_by_type(2);
	});


	Route::get('mamography', function()
	{
		return App::make('App\Http\Controllers\ExamsController')->index_by_type(3);
	});

	Route::get('lab', function()
	{
		return App::make('App\Http\Controllers\ExamsController')->index_by_type(4);
	});

	Route::get('eco', function() 
	{
		return App::make('App\Http\Controllers\ExamsController')->index_by_type(5);
	});

	Route::get('find_pacient_exam/{id}', function($id)
	{	
		return App::make('App\Http\Controllers\AdminController')->find_pacient('Examenes', $id);
	})->name('admin.find.pacient.exam');

	Route::get('find_pacient_date', function()
	{
		return App::make('App\Http\Controllers\AdminController')->find_pacient('Citas', null);
	});

	Route::get('find_pacient_consult', function()
	{
		return App::make('App\Http\Controllers\AdminController')->find_pacient('Consultas', null);
	});

});

