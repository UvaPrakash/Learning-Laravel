<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', ['middleware' => 'auth', 'uses' => 'PagesController@about']);

Route::get('contact', 'PagesController@contact');

//Route::get('articles', 'ArticlesController@index');

//Route::get('articles/create', 'ArticlesController@create');

//Route::get('articles/{id}', 'ArticlesController@show');

//Route::post('articles', 'ArticlesController@store');

Route::resource('articles', 'ArticlesController');

Route::get('tags/{tag}', 'TagsController@show');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('bar', ['middleware' => 'manager', function()    {
    return 'This page may only be viewed by Managers';
}]);

Route::get('foo', 'FooController@foo');
