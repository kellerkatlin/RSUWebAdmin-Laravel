<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateVoluntariosTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Crear la tabla 'dias'
        Schema::create('dias', function (Blueprint $table) {
            $table->integer('iddia')->autoIncrement();
            $table->string('nombre_dia')->nullable();
            $table->timestamps();
            
            
        });
        DB::table('dias')->insert([
            ['nombre_dia' => 'Lunes'],
            ['nombre_dia' => 'Martes'],
            ['nombre_dia' => 'Miércoles'],
            ['nombre_dia' => 'Jueves'],
            ['nombre_dia' => 'Viernes'],
            ['nombre_dia' => 'Sábado'],
            ['nombre_dia' => 'Domingo']
        ]);

        // Crear la tabla 'discapacidades'
        Schema::create('discapacidades', function (Blueprint $table) {
            $table->integer('iddiscapacidad')->autoIncrement();
            $table->string('nombre_discapacidad');
        });

        // Crear la tabla 'distritos'
        Schema::create('distritos', function (Blueprint $table) {
            $table->integer('iddistrito')->autoIncrement();
            $table->string('distrito')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->integer('estado')->default(1);
            $table->integer('idprovincia');
            $table->index('idprovincia');
        });

        // Crear la tabla 'grupos'
        Schema::create('grupos', function (Blueprint $table) {
            $table->integer('idvoluntario');
            $table->integer('idgrupo');
            $table->primary(['idvoluntario', 'idgrupo']);
            $table->index('idgrupo');
        });

        // Crear la tabla 'grupos_partis'
        Schema::create('grupos_partis', function (Blueprint $table) {
            $table->integer('idgrupo')->autoIncrement();
            $table->string('nombre_grupo')->nullable();
            $table->timestamps();

            // Insertar los registros
           
        });
        DB::table('grupos_partis')->insert([
            ['idgrupo' => 1, 'nombre_grupo' => 'ODS 01 - FIN DE LA POBREZA', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 2, 'nombre_grupo' => '', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 3, 'nombre_grupo' => 'ODS 03 - SALUD Y BIENESTAR', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 4, 'nombre_grupo' => 'ODS 04 - EDUCACIÓN DE CALIDAD', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 5, 'nombre_grupo' => 'ODS 05 - IGUALDAD DE GÉNERO', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 6, 'nombre_grupo' => 'ODS 06 - AGUA Y SANEAMIENTO', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 7, 'nombre_grupo' => 'ODS 07 - ENERGÍA LIMPIA', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 8, 'nombre_grupo' => 'ODS 08 - TRABAJO DECENTE', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 9, 'nombre_grupo' => 'ODS 09 - INDUSTRIA, INOVACIÓN', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 10, 'nombre_grupo' => 'ODS 10 - REDUCIR DESIGUALDADES', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 11, 'nombre_grupo' => 'ODS 11 - CIUDADES SOSTENIBLES', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 12, 'nombre_grupo' => 'ODS 12 - PRODUCCIÓN RESPONSABLE', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 13, 'nombre_grupo' => 'ODS 13 - ACCIÓN POR EL CLIMA', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 14, 'nombre_grupo' => 'ODS 14 - VIDA SUBMARINA', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 15, 'nombre_grupo' => 'ODS 15 - VIDA EN TIERRA', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 16, 'nombre_grupo' => 'ODS 16 - PAZ, JUSTICIA', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 17, 'nombre_grupo' => 'ODS 17 - ALIANZAS', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
            ['idgrupo' => 18, 'nombre_grupo' => 'RIESGOS Y DESASTRES', 'created_at' => '2023-07-01 19:27:04', 'updated_at' => '2023-07-01 19:27:04'],
        ]);

        // Crear la tabla 'provincias'
        Schema::create('provincias', function (Blueprint $table) {
            $table->integer('idprovincia')->autoIncrement();
            $table->string('provincia')->charset('utf8')->collation('utf8_unicode_ci');
            $table->integer('estado')->default(1);
            $table->integer('idregion');
            $table->index('idregion');
        });

        // Crear la tabla 'regiones'
        Schema::create('regiones', function (Blueprint $table) {
            $table->integer('idregion')->autoIncrement();
            $table->string('region')->charset('utf8')->collation('utf8_unicode_ci');
            $table->integer('estado')->default(1);
        });

        // Crear la tabla 'seguros'
        Schema::create('seguros', function (Blueprint $table) {
            $table->integer('idseguro')->autoIncrement();
            $table->string('nombreseguro');
            $table->integer('estado')->default(1);
        });

        // Crear la tabla 'tiposdocumentoidentidades'
        Schema::create('tiposdocumentoidentidades', function (Blueprint $table) {
            $table->integer('idtipodoc')->autoIncrement();
            $table->string('nombre_tipodoc');

        });
        DB::table('tiposdocumentoidentidades')->insert([
            ['idtipodoc' => 1, 'nombre_tipodoc' => 'PASAPORTE'],
            ['idtipodoc' => 2, 'nombre_tipodoc' => 'DNI'],
            ['idtipodoc' => 3, 'nombre_tipodoc' => 'CARNET EXTRANJERIA'],
            ['idtipodoc' => 4, 'nombre_tipodoc' => 'PARTIDA NACIMIENTO'],
            ['idtipodoc' => 5, 'nombre_tipodoc' => 'SIS'],
            ['idtipodoc' => 6, 'nombre_tipodoc' => 'CARNET DE VACUNACION'],
            ['idtipodoc' => 7, 'nombre_tipodoc' => 'SIN DOCUMENTO'],
            ['idtipodoc' => 8, 'nombre_tipodoc' => 'RUC'],
            ['idtipodoc' => 9, 'nombre_tipodoc' => 'LIBRETA ELECTORAL'],
        ]);

        // Crear la tabla 'tipos_contactos'
        Schema::create('tipos_contactos', function (Blueprint $table) {
            $table->integer('idcontacto')->autoIncrement();
            $table->string('nombre_contacto');
        });

        // Crear la tabla 'tipos_telefono'
        Schema::create('tipos_telefono', function (Blueprint $table) {
            $table->integer('idtipo_telefono')->autoIncrement();
            $table->string('nombre_tipo_telefono');
        });

        // Crear la tabla 'voluntarios'
        Schema::create('voluntarios', function (Blueprint $table) {
            $table->integer('idvoluntario')->autoIncrement();
            $table->string('numero_documento')->nullable();
            $table->string('pais_nacimiento')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('nombres')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('sexo')->nullable();
            $table->integer('edad')->nullable();
            $table->string('correo_electronico')->nullable();
            $table->string('grado_instruccion')->nullable();
            $table->string('profesion')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('como_se_entero')->nullable();
            $table->text('direccion')->nullable();
            $table->string('discapacidad')->nullable();
            $table->string('seguro')->nullable();
            $table->string('numero_contacto')->nullable();
            $table->string('horario_flexible')->nullable();
            $table->string('desea_informacion')->nullable();
            $table->string('reciv_correos')->nullable();
            $table->string('auto_datosper')->nullable();
            $table->string('declaracion')->nullable();
            $table->timestamps();
            $table->integer('iddistrito')->nullable();
            $table->integer('idtipodoc');
            $table->integer('iddiscapacidad')->nullable();
            $table->integer('idseguro')->nullable();
            $table->integer('idtipo_telefono')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->index('iddistrito');
            $table->index('idtipodoc');
            $table->index('iddiscapacidad');
            $table->index('idseguro');
            $table->index('idtipo_telefono');
        });

        // Crear la tabla 'voluntarios_dias'
        Schema::create('voluntarios_dias', function (Blueprint $table) {
            $table->integer('idvoluntario');
            $table->integer('iddia');
            $table->timestamps();
            $table->primary(['idvoluntario', 'iddia']);
            $table->index('iddia');
        });

        // Agregar las restricciones de clave primaria y las claves foráneas

        Schema::table('distritos', function (Blueprint $table) {
            $table->foreign('idprovincia')->references('idprovincia')->on('provincias');
        });

        Schema::table('grupos', function (Blueprint $table) {
            $table->foreign('idvoluntario')->references('idvoluntario')->on('voluntarios');
            $table->foreign('idgrupo')->references('idgrupo')->on('grupos_partis');
        });

        Schema::table('provincias', function (Blueprint $table) {
            $table->foreign('idregion')->references('idregion')->on('regiones');
        });

        Schema::table('voluntarios', function (Blueprint $table) {
            $table->foreign('iddistrito')->references('iddistrito')->on('distritos');
            $table->foreign('idtipodoc')->references('idtipodoc')->on('tiposdocumentoidentidades');
            $table->foreign('iddiscapacidad')->references('iddiscapacidad')->on('discapacidades');
            $table->foreign('idseguro')->references('idseguro')->on('seguros');
            $table->foreign('idtipo_telefono')->references('idtipo_telefono')->on('tipos_telefono');
        });

        Schema::table('voluntarios_dias', function (Blueprint $table) {
            $table->foreign('idvoluntario')->references('idvoluntario')->on('voluntarios');
            $table->foreign('iddia')->references('iddia')->on('dias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar las tablas
        Schema::dropIfExists('voluntarios_dias');
        Schema::dropIfExists('voluntarios');
        Schema::dropIfExists('tipos_telefono');
        Schema::dropIfExists('tipos_contactos');
        Schema::dropIfExists('tiposdocumentoidentidades');
        Schema::dropIfExists('seguros');
        Schema::dropIfExists('regiones');
        Schema::dropIfExists('provincias');
        Schema::dropIfExists('grupos_partis');
        Schema::dropIfExists('grupos');
        Schema::dropIfExists('distritos');
        Schema::dropIfExists('discapacidades');
        Schema::dropIfExists('dias');
    }
}
