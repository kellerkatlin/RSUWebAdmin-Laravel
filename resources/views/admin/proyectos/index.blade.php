@extends('adminlte::page')

@section('title', 'Proyectos')

@section('content_header')
    <h1 class="text-black">Reporte de Proyectos</h1>
@stop

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#createModal">
                Crear Proyecto
            </button>
        </div>
        
        <!-- Modal de creación de proyecto -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Crear Proyecto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include ('admin.proyectos.modals.create')
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

        <table id="tablaProyectos" class="table table-striped hover row-border" style="width:100%">
            <thead class="bg-success text-white">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectos as $proyecto)
                    <tr>
                        <td>{{ $proyecto->id }}</td>
                        <td>{{ $proyecto->titulo }}</td>
                        <td class="d-flex">
                            <button type="button" value="{{ $proyecto->id }}" class=" btn btn-warning">
                                Editar
                            </button>
                            <a href="{{ route('admin.proyectos.edit', $proyecto->id) }}" class="detalle btn btn-info">Detalle</a>   
                            <form class="borrar" data-proyecto="{{ $proyecto->id }}"
                                action="{{ route('admin.proyectos.destroy', $proyecto->id) }}" method="POST"
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

    <!-- Modal para ver el proyecto -->
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tittle" id="editModalLabel">Ver Proyecto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        @include('admin.proyectos.modals.show')
                    </div>
                    <div id="editModalContent"></div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@stop
@section('js')
    <script>
        $('#tablaProyectos').DataTable({
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
                let proyectoId = $(this).data('proyecto-id');

                // Realizar la solicitud AJAX para obtener los detalles del proyecto
                $.ajax({
                    url: "{{ route('admin.proyectos.show', ['proyecto' => ':proyecto']) }}"
                        .replace(':proyecto', proyectoId),
                    method: 'GET',
                    success: function(response) {
                        console.log(response);
                        // Llenar los campos del modal con los datos del proyecto
                        $('#showModal #titulo').text(response.proyecto.titulo);

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
                    title: '¿Deseas crear un proyecto?',
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
                                        '{{ route('admin.proyectos.index') }}';
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


        $(document).ready(function() {
            $('.agregar').click(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: '¿Deseas agregar un proyecto?',
                    showCancelButton: true,
                    icon: 'info',
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: 'Agregar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ route('admin.proyectos.create') }}';
                    } else if (result.isDenied) {
                        Swal.fire('Operación cancelada', '', 'info');
                    }
                });
            });
            // Obtener el token CSR
        });



        $('.borrar').click(function(event) {
            event.preventDefault();
            let form = $(this);
            let proyecto = form.data('proyecto');

            Swal.fire({
                title: '¿Deseas eliminar el proyecto?',
                showCancelButton: true,
                icon: 'warning',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.proyectos.destroy', ['proyecto' => ':proyecto']) }}"
                            .replace(':proyecto', proyecto),
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE'
                        },
                        success: function(response) {
                            Swal.fire(
                                'Proyecto borrado correctamente',
                                '',
                                'success'
                            ).then(function() {
                                // Redirigir a la página de índice de proyectos
                                window.location.href =
                                    '{{ route('admin.proyectos.index') }}';
                            });
                        },
                        error: function(response) {
                            Swal.fire(
                                'Error al borrar el proyecto',
                                'Ha ocurrido un error al intentar borrar el proyecto',
                                'error'
                            );
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Operación cancelada', '', 'info');
                }
            });
        });
    </script>

@stop
