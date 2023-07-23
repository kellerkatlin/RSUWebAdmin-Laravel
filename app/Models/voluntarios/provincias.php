<?php

namespace App\Models\voluntarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provincias extends Model
{

    protected $primaryKey = 'idprovincia';
    protected $fillable = [
        'provincia',
        'idregion'
        
    ];

    public function regiones()
    {
        return $this->belongsTo(regiones::class, 'idregion', 'idregion');
    }

    public function distritos()
    {
        return $this->hasMany(distritos::class, 'idprovincia', 'idprovincia');
    }
}
