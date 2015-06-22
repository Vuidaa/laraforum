<?php
/*Event::listen('illuminate.query', function($query)
{
var_dump($query);
});*/
//RESTful admin resources
Route::group(['prefix'=>'admin','middleware'=>'admin'], function(){
	//Admin index
	Route::get('/','Admin\AdminController@index');
	//Section resource
	Route::resource('section','Admin\BackSectionController');
	//Forum resource
	Route::resource('forum','Admin\BackForumController');
	//Topic resource
	Route::resource('topic','Admin\BackTopicController');
});
//Routes only for auth users
Route::group(['middleware'=>'auth'],function(){
	//Member logout
	Route::get('member/logout','Auth\AuthController@getLogout');
	//Topic
	Route::group(['prefix'=>'topic'],function(){
		//create
		Route::get('create/{forum?}','FrontTopicController@create');
		Route::post('create','FrontTopicController@store');
		//edit
		Route::put('edit/{id}','FrontTopicController@update');
		//delete
		Route::delete('delete/{id}','FrontTopicController@delete');
	});
	//Post
	Route::post('post/create/{topic?}','FrontPostController@store');
	//Profile
	Route::group(['prefix'=>'profile'],function(){
		//Profile index
		Route::get('/{slug?}','FrontProfileController@index');
		//Profile change avatar
		Route::post('avatar', 'FrontProfileController@avatar');
		//Edit
		Route::patch('/','FrontProfileController@update');
		//Change password
		Route::post('password','FrontProfileController@password');
	});
	//Private message
	Route::group(['prefix'=>'message'],function(){
			//show
			Route::get('{id}','FrontPrivateMessageController@show');
			//create
			Route::post('{recipient}','FrontPrivateMessageController@create');
			//delete
			Route::delete('delete/{id}','FrontPrivateMessageController@delete');
		});
});
//Routes for guest only
Route::group(['middleware'=>'guest'],function(){
	Route::group(['prefix'=>'member'], function(){
		Route::get('login','Auth\AuthController@getLogin');
		Route::get('register','Auth\AuthController@getRegister');
		Route::post('login','Auth\AuthController@postLogin');
		Route::post('register','Auth\AuthController@postRegister');
	});
});
//Main Forum route
Route::get('/{section?}/{forum?}/{topic?}', 'HomeController@index');