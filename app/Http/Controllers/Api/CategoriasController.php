<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaCreateRequest;
use App\Repositories\CategoriaRepository;
use Illuminate\Http\Request;

/**
 * Class CategoriasController.
 *
 * @package namespace App\Http\Controllers\Api;
 */
class CategoriasController extends Controller
{
    /** @var CategoriaRepository */
    protected $repository;

    /**
     * CategoriasController constructor.
     * @param CategoriaRepository $repository
     */
    public function __construct(CategoriaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $categorias = $this->repository->all();

        return response()->json($categorias);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $categoria = $this->repository->find($id);

        return response()->json($categoria);
    }

    /**
     * @param CategoriaCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CategoriaCreateRequest $request)
    {
        $categoria = $this->repository->create($request->all());

        return response()->json($categoria);
    }

    /**
     * @param CategoriaCreateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CategoriaCreateRequest $request, $id)
    {
        $categoria = $this->repository->update($request->all(), $id);

        return response()->json($categoria);
    }
}
