<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Tarefa.
 *
 * @package namespace App\Models;
 */
class Tarefa extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['descricao', 'data_conclusao', 'categoria_id', 'user_id'];

    public function tarefa()
    {

        return $this->belongsTo(Categoria::class);
    }
}
