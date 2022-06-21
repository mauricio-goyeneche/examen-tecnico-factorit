<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profesor;
use App\Models\Alumno;

class Asignatura extends Model
{
    use HasFactory;

    protected $table = "asignaturas";
    protected $fillable = ["descripcion"];


    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, "alumnos_x_asignatura")
            ->withTimestamps();
    }
}
