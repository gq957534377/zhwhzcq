<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('labels', 'LabelController');
Route::resource('articles', 'ArticleController');
Route::post('uploadBanner', 'ArticleController@uploadBanner');
