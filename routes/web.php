<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AllServicesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DetailingController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginHistoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PriceDetailingsController;
use App\Http\Controllers\PriceServicesController;
use App\Http\Controllers\PriceTiresController;
use App\Http\Controllers\ScheddetailingController;
use App\Http\Controllers\SchedserviceController;
use App\Http\Controllers\SchedtireController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TireController;
use App\Http\Controllers\UserController;
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
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])
    ->name('home');

Route::get('/about', [AboutUsController::class, 'show'])
    ->name('about');

Route::get('/contact', [ContactUsController::class, 'show'])
    ->name('contact');

Route::post('/contact', [ContactUsController::class, 'store'])
    ->name('contact.store');

Route::get('/price', [AllServicesController::class, 'price'])
    ->name('price');

Route::get('/price-services', [PriceServicesController::class, 'price'])
    ->name('price-services');

Route::get('/price-detailings', [PriceDetailingsController::class, 'price'])
    ->name('price-detailings');

Route::get('/price-tires', [PriceTiresController::class, 'price'])
    ->name('price-tires');

Route::group(['middleware' => ['auth', 'confirm']], function () {
    Route::get('/orders/create', [OrderController::class, 'createForm'])
        ->name('order.create.form')
        ->middleware('can:create,'.Order::class);

    Route::post('/orders/create', [OrderController::class, 'create'])
        ->name('order.create')
        ->middleware('can:create,'.Order::class);

    Route::get('/orders', [OrderController::class, 'list'])
        ->name('order.list');

    Route::get('/orders/{order}', [OrderController::class, 'show'])
        ->name('order.show');

    Route::group(['middleware' => 'can:edit,order'], function () {
        Route::get('/orders/{order}/edit', [OrderController::class, 'editForm'])
            ->name('order.edit.form');

        Route::post('/orders/{order}/edit', [OrderController::class, 'edit'])
            ->name('order.edit');
    });

    Route::post('/orders/{order}/delete', [OrderController::class, 'delete'])
        ->name('order.delete')
        ->middleware('can:delete,order');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/detailings/create', [DetailingController::class, 'createForm'])
        ->name('detailing.create.form')
        ->middleware('can:create,'.Detailing::class);

    Route::post('/detailings/create', [DetailingController::class, 'create'])
        ->name('detailing.create')
        ->middleware('can:create,'.Detailing::class);

    Route::get('/detailings', [DetailingController::class, 'list'])
        ->name('detailing.list');

    Route::get('/detailings/{detailing}', [DetailingController::class, 'show'])
        ->name('detailing.show')
        ->middleware('can:show,detailing');

    Route::group(['middleware' => 'can:edit,detailing'], function () {
        Route::get('/detailings/{detailing}/edit', [DetailingController::class, 'editForm'])
            ->name('detailing.edit.form');

        Route::post('/detailings/{detailing}/edit', [DetailingController::class, 'edit'])
            ->name('detailing.edit');
    });

    Route::post('/detailings/{detailing}/delete', [DetailingController::class, 'delete'])
        ->name('detailing.delete')
        ->middleware('can:delete,detailing');

    Route::get('/services/create', [ServiceController::class, 'createForm'])
        ->name('service.create.form')
        ->middleware('can:create,'.Service::class);

    Route::post('/services/create', [ServiceController::class, 'create'])
        ->name('service.create')
        ->middleware('can:create,'.Service::class);

    Route::get('/services', [ServiceController::class, 'list'])
        ->name('service.list');

    Route::get('/services/{service}', [ServiceController::class, 'show'])
        ->name('service.show')
        ->middleware('can:show,service');

    Route::group(['middleware' => 'can:edit,service'], function () {
        Route::get('/services/{service}/edit', [ServiceController::class, 'editForm'])
            ->name('service.edit.form');

        Route::post('/services/{service}/edit', [ServiceController::class, 'edit'])
            ->name('service.edit');
    });

    Route::post('/services/{service}/delete', [ServiceController::class, 'delete'])
        ->name('service.delete')
        ->middleware('can:delete,service');

    Route::get('/tires/create', [TireController::class, 'createForm'])
        ->name('tire.create.form')
        ->middleware('can:create,'.Tire::class);

    Route::post('/tires/create', [TireController::class, 'create'])
        ->name('tire.create')
        ->middleware('can:create,'.Tire::class);

    Route::get('/tires', [TireController::class, 'list'])
        ->name('tire.list');

    Route::get('/tires/{tire}', [TireController::class, 'show'])
        ->name('tire.show')
        ->middleware('can:show,tire');

    Route::group(['middleware' => 'can:edit,tire'], function () {
        Route::get('/tires/{tire}/edit', [TireController::class, 'editForm'])
            ->name('tire.edit.form');

        Route::post('/tires/{tire}/edit', [TireController::class, 'edit'])
            ->name('tire.edit');
    });

    Route::post('/tires/{tire}/delete', [TireController::class, 'delete'])
        ->name('tire.delete')
        ->middleware('can:delete,tire');

    Route::get('/cars/create', [CarController::class, 'createForm'])
        ->name('car.create.form')
        ->middleware('can:create,'.Car::class);

    Route::post('/cars/create', [CarController::class, 'create'])
        ->name('car.create')
        ->middleware('can:create,'.Car::class);

    Route::get('/cars', [CarController::class, 'list'])
        ->name('car.list');

    Route::get('/cars/{car}', [CarController::class, 'show'])
        ->name('car.show')
        ->middleware('can:show,car');

    Route::group(['middleware' => 'can:edit,car'], function () {
        Route::get('/cars/{car}/edit', [CarController::class, 'editForm'])
            ->name('car.edit.form');

        Route::post('/cars/{car}/edit', [CarController::class, 'edit'])
            ->name('car.edit');
    });

    Route::post('/cars/{car}/delete', [CarController::class, 'delete'])
        ->name('car.delete')
        ->middleware('can:delete,car');

    Route::get('/statuses/create', [StatusController::class, 'createForm'])
        ->name('status.create.form')
        ->middleware('can:create,'.Status::class);

    Route::post('/statuses/create', [StatusController::class, 'create'])
        ->name('status.create')
        ->middleware('can:create,'.Status::class);

    Route::get('/statuses', [StatusController::class, 'list'])
        ->name('status.list');

    Route::get('/statuses/{status}', [StatusController::class, 'show'])
        ->name('status.show')
        ->middleware('can:show,status');

    Route::group(['middleware' => 'can:edit,status'], function () {
        Route::get('/statuses/{status}/edit', [StatusController::class, 'editForm'])
            ->name('status.edit.form');

        Route::post('/statuses/{status}/edit', [StatusController::class, 'edit'])
            ->name('status.edit');
    });

    Route::post('/statuses/{status}/delete', [StatusController::class, 'delete'])
        ->name('status.delete')
        ->middleware('can:delete,status');

    Route::get('/schedtires/create', [SchedtireController::class, 'createForm'])
        ->name('schedtire.create.form')
        ->middleware('can:create,'.Status::class);

    Route::post('/schedtires/create', [SchedtireController::class, 'create'])
        ->name('schedtire.create')
        ->middleware('can:create,'.Schedtire::class);

    Route::get('/schedtires', [SchedtireController::class, 'list'])
        ->name('schedtire.list');

    Route::get('/schedtires/{schedtire}', [SchedtireController::class, 'show'])
        ->name('schedtire.show')
        ->middleware('can:show,schedtire');

    Route::group(['middleware' => 'can:edit,schedtire'], function () {
        Route::get('/schedtires/{schedtire}/edit', [SchedtireController::class, 'editForm'])
            ->name('schedtire.edit.form');

        Route::post('/schedtires/{schedtire}/edit', [SchedtireController::class, 'edit'])
            ->name('schedtire.edit');
    });

    Route::post('/schedtires/{schedtire}/delete', [SchedtireController::class, 'delete'])
        ->name('schedtire.delete')
        ->middleware('can:delete,schedtire');

    Route::get('/scheddetailings/create', [ScheddetailingController::class, 'createForm'])
        ->name('scheddetailing.create.form')
        ->middleware('can:create,'.Scheddetailing::class);

    Route::post('/scheddetailings/create', [ScheddetailingController::class, 'create'])
        ->name('scheddetailing.create')
        ->middleware('can:create,'.Scheddetailing::class);

    Route::get('/scheddetailings', [ScheddetailingController::class, 'list'])
        ->name('scheddetailing.list');

    Route::get('/scheddetailings/{scheddetailing}', [ScheddetailingController::class, 'show'])
        ->name('scheddetailing.show')
        ->middleware('can:show,scheddetailing');

    Route::group(['middleware' => 'can:edit,scheddetailing'], function () {
        Route::get('/scheddetailings/{scheddetailing}/edit', [ScheddetailingController::class, 'editForm'])
            ->name('scheddetailing.edit.form');

        Route::post('/scheddetailings/{scheddetailing}/edit', [ScheddetailingController::class, 'edit'])
            ->name('scheddetailing.edit');
    });

    Route::post('/scheddetailings/{scheddetailing}/delete', [ScheddetailingController::class, 'delete'])
        ->name('scheddetailing.delete')
        ->middleware('can:delete,scheddetailing');

    Route::get('/schedservices/create', [SchedserviceController::class, 'createForm'])
        ->name('schedservice.create.form')
        ->middleware('can:create,'.Schedservice::class);

    Route::post('/schedservices/create', [SchedserviceController::class, 'create'])
        ->name('schedservice.create')
        ->middleware('can:create,'.Schedservice::class);

    Route::get('/schedservices', [SchedserviceController::class, 'list'])
        ->name('schedservice.list');

    Route::get('/schedservices/{schedservice}', [SchedserviceController::class, 'show'])
        ->name('schedservice.show')
        ->middleware('can:show,schedservice');

    Route::group(['middleware' => 'can:edit,schedservice'], function () {
        Route::get('/schedservices/{schedservice}/edit', [SchedserviceController::class, 'editForm'])
            ->name('schedservice.edit.form');

        Route::post('/schedservices/{schedservice}/edit', [SchedserviceController::class, 'edit'])
            ->name('schedservice.edit');
    });

    Route::post('/schedservices/{schedservice}/delete', [SchedserviceController::class, 'delete'])
        ->name('schedservice.delete')
        ->middleware('can:delete,schedservice');

    Route::get('/items/create', [ItemController::class, 'createForm'])
        ->name('item.create.form')
        ->middleware('can:create,'.Item::class);

    Route::post('/items/create', [ItemController::class, 'create'])
        ->name('item.create')
        ->middleware('can:create,'.Item::class);

    Route::get('/items', [ItemController::class, 'list'])
        ->name('item.list');

    Route::get('/items/{item}', [ItemController::class, 'show'])
        ->name('item.show')
        ->middleware('can:show,item');

    Route::group(['middleware' => 'can:edit,item'], function () {
        Route::get('/items/{item}/edit', [ItemController::class, 'editForm'])
            ->name('item.edit.form');

        Route::post('/items/{item}/edit', [ItemController::class, 'edit'])
            ->name('item.edit');
    });

    Route::post('/items/{item}/delete', [ItemController::class, 'delete'])
        ->name('item.delete')
        ->middleware('can:delete,item');
});

Route::group(['prefix' => '/sign-up'], function () {
    Route::get('', [UserController::class, 'signUpForm'])
        ->name('sign-up.form');

    Route::post('', [UserController::class, 'signUp'])
        ->name('sign-up');
});

Route::get('/verify-email/{id}/{hash}', [UserController::class, 'verifyEmail'])
    ->name('verify.email');

Route::get('/sign-in', [AuthController::class, 'signInForm'])
    ->name('login');

Route::post('/sign-in', [AuthController::class, 'signIn'])
    ->name('sign-in');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/login-history', [LoginHistoryController::class, 'index'])
    ->name('login-history')
    ->middleware('auth');
