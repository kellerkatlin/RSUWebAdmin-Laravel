<?php

namespace App\Models\Proyectos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $table = 'proyectos';
    protected $fillable = [
        'titulo',
        'programa',
        'lugar_ejecucion',
        'beneficiario',
        'inicio',
        'termino',
        'estado',
    ];
    public function fases()
    {
        return $this->hasMany(fases::class);
    }
    public function responsables()
    {
        return $this->belongsToMany(Responsable::class, 'proyecto_responsable', 'proyecto_id', 'responsable_id');
    }
    public function informeAvances()
    {
        return $this->hasMany(informeAvances::class);
    }
    public function informeFinal()
    {
        return $this->hasMany(informeFinal::class);
    }
<<<<<<< HEAD
=======
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }

>>>>>>> e123c47941542cfaf7f146ce279b06f02f91200f
}
