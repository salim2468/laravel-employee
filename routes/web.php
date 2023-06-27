<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

Route::get('/dashboard', function (Request $request) {
    $searchText = $request['search'] ?? "";
    if ($searchText != "") {
        $employees = Employee::where('firstName','LIKE',"%$searchText%")->orWhere('lastName','LIKE',"%$searchText%")->orWhere('address','LIKE',"%$searchText%")->orWhere('designation','LIKE',"%$searchText%")->paginate(5);
    }else{
        $employees = Employee::paginate(5);

    }
    $data = compact('employees','searchText');

    return view('dashboard',$data);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



//Route::get('/test',function(){
//    p('hello');
//});

//grouping route in one middleware
Route::middleware(['auth:web'])->group(function (){

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




