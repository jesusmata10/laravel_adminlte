@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">

        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Nuevo Rol</h3>
            </div>
            <form class="form" id="rolesForm" name="rolesForm" role="form" data-toggle="validator" method="POST" action="{{ url('permission') }}">
                {{ csrf_field() }}

                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Permiso:</label>
                            <input type="text" name="name" class="form-control text-uppercase">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="description">Descripci&oacute;n</label>
                            <input type="text" name="description" class="form-control text-uppercase">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="float-right">
                        <button type="submit" class="btn btn-sm btn-primary">Aceptar</button>
                        <a href="{{ url('/permission') }}" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div>

            </form>
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