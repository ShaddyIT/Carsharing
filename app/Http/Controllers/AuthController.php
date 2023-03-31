<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(RegistrationRequest $request){
        $fields = $request->validated();
        $user = User::create([
            'email'=>$fields['email'],
            'password' =>bcrypt($fields['password'])
        ]);
        $token = $user->createToken('myapptoken')->plainTextToken;
        return response()->Json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function login(RegistrationRequest $request){
        $fields = $request->validated();
        $user = User::where('email', $fields['email'])->first();

        if(!$user or !Hash::check($fields['password'], $user->password)){
            return response(['message'=>'wrong password or login'],401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
       $bearer = 'Bearer ' . $token;
        return response($response, 201)->cookie('Authorization', $bearer);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return ['message'=>'Logged out'];
    }

}
