<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;


class Authenticatecontroller extends Controller
{

    use AuthenticatesUsers;



    public function login(Request $request)
    {
        $credentials = $this->credentials($request);

        try {
            if (!$token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Email ou login inválidos'], Response::HTTP_UNAUTHORIZED);
            }

        } catch (JWTException $e) {
            return response()->json(['error' => 'Não foi possível criar o token de acesso'], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json(['token' => $token]);
    }

    public function logout()
    {
        Auth::guard('api')->$this->logout();

        return response()->json([], 204);
    }
}
