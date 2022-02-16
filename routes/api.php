<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\EmployeeController;

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
Route::post('/employee/edit/{employee}', [EmployeeController::class, 'edit']);
Route::get('/employee/show/{employee}', [EmployeeController::class, 'show']);

Route::get('/countries/index', [CountryController::class, 'index']);
