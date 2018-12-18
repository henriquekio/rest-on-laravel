<?php

namespace App\Observers;

use App\Models\Tarefa;

class TarefaObserver
{
    /**
     * Handle the tarefa "created" event.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return void
     */
    public function created(Tarefa $tarefa)
    {

    }


    /**
     * @param Tarefa $tarefa
     * @return void
     */
    public function creating(Tarefa $tarefa)
    {
        $user = auth()->user()->id;
        $tarefa->setAttribute('usuario_id', $user);
    }

    /**
     * Handle the tarefa "updated" event.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return void
     */
    public function updated(Tarefa $tarefa)
    {
        //
    }

    /**
     * Handle the tarefa "deleted" event.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return void
     */
    public function deleted(Tarefa $tarefa)
    {
        //
    }

    /**
     * Handle the tarefa "restored" event.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return void
     */
    public function restored(Tarefa $tarefa)
    {
        //
    }

    /**
     * Handle the tarefa "force deleted" event.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return void
     */
    public function forceDeleted(Tarefa $tarefa)
    {
        //
    }
}
