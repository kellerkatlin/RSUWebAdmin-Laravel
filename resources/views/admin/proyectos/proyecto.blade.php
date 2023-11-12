@extends('adminlte::page')

@section('title', 'admin')


@section('content_header')
    <h1>Proyecto {{ $proyecto->titulo }}</h1>
@stop

@section('content')
    <div class="container container-sm mt-4 mb-4">
        <form id="formProyecto" action="{{ route('admin.proyectos.update', ['proyecto' => $proyecto->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="id" name="id" value="{{ $proyecto->id }}">

            <div class="form-row">
                <div class="col-md-6">
                    <label for="titulo">Título</label>

                    <input type="text" id="titulo" name="titulo" class="form-control" maxlength="10"
                        value="{{ $proyecto->titulo }}">
                </div>
            </div>
            <button type="button" class="btn btn-outline-primary mt-3" data-toggle="modal"
                data-target="#modalAgregarResponsable">Agregar Nuevo Responsable</button>
            <div class="form-group">
                <label for="responsable_id">Responsables</label>
                <div class="d-flex align-items-center">
                    <select id="responsable_id" class="form-control" name="responsable_id[]">
                        @foreach ($responsables as $responsable)
                            <option value="{{ $responsable->id }}" data-info="{{ json_encode($responsable) }}">
                                {{ $responsable->nombre }} ({{ $responsable->dni }})
                            </option>
                        @endforeach
                    </select>
                    <div class="ml-5">
                        <button id="asignarResponsable" class="btn btn-outline-primary btn-sm">Asignar Responsable</button>
                    </div>
                </div>
            </div>


            <div class="form-group mt-3">
                <label>Responsables Seleccionados:</label>
                <table id="tablaResponsables" class="table table-striped hover row-border" style="width:100%">
                    <thead class="bg-success">
                        <tr>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Responsabilidades</th>
                            <!-- Agrega más columnas para otros campos -->
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="listaResponsablesAgregados">
                        @foreach ($proyecto->responsables as $responsable)
                            <tr>
                                <td>
                                    {{ $responsable->nombre }}
                                </td>
                                <td>
                                    {{ $responsable->dni }}
                                </td>
                                <td>
                                    {{ $responsable->responsabilidades }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger btn-sm eliminar-responsable"
                                        data-responsableid="{{ $responsable->id }}">Eliminar</button>
                                    <button type="button" class="btn btn-outline-primary btn-sm editar-responsable"
                                        data-responsableId="{{ $responsable->id }}"
                                        value="{{ $responsable->id }}">Editar</button>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Los responsables seleccionados se agregarán aquí -->
                    </tbody>
                </table>
            </div>
            <div class="form-row mt-3">
                <div class="col-md-6">
                    <label for="programa">Programa</label>
                    <input type="text" name="programa" id="programa" class="form-control"
                        value="{{ $proyecto->programa }}">
                </div>
            </div>

            <div class="form-row mt-3">
                <div class="col-md-6">
                    <label for="lugar_ejecucion">Lugar de Ejecución</label>
                    <input type="text" name="lugar_ejecucion" id="lugar_ejecucion" class="form-control"
                        value="{{ $proyecto->lugar_ejecucion }}">
                </div>
            </div>

            <div class="form-row mt-3">
                <div class="col-md-6">
                    <label for="beneficiario">Beneficiario</label>
                    <input type="text" id="beneficiario" name="beneficiario" class="form-control"
                        value="{{ $proyecto->beneficiario }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inicio">Fecha de Inicio</label>
                    <input type="date" id="inicio" class="form-control" name="inicio"
                        value="{{ $proyecto->inicio }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="termino">Fecha de Fin</label>
                    <input type="date" id="termino" class="form-control" name="termino"
                        value="{{ $proyecto->termino }}">
                </div>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" id="estado" class="form-control" name="estado" value="{{ $proyecto->estado }}">
            </div>
            <div class="text-center">
                <button type="submit" id="actualizarProyecto" class="btn btn-primary">Actualizar</button>
                <a class="btn btn-secondary">Cancelar</a>
            </div>
        </form>

        {{-- modal agregar responsables --}}
        <div class="modal fade" id="modalAgregarResponsable" tabindex="-1" role="dialog"
            aria-labelledby="modalAgregarResponsableLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAgregarResponsableLabel">Agregar Nuevo Responsable</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.responsables.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group field-container">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" class="form-control" name="nombre">
                            </div>
                            <div class="form-group field-container">
                                <label for="dni">DNI</label>
                                <input type="text" id="dni" class="form-control" name="dni">
                            </div>
                            <div class="form-group field-container">
                                <label for="responsabilidades">Responsabilidades</label>
                                <input type="text" id="responsabilidades" class="form-control"
                                    name="responsabilidades">
                            </div>
                            <div class="form-group field-container">
                                <label for="programa">Programa</label>
                                <input type="text" id="programa" class="form-control" name="programa">
                            </div>
                            <div class="form-group field-container">
                                <label for="facultad">Facultad</label>
                                <input type="text" id="facultad" class="form-control" name="facultad">
                            </div>
                            <div class="form-group field-container">
                                <label for="correo">Correo</label>
                                <input type="email" id="correo" class="form-control" name="correo">
                            </div>
                            <div class="form-group field-container">
                                <label for="telefono">Teléfono</label>
                                <input type="text" id="telefono" class="form-control" name="telefono">
                            </div>
                            <div class="form-group field-container">
                                <label for="firma">Correo</label>
                                <input type="text" id="firma" class="form-control" name="firma">
                            </div>
                            <div class="modal-foote field-container">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" id="guardarResponsable">Guardar</button>
                            </div>


                        </form>
                    </div>


                </div>
            </div>
        </div>

        {{-- modal editar responsables --}}
        <div class="modal fade" id="editModalResponsable" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Responsable</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Agregar los campos del formulario de edición aquí -->
                        <form action="{{ route('admin.responsables.update', ['responsable' => $responsable->id]) }}"
                            method="POST" id="formularioEditarResponsable">
                            @csrf
                            @method('PUT')
                            <div>
                                <input type="hidden" id="responsableId" name="responsableId">
                                <div class="form-group field-container">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="nombre" class="form-control" name="nombre">
                                </div>
                                <div class="form-group field-container">
                                    <label for="dni">DNI</label>
                                    <input type="text" id="dni" class="form-control" name="dni">
                                </div>
                                <div class="form-group field-container">
                                    <label for="responsabilidades">Responsabilidades</label>
                                    <input type="text" id="responsabilidades" class="form-control"
                                        name="responsabilidades">
                                </div>
                                <div class="form-group field-container">
                                    <label for="programa">Programa</label>
                                    <input type="text" id="programa" class="form-control" name="programa">
                                </div>
                                <div class="form-group field-container">
                                    <label for="facultad">Facultad</label>
                                    <input type="text" id="facultad" class="form-control" name="facultad">
                                </div>
                                <div class="form-group field-container">
                                    <label for="correo">Correo</label>
                                    <input type="email" id="correo" class="form-control" name="correo">
                                </div>
                                <div class="form-group field-container">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" id="telefono" class="form-control" name="telefono">
                                </div>
                                <div class="form-group field-container">
                                    <label for="firma">Correo</label>
                                    <input type="text" id="firma" class="form-control" name="firma">
                                </div>
                            </div>
                            <div class="modal-footer field-container">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


@stop
@section('css')
@stop
@section('js')
    <script>
        $('#tablaResponsables').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontró nada",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                },

                scrollY: '200px',
                scrollCollapse: true,
                paging: false,

            },
        });
        $(document).ready(function() {
            $('#responsable_id').select2({
                placeholder: 'Buscar Responsable...',
                allowClear: true,
                width: '40%'
            });
        });
        $(document).ready(function() {
            let tablaResponsables = $('#tablaResponsables').DataTable();

            $('#asignarResponsable').click(function(event) {
                event.preventDefault();

                // Obtener los responsables seleccionados
                let selectedResponsables = $('#responsable_id').select2('data');

                // Agregar los responsables a la tabla DataTables
                selectedResponsables.forEach(function(responsable) {
                    let responsableInfo = $(responsable.element).data('info');
                    let responsableId = responsableInfo.id;

                    // Agregar una nueva fila a la tabla
                    tablaResponsables.row.add([
                        responsableInfo.nombre,
                        responsableInfo.dni,
                        responsableInfo.responsabilidades,
                        // Agrega más celdas para otros campos
                        `<button class="eliminar-responsable btn btn-outline-danger btn-sm">Eliminar</button>
                 <input type="hidden" name="responsables_seleccionados[]" value="${responsableInfo.id}">
                 <button class="editar-responsable btn btn-outline-primary btn-sm" data-responsableId="${responsableInfo.id}">Editar</button> 
                 <input type="hidden" name="responsables_seleccionados[]" value="${responsableInfo.id}">`
                    ]).draw(false); // Dibujar la tabla sin recargar

                    // Eliminar el elemento seleccionado del select
                    $('#responsable_id option[value="' + responsableId + '"]').remove();
                    $('#responsable_id').trigger('change');
                });
            });

            //Manejar click en el boton editar
            $('#tablaResponsables').on('click', '.editar-responsable', function() {
                event.preventDefault();
                let responsableId = $(this).val();
                console.log(responsableId)
                $('#editModalResponsable').modal('show');
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.responsables.edit', ['responsable' => ':responsable']) }}"
                        .replace(':responsable', responsableId),
                    success: function(response) {
                        $('#editModalResponsable #nombre').val(response.responsable.nombre);
                        $('#editModalResponsable #dni').val(response.responsable.dni);
                        $('#editModalResponsable #responsabilidades').val(response.responsable.responsabilidades);
                        $('#editModalResponsable #programa').val(response.responsable.programa);
                        $('#editModalResponsable #facultad').val(response.responsable.facultad);
                        $('#editModalResponsable #correo').val(response.responsable.correo);
                        $('#editModalResponsable #telefono').val(response.responsable.telefono);
                        $('#editModalResponsable #firma').val(response.responsable.firma);
                        $('#editModalResponsable #responsableId').val(response.responsable.id);

                    }
                })

            })
            $('#editModalResponsable form').on('submit', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Se actualizará el responsable del proyecto',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, actualizar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let responsableId = $('#editModalResponsable #responsableId').val();
                        console.log(responsableId)
                        $.ajax({
                            type: "POST",
                            url: "{{ route('admin.responsables.update', ['responsable' => ':responsable']) }}"
                                .replace(':responsable', responsableId),
                            data: $(this).serialize(),
                            success: function(response) {
                               
                                $('#editModalResponsable').modal('hide');
                                Swal.fire(
                                    '¡Actualizado!',
                                    'El responsable ha sido actualizado.',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            },
                            error: function(xhr, status, error) {
                                let response = JSON.parse(xhr.responseText);
                                if (response.errors) {
                                    let errors = response.errors;
                                  $('.field-container').find('.text-danger').remove();
                                        
                                    $.each(errors, function(field, messages) {
                                        $('.field-container').has('[name="' +
                                            field + '"]').append(
                                            '<span class="text-danger">' +
                                            messages[0] +
                                            '</span>');
                                    });
                                    $('#editModalResponsable').modal('show');

                                }

                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                })
            })

            // Manejar clic en el botón "Eliminar"
            $('#tablaResponsables').on('click', '.eliminar-responsable', function() {
                event.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Se eliminará el responsable del proyecto',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let responsableId = $(this).closest('tr').find('input[type=hidden]').val();
                        tablaResponsables.row($(this).closest('tr')).remove().draw(false);
                        let responsableInfo = $(this).closest('tr').find('td:first-child').data(
                            'info');
                        let newOption = new Option(responsableInfo.nombre, responsableId, false,
                            false);
                        $('#responsable_id').append(newOption).trigger('change');
                    } else {
                        Swal.fire(
                            'Cancelado',
                            'No se eliminó el responsable',
                            'error'
                        )
                    }

                })

            });

        });


        $('#actualizarProyecto').click(function() {
            event.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Se actualizarán los datos del proyecto',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, actualizar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#formProyecto').submit();
                }
            });
        });
    </script>
@stop
