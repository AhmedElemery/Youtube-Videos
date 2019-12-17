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

Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function () {
    Route::get('home' , 'Home@index')->name('admin.home');
    Route::resource('users', 'Users')->except(['show']);
    Route::resource('categories', 'Categories')->except(['show']);
    Route::resource('skills', 'Skills')->except(['show']);
    Route::resource('tags', 'Tags')->except(['show']);
    Route::resource('pages', 'Pages')->except(['show']);
    Route::resource('videos', 'Videos')->except(['show']);
    Route::post('/messages/replay/{id}', 'Messages@messageReplay')->name('message.replay');
    Route::resource('messages', 'Messages')->only(['index' , 'destroy' , 'edit']);
    Route::post('comments', 'Videos@commentStore')->name('comments.store');
    Route::get('comments/{id}', 'Videos@commentDelete')->name('comments.delete');
    Route::post('comments/{id}', 'Videos@commentUpdate')->name('comments.update');

});


Auth::routes();

Route::get('/', 'HomeController@welcome')->name('frontend.landing');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('category/{id}', 'HomeController@Category')->name('frontend.category');
Route::get('skill/{id}', 'HomeController@Skill')->name('frontend.skill');
Route::get('tag/{id}', 'HomeController@Tag')->name('frontend.tag');
Route::get('video/{id}', 'HomeController@Video')->name('frontend.video');
Route::get('page/{id}/{slug?}', 'HomeController@Page')->name('frontend.page');
Route::post('contact_us', 'HomeController@messageStore')->name('contact.store');

Route::middleware('auth')->group(function () {

    Route::post('comments/{id}', 'HomeController@commentUpdate')->name('frontend.commentUpdate');
    Route::post('comments/{id}/create', 'HomeController@commentStore')->name('frontend.commentStore');
});
