<?php

Route::get('dashboard', 'AdminController@dashboard');

Route::get('message', 'AdminController@message');

Route::get('compose', 'AdminController@compose');

Route::get('readmail', 'AdminController@readmail');

Route::get('sectioning', 'AdminController@sectioning');

Route::get('adminaccount', 'AdminController@adminaccount');

Route::get('advisorylist', 'AdminController@advisorylist');
Route::get('studentlist', 'AdminController@studentlist');
Route::get('viewgrade', 'AdminController@viewgrade');

Route::resource('division', 'DivisionController');

Route::resource('level', 'LevelController');

Route::resource('subject', 'SubjectController');

Route::resource('curriculumdetail', 'CurriculumDetailsController');
Route::get('leveladd/{id}', 'CurriculumDetailsController@show2');
Route::get('subjname/{id}', 'CurriculumDetailsController@show3');

Route::resource('grading', 'GradingController');

Route::resource('section', 'SectionController');
Route::get('section1/{divId}/{lvlId}', 'SectionController@show1');

Route::resource('requirement', 'RequirementController');

Route::resource('fees', 'FeesController');
Route::resource('schemetype', 'SchemeTypeController');
Route::resource('schedule', 'ScheduleController');
Route::resource('feedetails', 'FeeDetailsController');

Route::resource('admission', 'CheckRequirementController');

Route::resource('sectioning', 'BySectionController');

Route::resource('profile', 'StudentProfileController');

Route::resource('studentprofile', 'StudProfileEditController');

Route::resource('facultyprofile', 'FacultyProfileController');

Route::resource('dismisswithdraw', 'DismissWithdrawController');







