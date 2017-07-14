<?php

Route::get('message', 'AdminController@message');

Route::get('compose', 'AdminController@compose');

Route::get('readmail', 'AdminController@readmail');

Route::get('sectioning', 'AdminController@sectioning');

Route::get('diswith', 'AdminController@diswith');

Route::get('adminaccount', 'AdminController@adminaccount');

Route::resource('curriculum', 'CurriculumController');

Route::resource('schoolyear', 'SchoolyearController');

Route::resource('requirement', 'RequirementController');

