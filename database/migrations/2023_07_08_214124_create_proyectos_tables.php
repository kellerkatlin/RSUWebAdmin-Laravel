<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('titulo');
            $table->string('programa')->nullable();
            $table->string('lugar_ejecucion')->nullable();
            $table->string('beneficiario')->nullable();
            $table->date('inicio')->nullable();
            $table->date('termino')->nullable();
            $table->string('estado')->default('inicio')->nullable();
            $table->timestamps();
        });
        Schema::create('fases', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('proyecto_id');
            $table->string('nombre');
            $table->integer('duracion_dias');
            $table->timestamps();
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
        });
        Schema::create('responsables', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('dni')->unique()->nullable();
            $table->string('nombre')->nullable();
            $table->string('responsabilidades')->nullable();
            $table->string('programa')->nullable();
            $table->string('facultad')->nullable();
            $table->string('correo')->nullable();
            $table->string('telefono')->nullable();
            $table->text('firma')->nullable();
            $table->timestamps();
        });
        //tabla de muchos a muchos de responsables y proyectos
        Schema::create('proyecto_responsable', function (Blueprint $table) {
            $table->integer('proyecto_id');
            $table->integer('responsable_id');
            $table->timestamps();
            $table->primary(['proyecto_id', 'responsable_id']);
            $table->index('responsable_id');
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
            $table->foreign('responsable_id')->references('id')->on('responsables');
        });

        //tabla de responsables 


        Schema::create('informes_avances', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('proyecto_id');
            $table->string('estado');
            $table->timestamps();
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
        });

        Schema::create(
            'evidencias_avances',
            function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->integer('informe_id')->nullable();
                $table->string('tipo_archivo')->nullable();
                $table->string('archivo')->nullable();
                $table->text('descripcion')->nullable();
                $table->timestamps();
                $table->foreign('informe_id')->references('id')->on('informes_avances')->onDelete('cascade');
            }
        );


        Schema::create('informes_finales', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('proyecto_id');
            $table->timestamps();
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
        });
        Schema::create(
            'evidencias_final',
            function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->integer('informe_id')->nullable();
                $table->string('tipo_archivo')->nullable();
                $table->string('archivo')->nullable();
                $table->text('descripcion')->nullable();
                $table->timestamps();
                $table->foreign('informe_id')->references('id')->on('informes_finales')->onDelete('cascade');
            }
        );

        Schema::create('evaluaciones_proyectos', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('proyecto_id');
            $table->date('fecha');
            $table->integer('eficacia');
            $table->integer('eficiencia');
            $table->integer('sostenibilidad');
            $table->integer('satisfaccion_comunidad');
            $table->integer('satisfaccion_estudiantil');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
        Schema::dropIfExists('informes_avances');
        Schema::dropIfExists('informes_finales');
        Schema::dropIfExists('evaluaciones_proyectos');
        Schema::dropIfExists('proyecto_responsable');
        Schema::dropIfExists('responsables');
    }
}
