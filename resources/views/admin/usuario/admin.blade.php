<!-- Content Header (Page header) -->
<div class="container" id="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Usuarios</div>
                
                <div class="card-body">
                    <div class="row">
                        {!! Form::open(['route' => $ruta["search"], 'method' => 'POST' ,'onsubmit' => 'return false;', 'class' => 'w-100 d-md-flex d-lg-flex d-sm-inline-block mt-3', 'role' => 'form', 'autocomplete' => 'off', 'id' => 'formBusqueda'.$entidad]) !!}
                        {!! Form::hidden('page', 1, array('id' => 'page')) !!}
                        {!! Form::hidden('accion', 'listar', array('id' => 'accion')) !!}
						<div class="row w-100 d-flex">
                        <div class="col-lg-4 col-md-4  form-group">
                            {!! Form::label('usuario', 'Nombre del Usuario:') !!}
                            {!! Form::text('usuario', '', array('class' => 'form-control ', 'id' => 'usuario')) !!}
                        </div>
						<div class="col-lg-4 col-md-4  form-group">
							{!! Form::label('nombre', 'Nombre:') !!}
							{!! Form::text('nombre', '', array('class' => 'form-control input-xs', 'id' => 'nombre')) !!}
						</div>
						<div class="col-lg-4 col-md-4  form-group">
							{!! Form::label('tipousuario', 'Tipos de Usuarios:') !!}
							{!! Form::select('tipousuario', $cboTiposUsuario, null, array('class' => 'form-control input-xs', 'id' => 'tipousuario')) !!}
						</div>
						<div class="col-lg-4 col-md-4  form-group">
							{!! Form::label('area_id', 'Area:') !!}
							{!! Form::select('area_id', $cboAreas, null, array('class' => 'form-control input-xs', 'id' => 'area_id')) !!}
						</div>
						<div class="col-lg-4 col-md-4  form-group">
							{!! Form::label('cargo_id', 'Cargo:') !!}
							{!! Form::select('cargo_id', $cboCargos, null, array('class' => 'form-control input-xs', 'id' => 'cargo_id')) !!}
						</div>
                        <div class="col-lg-2 col-md-2  form-group" style="min-width: 150px;">
                            {!! Form::label('nombre', 'Filas a mostrar') !!}
                            {!! Form::selectRange('filas', 1, 30, 10, array('class' => 'form-control input-xs', 'onchange' => 'buscar(\''.$entidad.'\')')) !!}
                        </div>
                        {!! Form::close() !!}
                      </div>
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
		$(IDFORMBUSQUEDA + '{{ $entidad }} :input[id="usuario"]').keyup(function (e) {
			var key = window.event ? e.keyCode : e.which;
			if (key == '13') {
				buscar('{{ $entidad }}');
			}
		});
		$(IDFORMBUSQUEDA + '{{ $entidad }} :input[id="nombre"]').keyup(function (e) {
			var key = window.event ? e.keyCode : e.which;
			if (key == '13') {
				buscar('{{ $entidad }}');
			}
		});
		$(IDFORMBUSQUEDA + '{{ $entidad }} :input[id="tipousuario"]').change(function (e) {
			buscar('{{ $entidad }}');
		});
		$(IDFORMBUSQUEDA + '{{ $entidad }} :input[id="cargo_id"]').change(function (e) {
			buscar('{{ $entidad }}');
		});
		$(IDFORMBUSQUEDA + '{{ $entidad }} :input[id="area_id"]').change(function (e) {
			buscar('{{ $entidad }}');
		});
	});
</script>
{{--  --}}