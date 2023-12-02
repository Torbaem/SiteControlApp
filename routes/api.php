<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensordataController;
use App\Http\Controllers\FingerinoutController;

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

Route::post('/receive-sensor-data', [SensordataController::class, 'receiveSensorData']);
Route::get('/api/get-latest-temperature', [SensordataController::class, 'getLatestTemperature']);

Route::post('/receive-fingerinout-data', [FingerinoutController::class, 'receiveFingerinoutData']);

