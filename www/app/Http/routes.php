<?php

//call back route
Route::get('test', function() {
    return 'this is a callback route';
});
Route::get('/', 'PagesController@index');
//not really a route, I am just using to get real data from XML.
//Route::get('/', 'PagesController@xml');
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

//resourceful routing
Route::resource('articles', 'ArticlesController');

//prefix the group of urls
Route::group(['prefix' => 'api/v1'], function() {
    Route::resource('jobs', 'JobsController');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
