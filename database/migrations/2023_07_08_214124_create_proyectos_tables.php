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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('budget', 8, 2);
            $table->string('status');
            $table->timestamps();
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
        });
        Schema::create('alliances', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name');
            $table->string('type');
            $table->text('description');
            $table->timestamps();
        });
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_project_id');
            $table->foreign('activity_project_id')->references('id')->on('activities')->onDelete('cascade');
            $table->string('evaluation_criteria');
            $table->integer('score');
            $table->text('comments')->nullable();
            $table->timestamps();
        });
        Schema::create('activity_project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('alliance_project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alliance_id');
            $table->foreign('alliance_id')->references('id')->on('alliances')->onDelete('cascade');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('evaluation_project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evaluation_id');
            $table->foreign('evaluation_id')->references('id')->on('evaluations')->onDelete('cascade');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('evaluation_activity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evaluation_id');
            $table->foreign('evaluation_id')->references('id')->on('evaluations')->onDelete('cascade');
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('evaluation_alliance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evaluation_id');
            $table->foreign('evaluation_id')->references('id')->on('evaluations')->onDelete('cascade');
            $table->unsignedBigInteger('alliance_id');
            $table->foreign('alliance_id')->references('id')->on('alliances')->onDelete('cascade');
            $table->timestamps();
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
