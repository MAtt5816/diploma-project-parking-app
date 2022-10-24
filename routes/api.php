<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BalanceCotroller;
use App\Http\Controllers\ControllerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\StopController;
use App\Http\Controllers\VehicleController;

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

Route::apiResources([
    'drivers' => DriverController::class,
    'balances' => BalanceCotroller::class,
    'vehicles' => VehicleController::class,
    'operators' => OperatorController::class,
    'controllers' => ControllerController::class,
    'parkings' => ParkingController::class,
    'reservations' => ReservationController::class,
    'stops' => StopController::class,
]);
