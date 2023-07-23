@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-black">Reporte de Voluntariados</h1>
@stop

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#createModal">
                Crear Voluntario
            </button>
        </div>
        <!-- Modal de creación de voluntarios -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Crear Voluntario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include ('admin.voluntarios.modals.create')

                    </div>
                </div>
            </div>
        </div>
    </div>



    @if (Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table id="tablaVoluntarios" class="table table-striped hover row-border" style="width:100%">
        <thead class="bg-success text-white">
            <tr>
                <th class="text-center">Nombre de documento</th>
                <th class="text-center">Pais Nacimiento</th>
                <th class="text-center">Lugar Nacimiento</th>
                <th class="text-center">Nombres</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($voluntarios as $voluntario)
                <tr>
                    <td class="text-center">{{ $voluntario->numero_documento }}</td>
                    <td class="text-center">{{ $voluntario->pais_nacimiento }}</td>
                    <td class="text-center">{{ $voluntario->direccion }}</td>
                    <td class="text-center">{{ $voluntario->nombres }}</td>
                    <td class="d-flex" width='1px'>

                        <button type="button" class="ver btn btn-primary"
                            data-voluntario-id="{{ $voluntario->idvoluntario }}">Ver</button>

                        <button type="button" value="{{ $voluntario->idvoluntario }}" class="editar btn btn-warning">
                            Editar
                        </button>

                        <form class="borrar" data-proyecto="{{ $voluntario->idvoluntario }}" action="" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <!-- Modal para ver el voluntario -->
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tittle" id="editModalLabel">Ver Voluntario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        @include('admin.voluntarios.modals.show')
                    </div>
                    <div id="editModalContent"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal para editar el voluntario -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exapleModalLabel">Editar Voluntario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('admin.voluntarios.modals.edit')
                </div>

            </div>
        </div>
    </div>
    {{--
<!-- Modal para editar voluntarios -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <!-- Contenido del modal -->
        <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Editar Voluntarios</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {!! Form::model($c, ['route' => ['actualizavoluntario', $c], 'method' => 'PUT']) !!}

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('numero_documento', 'Numero de documento') !!}
                            {!! Form::text('numero_documento', $voluntarios->numero_documento, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('pais_nacimiento', 'Pais de Nacimiento') !!}
                            {!! Form::textarea('pais_nacimiento', $voluntarios->pais_nacimiento, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('direccion', 'Direccion') !!}
                            {!! Form::date('direccion', $voluntarios->direccion, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('nombres', 'Nombres') !!}
                            {!! Form::date('nombres', $voluntarios->nombres, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Actualizar cambios', ['class' => 'btn btn-primary', 'id' => 'updateProjectButton']) !!}
                {!! Form::close() !!}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            <div id="editModalContent"></div>
        </div>
        --}}
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@stop
@section('js')
    <script>
        $(document).ready(function() {
            const tipoDocumento = $(".tipoDocumentoEdit");
            const campoAdicional = $(".campoAdicionalEdit");
            const campoAdicionalLabel = $(".campoAdicionalLabelEdit");
            const campoAdicionalInput = $(".campoAdicionalInputEdit");

            tipoDocumento.on("change", function() {
                const seleccionado = tipoDocumento.val();
                const nombreSeleccionado = tipoDocumento
                    .find(":selected")
                    .data("nombre");
                campoAdicional.css("display", seleccionado !== "" ? "block" : "none");
                campoAdicionalLabel.text(
                    seleccionado !== "" ? nombreSeleccionado + ":" : ""
                );
            });
        });
        $(document).ready(function() {
            const tipoDocumento = $(".tipoDocumento");
            const campoAdicional = $(".campoAdicional");
            const campoAdicionalLabel = $(".campoAdicionalLabel");
            const campoAdicionalInput = $(".campoAdicionalInput");

            tipoDocumento.on("change", function() {
                const seleccionado = tipoDocumento.val();
                const nombreSeleccionado = tipoDocumento
                    .find(":selected")
                    .data("nombre");
                campoAdicional.css("display", seleccionado !== "" ? "block" : "none");
                campoAdicionalLabel.text(
                    seleccionado !== "" ? nombreSeleccionado + ":" : ""
                );
            });
        });

        $(document).ready(function() {
            const seguro = $("#seguro");
            const idseguro = $("#idseguro");

            seguro.on("change", function() {
                const seleccionado = seguro.val();
                if (seleccionado === "NO") {
                    idseguro.prop("disabled", true);
                    idseguro.val("");
                } else {
                    idseguro.prop("disabled", false);
                }
            });
        });
        $(document).ready(function() {
            const discapacidad = $("#discapacidad");
            const iddiscapacidad = $("#iddiscapacidad");

            discapacidad.on("change", function() {
                const seleccionado = discapacidad.val();
                if (seleccionado === "NO") {
                    iddiscapacidad.prop("disabled", true);
                    iddiscapacidad.val("");
                } else {
                    iddiscapacidad.prop("disabled", false);
                }
            });
        });
        $(document).ready(function() {
            // Obtener los campos "Departamento", "Provincia" y "Distrito"
            let departamentoSelect = $("#departamento");
            let provinciaSelect = $("#provincia");
            let distritoSelect = $("#distrito");

            // Agregar un evento para capturar el cambio en el campo "Departamento"
            departamentoSelect.on("change", function() {
                let departamentoId = departamentoSelect.val();

                // Bloquear los campos de "Provincia" y "Distrito"
                provinciaSelect.prop("disabled", true);
                distritoSelect.prop("disabled", true);

                // Realizar la solicitud AJAX para obtener las provincias
                $.ajax({
                    url: "{{ route('obtenerprovincias') }}",
                    type: "POST",
                    data: {
                        departamento: departamentoId,
                        _token: '{{ csrf_token() }}',
                    },
                    dataType: "json",
                    success: function(response) {
                        actualizarProvincias(response.provincias);
                    },
                });
            });

            // Agregar un evento para capturar el cambio en el campo "Provincia"
            provinciaSelect.on("change", function() {
                let provinciaId = provinciaSelect.val();

                // Bloquear el campo "Distrito"
                distritoSelect.prop("disabled", true);

                // Realizar la solicitud AJAX para obtener los distritos
                $.ajax({
                    url: "{{ route('obtenerDistritos') }}",
                    type: "POST",
                    data: {
                        provincia: provinciaId,
                        _token: '{{ csrf_token() }}',
                    },
                    dataType: "json",
                    success: function(response) {
                        actualizarDistritos(response.distritos);
                    },
                });
            });

            // Función para actualizar el campo "Provincia" con las opciones recibidas
            function actualizarProvincias(provincias) {
                provinciaSelect.html('<option value="">Seleccionar</option>');

                // Agregar las opciones de provincia recibidas
                provincias.forEach(function(provincia) {
                    let option = $("<option></option>");
                    option.val(provincia.idprovincia);
                    option.text(provincia.provincia);
                    provinciaSelect.append(option);
                });

                // Habilitar el campo "Provincia"
                provinciaSelect.prop("disabled", false);
            }

            // Función para actualizar el campo "Distrito" con las opciones recibidas
            function actualizarDistritos(distritos) {
                distritoSelect.html('<option value="">Seleccionar</option>');

                // Agregar las opciones de distrito recibidas
                distritos.forEach(function(distrito) {
                    let option = $("<option></option>");
                    option.val(distrito.iddistrito);
                    option.text(distrito.distrito);
                    distritoSelect.append(option);
                });

                // Habilitar el campo "Distrito"
                distritoSelect.prop("disabled", false);
            }
        });
        $(document).ready(function() {
            const horarioFlexible = $("#horario_flexible");
            const diasDisponibles = $('input[name="dias_disponibles[]"]');

            horarioFlexible.on("change", function() {
                const seleccionado = horarioFlexible.val();
                if (seleccionado === "SI") {
                    diasDisponibles.prop("checked", false);
                    diasDisponibles.prop("disabled", true);
                } else {
                    diasDisponibles.prop("disabled", false);
                }
            });
        });

        $(document).ready(function() {
            // Capturar el evento click del botón "Crear Proyecto"
            $('#createModal').on('show.bs.modal', function() {
                // Limpiar los mensajes de error y restablecer el formulario al abrir el modal
                $('#createModal form .text-danger').remove();
                $('#createModal form')[0].reset();
            });

            // Capturar el evento submit del formulario de creación de proyectos
            $('#createModal form').on('submit', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: '¿Deseas crear un volutario?',
                    showCancelButton: true,
                    icon: 'info',
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: 'Crear',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('action'),
                            method: $(this).attr('method'),
                            data: $(this).serialize(),
                            success: function(response) {
                                // Cerrar el modal después de enviar el formulario
                                $('#createModal').modal('hide');

                                // Mostrar mensaje de éxito
                                Swal.fire(
                                    'Proyecto creado exitosamente',
                                    '',
                                    'success').then(function() {
                                    // Redirigir a la página de índice de proyectos
                                    window.location.href =
                                        '{{ route('admin.voluntarios.index') }}';
                                });

                            },
                            error: function(xhr, status, error) {
                                let response = JSON.parse(xhr.responseText);
                                if (response.errors) {
                                    let errors = response.errors;

                                    // Eliminar los mensajes de error existentes
                                    $('.field-container').find('.text-danger').remove();

                                    // Recorrer los errores y mostrar los mensajes en el formulario
                                    $.each(errors, function(field, messages) {
                                        // Mostrar el mensaje de error debajo del campo correspondiente
                                        $('.field-container').has('[name="' +
                                                field + '"]')
                                            .append(
                                                '<span class="text-danger">' +
                                                messages[0] +
                                                '</span>');
                                    });

                                    // Mostrar el modal de errores
                                    $('#errorModal').modal('show');
                                }
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire('Operación cancelada', '', 'info');
                    }
                });

                // Realizar la solicitud AJAX para enviar los datos del formulario

            });
        });
        $('#tablaVoluntarios').DataTable({
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
            $('.ver').click(function() {
                let voluntarioId = $(this).data('voluntario-id');

                // Realizar la solicitud AJAX para obtener los detalles del voluntario
                $.ajax({
                    url: "{{ route('admin.voluntarios.show', ['voluntario' => ':voluntario']) }}"
                        .replace(':voluntario', voluntarioId),
                    method: 'GET',
                    success: function(response) {
                        // Llenar los campos del modal con los datos del voluntario
                        $('#showModal #name').val(response.nombres);

                        $('#showModal #tipo_doc').val(response.tipo_documento);
                        $('#showModal #num_doc').val(response.numero_documento);
                        $('#showModal #paisNacimientoVoluntario').val(response.pais_nacimiento);
                        $('#showModal #fechaNacimientoVoluntario').val(response
                            .fecha_nacimiento);
                        $('#showModal #generoVoluntario').val(response.sexo);
                        $('#showModal #estadoCivilVoluntario').val(response.estado_civil);
                        $('#showModal #telefonoVoluntario').val(response.numero_contacto);
                        $('#showModal #celularVoluntario').val(response.celular);
                        $('#showModal #correoVoluntario').val(response.correo);
                        $('#showModal #direccionVoluntario').val(response.direccion);
                        $('#showModal #distritoVoluntario').val(response.distrito);
                        // Mostrar el modal de ver
                        $('#showModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        // Manejar el error de la solicitud AJAX
                        console.log(error);
                    }
                });
            });
        });
        $(document).ready(function() {
            $(document).on('click', '.editar', function() {
                let voluntarioId = $(this).val();
                $('#editModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.voluntarios.edit', ['voluntario' => ':voluntario']) }}"
                        .replace(':voluntario', voluntarioId),
                    success: function(response) {
                        $('#editModal #nombre').val(response.voluntario.nombres);
                        $('#editModal #tipo_doc').val(response.voluntario.tipo_documento);
                        $('#editModal #num_doc').val(response.voluntario.numero_documento);
                        $('#editModal #paisNacimientoVoluntario').val(response.voluntario
                            .pais_nacimiento);
                        $('#editModal #fechaNacimientoVoluntario').val(response.voluntario
                            .fecha_nacimiento);
                        $('#editModal #generoVoluntario').val(response.voluntario.sexo);
                        $('#editModal #estadoCivilVoluntario').val(response.voluntario
                            .estado_civil);
                        $('#editModal #telefonoVoluntario').val(response.voluntario
                            .numero_contacto);
                        $('#editModal #celularVoluntario').val(response.voluntario.celular);
                        $('#editModal #correoVoluntario').val(response.voluntario.correo);
                        $('#editModal #direccionVoluntario').val(response.voluntario.direccion);
                        $('#editModal #distritoVoluntario').val(response.voluntario.distrito);
                        $('#editModal #voluntarioId').val(response.voluntario.idvoluntario);
                    }
                });
            });

            $('#editModal form').on('submit', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: '¿Deseas actualizar al voluntario?',
                    showCancelButton: true,
                    icon: 'info',
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: 'Actualizar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        let voluntarioId = $('#editModal #proyectoId').val();
                        $.ajax({
                            url: "{{ route('admin.proyectos.update', ['proyecto' => ':proyecto']) }}"
                                .replace(':proyecto', proyectoId),
                            method: 'POST',
                            data: $(this).serialize(),
                            success: function(response) {
                                // Cerrar el modal después de enviar el formulario
                                $('#editModal').modal('hide');

                                // Mostrar mensaje de éxito
                                Swal.fire(
                                    'Voluntario actualizado exitosamente',
                                    '',
                                    'success').then(function() {
                                    // Redirigir a la página de índice de proyectos
                                    window.location.href =
                                        '{{ route('admin.voluntarios.index') }}';
                                });

                            },
                            error: function(xhr, status, error) {
                                let response = JSON.parse(xhr.responseText);
                                if (response.errors) {
                                    let errors = response.errors;

                                    // Eliminar los mensajes de error existentes
                                    $('.field-container').find('.text-danger').remove();

                                    // Recorrer los errores y mostrar los mensajes en el formulario
                                    $.each(errors, function(field, messages) {
                                        // Mostrar el mensaje de error debajo del campo correspondiente
                                        $('.field-container').has('[name="' +
                                                field + '"]')
                                            .append(
                                                '<span class="text-danger">' +
                                                messages[0] +
                                                '</span>');
                                    });

                                    // Mostrar el modal de errores
                                    $('#errorModal').modal('show');
                                }
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire('Operación cancelada', '', 'info');
                    }
                });

            });
        });
    </script>
    {{-- <script>
       {


        $(document).ready(function() {
            $('#agregar').click(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: '¿Deseas agregar un voluntario?',
                    showCancelButton: true,
                    icon: 'info',
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: 'Agregar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ route('admin.voluntarios.create') }}';
                    } else if (result.isDenied) {
                        Swal.fire('Operación cancelada', '', 'info');
                    }
                })
            })
        });

        $(document).ready(function() {
            $('#editar').click(function(event) {
                event.preventDefault();
                let button = $(this);
                let idVoluntario = button.data('idvoluntario');
                Swal.fire({
                    title: '¿Deseas editar el voluntario?',
                    showCancelButton: true,
                    icon: 'info',
                    confirmButtonText: 'Editar',
                    denyButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href =
                            "{{ route('modificavoluntario', ['idvoluntario' => ':idvoluntario']) }}"
                            .replace(':idvoluntario', idVoluntario);
                    } else if (result.isDenied) {
                        Swal.fire('Operación cancelada', '', 'info');
                    }
                });
            })
        });

        $(document).ready(function() {
            $('#activar').click(function(event) {
                event.preventDefault();
                let button = $(this);
                let idVoluntario = button.data('idvoluntario');

                Swal.fire({
                    title: '¿Deseas activar el voluntario?',
                    showCancelButton: true,
                    icon: 'info',
                    confirmButtonText: 'Activar',
                    denyButtonText: 'No Activar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('activavoluntario', ['idvoluntario' => ':idvoluntario']) }}"
                                .replace(':idvoluntario',
                                    idVoluntario),
                            type: 'GET',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Voluntario activado correctamente',
                                    '',
                                    'success').then(
                                    function() {
                                        window.location
                                            .href =
                                            '{{ route('reportevoluntario') }}';
                                    });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire(
                                    'Error al activar el voluntario',
                                    '',
                                    'error');
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire('Operación cancelada', '', 'info');
                    }
                });
            })
        });

        $(document).ready(function() {
            $('#borrar').click(function(event) {
                event.preventDefault();
                let button = $(this);
                let idVoluntario = button.data('idvoluntario');

                Swal.fire({
                    title: '¿Deseas borrar el voluntario?',
                    showCancelButton: true,
                    icon: 'warning',
                    confirmButtonText: 'Borrar',
                    denyButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('borravoluntario', ['idvoluntario' => ':idvoluntario']) }}"
                                .replace(':idvoluntario',
                                    idVoluntario),
                            type: 'GET',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Voluntario borrado correctamente',
                                    '',
                                    'success').then(
                                    function() {
                                        window.location
                                            .href =
                                            '{{ route('reportevoluntario') }}';
                                    });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire(
                                    'Error al borrar el voluntario',
                                    '',
                                    'error');
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire('Operación cancelada', '', 'info');
                    }
                });
            })
        });



    }
    </script>
     
    --}}


@stop
