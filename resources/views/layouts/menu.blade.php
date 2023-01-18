<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('personas.index') }}" class="nav-link"  {{ Request::is('persona') ? 'active' : '' }}>
                <i class="far fa-circle nav-icon"></i>
                <p>Personas</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('usuario.index') }}" class="nav-link" {{ Request::is('usuario') ? 'active' : '' }}>
                <i class="far fa-circle nav-icon"></i>
                <p>Usuarios</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../../index3.html" class="nav-link" {{ Request::is('home') ? 'active' : '' }}>
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-fw fa-box"></i>
        <p>
            Clap
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('personas.index') }}" class="nav-link" {{ Request::is('persona.index') ? 'active' : '' }}>
                <i class="far fa-circle nav-icon"></i>
                <p>Jefe de Hogar</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="pages/UI/icons.html" class="nav-link" {{ Request::is('home') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Carnet</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tools"></i>
        <p>
            Configuraci&oacute;n
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('usuario.index') }}" class="nav-link">
                <i class="far fa-user nav-icon"></i>
                <p>Usuarios</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Roles</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('permisos.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Permisos</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('personas.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Persona</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('usuario.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Usuarios</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="./index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
            </a>
        </li>
    </ul>
</li>
