<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Feed\FeedController;

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

// Route::middleware('auth:sanctum')->get('/feed/store', function (Request $request) {
//     return $request->user();
// });

Route::post('/feed/store', [FeedController::class, 'store'])->middleware('auth:sanctum');

Route::post('/feed/like/{feed_id}/', [FeedController::class, 'likePost'])->middleware('auth:sanctum');

// Route::get('/test', function () {
//     return response([
//         'message' => "Api is working"
//     ],200);
// });

Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);


