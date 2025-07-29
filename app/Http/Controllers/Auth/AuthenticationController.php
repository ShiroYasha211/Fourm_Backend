<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Doctrine\Common\Lexer\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
public function register(Request $request)
{
    $validatedData = $request->validate([
        "name" =>"required|string|min:3",
           "username" => "required|string|min:4|unique:users",
           "email"=> "required|email|unique:users",
           "password"=> "required|min:6",
           ]);
     $user = User::create($validatedData);
     $token = $user->createToken('forumApp')->plainTextToken;
     return response([
        'message'=> 'user Has been Created Successfully',
        'user' => $user,
        'token'=> $token,
     ], 201);
}
public function showUser(User $user)
{
    return response([
        'user'=> $user->all(),
        ],200);
}
public function Login(LoginRequest $request)
{
    $request->validated();
    $user = User::whereEmail($request->email)->first();
   if (!$user) {
    return response([
        'message'=> 'Email is Not Registered',
],status: 401);
}
if (!Hash::check($request->password, $user->password)) {
    return response([
        'message'=> 'Password is wrong',
        ],401);
    }
    $token = $user->createToken('forumApp')->plainTextToken;
    return response([
        "message" => "Welcome Back Mr.$user->name",
        'user' => $user,
        'token'=> $token,

        ], 200);

}
}
