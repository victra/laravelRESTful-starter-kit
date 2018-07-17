<?php
Route::group(['prefix' => 'chat', 'namespace' => 'Chat'], function () {
	//access superadmin
	Route::post('admin-blast', 'ChatController@adminBlast')->middleware('auth.privilage:qwe123');

	//access vendor
	Route::post('vendor-blast', 'ChatController@vendorBlast')->middleware('auth.privilage:asd123');

	//access student and vendor
	Route::get('official', 'ChatController@listChatOfficial')->middleware('auth.privilage:asd123|zxc123');

	//access all user login
	Route::group(['prefix' => 'user/{user_id}'], function () {	
		Route::post('', 'ChatController@storeChat');
		Route::post('/automated', 'ChatController@storeChatAutomated');
		Route::get('', 'ChatController@listChatContentByUser');
	});

	Route::group(['prefix' => '{chat_id}'], function () {
		Route::get('read-chat', 'ChatController@readAllChatContent');
		Route::get('', 'ChatController@listChatContentById');
	});

	Route::get('', 'ChatController@listChat');
});