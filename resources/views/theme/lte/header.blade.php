<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#main" onclick="cargarRuta('{{URL::to('tramite')}}', 'container');" class="nav-link">Inicio</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
            @php
                $cargo = session()->all('personal')['personal']['cargo']['descripcion'];
                $area = session()->all('personal')['personal']['area']['descripcion'];
            @endphp
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header disabled">Usuario: {{session()->get('usuario') ?? 'Invitado'}} </span>
                <div class="dropdown-divider"></div>
                <div class="dropdown-divider"></div>
                <a onclick="cargarRuta('{{URL::to('persona/perfil')}}', 'container');" class="dropdown-item dropdown-footer">Cambiar contraseña</a>
                <a href="{{route('logout')}}" class="dropdown-item dropdown-footer bg-danger">Salir</a>
            </div>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>