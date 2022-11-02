<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-fw fa-user"></i>
        <p>
            Clap
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('persona.index') }}" class="nav-link" {{ Request::is('persona.index') ? 'active' : '' }}>
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
        <i class="nav-icon fas fa-tree"></i>
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
            <a href="pages/UI/ribbons.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ribbons</p>
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
            <a href="{{ route('persona.index') }}" class="nav-link">
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
