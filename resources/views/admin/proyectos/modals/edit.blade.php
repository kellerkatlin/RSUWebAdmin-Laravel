<form action="{{route('admin.proyectos.update',['proyecto' => $proyecto->id])}}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" id="proyectoId" name="proyectoId">
    <div class="form-group field-container">
        <label for="">Título</label>
        <input type="text" id="title" class="form-control" name="title">
    </div>

    <div class="form-group field-container">
        <label for="">Descripción</label>
        <textarea id="description" class="form-control" name="description" required></textarea>
    </div>
    <div class="form-group field-container">
        <label for="">Fecha de Inicio</label>
        <input type="date" id="start_date" class="form-control" name="start_date">
    </div>

    <div class="form-group field-container">
        <label for="">Fecha de Fin</label>
        <input type="date" id="end_date" class="form-control" name="end_date">
    </div>

    <div class="form-group field-container">
        <label for="">Presupuesto</label>
        <input type="text" id="budget" class="form-control" name="budget">
    </div>

    <div class="form-group field-container">
        <label for="">Estado</label>
        <select id="status" class="form-control" name="status">
            <option value="Activo" @if ($proyecto->status == 'Activo') selected @endif>Activo</option>
            <option value="Inactivo" @if ($proyecto->status == 'Inactivo') selected @endif>Inactivo</option>
        </select>
    </div>

    <div class="modal-footer field-container">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
</form>
