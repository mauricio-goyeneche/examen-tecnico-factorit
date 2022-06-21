<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asignatura;

class Alumno extends Model
{
    use HasFactory;

    protected $table = "alumnos";
    protected $fillable = ["nombre", "apellido"];

    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::class, "alumnos_x_asignatura")
            ->withTimestamps();
    }
}
