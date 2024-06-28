<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("register", \App\Http\Controllers\api\v1\RegisterController::class)->name("api.register");
Route::post("auth", \App\Http\Controllers\api\v1\LoginController::class)->name("api.auth");

Route::post("shop-change", \App\Http\Controllers\api\v1\ShopChangeController::class);
Route::post("product-to-basket", \App\Http\Controllers\api\v1\ProductToBasketController::class);
Route::post("product-trash-basket", \App\Http\Controllers\api\v1\ProductTrashBasketController::class);
Route::post("product-trash-basket-all", \App\Http\Controllers\api\v1\ProductTrashBasketAllController::class);
Route::post("order", \App\Http\Controllers\api\v1\OrderController::class);

Route::match(['post', 'get'],"commerceml", [\App\Http\Controllers\api\sbis\ProductsCategoriesV2Controller::class, 'test']);
Route::match(['post', 'get'],"commerceml/xml", [\App\Http\Controllers\api\sbis\ProductsCategoriesV2Controller::class, 'readXml']);
Route::match(['post', 'get'],"commerceml/xml/category", [\App\Http\Controllers\api\sbis\ProductsCategoriesV2Controller::class, 'readXmlCategory']);
Route::match(['post', 'get'],"commerceml/xml/option", [\App\Http\Controllers\api\sbis\ProductsCategoriesV2Controller::class, 'readXmlOption']);
Route::match(['post', 'get'],"commerceml/xml/product", [\App\Http\Controllers\api\sbis\ProductsCategoriesV2Controller::class, 'readXmlProduct']);
Route::match(['post', 'get'],"commerceml/xml/relocation-all-images", [\App\Http\Controllers\api\sbis\ProductsCategoriesV2Controller::class, 'relocationAllImages']);
Route::match(['post', 'get'],"commerceml/xml/price", [\App\Http\Controllers\api\sbis\ProductsCategoriesV2Controller::class, 'readXmlPrice']);
//Route::match(['post', 'get'],"commerceml", [\App\Http\Controllers\api\sbis\ProductsCategoriesV3Controller::class, 'test']);


/*
 * https://indiansclub.ru/api/v1/commerceml/xml/relocation-all-images
 * https://indiansclub.ru/api/v1/commerceml/xml/product
 * https://indiansclub.ru/api/v1/commerceml/xml/category
 * https://indiansclub.ru/api/v1/commerceml/xml/option
 * */
