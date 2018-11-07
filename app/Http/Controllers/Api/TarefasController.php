<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\TarefaRepository;
use Illuminate\Http\Request;


/**
 * Class TarefasController.
 *
 * @package namespace App\Http\Controllers\Api;
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
        $tarefas =  $this->repository->all();

        return response()->json($tarefas);
    }

    public function show($id)
    {
        $tarefa =  $this->repository->find($id);

        return response()->json($tarefa);
    }

    public function store(Request $request)
    {
        $tarefa =  $this->repository->create($request->all());

        return response()->json($tarefa);
    }

    public function update(Request $request, $id)
    {
        $tarefa =  $this->repository->update($request->all(), $id);

        return response()->json($tarefa);
    }

    public function destroy($id)
    {
        $tarefa =  $this->repository->delete($id);

        return response()->json($tarefa);
    }

}
