<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthenticateController extends Controller
{

    use AuthenticatesUsers;


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $this->credentials($request);

        try {
            $token = auth()->attempt($credentials);

            if (!$token) {
                return response()->json(['error' => 'Email ou login inválidos'], Response::HTTP_UNAUTHORIZED);
            }

        } catch (JWTException $e) {
            return response()->json(['error' => 'Não foi possível criar o token de acesso'], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json(['token' => $token]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json([], 204);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $token = Auth::guard('api')->refresh();

        return response()->json(['token' => $token]);
    }
}
