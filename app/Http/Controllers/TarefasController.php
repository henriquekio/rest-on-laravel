<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Repositories\TarefaRepository;
use Illuminate\Http\Request;


/**
 * Class TarefasController.
 *
 * @package namespace App\Http\Controllers;
 */
class TarefasController extends Controller
{
    /**
     * @var TarefaRepository
     */
    protected $repository;

    /**
     * TarefasController constructor.
     * @param TarefaRepository $repository
     */
    public function __construct(TarefaRepository $repository)
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
