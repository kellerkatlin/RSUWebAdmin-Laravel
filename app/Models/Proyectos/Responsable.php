<?php

namespace App\Models\Proyectos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;
    protected $table = 'responsables';
    protected $fillable = [
        'dni',
        'nombre',
        'responsabilidades',
        'programa',
        'facultad',
        'correo',
        'telefono',
        'firma',
    ];
    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class, 'proyecto_responsable', 'responsable_id', 'proyecto_id');
    }
    
}
