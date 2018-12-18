<?php

namespace App\Repositories;

use App\Criteria\BuscaPorUsuarioCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TarefaRepository;
use App\Models\Tarefa;

/**
 * Class TarefaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TarefaRepositoryEloquent extends BaseRepository implements TarefaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tarefa::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
        $this->pushCriteria(BuscaPorUsuarioCriteria::class);
    }

}
