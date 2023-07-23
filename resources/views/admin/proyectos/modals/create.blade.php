{!! Form::open(['route' => 'admin.proyectos.store', 'method' => 'POST']) !!}
<div class="form-group field-container">
    {!! Form::label('title', 'Título') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group field-container">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group field-container">
    {!! Form::label('start_date', 'Fecha de Inicio') !!}
    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group field-container">
    {!! Form::label('end_date', 'Fecha de Fin') !!}
    {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group field-container">
    {!! Form::label('budget', 'Presupuesto') !!}
    {!! Form::text('budget', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group field-container">
    {!! Form::label('status', 'Estado') !!}
    {!! Form::select('status', ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], null, ['class' => 'form-control']) !!}
</div>

<div class="modal-footer field-container">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
