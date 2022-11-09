@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">You are logged in! {{ time() }}<i class="fa-solid fa-cart-shopping"></i></h1>
    </div>
    <div class="container-fluid">
        {!! $prueba !!}
        @auth
            // The user is authenticated...
        @endauth
    </div>
@endsection
@push('page_scripts')
    <script>
        console.log('hola');

        var prueba = {!! $prueba !!};

        console.console.log(prueba);
    </script>
@endpush
