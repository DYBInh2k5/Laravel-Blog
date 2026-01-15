<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API routes cho Post
Route::prefix('posts')->group(function () {
    Route::get('/', [PostApiController::class, 'index']);
    Route::post('/', [PostApiController::class, 'store']);
    Route::get('/published', [PostApiController::class, 'published']);
    Route::get('/{post}', [PostApiController::class, 'show']);
    Route::put('/{post}', [PostApiController::class, 'update']);
    Route::delete('/{post}', [PostApiController::class, 'destroy']);
});
