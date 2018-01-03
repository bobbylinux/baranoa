<?php

Route::get('/', 'HomeController@index');
Route::get('dashboard', 'HomeController@index');
Route::resource('patients', 'PatientsController');
Route::resource('disciplines', 'DisciplinesController');
Route::resource('doctors', 'DoctorsController');
Route::resource('physiotherapists', 'PhysiotherapistsController');
Route::resource('therapies', 'TherapiesController');
Route::resource('events', 'EventsController');
Route::get('cities/datatable/{args}', 'CitiesController@data_table');
Route::post('patients/datatable', 'PatientsController@datatable');

Auth::routes();
