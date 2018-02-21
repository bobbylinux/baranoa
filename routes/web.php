<?php

Route::get('/', 'HomeController@index');
Route::get('dashboard', 'HomeController@index');
Route::resource('patients', 'PatientsController');
Route::resource('disciplines', 'DisciplinesController');
Route::resource('doctors', 'DoctorsController');
Route::resource('physiotherapists', 'PhysiotherapistsController');
Route::resource('therapies', 'TherapiesController');
Route::resource('accesses', 'AccessesController');
Route::get('accesses/{args}/before_new_access', 'AccessesController@beforeNewAccess');
Route::get('cycles/{args}/create_cycle', 'CyclesController@createCycle');
Route::get('cities/datatable/{args}', 'CitiesController@data_table');
//Route::post('patients/datatable', 'PatientsController@datatable');

Auth::routes();
