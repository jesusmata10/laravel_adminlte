@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
        
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
        
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Permiso por Rol</h3>
                    </div>
                    <form class="form" id="rolesForm" name="rolesForm" role="form" data-toggle="validator" method="POST" action="{{ route('rolesPermission') }}">
                        {{ csrf_field() }}
        
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="name">Nombre</label>
                                    <input readonly name="rol" class="form-control" value="{{ isset($rol['name']) ? $rol['name'] : '' }}">
                                </div>
                            </div>
                            <br>
        
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Permisos</h4>
                                </div>
                            </div><br>
        
                            <div class="row">
                                @foreach($permission as $items)
                                    <div class="col-md-3">
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" @if(in_array($items->id, $permisionRole->toArray()))checked @endif name="permiso[]" value="{{ $items->id }}" id="{{ $items->id }}">
                                                <label for="{{ $items->id }}">{{ $items->name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
        
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="submit" class="btn btn-sm btn-primary">Aceptar</button>
                                <a href="{{ route('permisos.index') }}" class="btn btn-sm btn-danger">Cancelar</a>
                            </div>
                        </div>
        
                    </form>
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
                toastr.success("{{ session('error') }}");
            @endif

        }, false);
    </script>
@endpush