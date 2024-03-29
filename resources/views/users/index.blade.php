@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 mt-2">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <a href="{{ url('usuario/create') }}" type="button" class="btn btn-sm btn-primary"><i
                                        class="fa fa-plus"></i> Nuevo</a>
                                <button type="button" onClick="reports('pdf')" class="btn btn-sm btn-primary"><i
                                        class="fa fa-file"></i> Pdf
                                </button>
                                <button type="button" onClick="reports('excel')" class="btn btn-sm btn-primary"><i
                                        class="fa fa-file"></i> Excel
                                </button>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="width:50px">N°</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>email</th>
                                            <th>Rol</th>
                                            <th>Status</th>

                                            <th style="width:100px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (count($users) <= 0)
                                            <tr class="text-center">
                                                <td colspan="6">No hay resultado que mostrar</td>
                                            </tr>
                                        @else
                                            @foreach ($users as $items)
                                                <tr class="text-center">
                                                    <td>{{ $items->id }}</td>
                                                    <td>{{ isset($items->personas->primer_nombre) ? $items->personas->primer_nombre : 'Sin Informacion' }}
                                                    </td>
                                                    <td>{{ isset($items->personas->primer_apellido) ? $items->personas->primer_apellido : 'Sin informacion' }}
                                                    </td>
                                                    <td>{{ $items->email }}</td>
                                                    <td>{{ isset($items->roles[0]->name) ? $items->roles[0]->name : '' }}
                                                    </td>
                                                    <td>
                                                        @if ($items->status == true)
                                                            <span class=" badge badge-success">Activo</span>
                                                        @else
                                                            <span class=" badge badge-warning">Suspendido</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <button type="button" onClick="modal({{ $items->id }})"
                                                                title="Ver" data-toggle="modal" data-target="#modal-xl"
                                                                class="btn btn-sm btn-secondary"><i
                                                                    class="fas fa-eye"></i></button>
                                                            <a href="{{ url('/usuario/' . encrypt($items->id) . '/edit') }}"
                                                                title="Editar" type="button"
                                                                class="btn btn-sm btn-primary"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <!-- button type="button" class="btn btn-outline-primary">Eliminar</button -->
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    {{--  @if ($lista->total() > 2)
                <div class="card-footer">
                    <div class="float-right">
                        {{ $lista->links() }}
                    </div>
                </div>
            @endif --}}
                </div>

            </div>
        </div>

        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-md">
                <div class="card card-primary card-outline">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Información del Usuario</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="form-group col-12">
                                    <h4>Datos Personales</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="">C&eacute;dula:</label>
                                    <input type="text" class="form-control" name="mo_cedula" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Correo Electr&oacute;nico:</label>
                                    <input type="text" class="form-control" name="mo_email" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="">Primer Nombres:</label>
                                    <input type="text" class="form-control" name="mo_nombres" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Primer Apellidos:</label>
                                    <input type="text" class="form-control" name="mo_apellidos" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="">Rol:</label>
                                    <input type="text" class="form-control" name="mo_role" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Tel&eacute;fono Movil:</label>
                                    <input type="text" class="form-control" name="mo_telefono_movil" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="">Estatus:</label>
                                    <input type="text" class="form-control" name="mo_estatus" readonly>
                                </div>
                            </div>

                            <!--<div class="row">
                                        <div class="form-group col-12">
                                            <h4>Datos Usuario</h4>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="">Nombre Usuario:</label>
                                            <input type="text" class="form-control" name="mo_name" readonly>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="">Rol:</label>
                                            <input type="text" class="form-control" name="mo_role" readonly>
                                        </div>
                                    </div>-->

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page_scripts')
    <script>
        function modal(item) {
            let datatable = {!! $users !!}
            console.log(datatable);
            const result = datatable.filter(datatable => datatable.id === item)
            console.log(datatable);

            $('input[name=mo_cedula]').val(result[0].personas.cedula)
            $('input[name=mo_email]').val(result[0].email)
            $('input[name=mo_nombres]').val(result[0].personas.primer_nombre)
            $('input[name=mo_apellidos]').val(result[0].personas.primer_apellido)
            $('input[name=mo_telefono_movil]').val(result[0].personas.celular)
            $('input[name=mo_estatus]').val((result[0].status == true) ? 'Activo' : 'Suspendido')
            $('input[name=mo_name]').val(result[0].name)
            $('input[name=mo_role]').val(result[0].roles[0].name)
        }

        document.addEventListener('DOMContentLoaded', function() {
            // jquery code here

            console.log('Prueba de index user desde el script');
            //toastr.info('Prueba de index user desde el script!')
            @if (session('success'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ session('success') }}");
            @endif

            @if (session('error'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ session('error') }}");
            @endif

        }, false);
    </script>
@endpush
