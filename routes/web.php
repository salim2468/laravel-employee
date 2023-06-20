<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




//grouping route in one middleware
Route::middleware('auth')->group(function (){

    Route::get('/employee',[EmployeeController::class,'index'])->name('employee.index');
    Route::get('/employee/create',[EmployeeController::class,'create'])->name('employee.create');
    Route::post('/employee',[EmployeeController::class,'store'])->name('employee.store');
    Route::get('/employee/{employee_id}',[EmployeeController::class,'show'])->name('employee.show');
    Route::get('/employee/{employee_id}/edit',[EmployeeController::class,'edit'])->name('employee.edit');
    Route::put('/employee/{employee_id}/edit',[EmployeeController::class,'update'])->name('employee.update');
    Route::delete('/employee/{employee_id}',[EmployeeController::class,'destroy'])->name('employee.destroy');

    Route::get('/image/{employee_id}',[EmployeeController::class,'image'])->name('employee.image');
    Route::post('/image/{employee_id}',[EmployeeController::class,'upload'])->name('employee.upload');



});


// Route middleware
//Route::get('/employee',[EmployeeController::class,'index'])->middleware('auth')->name('employee.index');




