<?php

Route::get('/', 'HomeController@index');
Route::resource('patients', 'PatientsController');
Route::get('cities/datatable/{args}', 'CitiesController@data_table');

Auth::routes();
