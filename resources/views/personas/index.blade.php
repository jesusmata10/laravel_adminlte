@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-2">

                <div id="criterioBusqueda" class="alert alert-danger desva" style="display: none" role="alert">
                    <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban" style="font-size:15px"></i>¡Error!</h5>
                    Debe seleccionar un criterio de b&uacute;squeda
                </div>

                <!-- Button trigger modal -->

                <form action="{{-- url('/personas') --}}" method="GET" role="form" id="form">
                    {{ csrf_field() }}
                    <div class="card collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Criterios de B&uacute;squeda</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="">C&eacute;dula</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                        </div>
                                        <input class="form-control" type="text" name="cedula">
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label for="primer_nombre">Primer Nombre</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input class="form-control text-uppercase" type="text" name="primer_nombre">
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label for="segundo_nombre">Segundo Nombre</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input class="form-control text-uppercase" type="text" name="segundo_nombre">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="primer_apellido">Primer Apellido</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input class="form-control text-uppercase" type="text" name="primer_apellido">
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label for="segundo_apellido">Segundo Apellido</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input class="form-control text-uppercase" type="text" name="segundo_apellido">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">

                                <button type="button" name="send" onClick="validar()" class="btn btn-sm btn-primary"><i
                                        class="fa fa-search"></i> Buscar</button>
                                <a href="{{-- url('/personas') --}}" type="button" class="btn btn-sm btn-primary"><i
                                        class="fa fa-eye"></i> Ver Todos</a>

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

                <div class="card card-primary">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">

                                <a href="{{ route('persona.create') }}" type="button" class="btn btn-sm btn-primary"><i
                                        class="fa fa-plus"></i> Nuevo</a>


                                <button type="button" onClick="reports('pdf')" class="btn btn-sm btn-primary "><i
                                        class="fa fa-file-pdf"></i> Pdf</button>
                                {{-- @can('reporte')
                            <button type="button" onClick="reports('excel')" class="btn btn-sm btn-primary"><i class="fa fa-file-excel"></i> Excel</button>
                        @endcan --}}
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-sm table-bordered table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width:50px">N°</th>
                                                <th>Nombres y Apellido</th>
                                                <th>Cedula</th>
                                                <th>Correo</th>
                                                <th style="width:150px">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @if (count($lista) <= 0)
                                    <tr class="text-center">
                                        <td colspan="5">No hay resultado que mostrar</td>
                                    </tr>
                                @else
                                    @foreach ($lista as $items)
                                    <tr class="text-center">
                                        <td>{{ $items->num }}</td>
                                        <td>{{ $items->primer_nombre . ' ' . $items->primer_apellido }}</td>
                                        <td>{{ $items->cedula}}</td>
                                        <td>{{ $items->email }}</td>
                                        <td>
                                            <div class="text-center ">

                                                @can('personas.show')
                                                    <a href="{{ route('personas.show', encrypt($items->id)) }}" title="Ver" type="button" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                                @endcan
                                                @can('personas.edit')
                                                    <a href="{{ route('personas.edit', encrypt($items->id)) }}" title="Ver" type="button" class="btn btn-sm btn-danger"><i class="fas fa-eye"></i></a>
                                                @endcan
                                                <a href="{{ url('/personas/'.encrypt($items->id).'/edit') }}" title="Editar" type="button" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                <!-- button type="button" class="btn btn-outline-primary">Eliminar</button -->
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif --}}

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  @if ($lista->total() > 10)
                <div class="card-footer">
                    <div class="float-right">
                        {{ $lista->withQueryString()->links() }}
                    </div>
                </div>
            @endif --}}
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011-04-25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011-07-25</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009-01-12</td>
                                    <td>$86,000</td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2012-03-29</td>
                                    <td>$433,060</td>
                                </tr>
                                <tr>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>33</td>
                                    <td>2008-11-28</td>
                                    <td>$162,700</td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>

            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dt-buttons btn-group flex-wrap"> <button
                                    class="btn btn-secondary buttons-copy buttons-html5" tabindex="0"
                                    aria-controls="example1" type="button"><span>Copy</span></button> <button
                                    class="btn btn-secondary buttons-csv buttons-html5" tabindex="0"
                                    aria-controls="example1" type="button"><span>CSV</span></button> <button
                                    class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                    aria-controls="example1" type="button"><span>Excel</span></button> <button
                                    class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                                    aria-controls="example1" type="button"><span>PDF</span></button> <button
                                    class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1"
                                    type="button"><span>Print</span></button>
                                <div class="btn-group"><button
                                        class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis"
                                        tabindex="0" aria-controls="example1" type="button" aria-haspopup="true"
                                        aria-expanded="false"><span>Column visibility</span><span
                                            class="dt-down-arrow"></span></button></div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                        class="form-control form-control-sm" placeholder=""
                                        aria-controls="example1"></label></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Rendering
                                            engine</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">Browser
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            Platform(s)</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending">
                                            Engine version</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="CSS grade: activate to sort column ascending">CSS
                                            grade</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                                        <td>Firefox 1.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                                        <td>Firefox 1.5</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                                        <td>Firefox 2.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                                        <td>Firefox 3.0</td>
                                        <td>Win 2k+ / OSX.3+</td>
                                        <td>1.9</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="sorting_1 dtr-control">Gecko</td>
                                        <td>Camino 1.0</td>
                                        <td>OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="sorting_1 dtr-control">Gecko</td>
                                        <td>Camino 1.5</td>
                                        <td>OSX.3+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="sorting_1 dtr-control">Gecko</td>
                                        <td>Netscape 7.2</td>
                                        <td>Win 95+ / Mac OS 8.6-9.2</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="sorting_1 dtr-control">Gecko</td>
                                        <td>Netscape Browser 8</td>
                                        <td>Win 98SE+</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="sorting_1 dtr-control">Gecko</td>
                                        <td>Netscape Navigator 9</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="sorting_1 dtr-control">Gecko</td>
                                        <td>Mozilla 1.0</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td>1</td>
                                        <td>A</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Rendering engine</th>
                                        <th rowspan="1" colspan="1">Browser</th>
                                        <th rowspan="1" colspan="1">Platform(s)</th>
                                        <th rowspan="1" colspan="1">Engine version</th>
                                        <th rowspan="1" colspan="1">CSS grade</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1
                                to 10 of 57 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="example1_previous"><a
                                            href="#" aria-controls="example1" data-dt-idx="0" tabindex="0"
                                            class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#"
                                            aria-controls="example1" data-dt-idx="1" tabindex="0"
                                            class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                            data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                            data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                            data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                            data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                            data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                    <li class="paginate_button page-item next" id="example1_next"><a href="#"
                                            aria-controls="example1" data-dt-idx="7" tabindex="0"
                                            class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Información del Jefe de Hogar</h4>
                        <button type="button" class="close btn b" data-dismiss="modal" aria-label="Close">
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
                                <label for="">Nombres:</label>
                                <input type="text" class="form-control" name="mo_nombres" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Apellidos:</label>
                                <input type="text" class="form-control" name="mo_apellidos" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Tel&eacute;fono fijo:</label>
                                <input type="text" class="form-control" name="telefono_fijo" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Tel&eacute;fono Movil:</label>
                                <input type="text" class="form-control" name="celular" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12">
                                <label for="">Direcci&oacute;n Habitaci&oacute;n:</label>
                                <input type="text" class="form-control" name="mo_direccion_habitacion" readonly>
                            </div>
                        </div>

                        <div class="row">
                            {{--
                    <div class="form-group col-6">
                      <label for="">Entidad:</label>
                      <input type="text" class="form-control" name="mo_entidad" readonly>
                    </div> --}}
                            <div class="form-group col-6">
                                <label for="">Estatus:</label>
                                <input type="text" class="form-control" name="mo_estatus" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12">
                                <h4>Carga Familiar</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-sm table-bordered table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width:50px">N°</th>
                                                <th>Nombres y Apellido</th>
                                                <th>Cedula</th>
                                                <th>Correo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{--  @foreach ($carga_familiar as $items)
                                <tr class="text-center">
                                    <td>{{ $items->id }}</td>
                                    <td>{{ $items->nombres . ' ' . $items->apellidos }}</td>
                                    <td>{{ $items->cedula}}</td>
                                    <td>{{ $items->correo }}</td>
                                </tr>
                                @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Nombre Usuario:</label>
                                <input type="text" class="form-control" name="mo_name" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Rol:</label>
                                <input type="text" class="form-control" name="mo_roles" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page_scripts')
    <script>
        console.log('hola mundo');
        
    </script>
@endpush
