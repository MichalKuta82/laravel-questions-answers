<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/questions', 'QuestionController');
Route::resource('/answers', 'AnswersController', ['except' => ['index', 'create', 'show']]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/profile/{user}', 'PageController@profile')->name('profile');

Route::get('/contact', 'PageController@contact')->name('contact');
Route::post('/contact', 'PageController@sendContact');

Route::get('/upload', 'UploadController@getUpload')->name('upload');
Route::post('/upload', 'UploadController@postUpload');

Route::get('/github/{username}', 'ApiController@github')->name('github');

Route::get('/weather', 'ApiController@getWeather')->name('weather');
Route::post('/weather', 'ApiController@postWeather');

Route::get('/weather-js', 'ApiController@getWeatherJs')->name('weather-js');