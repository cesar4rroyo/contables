@extends("theme.$theme.layout")
@section('content')
<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-uppercase">Bienvenido, {{session()->get('nombres') ?? 'Invitado'}} ({{session()->get('area')['descripcion'] ?? 'Admin'}})</div>
                <div class="card-body">
                    <div class="row">
                        
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection