<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    @vite(['resources/css/app.css', 'resources/css/login.css'])
    @vite(['resources/js/app.js'])

    @stack('third_party_stylesheets')

    @stack('page_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Header -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top sidebarper">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('storage/img/logo_consejo_comunal.png') }}" class="user-image img-circle elevation-2"
                            alt="User Image">
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            {{-- asset('storage/file.txt'); --}}
                            <img src="{{ asset('storage/img/logo_consejo_comunal.png') }}" class="img-circle elevation-2" alt="User Image">
                            <p>
                                {{ Auth::user()->name }}
                                <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Perfil</a>
                            <a href="#" class="btn btn-default btn-flat float-right"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-in-alt nav-icon purple-text"></i> Salir
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper mt-5 mb-5">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <ol class="breadcrumb float-sm-right">
                                @foreach ($breadcrumb as $items)
                                    <li class="breadcrumb-item"><a href="{{ $items['link'] }}">{{ $items['name'] }}</a>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        <!-- Main Footer -->
        <footer class="main-footer fixed-bottom">
            @include('layouts.parciales.footer')
        </footer>

        <aside class="control-sidebar control-sidebar-dark" style="display: block;">

            <div class="p-3 control-sidebar-content" style="">
                <h5>Informaci&oacute;n</h5>
                
            </div>
        </aside>
    </div>


    @stack('third_party_scripts')

    @stack('page_scripts')

    @yield('script')

</body>

</html>
