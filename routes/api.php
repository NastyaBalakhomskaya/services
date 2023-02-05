<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\DetailingController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ScheddetailingController;
use App\Http\Controllers\Api\SchedserviceController;
use App\Http\Controllers\Api\SchedtireController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\TireController;
use App\Http\Controllers\Api\UserController;
use App\Models\Car;
use App\Models\Detailing;
use App\Models\Item;
use App\Models\Order;
use App\Models\Scheddetailing;
use App\Models\Schedservice;
use App\Models\Schedtire;
use App\Models\Service;
use App\Models\Status;
use App\Models\Tire;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();*/
Route::post('/sign-up', [UserController::class, 'signUp']);
Route::post('/sign-in', [AuthController::class, 'signIn']);

Route::get('/orders/{order}', [OrderController::class, 'show']);
Route::get('/orders', [OrderController::class, 'list']);

Route::group(['prefix' => '/orders', 'middleware' => ['auth:api']], function () {
    Route::post('', [OrderController::class, 'create'])->middleware('can:create,'.Order::class);
    Route::put('/{order}', [OrderController::class, 'edit'])->middleware('can:edit,order');
    Route::delete('/{order}', [OrderController::class, 'delete'])->middleware('can:delete,order');
});

Route::get('/detailings/{detailing}', [DetailingController::class, 'show']);
Route::get('/detailings', [DetailingController::class, 'list']);

Route::group(['prefix' => '/detailings', 'middleware' => ['auth:api']], function () {
    Route::post('', [DetailingController::class, 'create'])->middleware('can:create,'.Detailing::class);
    Route::put('/{detailing}', [DetailingController::class, 'edit'])->middleware('can:update,detailing');
    Route::delete('/{detailing}', [DetailingController::class, 'delete'])->middleware('can:delete,detailing');
});

Route::get('/services/{service}', [ServiceController::class, 'show']);
Route::get('/services', [ServiceController::class, 'list']);

Route::group(['prefix' => '/services', 'middleware' => ['auth:api']], function () {
    Route::post('', [ServiceController::class, 'create'])->middleware('can:create,'.Service::class);
    Route::put('/{service}', [ServiceController::class, 'edit'])->middleware('can:update,service');
    Route::delete('/{service}', [ServiceController::class, 'delete'])->middleware('can:delete,service');
});

Route::get('/tires/{tire}', [TireController::class, 'show']);
Route::get('/tires', [TireController::class, 'list']);

Route::group(['prefix' => '/tires', 'middleware' => ['auth:api']], function () {
    Route::post('', [TireController::class, 'create'])->middleware('can:create,'.Tire::class);
    Route::put('/{tire}', [TireController::class, 'edit'])->middleware('can:update,tire');
    Route::delete('/{tire}', [TireController::class, 'delete'])->middleware('can:delete,tire');
});

Route::get('/cars/{car}', [CarController::class, 'show']);
Route::get('/cars', [CarController::class, 'list']);

Route::group(['prefix' => '/cars', 'middleware' => ['auth:api']], function () {
    Route::post('', [CarController::class, 'create'])->middleware('can:create,'.Car::class);
    Route::put('/{car}', [CarController::class, 'edit'])->middleware('can:update,car');
    Route::delete('/{car}', [CarController::class, 'delete'])->middleware('can:delete,car');
});

Route::get('/statuses/{status}', [StatusController::class, 'show']);
Route::get('/statuses', [StatusController::class, 'list']);

Route::group(['prefix' => '/statuses', 'middleware' => ['auth:api']], function () {
    Route::post('', [StatusController::class, 'create'])->middleware('can:create,'.Status::class);
    Route::put('/{status}', [StatusController::class, 'edit'])->middleware('can:update,status');
    Route::delete('/{status}', [StatusController::class, 'delete'])->middleware('can:delete,status');
});

Route::get('/schedtires/{schedtire}', [SchedtireController::class, 'show']);
Route::get('/schedtires', [SchedtireController::class, 'list']);

Route::group(['prefix' => '/schedtires', 'middleware' => ['auth:api']], function () {
    Route::post('', [SchedtireController::class, 'create'])->middleware('can:create,'.Schedtire::class);
    Route::put('/{schedtire}', [SchedtireController::class, 'edit'])->middleware('can:update,schedtire');
    Route::delete('/{schedtire}', [SchedtireController::class, 'delete'])->middleware('can:delete,schedtire');
});

Route::get('/schedservices/{schedservice}', [SchedserviceController::class, 'show']);
Route::get('/schedservices', [SchedserviceController::class, 'list']);

Route::group(['prefix' => '/schedservices', 'middleware' => ['auth:api']], function () {
    Route::post('', [SchedserviceController::class, 'create'])->middleware('can:create,'.Schedservice::class);
    Route::put('/{schedservice}', [SchedserviceController::class, 'edit'])->middleware('can:update,schedservice');
    Route::delete('/{schedservice}', [SchedserviceController::class, 'delete'])->middleware('can:delete,schedservice');
});

Route::get('/scheddetailings/{scheddetailing}', [ScheddetailingController::class, 'show']);
Route::get('/scheddetailings', [ScheddetailingController::class, 'list']);

Route::group(['prefix' => '/scheddetailings', 'middleware' => ['auth:api']], function () {
    Route::post('', [ScheddetailingController::class, 'create'])->middleware('can:create,'.Scheddetailing::class);
    Route::put('/{scheddetailing}', [ScheddetailingController::class, 'edit'])->middleware('can:update,scheddetailing');
    Route::delete('/{scheddetailing}', [ScheddetailingController::class, 'delete'])->middleware('can:delete,scheddetailing');
});

Route::get('/items/{item}', [ItemController::class, 'show']);
Route::get('/items', [ItemController::class, 'list']);

Route::group(['prefix' => '/items', 'middleware' => ['auth:api']], function () {
    Route::post('', [ItemController::class, 'create'])->middleware('can:create,'.Item::class);
    Route::put('/{item}', [ItemController::class, 'edit'])->middleware('can:update,item');
    Route::delete('/{item}', [ItemController::class, 'delete'])->middleware('can:delete,item');
});
