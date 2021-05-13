<!-- Content Header (Page header) -->
<div class="container" id="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tipos de Usuario</div>
                
                <div class="card-body">
                    <div class="row">
                        {!! Form::open(['route' => $ruta["search"], 'method' => 'POST' ,'onsubmit' => 'return false;', 'class' => 'w-100 d-md-flex d-lg-flex d-sm-inline-block mt-3', 'role' => 'form', 'autocomplete' => 'off', 'id' => 'formBusqueda'.$entidad]) !!}
                        {!! Form::hidden('page', 1, array('id' => 'page')) !!}
                        {!! Form::hidden('accion', 'listar', array('id' => 'accion')) !!}
                        
                        <div class="col-lg-4 col-md-4  form-group">
                            {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::text('descripcion', '', array('class' => 'form-control ', 'id' => 'descripcion')) !!}
                        </div>						
                        <div class="col-lg-2 col-md-2  form-group" style="min-width: 150px;">
                            {!! Form::label('nombre', 'Filas a mostrar') !!}
                            {!! Form::selectRange('filas', 1, 30, 10, array('class' => 'form-control input-xs', 'onchange' => 'buscar(\''.$entidad.'\')')) !!}
                        </div>
                        {!! Form::close() !!}
                      </div>
                   
                      <div class="row mt-2" >
						<div class="col-md-12">
						  <div class="card">
							<div class="card-header">
							  <div class="card-tools">
								{!! Form::button(' <i class="fa fa-plus fa-fw"></i> Agregar', array('class' => 'btn  btn-outline-primary', 'id' => 'btnNuevo', 'onclick' => 'modal (\''.URL::route($ruta["create"], array('listar'=>'SI')).'\', \''.$titulo_registrar.'\', this);')) !!}
							</div>
							</div>
							<!-- /.card-header -->
							<div class="card-body table-responsive px-3">
								<div id="listado{{ $entidad }}">
								</div>
							</div>
							<!-- /.card-body -->
						  </div>
						  <!-- /.card -->
						</div>
					  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
		buscar('{{ $entidad }}');
		init(IDFORMBUSQUEDA+'{{ $entidad }}', 'B', '{{ $entidad }}');
		$(IDFORMBUSQUEDA + '{{ $entidad }} :input[id="descripcion"]').keyup(function (e) {
			var key = window.event ? e.keyCode : e.which;
			if (key == '13') {
				buscar('{{ $entidad }}');
			}
		});
	});
</script>
{{--  --}}