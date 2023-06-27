<?php

use App\Http\Controllers\Api\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// in browser baseurl(localhost)/api/test
// output is hello on web browser
Route::get('/test',function(){
    p('hello');
});


Route::post('employee/store',[EmployeeController::class ,'store']);
Route::get('employee',[EmployeeController::class,'index']);
Route::get('employee/{id}',[EmployeeController::class,'show']);
Route::delete('employee/{id}',[EmployeeController::class,'destroy']);
Route::put('employee/{id}',[EmployeeController::class,'update']);
Route::patch('employee/{id}',[EmployeeController::class,'edit']);
