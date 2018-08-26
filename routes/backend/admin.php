<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('labels', 'LabelController');
Route::resource('articles', 'ArticleController');
Route::resource('article_atlas', 'ArticleForAtlasController');
Route::resource('article_has_atlas', 'ArticleHasAtlasController');
Route::resource('banners', 'BannerController');
Route::post('uploadBanner', 'ArticleController@uploadBanner');
Route::resource('positions', 'PositionController');
Route::post('positions_saveLabels/{position}', 'PositionRelLabelController@saveLabels');
Route::get('positions_labels/{position}', 'PositionRelLabelController@Labels');
