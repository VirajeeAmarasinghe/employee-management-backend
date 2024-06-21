<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\TitleController;

Route::resource('employees', EmployeeController::class);
Route::resource('employees.salaries', SalaryController::class)->shallow();
Route::resource('employees.titles', TitleController::class)->shallow();