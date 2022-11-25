@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('/usuario') }}" method="POST" role="form" data-toggle="validator" class="form"
                id="usuarioForm" name="usuarioForm">
                {{ csrf_field() }}

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Datos Personales</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="cedula">(*) C&eacutedula:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control @error('cedula') is-invalid @enderror" maxlength="10" name="cedula" value="{{ old('cedula') }}">
                                </div>
                                @error('cedula')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="email">(*) Correo Electr&oacutenico:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input class="form-control text-lowercase @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="rif">Rif:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-registered"></i></span>
                                    </div>
                                    <input class="form-control text-uppercase mask_rif @error('rif') is-invalid @enderror" type="text" name="rif" maxlength="12" value="{{ old('rif') }}">
                                </div>
                                @error('rif')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="primer_nombre">(*) Primer Nombre:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input id="primer_nombre" class="form-control text-uppercase @error('primer_nombre') is-invalid @enderror" type="text" name="primer_nombre" value="{{ old('primer_nombre') }}">
                                </div>
                                @error('primer_nombre')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="segundo_nombre">Segundo Nombre:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input id="segundo_nombre" class="form-control text-uppercase @error('segundo_nombre') is-invalid @enderror" type="text" name="segundo_nombre" value="{{ old('segundo_nombre') }}">
                                </div>
                                @error('segundo_nombre')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="primer_apellido">(*) Primer Apellido:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input id="primer_apellido" class="form-control text-uppercase @error('primer_apellido') is-invalid @enderror" type="text" name="primer_apellido" value="{{ old('primer_apellido') }}">
                                </div>
                                @error('primer_apellido')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="segundo_apellido">Segundo Apellido:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input id="segundo_apellido" class="form-control text-uppercase" type="text" name="segundo_apellido" value="{{ old('segundo_apellido') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="fecha">(*) Fecha:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right datepicker @error('fecha') is-invalid @enderror" name="fecha" autocomplete="off" value="{{ old('fecha') }}">
                                </div>
                                @error('fecha')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="lugarnac">(*) Lugar de Nacimiento:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                    </div>
                                    <input class="form-control text-uppercase @error('lugarnac') is-invalid @enderror" type="text" name="lugarnac" value="{{ old('lugarnac') }}">
                                </div>
                                @error('lugarnac')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="nacionalidad">(*) Nacionalidad:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                                    </div>
                                    <input class="form-control text-uppercase @error('nacionalidad') is-invalid @enderror" type="text" name="nacionalidad" value="{{ old('lugarnac') }}">
                                </div>
                                @error('nacionalidad')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="sexo">(*) Sexo:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text @error('sexo') is-invalid @enderror"><i class="fas fa-user-friends"></i></span>
                                    </div>

                                    <select class="form-control @error('sexo') is-invalid @enderror" name="sexo" id="sexo">
                                        <option value="" selected>Seleccione una opci&oacute;n</option>
                                        <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Mujer
                                        </option>
                                        <option value="H" {{ old('sexo') == 'H' ? 'selected' : '' }}>Hombre
                                        </option>
                                    </select>
                                </div>
                                @error('sexo')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="telefono_fijo">Tel&eacute;fono Local:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input class="form-control mask_tlf" type="text" name="telefono_fijo">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="celular">(*) Tel&eacute;fono M&oacute;vil:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                    </div>
                                    <input class="form-control mask_tlf @error('celular') is-invalid @enderror" type="text" name="celular" value="{{ old('celular')}}">
                                </div>
                                @error('celular')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="parentesco">Parentesco:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                    </div>
                                    <select class="form-control @error('parentesco') is-invalid @enderror" name="parentesco" id="parentesco">
                                        <option value="" selected>Seleccione una opci&oacute;n</option>
                                        <option value="Jefe de Hogar" {{ old('parentesco') == 'Jefe de Hogar' ? 'selected' : '' }}>Jefe de Hogar
                                        </option>
                                        <option value="Madre" {{ old('parentesco') == 'Madre' ? 'selected' : '' }}>Madre
                                        </option>
                                        <option value="Padre" {{ old('parentesco') == 'Padre' ? 'selected' : '' }}>Padre
                                        </option>
                                        <option value="Hijo" {{ old('parentesco') == 'Hijo' ? 'selected' : '' }}>Hijo
                                        </option>
                                        <option value="Hija" {{ old('parentesco') == 'Hija' ? 'selected' : '' }}>Hija
                                        </option>
                                        <option value="Suegro" {{ old('parentesco') == 'Suegro' ? 'selected' : '' }}>
                                            Suegro</option>
                                        <option value="Suegra" {{ old('parentesco') == 'Suegra' ? 'selected' : '' }}>
                                            Suegra</option>
                                        <option value="Sobrina" {{ old('parentesco') == 'Sobrina' ? 'selected' : '' }}>
                                            Sobrina</option>
                                        <option value="Sobrino" {{ old('parentesco') == 'Sobrino' ? 'selected' : '' }}>
                                            Sobrino</option>
                                    </select>
                                </div>
                                @error('parentesco')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3" id="divEntidad">
                                <div class="form-group">
                                    <label for="estado_id">(*) Entidad</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                        </div>
                                        <select class="form-control estado @error('estado_id') is-invalid @enderror>" name="estados_id" id="estado_id">
                                            <option value="" selected>Seleccione una opción</option>
                                            @foreach ($estado as $combo)
                                                <option value="{{ $combo->id }}" @selected(old('estado_id') == $combo->id)>
                                                    {{ $combo->estado }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('estados_id')
                                        <span class="right badge badge-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3" id="divciudad">
                                <div class="form-group">
                                    <label for="ciudad_id">(*) Ciudad</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        </div>
                                        <select class="form-control @error('ciudades_id') is-invalid @enderror" name="ciudades_id" id="ciudad_id">
                                            <option value="" selected>Seleccione una opción</option>
                                        </select>
                                    </div>
                                    @error('ciudades_id')
                                        <span class="right badge badge-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3" id="divMunicipio">
                                <div class="form-group">
                                    <label for="municipio_id">(*) Municipio</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        </div>
                                        <select class="form-control" name="municipios_id" id="municipio_id">
                                            <option value="" selected>Seleccione una opción</option>
                                        </select>
                                    </div>
                                    @error('municipios_id')
                                        <span class="right badge badge-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3" id="divParroquia">
                                <div class="form-group">
                                    <label for="parroquia_id">(*) Parroquia</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                        </div>
                                        <select class="form-control" name="parroquias_id" id="parroquia_id">
                                            <option value="" selected>Seleccione una opción</option>
                                        </select>
                                    </div>
                                    @error('parroquias_id')
                                        <span class="right badge badge-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="urbanizacion">(*) Urbanizaci&oacute;n</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        </div>
                                        <input class="form-control text-uppercase @error('urbanizacion') is-invalid @enderror" type="text" name="urbanizacion" value="{{ old('urbanizacion') }}">
                                    </div>
                                    @error('urbanizacion')
                                        <span class="right badge badge-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tzona">(*) Zona</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                        </div>
                                        <select class="form-control @error('tzona') is-invalid @enderror" name="tzona" id="tzona">
                                            <option value="" selected>Seleccione una opción</option>
                                            @foreach ($zona as $combo)
                                                <option value="{{ $combo->id }}" @selected(old('tzona') == $combo->id)>
                                                    {{ $combo->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('tzona')
                                        <span class="right badge badge-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nzona">(*) Nombre de zona</label>
                                    <input class="form-control text-uppercase @error('nzona') is-invalid @enderror" type="text" name="nzona" value="{{ old('nzona') }}">
                                </div>
                                @error('nzona')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tcalle">(*) Area:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                                        </div>
                                        <select class="form-control @error('tcalle') is-invalid @enderror" name="tcalle" id="tcalle">
                                            <option value="" selected>Seleccione una opción</option>
                                            @foreach ($area as $combo)
                                                <option value="{{ $combo->id }}" @selected(old('tcalle') == $combo->id)>{{ $combo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('tcalle')
                                        <span class="right badge badge-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="ncalle">(*) Nombre de Area</label>
                                    <input class="form-control text-uppercase @error('ncalle') is-invalid @enderror" type="text" name="ncalle" value="{{ old('ncalle') }}">
                                </div>
                                @error('ncalle')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tvivienda">(*) Hogar:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                                        </div>
                                        <select class="form-control @error('tvivienda') is-invalid @enderror" name="tvivienda" id="tvivienda">
                                            <option value="" selected>Seleccione una opción</option>
                                            @foreach ($hogar as $combo)
                                                {{-- <option value="{{ $combo->id }}">{{ $combo->nombre }}</option> --}}
                                                <option value="{{ $combo->id }}" @selected(old('tvivienda') == $combo->id)>
                                                    {{ $combo->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('tvivienda')
                                        <span class="right badge badge-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nvivienda">(*) Nombre Hogar:</label>
                                    <input class="form-control text-uppercase @error('nvivienda') is-invalid @enderror" type="text" name="nvivienda" value="{{ old('nvivienda') }}">
                                </div>
                                @error('nvivienda')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Usuario</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="name">Nombre Usuario:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" id="name">
                                </div>
                                @error('name')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="rol">Rol:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-male"></i></span>
                                    </div>
                                    <select class="form-control @error('rol') is-invalid @enderror" name="rol" id="rol">
                                        <option value="">Seleccione una opci&oacute;n</option>
                                        @foreach ($roles as $items)
                                            <option value="{{ $items->id }}" @selected(old('rol') == $items->id)>
                                                {{ $items->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('rol')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="password">Nueva Contraseña:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-key"></i> </span>
                                    </div>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                        onkeyup="validaClave()" title="Máximo 15 dígitos." />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-exclamation-circle" style="color:red;" data-placement="right"
                                                data-toggle="popover" title="Nueva contraseña"
                                                data-content="Ingrese una combinación de al menos seis (6) y hasta quince (15 ) dígitos que incluya números, letras mayúsculas y minúsculas  y/ o caracteres especiales.">
                                            </i>
                                        </span>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6 form-group">
                                <label for="confirm_password">Confirmar Contraseña:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-key"></i> </span>
                                    </div>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                                        name="password_confirmation" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-exclamation-circle" style="color:red;" data-placement="right"
                                                data-toggle="popover" title="Confirmar contraseña"
                                                data-content="Confirme su nueva contraseña.">
                                            </i>
                                        </span>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                    <span class="right badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div id="mensajeIogualdadPass" style="color: #dc3545; font-size:13px;"></div>
                                <div id="result"></div>
                            </div>
                            <br>
                        </div>

                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-sm btn-primary" id="setPass">Aceptar
                                </button>
                                <a href="{{ url('/usuario') }}" type="button"
                                    class="btn btn-sm btn-danger">Cancelar</a>
                            </div>
                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
@push('page_scripts')
    <script>
        console.log('prueba de script crear usuario')
        document.addEventListener('DOMContentLoaded', function() {
            // jquery code here
            $('.mask_tlf').inputmask("(9999) 999-99-99")
            $('.mask_rif').inputmask("99999999-9")


            $('.datepicker').datepicker({
                dateFormat: "dd-mm-yy",
                changeYear: true,
                buttonText: "Choose",
            });

            $('#estado_id').change(function() {
                $.ajax({
                    method: "POST",
                    url: "{{ url('/municipioAjaxUser') }}",
                    data: {
                        estado_id: $('#estado_id').val(),
                        '_token': $('input[name=_token]').val()
                    },
                    success: function(response) {
                        $('#municipio_id').html(response);
                        $("#parroquia_id").empty();
                        $('#parroquia_id').append(
                            '<option value="" selected>Seleccione una opción</option>');

                    },
                    beforeSend: function() {
                        $('#municipio_id').append(
                            '<option value="" selected>Buscando...</option>');
                    }
                });
            });

            $('#estado_id').change(function() {
                $.ajax({
                    method: "POST",
                    url: "{{ url('/ciudadAjaxUser') }}",
                    data: {
                        estado_id: $('#estado_id').val(),
                        '_token': $('input[name=_token]').val()
                    },
                    success: function(response) {
                        $('#ciudad_id').html(response);
                        /*$('#municipio_id').empty();
                        $('#municipio_id').append('<option value="" selected>Seleccione una opción</option>');*/
                    },
                    beforeSend: function() {
                        $('#ciudad_id').append(
                            '<option value="" selected>Buscando...</option>');
                    }
                });

            });

            $('#municipio_id').change(function() {
                $.ajax({
                    method: "POST",
                    url: "{{ url('/parroquiaAjaxUser') }}",
                    data: {
                        municipio_id: $('#municipio_id').val(),
                        '_token': $('input[name=_token]').val()
                    },
                    success: function(response) {
                        $('#parroquia_id').html(response);

                    },
                    beforeSend: function() {
                        $('#parroquia_id').append(
                            '<option value="" selected>Buscando...</option>');
                    }
                });

            });

        }, false);
    </script>
@endpush
