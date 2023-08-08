<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use DB;
Use Illuminate\Support\Facades\Hash;

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
                ],200);
            }
        }catch(Exception $e){
            return response([
                'message' => $exception->getMessage()
            ],400);
        }

    }//End Method
}
