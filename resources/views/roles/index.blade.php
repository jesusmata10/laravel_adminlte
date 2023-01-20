@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                {{--@if (session('success'))
                    <div class="alert alert-success desva">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger desva">
                        {{ session('error') }}
                    </div>
                @endif--}}

                <div id="criterioBusqueda" class="alert alert-danger desva" style="display: none" role="alert">

                    Debe seleccionar un criterio de b&uacute;squeda
                </div>

                <form id="form" role="form" method="GET" action="{{-- url('/roles') --}}">
                    {{ csrf_field() }}

                    <div class="card card collapsed-card">
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
                                        <label for="nombre">Roles:</label>
                                        <select class="form-control" name="rol">
                                            <option value="" selected>Seleccione una opci&oacute;n</option>
                                            @foreach ($roles as $items)
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

                                <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary"><i
                                        class="fa fa-plus"></i> Nuevo</a>
                                <button type="button" onClick="reports('pdf')" class="btn btn-sm btn-primary"><i
                                        class="fa fa-file"></i> Pdf</button>
                                <button type="button" onClick="reports('excel')" class="btn btn-sm btn-primary"><i
                                        class="fa fa-file"></i> Excel</button>

                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-12">

                                <table id="tabla1" class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="width:50px">N°</th>
                                            <th>Roles</th>
                                            <th style="width:100px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @can('consultar') --}}
                                        @foreach ($roles as $items)
                                            <tr class="text-center">
                                                <td>{{ $items->row_number }}</td>
                                                <td class="text-uppercase">{{ $items->name }}</td>
                                                <td>
                                                    <div>
                                                        <a href="{{ url('/roles/modulePermission/' . $items->id) }}"
                                                            title="Módulos" class="btn btn-outline-primary btn-sm"> <i
                                                                class="fa fa-shield-alt"></i></a>
                                                        <a href="{{ url('/roles/rolesPermission/' . $items->id) }}"
                                                            title="Permisos" class="btn btn-outline-primary btn-sm"> <i
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

                    @if (count($roles) < 4)
                        <div class="card-footer clearfix">
                            <div class="float-right pagination">
                                {{ $roles->links() }}
                            </div>
                        </div>
                    @endif
                </div>

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
                toastr.error("{{ session('error') }}");
            @endif

        }, false);
    </script>
@endpush
