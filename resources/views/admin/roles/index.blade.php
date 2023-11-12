@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-black">Reporte de Voluntariados</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">


            <a href="{{ route('admin.roles.create') }}" class="agregar btn btn-outline-success">Agregar Nuevo Rol</a>

        </div>

        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <table id="tablaRoles" class="table table-striped hover row-border" style="width:100%">
            <thead class="bg-success text-white">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="text-center">{{ $role->id }}</td>
                        <td class="text-center">{{ $role->name }}</td>
                        <td width='5px'>
                            <div class="d-flex">

                                <a data-role="{{ $role->id }}" href="{{ route('admin.roles.edit', $role) }}"
                                    class="editar btn btn-outline-primary me-2">Editar</a>

                                <form class="borrar" data-role="{{ $role->id }}"
                                    action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger me-2">Eliminar</button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@stop
@section('js')
    <script>
        $('#tablaRoles').DataTable({
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
            $('.agregar').click(function(event) {
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
                        window.location.href = '{{ route('admin.roles.create') }}';
                    } else if (result.isDenied) {
                        Swal.fire('Operación cancelada', '', 'info');
                    }
                });
            });
            $('.editar').click(function(event) {
                event.preventDefault();
                let button = $(this);
                let role = button.data('role');

                Swal.fire({
                    title: '¿Deseas editar el rol?',
                    showCancelButton: true,
                    icon: 'info',
                    confirmButtonText: 'Editar',
                    denyButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href =
                            "{{ route('admin.roles.edit', ['role' => ':role']) }}"
                            .replace(':role', role);
                    } else if (result.isDenied) {
                        Swal.fire('Operación cancelada', '', 'info');
                    }
                });

            });

            $(document).ready(function() {
                $('body').on('submit', '.borrar', function(event) {
                    event.preventDefault();
                    let form = $(this);
                    let role = form.data('role');

                    Swal.fire({
                        title: '¿Deseas borrar el rol?',
                        showCancelButton: true,
                        icon: 'warning',
                        confirmButtonText: 'Borrar',
                        denyButtonText: 'Cancelar',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('admin.roles.destroy', ['role' => ':role']) }}"
                                    .replace(':role', role),
                                type: 'GET',
                                data: {
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    Swal.fire(
                                        'Rol borrado correctamente',
                                        '',
                                        'success'
                                    ).then(function() {
                                        window.location.href =
                                            '{{ route('admin.roles.index') }}';
                                    });
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire(
                                        'Rol borrado correctamente',
                                        '',
                                        'success'
                                    ).then(function() {
                                        window.location.href =
                                            '{{ route('admin.roles.index') }}';
                                    });
                                    
                                }
                            });
                        } else if (result.isDenied) {
                            Swal.fire('Operación cancelada', '', 'info');
                        }
                    });
                });
            });


        });
    </script>

@stop
