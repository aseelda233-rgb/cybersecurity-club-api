<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('students', [StudentController::class, 'index']);