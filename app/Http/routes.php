<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*Admin Index View*/
Route::get('/admin', function()
{
	return view('admin/index');
});


Route::get('/admin/pacient', function()
{
	return view('admin/pacient/index');
});

Route::get('/admin/doctor', function()
{
	return view('admin/doctor/index');
});
