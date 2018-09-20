<?php

Route::middleware(['mobile.nav'])->group(function () {
    Route::get('/', 'IndexController@index')
        ->name('index');

    Route::get('/list', function () {
        return view('mobile.list');
    })->name('list');
});

Route::get('/article', function () {
    return view('mobile.article');
})
    ->name('article.detail');

Route::get('/list-gallery', function () {
    return view('mobile.list-gallery');
})->where(['id' => '[0-9]+'])
    ->name('gallery.list');

Route::get('/gallery', function () {
    return view('mobile.photo-gallery');
})->where(['id' => '[0-9]+'])
    ->name('gallery.detail');

Route::get('/search', function () {
    return view('mobile.search');
})->where(['id' => '[0-9]+'])
    ->name('search');

