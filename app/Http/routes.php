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
Route::get('/public-gallery',['as'=>'public-gallery','uses'=>function(){
    return view('public_gallery');
}]);
Route::get('/errors/503',function(){
    return view('errors.503');
});
Route::get('/',['as'=>'home','uses'=>'HomeController@index']);
Route::get('/dash-board',['as'=>'dash-board','uses'=>"DashBoardController@index"]);
Route::get('/news',['as'=>'news','uses'=>'Admin\NewsController@index']);
Route::get('/news/rss',['as'=>'news.feed','uses'=>'Admin\NewsController@getRssFeed']);
Route::get('/news/rss/apple',['as'=>'news.feed','uses'=>'Admin\NewsController@getRssFeedApple']);
Route::group(['middleware'=>['auth']],function(){
    Route::get('/news/create',['as'=>'new.create','uses'=>'Admin\NewsController@create']);
    Route::post('/news/store',['as'=>'new.store','uses'=>'Admin\NewsController@store']);
    Route::get('/news/unpublished',['as'=>'news.unpublished','uses'=>'Admin\NewsController@viewUnpublished']);
    Route::post('/news/update',['as'=>'new.update','uses'=>'Admin\NewsController@update']);
    Route::post('/news/delete',['as'=>'new.delete','uses'=>'Admin\NewsController@destroy']);
    Route::get('/news/{slug}/edit',['as'=>'new.edit','uses'=>'Admin\NewsController@edit']);
});
Route::get('/news/{slug}/show',['as'=>'new.show','uses'=>'Admin\NewsController@show']);
Route::controller('/','Auth\AuthController');
