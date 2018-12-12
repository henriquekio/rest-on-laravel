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
    protected $fillable = ['descricao', 'data_conclusao', 'finalizado','categoria_id', 'user_id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function tarefa()
    {

        return $this->belongsTo(Categoria::class);
    }

    public function getFinalizadoAttribute()
    {
        return $this->attributes['finalizado'] === '1';
    }
}
