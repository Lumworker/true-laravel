<?php
//เป็นการวาง apiสำหรับ backend
//ในprojectนี้ทำงานกับ Product
//จากไฟล์Google Document Links form P' Peck หน้า3
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

Route::middleware('auth:api')->get('/user', function (Request $request) {//URLจพลงท้ายด้วยapi
    return $request->user();
});

Route::resource('products', 'Api\ProductController');//laravel  @=go to method
Route::post('login', 'Api\LoginController@authenticate');

Route::middleware('auth:api')->group(function () {
    Route::resource('shop', 'Api\ShopController');
});
