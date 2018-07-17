<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('test', 'Auth\\RegisterController@test');
Route::group(array('prefix' => 'test-pdf'), function()
{
	Route::get('', function()
	{
		return View::make('pdfs.vendor-analytics');
	});
});

require_once __DIR__ . '/User/auth.php';

Route::group(['middleware' => ['auth.user']], function () {
  require_once __DIR__ . '/User/user.php';

  require_once __DIR__ . '/Geograph/geograph.php';

  require_once __DIR__ . '/Feature/config.php';
  require_once __DIR__ . '/Feature/chat.php';

  require_once __DIR__ . '/Thirdparty/thirdparty.php';
});

Route::group(['middleware' => ['auth.user:general']], function () {
	require_once __DIR__ . '/General/general.php';
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
require_once __DIR__ . '/routeBinding.php';
