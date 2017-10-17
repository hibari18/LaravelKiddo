<?php

Route::get('/', 'AdminController@dashboard');
Route::get('dashboard', 'AdminController@dashboard');

Route::get('message', 'AdminController@message');

Route::get('compose', 'AdminController@compose');

Route::get('readmail', 'AdminController@readmail');

Route::get('sectioning', 'AdminController@sectioning');

Route::get('accountlist', 'AdminController@accountlist');
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

Route::resource('enrollment', 'EnrollmentController');
Route::post('feesavailed/', 'EnrollmentController@proceed')->name('enrollment.proceed');
Route::post('collect/', 'EnrollmentController@collect')->name('enrollment.collect');


Route::resource('advisorylist', 'GradesController');
Route::post('studentlist/', 'GradesController@studlist')->name('advisorylist.studlist');

Route::resource('billing', 'BillingController');
Route::post('collection/', 'BillingController@bills')->name('billing.bills');

Route::resource('listofstudent', 'PDFController');
Route::get('getPDF','PDFController@getPDF')->name('listofstudent.getPDF');

Route::get('applicantquery','QueryController@index');
Route::get('applicantquery/{id}','QueryController@show');
Route::get('parentquery','QueryController@parent');
Route::get('facultyquery','QueryController@faculty');
Route::get('/home', 'HomeController@index')->name('home');
