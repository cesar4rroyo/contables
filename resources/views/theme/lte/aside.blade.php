{{-- {{dd($opciones)}} --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4 pt-2">
    <a href="{{route("dashboard")}}" class="brand-link">
        <img src="{{asset("assets/$theme/dist/img/admin.jpg")}}" alt="Hotel Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Lambayeque Tech.</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset("assets/$theme/dist/img/adminPic.png")}}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            @php
               $cargo = session()->all('personal')['personal']['cargo']['descripcion']; 
               $area = session()->all('personal')['personal']['area']['descripcion']; 
            @endphp
            <div class="info">
                <a href="#" class="d-block"> {{$cargo ?? 'Invitado' }} </a>
                <a href="#" class="d-block"> {{ $area ?? 'Invitado' }} </a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- <li class="nav-item">
                    <a href="#main" onclick="cargarRuta('{{URL::to('tramite')}}', 'container');" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li> --}}
                @foreach ($opciones as $key=>$item)
                @include("theme.lte.menu",["item"=>$item])
                @endforeach
            </ul>
        </nav>
    </div>
</aside>