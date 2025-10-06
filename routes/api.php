<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\CommentConrtoller;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Feed\FeedController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function(){
    return response()->json([
        "message"=> "Test Works"
    ], 200);
});

Route::post("register", AuthenticationController::class. "@register");
Route::get("showUser", AuthenticationController::class."@showUser")->middleware("auth:sanctum");
Route::get("showUser", AuthenticationController::class."@showUser")->middleware("auth:sanctum");
Route::get("showCurrentUser", AuthenticationController::class."@showCurrentUser")->middleware("auth:sanctum");
Route::post("login", AuthenticationController::class."@Login");
Route::get("likeCounts/{feed_id}", FeedController::class."@showLikeNumbers")->middleware("auth:sanctum");
Route::post("reset_password", AuthenticationController::class."@resetPassword");
Route::post("updateProfileImage", ProfileController::class."@update")->middleware("auth:sanctum");

Route::middleware('auth:sanctum')->group(function () {
    
    Route::post('feeds/{feed_id}/comments', [CommentController::class, 'comment']);
    Route::get('feeds/{feed_id}/comments', [CommentController::class, 'getComments']);
    Route::get('comments/{comment}/replies', [CommentController::class, 'replies']);
    
    Route::post('/comments/{comment}/toggle-like', [CommentController::class, 'toggleLike']);
    Route::get('/comments/{comment}/likers', [CommentController::class, 'getLikers']);
    
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/feeds', [FeedController::class, 'index']);
    Route::post('/feeds', [FeedController::class, 'store']);
    
    Route::post('/feeds/{feed}/toggle-like', [FeedController::class, 'toggleLike']);
    Route::get('/feeds/{feed}/likers', [FeedController::class, 'getLikers']);
    
    Route::post('/feeds/{feed}/comments', [FeedController::class, 'comment']); 
    Route::get('/feeds/{feed}/comments', [FeedController::class, 'getComments']);

    Route::delete('feeds/{id}/delete', [FeedController::class,'destroy']);
});




