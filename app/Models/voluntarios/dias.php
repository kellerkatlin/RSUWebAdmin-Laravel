<?php

namespace App\Models\voluntarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dias extends Model
{
    use HasFactory;
    protected $primaryKey = 'iddia';
    protected $fillable = [
        'nombre_dia',
    ];

    public function voluntarios()
    {
        return $this->belongsToMany(voluntarios::class, 'voluntarios_dias', 'iddia', 'idvoluntario');
    }
}
