<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommitteeController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/students', [StudentController::class, 'Apiindex']);
Route::apiResource('posts', PostController::class);
Route::apiResource('categories', CategoryController::class);

Route::get('products', [ProductController::class, 'index']);
Route::post('products', [ProductController::class, 'store']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::put('products/{id}', [ProductController::class, 'update']);
Route::delete('products/{id}', [ProductController::class, 'destroy']);
Route::apiResource('orders', OrderController::class);

Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
});

Route::get('members',[MemberController::class,'index']);
Route::get('members/{id}',[MemberController::class,'show']);
Route::post('members',[MemberController::class,'store']);
Route::put('members/{id}',[MemberController::class,'update']);
Route::delete('members/{id}',[MemberController::class,'destroy']);

Route::get('events',[EventController::class,'index']);
Route::get('events/{id}',[EventController::class,'show']);
Route::post('events',[EventController::class,'store']);
Route::put('events/{id}',[EventController::class,'update']);
Route::delete('events/{id}',[EventController::class,'destroy']);

Route::post('events/{eventId}/members/{memberId}', [EventController::class, 'addMember']);
Route::delete('events/{eventId}/members/{memberId}', [EventController::class, 'removeMember']);
Route::put('events/{eventId}/members/{memberId}/attendance', [EventController::class, 'updateMember']);

Route::get('tasks',[TaskController::class,'index']);
Route::get('tasks/{id}',[TaskController::class,'show']);
Route::post('tasks',[TaskController::class,'store']);
Route::put('tasks/{id}',[TaskController::class,'update']);
Route::delete('tasks/{id}',[TaskController::class,'destroy']);

Route::get('committees',[CommitteeController::class,'index']);
Route::get('committees/{id}',[CommitteeController::class,'show']);
Route::post('committees',[CommitteeController::class,'store']);
Route::put('committees/{id}',[CommitteeController::class,'update']);
Route::delete('committees/{id}',[CommitteeController::class,'destroy']);
