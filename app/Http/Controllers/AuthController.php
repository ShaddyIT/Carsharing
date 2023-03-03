<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(UserRequest $request){
        $fields = $request->validated();
        $user = User::create([
            'surname'=>$request['surname'],
            'name'=>$request['name'],
            'patronymic'=>$request['patronymic'],
            'email'=>$request['email'],
            'password' =>bcrypt($request['password']),
            'user_status_id' =>$request['user_status_id']
        ]);
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email'=>'required|email:rfc|max:255|',
            'password' => 'required|alpha_num'
        ]);
        $user = User::where('email', $fields['email'])->first();

        if(!$user or !Hash::check($fields['password'], $user->password)){
            return response(['message'=>'wrong password or login'],401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
       
        return response($response, 201);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return ['message'=>'Logged out'];
    }

}
