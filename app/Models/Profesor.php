<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asignatura;

class Profesor extends Model
{
    use HasFactory;

    protected $table = "profesores";
    protected $fillable = ["nombre", "apellido"];


    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class);
    }
}
