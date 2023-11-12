<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGanttsTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table){
            $table->integer('id')->autoIncrement();
            $table->string('text');
            $table->integer('proyecto_id');
            $table->integer('duration');
            $table->float('progress');
            $table->dateTime('start_date');
            $table->integer('parent');
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('links', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('proyecto_id');
            $table->string('type');
            $table->integer('source');
            $table->integer('target');
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('links');
    }
}
