<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     $name = request('name');
//     return view('welcome', compact('name') );
// });
// Route::get('/', 'HomeController');


Route::view('posts', 'layouts.app');
// Posts
Route::prefix('/posts')->middleware('auth')->group(function () {
    Route::get('', 'PostController@index')->name('posts.index')->withoutMiddleware('auth');
    Route::get('/create', 'PostController@create')->name('posts.create');
    Route::post('/store', 'PostController@store');
    Route::get('/search', 'PostController@search')->name('posts.search');
    Route::get('/{post:slug}/edit', 'PostController@edit');
    Route::patch('/{post:slug}/edit', 'PostController@update');
    Route::delete('/{post:slug}/delete', 'PostController@destroy');
    Route::get('/{post:slug}', 'PostController@show')->withoutMiddleware('auth')->name('posts.show');
});


// Category & Slug
Route::get('categories/{category:slug}', 'CategoryController@show');
Route::get('tags/{tag:slug}', 'TagController@show');

// Chat
Route::prefix('/chat')->middleware('auth')->group(function () {
    Route::view('', 'chat')->name('chat');
    Route::get('/contacts', 'ContactController@get');
    Route::get('/conversation/{id}', 'ContactController@getMessagesFor');
    Route::post('/conversation/send', 'ContactController@send');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
