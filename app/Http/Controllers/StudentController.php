<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
class StudentController extends Controller
{
  function Apiindex() {
    $students=Students::create([
        'name'=>'aseel zafer',
        'major'=>'computer science',
        'age'=>20,
        'isGraduate'=>false
    ]);
    $students=Students::all();
    return response()->json([
        'status'=>'success',
        'message'=>"Data retrieved successfully",
        'data'=>$students
    ]);
  }
  function index() {
     $students=Students::create([
        'name'=>'aseel zafer',
        'major'=>'computer science',
        'age'=>20,
        'isGraduate'=>false
    ]);
    $students=Students::all();
    return view('students', ['students'=>$students]);
  }
}
