<?php

use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
  return view('welcome');
});

// 1.Employee Index Route
// Route::get('/employees', [EmployeesController::class, 'index']) -> name('employee.index');

// 2.Create Employee Route
// Route::get('/employees/create', [EmployeesController::class, 'create']) -> name('employee.create');

// 3.Store Employee Details Route
// Route::post('/employees/store', [EmployeesController::class, 'store']) -> name('employee.store');

// 4.Show Employee Details Route
// Route::get('/employees/{employee}', [EmployeesController::class, 'show']) -> name('employee.show');

// 5.Edit Employee Details Route
// Route::get('/employees/{employee}/edit', [EmployeesController::class, 'edit']) -> name('employee.edit');

// 6.Update Employee Details Route
// Route::put('/employees/{employee}', [EmployeesController::class, 'update']) -> name('employee.update');

// 7.Delete Employee Details Route
// Route::delete('/employees/{employee}', [EmployeesController::class, 'destroy']) -> name('employee.destroy');

// Resource Route
Route::resource('employee', EmployeesController::class); // it will deside which method is called and automatically it create correct route