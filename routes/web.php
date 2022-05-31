<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\MessageController::class,'index']);  //首頁用來顯示所有的資料
Route::get('/message', [\App\Http\Controllers\MessageController::class,'show']);  //顯示新增留言的表單
Route::post('/message', [\App\Http\Controllers\MessageController::class,'store']);  //儲存新留言進資料表
Route::get('/message/{id}', [\App\Http\Controllers\MessageController::class,'edit']);  //顯示編輯指定留言的表單
Route::patch('/message/{id}', [\App\Http\Controllers\MessageController::class,'update']);  //更新編輯過的留言進資料表
Route::delete('/message/{id}', [\App\Http\Controllers\MessageController::class,'destroy']);  //刪除指定的留言
