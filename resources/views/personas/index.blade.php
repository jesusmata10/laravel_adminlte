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

                <div class="card card-primary card-outline">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">

                                <a href="{{ route('personas.create') }}" type="button" class="btn btn-sm btn-primary"><i
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
