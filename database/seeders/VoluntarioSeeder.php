<?php

namespace Database\Seeders;

use App\Models\voluntarios\distritos;
use App\Models\voluntarios\voluntarios;
use Illuminate\Database\Seeder;

class VoluntarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $distrito = distritos::where('distrito', 'Yuracyacu')->first();

        if (!$distrito) {
            // Si el distrito no existe, lanza una excepción o muestra un mensaje de error.
            throw new \Exception('El distrito "distrito" no existe en la tabla "distritos".');
        }

        $idvoluntario = voluntarios::max('idvoluntario') + 1;

        $voluntario = new voluntarios;
        $voluntario->idvoluntario = $idvoluntario;
        $voluntario->idtipodoc = 2; // Reemplaza este valor con el ID correcto para el tipo de documento
        $voluntario->numero_documento = 72876686;
        $voluntario->pais_nacimiento = 'Perú';
        $voluntario->apellido_paterno = 'Pinedo';
        $voluntario->apellido_materno = 'Pinedo Tocas';
        $voluntario->nombres = 'NombreDelVoluntario';
        $voluntario->fecha_nacimiento = '2023-07-30';
        $voluntario->sexo = 'Masculino';
        $voluntario->edad = 22;
        $voluntario->idseguro = 1; // Reemplaza este valor con el ID correcto para el seguro
        $voluntario->seguro = 'SI';
        $voluntario->iddiscapacidad = 1; // Reemplaza este valor con el ID correcto para el tipo de discapacidad
        $voluntario->discapacidad = 'SI';
        $voluntario->iddistrito = $distrito; // Reemplaza este valor con el ID correcto para el distrito
        $voluntario->direccion = 'Jr Santo Toribio';
        $voluntario->correo_electronico = 'kellerkatlin.p@gmail.com';
        $voluntario->idtipo_telefono = 1; // Reemplaza este valor con el ID correcto para el tipo de teléfono
        $voluntario->numero_contacto = '935064473';
        $voluntario->grado_instruccion = 'Primaria';
        $voluntario->profesion = 'Estudiante';
        $voluntario->ocupacion = 'Estudiante';
        $voluntario->como_se_entero = 'Twitter';
        $voluntario->horario_flexible = 'NO';
        $voluntario->desea_informacion = 1;
        $voluntario->reciv_correos = 1;
        $voluntario->auto_datosper = 1;
        $voluntario->declaracion = 1;

        $voluntario->save();
    }
}
