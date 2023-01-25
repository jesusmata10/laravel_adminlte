@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">

            @if (session('success'))
                <div class="alert alert-success desva">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger desva">
                    {{ session('error') }}
                </div>
            @endif

            <div id="criterioBusqueda" class="alert alert-danger desva" style="display: none" role="alert">

                Debe seleccionar un criterio de b&uacute;squeda
            </div>

            <form id="form" role="form" method="GET" action="{{-- url('/roles') --}}">
                {{ csrf_field() }}

                <div class="card card collapsed-card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Criterios de B&uacute;squeda</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Permisos:</label>
                                    <select class="form-control" name="rol">
                                        <option value="" selected>Seleccione una opci&oacute;n</option>
                                        @foreach ($permisos as $items)
                                            <option value="{{ $items->id }}">{{ $items->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="float-right">
                            @can('consultar')
                                <button type="button" onClick="validar();" class="btn btn-sm btn-primary"><i
                                        class="fa fa-search"></i> Buscar</button>
                                <a href="{{-- route('roles.index') --}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Ver
                                    todos</a>
                            @endcan
                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                Limpiar</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card card-primary card-outline">

                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('permisos.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Nuevo</a>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-12">
                            <table id="tabla1" class="table table-sm table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width:50px">N°</th>
                                        <th>Permisos</th>
                                        <th>Descripci&oacute;n</th>
                                        <th style="width:100px">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @can('consultar') --}}
                                    @foreach ($permisos as $items)
                                        <tr class="text-center">
                                            <td>{{ $items->row_number }}</td>
                                            <td class="text-uppercase">{{ $items->name }}</td>
                                            <td> {{ isset($items->description) ? $items->description : 'Sin descripción' }}</td>
                                            <td>
                                                <div>
                                                    <a href="{{-- url('/permission/modulePermission/'.$items->id) --}}" title="Módulos"
                                                        class="btn btn-sm btn-primary btn-sm"> <i
                                                            class="fa fa-shield-alt"></i></a>
                                                    <a href="{{-- url('/permission/rolesPermission/'.$items->id) --}}" title="Permisos"
                                                        class="btn btn-sm btn-primary btn-sm"> <i
                                                            class="fa fa-user-shield"></i></a>
                                                    @can('editar')
                                                        <!-- <a href="{{ url('/roles/' . $items->id . '/edit') }}" title="Editar" class="btn btn-outline-primary btn-sm"> <i class="fa fa-edit"></i></a> -->
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- @endcan --}}
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                @if ($permisos->total() > 5)
                    <div class="card-footer">
                        <div class="float-right">
                            {{ $permisos->links() }}
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
@push('page_scripts')
    <script>
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
