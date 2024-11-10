<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class, 'id_medicamento');
    }
}
