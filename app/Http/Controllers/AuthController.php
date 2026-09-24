<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $validate=$request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:6',

        ]);
        $user=User::create([
            'name'=>$validate['name'],
            'email'=>$validate['email'],
            'password'=>($validate['password'])



        ]);
        $token=$user->createToken('access_token')->plainTextToken;
        return response()->json([
            'status'=>'success',
            'message'=>'User created successfully',
            'data'=>$user,
            'token'=>$token,
        ],201);
    }
    public function login(Request $request){
        $credentiuals=$request->validate([
            'email'=>'required|email',
            'password'=>'required|string|min:6',
        ]);
        if(!Auth::attempt($credentiuals)){
            
            return response()->json([
                'status'=>'error',
                'message'=>'Invalid credentials',
            ],401);
        }
        $user=Auth::user();
        $token=$user->createToken('access_token')->plainTextToken;

        return response()->json([
            'status'=>'success',
            'message'=>'User logged in successfully',
            'data'=>$user,
            'token'=>$token,
        ],200);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status'=>'success',
            'message'=>'User logged out successfully',
        ],200);
    }
}
