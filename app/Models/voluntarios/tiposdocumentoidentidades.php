<?php

namespace App\Models\voluntarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiposdocumentoidentidades extends Model
{
    use HasFactory;
    protected $primaryKey = 'idtipodoc';
    protected $fillable = [
        'nombre_tipodoc',
    ];
    
}
	