<?php

Route::get('/', 'HomeController@index');
Route::get('dashboard', 'HomeController@index');
Route::resource('patients', 'PatientsController');
Route::resource('disciplines', 'DisciplinesController');
Route::resource('doctors', 'DoctorsController');
Route::resource('physiotherapists', 'PhysiotherapistsController');
Route::resource('therapies', 'TherapiesController');
Route::get('cities/datatable/{args}', 'CitiesController@data_table');

Auth::routes();
