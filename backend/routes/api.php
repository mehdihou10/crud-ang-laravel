<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;

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


//get all employees
Route::get('employees',[EmployeesController::class,'getEmployees']);


//get employee by id
Route::get('employees/{id}',[EmployeesController::class,'getEmployeeById']);


//add new Employee
Route::post('employees',[EmployeesController::class,'addEmployee']);


//update employee
Route::put('employees/{id}',[EmployeesController::class,'updateEmployee']);

//delete employee
Route::delete('employees/{id}',[EmployeesController::class,'deleteEmployee']);