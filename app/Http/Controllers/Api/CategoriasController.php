<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
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

    public function index()
    {
        $categorias = $this->repository->all();

        return response()->json($categorias);
    }

    public function show($id)
    {
        $categoria = $this->repository->find($id);

        return response()->json($categoria);
    }

    public function store(Request $request)
    {
        $categoria = $this->repository->create($request->all());

        return response()->json($categoria);
    }

    public function update(Request $request, $id)
    {
        $categoria = $this->repository->update($request->all(), $id);

        return response()->json($categoria);
    }

    public function destroy($id)
    {

        $categoria = $this->repository->delete($id);

        return response()->json($categoria);
    }
}
