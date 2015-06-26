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

Route::get('/', 'PagesController@index');
Route::get('home','PagesController@home');
Route::post('/register','PagesController@SignUp');
Route::get('/signup','PagesController@register');
Route::get('/login','PagesController@showLogin');
Route::get('/public_gallery','PagesController@showGallery');
Route::post('/account_signin','PagesController@login');