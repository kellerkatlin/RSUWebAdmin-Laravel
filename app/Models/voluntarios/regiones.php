<?php

namespace App\Models\voluntarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regiones extends Model
{
    use HasFactory;
    protected $primaryKey = 'idregion';
    protected $fillable = [
        'region'
    ];
    public function provincias()
    {
        return $this->hasMany(provincias::class, 'idregion', 'idregion');
    }
}
