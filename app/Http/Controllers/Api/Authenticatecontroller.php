<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;


class Authenticatecontroller extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'email');
        try{
        if(!$token = JWTAuth::attempt($credentials)){
            return response()->json(['error' => 'Email ou login inválidos'], Response::HTTP_UNAUTHORIZED);
        }

        }catch (JWTException $e){
            return response()->json(['error' => 'Não foi possível criar o token de acesso'], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json(compact($token));
    }

    public function logout()
    {
        Auth::guard('api')->$this->logout();

        return response()->json([], 204);
    }
}
