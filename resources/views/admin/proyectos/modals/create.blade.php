{!! Form::open(['route' => 'admin.proyectos.store', 'method' => 'POST']) !!}

<div class="form-group field-container">
    {!! Form::label('titulo', 'Título') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group field-container">
    {!! Form::label('programa', 'Programa') !!}
    {!! Form::text('programa', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group field-container">
    {!! Form::label('lugar_ejecucion', 'Lugar de Ejecución') !!}
    {!! Form::text('lugar_ejecucion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group field-container">
    {!! Form::label('beneficiario', 'Beneficiario') !!}
    {!! Form::text('beneficiario', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group field-container">
    {!! Form::label('inicio', 'Fecha de Inicio') !!}
    {!! Form::date('inicio', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group field-container">
    {!! Form::label('termino', 'Fecha de Término') !!}
    {!! Form::date('termino', null, ['class' => 'form-control']) !!}
</div>

<div class="modal-footer field-container">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
