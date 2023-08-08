<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use DB;
Use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function Login(Request $request){
        try{
            if(Auth::attempt($request->only('email','password'))){
                $user = Auth::user();
                $token = user->createToken('app')->accessToken;

                return response([
                    'messege' => 'Successfully Login',
                    'token' => $token,
                    'user' => $user
                ],200);//states codes
            }
        }catch(Exception $e){
            return response([
                'message' => $exception->getMessage()
            ],400);//states codes
        }
        return response([
            'messege' => 'Invalid Email or Password'
        ],401);

    }//End Method

    public function Register(RegisterRequest $request){
        try{
            $user = User::create([
                'name' =>$request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $token = $user->$createToken('app')->accessToken;
            return response([
                'messege' => 'Registration Login',
                'token' => $token,
                'user' => $user
            ],200);//states codes

        }catch(Exception $e){
            return response([
                'message' => $exception->getMessage()
            ],400);//states codes
        }
    }
}
