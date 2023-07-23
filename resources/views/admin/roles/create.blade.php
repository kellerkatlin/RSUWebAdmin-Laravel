@extends('adminlte::page')

@section('title', 'Detalle del Proyecto')

@section('content_header')
    <h1>Detalle del Proyecto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                {{ Form::label('title', 'Título') }}
                {{ Form::text('title', $project->title, ['class' => 'form-control', 'readonly' => true]) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Descripción') }}
                {{ Form::textarea('description', $project->description, ['class' => 'form-control', 'readonly' => true]) }}
            </div>

            <div class="form-group">
                {{ Form::label('start_date', 'Fecha de Inicio') }}
                {{ Form::text('start_date', $project->start_date, ['class' => 'form-control', 'readonly' => true]) }}
            </div>

            <div class="form-group">
                {{ Form::label('end_date', 'Fecha de Fin') }}
                {{ Form::text('end_date', $project->end_date, ['class' => 'form-control', 'readonly' => true]) }}
            </div>

            <div class="form-group">
                {{ Form::label('budget', 'Presupuesto') }}
                {{ Form::text('budget', $project->budget, ['class' => 'form-control', 'readonly' => true]) }}
            </div>

            <div class="form-group">
                {{ Form::label('status', 'Estado') }}
                {{ Form::text('status', $project->status, ['class' => 'form-control', 'readonly' => true]) }}
            </div>
        </div>
    </div>
@stop
