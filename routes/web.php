<?php

Route::get('message', 'AdminController@message');

Route::get('compose', 'AdminController@compose');

Route::get('readmail', 'AdminController@readmail');

Route::get('sectioning', 'AdminController@sectioning');

Route::get('diswith', 'AdminController@diswith');

Route::get('adminaccount', 'AdminController@adminaccount');

Route::get('advisorylist', 'AdminController@advisorylist');

Route::get('studentlist', 'AdminController@studentlist');

Route::resource('curriculum', 'CurriculumController');

Route::resource('subject', 'SubjectController');

Route::resource('division', 'DivisionController');

Route::resource('level', 'LevelController');

Route::resource('schoolyear', 'SchoolyearController');

Route::resource('requirement', 'RequirementController');

//Route::resource('payment', 'PaymentController');