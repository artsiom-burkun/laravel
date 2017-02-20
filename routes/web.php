<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

      Route::get('/', 'PagesController@getIndex');
      Route::get('/about.html', 'PagesController@getAbout');
      Route::get('/kontakty.html', 'PagesController@getContact');

      Route::resource('posts', 'PostController');

      Route::group(['middleware' => ['web']], function () {

          Auth::routes();

          /*Пути для авторизации
          Route::get('auth/login', 'Auth\LoginController@login');
          Route::post('auth/login', 'Auth\LoginController@login');
          Route::get('auth/logout', 'Auth\AuthController@logout');

          //Регистрация
          Route::get('auth/register', 'AuthController@getRegister');
          Route::post('auth/register', 'AuthController@postRegister'); */

          //Блог
          Route::get('/blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
          Route::get('/blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle']);

          // Блог как администратор
          Route::resource('posts', 'PostController');

          // Категории
          Route::resource('categories', 'CategoryController', ['except' => ['create']]);
      });
