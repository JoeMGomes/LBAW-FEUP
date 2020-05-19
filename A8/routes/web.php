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


// Module 01

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register');
Route::get('member/settings','UserController@showSettings')->name('settings');
Route::post('member/changePhoto', 'UserController@uploadImage')->name('uploadImage');
Route::post('member/delete','UserController@destroy')->name('deleteAccount');
Route::post('member/changePassword', 'UserController@updatePassword')->name('editPassword');
Route::post('member/changeUsername', 'UserController@updateName')->name('editUsername');
Route::post('api/member/notifications', 'NotificationController@getNotifications');
Route::post('member/changeEmail', 'UserController@updateEmail')->name('editEmail');

// Module 02
Route::get('search/{search}', ['uses' => 'SearchController@show', 'as' => 'search']);
//Route::get('post/{questionID}', ['uses' => 'QuestionController@show', 'as' => 'questionID']);
Route::get('post/newQuestion', 'QuestionController@addQuestion')->name('newQuestion');
Route::post('post/newQuestion', 'QuestionController@store')->name('makeQuestion');
Route::get('post/{question}', 'QuestionController@view');
Route::post('post/addAnswer', 'QuestionController@addAnswer')->name('addAnswer');

// Module 03
Route::get('/', 'HomeController@showHome')->name('home');
Route::get('about', 'HomeController@showAbout')->name('about');
Route::post('api/category', 'CategoryController@getCategories');
