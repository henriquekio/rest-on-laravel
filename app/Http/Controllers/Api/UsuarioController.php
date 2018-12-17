<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UsuarioCreateRequest;
use App\Repositories\UsuarioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class UsuarioController extends Controller
{
    /** @var UsuarioRepository */
    protected $repository;

    /**
     * UsuarioController constructor.
     * @param UsuarioRepository $repository
     */
    public function __construct(UsuarioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(UsuarioCreateRequest $request)
    {
        try {
            $user = $this->repository->create($request->all());

            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = $this->repository->update($request->all(), $id);

            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()]);
        }

    }

    public function show()
    {
        try {
            $user = \JWTAuth::parseToken()->toUser();

            return response()->json(compact('user'));
        } catch (JWTException $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
