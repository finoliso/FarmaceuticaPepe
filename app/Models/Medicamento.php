<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Receta;

class Medicamento extends Model
{
    use HasFactory;
    public function recetas(){
        return $this->hasMany(Receta::class);
    }
}
