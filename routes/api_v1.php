<?php

use App\Http\Controllers\API\V1\BalanceUpController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\UserController;
use App\Http\Controllers\API\V1\EventController;
use App\Http\Controllers\API\V1\CarBrandContoller;
use App\Http\Controllers\API\V1\CarEventController;
use App\Http\Controllers\API\V1\CarModelController;
use App\Http\Controllers\API\V1\CarStatusController;
use App\Http\Controllers\API\V1\FleetOfCarController;
use App\Http\Controllers\API\V1\UserRentController;
use App\Http\Controllers\API\V1\UserStatusController;
use App\Http\Controllers\AuthController;

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


// Public api
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Sanctum api
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::apiResources([
        'users' => UserController::class,
        'events' => EventController::class,
        'car_brands' => CarBrandContoller::class,
        'user_statuses' => UserStatusController::class,
        'car_statuses' => CarStatusController::class,
        'balance_ups' => BalanceUpController::class,
        'car_models' => CarModelController::class,
        'car_events' => CarEventController::class,
        'user_rents' => UserRentController::class,
        'fleet_of_cars' => FleetOfCarController::class
    ]);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Route::apiResources([
//     'users' => UserController::class,
//     'events' => EventController::class,
//     'car_brands' => CarBrandContoller::class,
//     'user_statuses' => UserStatusController::class,
//     'car_statuses' => CarStatusController::class,
//     'balance_ups' => BalanceUpController::class,
//     'car_models' => CarModelController::class,
//     'car_events' => CarEventController::class,
//     'user_rents' => UserRentController::class,
//     'fleet_of_cars' => FleetOfCarController::class
// ]);
