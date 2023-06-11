<?php

use App\Http\Controllers\Api\AccountApiController;
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

// Route::middleware('auth:sanctum')->name('api.')->group(function() {
Route::name('api.')->group(function() {
    Route::get('/accounts', [AccountApiController::class, 'index'])->name('accounts.index');
    Route::get('/accounts/{account}', [AccountApiController::class, 'getById'])->name('accounts.get-by-id');
});
