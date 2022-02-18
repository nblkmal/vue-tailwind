<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\StateController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\DepartmentController;

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

Route::get('/employee/index', [EmployeeController::class, 'index']);
Route::post('/employee/store', [EmployeeController::class, 'store']);
Route::post('/employee/update/{employee}', [EmployeeController::class, 'update']);
Route::get('/employee/show/{employee}', [EmployeeController::class, 'show']);
Route::post('/employee/delete/{employee}', [EmployeeController::class, 'delete']);

Route::get('/countries/index', [CountryController::class, 'index']);
Route::get('/states/index/{country}', [StateController::class, 'index']);
Route::get('/cities/index/{state}', [CityController::class, 'index']);
Route::get('/departments/index', [DepartmentController::class, 'index']);
