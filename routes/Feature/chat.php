<?php
Route::group(['prefix' => 'chat', 'namespace' => 'Chat'], function () {
	//access superadmin
	Route::post('admin-blast', 'ChatController@adminBlast')->middleware('auth.privilage:qwe123');

	//access all user login
	Route::group(['prefix' => 'user/{user_id}'], function () {	
		Route::post('', 'ChatController@storeChat');
		Route::get('', 'ChatController@listChatContentByUser');
	});

	Route::group(['prefix' => '{chat_id}'], function () {
		Route::get('read-chat', 'ChatController@readAllChatContent');
		Route::get('', 'ChatController@listChatContentById');
	});

	Route::get('', 'ChatController@listChat');
});