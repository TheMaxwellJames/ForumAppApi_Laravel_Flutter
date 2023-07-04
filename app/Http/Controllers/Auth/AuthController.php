<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
      $request->validate([
        'name' => 'required|min:3',
        'username' => 'required|string|min:4|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
      ]);

          $userData = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
          ];

          $user = User::create($userData);
          $token = $user->createToken('forumapp')->plainTextToken;

          return response([
            'user' => $user,
            'token' => $token
          ],201);

    }
}
