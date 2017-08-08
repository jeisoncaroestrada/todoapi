<?php

namespace App\Http\Controllers;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginForm;

class ApiAuthController extends Controller
{
    //Autenticacion de usuario en la Api con JWT
    public function AppAuth(Request $request){

   		$credentials = $request->only('email','password');
   		$token = null;

   		try{
   			if (!$token = JWTAuth::attempt($credentials)) {
   				return response()->json(['error'=>'invalid_credentials'],401);
   			}
   		}catch(JWTExeption $ex){
   			return response()->json(['error'=>'somthing_went_wrong'],500);
   		}

   		return response()->json(compact('token'));
   }
}
