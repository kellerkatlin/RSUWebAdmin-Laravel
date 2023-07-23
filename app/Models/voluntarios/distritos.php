<?php

namespace App\Models\voluntarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class distritos extends Model
{
    use HasFactory;

    protected $primaryKey = 'iddistrito';
    protected $fillable = [
        'distrito',
        'idprovincia'

    ];

    public function provincias()
    {
        return $this->belongsTo(provincias::class, 'idprovincia', 'idprovincia');
    }
}
