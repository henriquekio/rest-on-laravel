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
        return $this->repository->all();
    }
    public function show($id)
    {
        return $this->repository->find($id);
    }

    public function store(Request $request)
    {
       return $this->repository->create($request->all());
    }

    public function update(Request $request, $id)
    {

        return $this->repository->update($request->all(), $id);
    }
    public function destroy($id)
    {

        return $this->repository->delete($id);
    }
}
