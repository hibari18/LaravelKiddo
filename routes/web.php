<?php

Route::get('message', 'AdminController@message');
//NOT THE HOMEPAGE YET
Route::get('compose', 'AdminController@compose');

Route::get('readmail', 'AdminController@readmail');

Route::get('sectioning', 'AdminController@sectioning');

Route::get('diswith', 'AdminController@diswith');

Route::get('adminaccount', 'AdminController@adminaccount');
