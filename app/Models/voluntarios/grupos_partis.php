<?php

namespace App\Models\voluntarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupos_partis extends Model
{
    use HasFactory;
    protected $primaryKey = 'idgrupo';
    protected $fillable = [
        'nombre_grupo',
    ];

    public function voluntarios()
    {
        return $this->belongsToMany(voluntarios::class, 'grupos', 'idgrupo', 'idvoluntario');
    }
}
