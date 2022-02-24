<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\StateController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\PermissionController;

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

Route::get('/employee/index', [EmployeeController::class, 'index'])->name('employees:index');
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee:store');
Route::post('/employee/update/{employee}', [EmployeeController::class, 'update'])->name('employee:update');
Route::post('/employee/upload-image/{employee}', [EmployeeController::class, 'uploadImage'])->name('employee:upload_image');
Route::get('/employee/show/{employee}', [EmployeeController::class, 'show'])->name('employee:show');
Route::post('/employee/delete/{employee}', [EmployeeController::class, 'delete'])->name('employee:delete');

Route::get('/department/index', [DepartmentController::class, 'index'])->name('department:index');
Route::post('/department/store', [DepartmentController::class, 'store'])->name('department:store');
Route::post('/department/update/{department}', [DepartmentController::class, 'update'])->name('department:update');
Route::post('/department/upload-image/{department}', [DepartmentController::class, 'uploadImage'])->name('department:upload_image');
Route::post('/department/delete/{department}', [DepartmentController::class, 'delete'])->name('department:delete');

Route::get('/countries/index', [CountryController::class, 'index'])->name('countries:index');

Route::get('/states/index/{country}', [StateController::class, 'index'])->name('states:index');

Route::get('/cities/index/{state}', [CityController::class, 'index'])->name('cities:index');

Route::get('/permissions/index', [PermissionController::class, 'index'])->name('permissions:index');

Route::get('/roles/index', [RoleController::class, 'index'])->name('roles:index');
Route::post('/role/create', [RoleController::class, 'create'])->name('role:create');
Route::post('/role/delete/{role}', [RoleController::class, 'delete'])->name('role:delete');

// run php artisan laravel-route-to-vue:generate to generate route for vue
