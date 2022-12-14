<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RentBookController;

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

// member
Route::middleware('auth:sanctum')->post('/member/store', [MemberController::class, 'store']);
Route::middleware('auth:sanctum')->post('/member/storearray', [MemberController::class, 'storearray']);
Route::middleware('auth:sanctum')->get('/member/getmember', [MemberController::class, 'getmember']);
Route::middleware('auth:sanctum')->get('/member/getmemberbyid/{id}', [MemberController::class, 'getmemberbyid']);
Route::middleware('auth:sanctum')->post('/member/updatemember/{id}', [MemberController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/member/deletebyid/{id}', [MemberController::class, 'destroy']);

// rent book
Route::middleware('auth:sanctum')->post('/rent_book/store', [RentBookController::class, 'store']);
Route::middleware('auth:sanctum')->get('/rent_book/getall', [RentBookController::class, 'getall']);

Route::post('/login', [LoginController::class, 'index']);
Route::get('/logout', [LoginController::class, 'logout']);
