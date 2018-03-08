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
Route::get('/mgt', function () {
    return view('mgt.dashboard');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('mgt/team', 'Mgt\\TeamController');
Route::resource('mgt/user', 'Mgt\\UserController');
Route::get('mgt/imposition-rate', 'Mgt\\ImpositionRateController@index');
Route::resource('mgt/revenue', 'Mgt\\RevenueController');
Route::resource('mgt/salary', 'Mgt\\SalaryController');
Route::post('mgt/salary-table', 'Mgt\\SalaryController@storeSalaries');