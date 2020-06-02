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

use App\Http\Controllers\QuestionController;

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
    //GoogleAPI
Route::get('/googleOAuth','Auth\LoginController@redirectToProvider');
Route::get('/callbackOAuth', 'Auth\LoginController@handleProviderCallback');

// Module 02
Route::get('search/{search}', ['uses' => 'SearchController@show', 'as' => 'search']);
//Route::get('post/{questionID}', ['uses' => 'QuestionController@show', 'as' => 'questionID']);
Route::get('post/newQuestion', 'QuestionController@addQuestion')->name('newQuestion');
Route::post('post/newQuestion', 'QuestionController@store')->name('makeQuestion');
Route::get('post/{question}', 'QuestionController@view');
Route::post('post/addAnswer', 'QuestionController@addAnswer')->name('addAnswer');
Route::post('post/edit', 'AnswerController@edit');
Route::post('post/editQuestion', 'QuestionController@edit');
Route::post('api/upvote', 'VoteController@upvote');
Route::post('api/downvote', 'VoteController@downvote');
Route::post('api/bestAnswer', 'QuestionController@chooseBestAnswer');
Route::post('api/category', 'CategoryController@getCategories');
Route::post('/deleteQuestion', 'QuestionController@deleteQuestion');
Route::post('/deleteAnswer', 'AnswerController@deleteAnswer');
Route::post('/deleteComment', 'CommentController@deleteComment');
Route::post('post/addComment', 'CommentController@addComment')->name('addComment');
Route::post('post/report','ReportController@store')->name('makeReport');
Route::get('activity', 'UserController@activity')->name('activity');
Route::get('bookmarks', 'BookmarkController@show')->name('bookmarks');
Route::get('api/addBookmark',  'BookmarkController@addBookmark');
Route::get('api/removeBookmark',  'BookmarkController@removeBookmark');
Route::get('activity/questions', 'UserController@activityQuestions')->name('activityQuestions');
Route::get('activity/answers', 'UserController@activityAnswers')->name('activityAnswers');
Route::get('activity/comments', 'UserController@activityComments')->name('activityComments');

// Module 03
Route::get('/', 'HomeController@showHome')->name('home');
Route::get('/adminLogin', 'Admin\Auth\LoginController@showLoginForm')->name('adminLogin');
Route::post('/adminLogin', 'Admin\Auth\LoginController@login')->name('logAdmin');
Route::get('/adminLogout', 'Admin\Auth\LoginController@logout')->name('logoutAdmin');

Route::get('/admin/categoryManagement','AdminController@showCategoryManagement')->name('showCatMan');
Route::post('/admin/addCategory', 'CategoryController@createCategory')->name('addCat');
Route::post('/admin/deleteCategory', 'CategoryController@modifyCategory')->name('modCat');
Route::get('/admin/reportManagement','AdminController@showReportManagement')->name('showRepMan');
Route::post('/admin/handleReport','ReportController@handleReport')->name('handleReport');

Route::get('about', 'HomeController@showAbout')->name('about');
