<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UsuarioRepository;
use App\Models\Usuario;
use App\Validators\UsuarioValidator;

/**
 * Class UsuarioRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UsuarioRepositoryEloquent extends BaseRepository implements UsuarioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Usuario::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
