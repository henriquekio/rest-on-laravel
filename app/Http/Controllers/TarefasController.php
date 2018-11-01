<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Repositories\TarefaRepository;


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


        return Tarefa::all();
    }

}
