<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Feed\FeedController;
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
Route::get("showUser", AuthenticationController::class."@showUser");
Route::post("login", AuthenticationController::class."@Login");
Route::post("store", FeedController::class."@store")->middleware("auth:sanctum");
Route::post("like/{feed_id}", FeedController::class."@likePost")->middleware("auth:sanctum");
Route::get("index", FeedController::class."@index")->middleware("auth:sanctum");
Route::post("comment/{feed_id}", FeedController::class."@comment")->middleware("auth:sanctum");
Route::get("comments/{feed_id}", FeedController::class."@getComments")->middleware("auth:sanctum");

