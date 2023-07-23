<?php

namespace App\Models\voluntarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class voluntarios extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'idvoluntario';

    protected $fillable = [
        'idtipodoc',
        'numero_documento',
        'pais_nacimiento',
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'fecha_nacimiento',
        'sexo',
        'edad',
        'correo_electronico',
        'grado_instruccion',
        'profesion',
        'ocupacion',
        'como_se_entero',
        'iddistrito',
        'direccion',
        'iddiscapacidad',
        'discapacidad',
        'idseguro',
        'seguro',
        'idtipo_telefono',
        'numero_contacto',
        'horario_flexible',
        'desea_informacion',
        'reciv_correos',
        'auto_datosper',
        'declaracion',
        'idtema',
    ];

    public function diasDisponibles()
    {
        return $this->belongsToMany(dias::class, 'voluntarios_dias', 'idvoluntario', 'iddia');
    }
    public function gruposDesea()
    {
        return $this->belongsToMany(grupos_partis::class, 'grupos', 'idvoluntario', 'idgrupo');
    }
    public function tipoDocumento()
    {
        return $this->belongsTo(tiposdocumentoidentidades::class, 'idtipodoc');
    }
    public function distritos()
    {
        return $this->belongsTo(distritos::class, 'iddistrito');
    }
}
