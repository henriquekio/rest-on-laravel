<?php

namespace App\Criteria;

use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class BuscaPorUsuarioCriteria.
 *
 * @package namespace App\Criteria;
 */
class BuscaPorUsuarioCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $user = Auth::user()->id;
        $model = $model->where('usuario_id', $user);

        return $model;
    }
}
