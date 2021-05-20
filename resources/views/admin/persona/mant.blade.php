<div id="divMensajeError{!! $entidad !!}"></div>
{!! Form::model($persona, $formData) !!}	
	{!! Form::hidden('listar', $listar, array('id' => 'listar')) !!}
	<div class="row">
		<div class="col-12 form-group">
			{!! Form::label('quetipoes', '¿Registrará una Persona(Empleado o Cliente comun) o Cliente como Empresa?', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
			<div class="row  form-group ml-2">
				<div class="form-check form-check-inline">
					{{Form::radio('quetipoes', 'Persona',  true , array("class"=>"form-check-input"))}}
					<label class="form-check-label" for="Persona">Persona</label>
				</div>
				<div class="form-check form-check-inline">
					{{Form::radio('quetipoes', 'Proveedor', false , array("class"=>"form-check-input"))}}
					<label class="form-check-label" for="Proveedor">Empresa</label>
				</div>
			</div>			
		</div>
	</div>
	<div id="divProveedor" class="d-none">
		<div class="row">
			<div class="col-md-6 col-lg-6">
				<div class="form-group pb-1">
					{!! Form::label('ruc', 'RUC *', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12 input-group pl-0">
							<div class="col-lg-10 col-sm-10 col-md-10 pr-0">
								{!! Form::text('ruc', null, array('class' => 'form-control input-xs', 'id' => 'ruc')) !!}
							</div>
							<div class="col-lg-2 col-sm-2 col-md-2 pl-2">
									{!! Form::button('<i class="fa fa-search "></i>', array('class' => 'btn btn-primary', 'title' => 'Buscar RUC' , 'id' => 'botonBuscarRuc')) !!}
							</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-6">
				<div class="form-group">
					{!! Form::label('razonsocial', 'Razón social *', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
						{!! Form::text('razonsocial', null, array('class' => 'form-control input-xs', 'id' => 'razonsocial')) !!}
					</div>
				</div>	
			</div>
		</div>
	</div>
	<div id="divPersona">
		<div class="row">
			<div class="form-group col-sm">
				{!! Form::label('apellidopaterno', 'Apellido Paterno:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::text('apellidopaterno', null, array('class' => 'form-control input-xs', 'id' => 'apellidopaterno', 'placeholder' => 'Apellido Paterno')) !!}
				</div>
			</div>
			<div class="form-group col-sm">
				{!! Form::label('apellidomaterno', 'Apellido Materno:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::text('apellidomaterno', null, array('class' => 'form-control input-xs', 'id' => 'apellidomaterno', 'placeholder' => 'Apellido Materno')) !!}
				</div>
			</div>
			<div class="form-group col-sm">
				{!! Form::label('nombres', 'Nombres:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::text('nombres', null, array('class' => 'form-control input-xs', 'id' => 'nombres', 'placeholder' => 'Nombres')) !!}
				</div>
			</div>		
		</div>
		<div class="row">		
			<div class="form-group col-sm">
				{!! Form::label('dni', 'DNI:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::text('dni', null, array('class' => 'form-control input-xs', 'id' => 'dni', 'placeholder' => 'Ingrese la descripción')) !!}
				</div>
			</div>
			<div class="form-group col-sm">
				{!! Form::label('area_id', 'Área:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::select('area_id', $cboAreas, null, array('class' => 'form-control input-xs', 'id' => 'area_id')) !!}
				</div>
			</div>
			<div class="form-group col-sm">
				{!! Form::label('cargo_id', 'Cargo:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::select('cargo_id', $cboCargos, null, array('class' => 'form-control input-xs', 'id' => 'cargo_id')) !!}
				</div>
			</div>					
		</div>
	</div>
	<div class="row">
		<div class="form-group col-sm-4">
			{!! Form::label('rol_id', 'Roles:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
			<select class="form-control select2 selectRol selectRolEditar" required id="rol_id"
                name="rol_id[]" multiple="multiple" data-placeholder="Seleccionar rol"
                style="width: 100%;">
                @foreach ($roles as $id => $nombre)
				<option value="{{$id}}"
					{{is_array(old('rol_id')) ? (in_array($id, old('rol_id')) ? 'selected' : '')  : (isset($persona) ? ($persona->roles->firstWhere('id', $id) ? 'selected' : '') : '')}}>
					{{$nombre}}</option>
				@endforeach
            </select>
		</div>
		<div class="form-group col-sm-8">
			{!! Form::label('direccion', 'Dirección:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
			<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::text('direccion', null, array('class' => 'form-control input-xs', 'id' => 'direccion', 'placeholder' => 'Ingrese la dirección')) !!}
			</div>
		</div>		
	</div>
	<div class="row">
		<div class="form-group col-sm">
			{!! Form::label('telefono', 'Telefono:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
			<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::text('telefono', null, array('class' => 'form-control input-xs', 'id' => 'telefono', 'placeholder' => 'Ingrese telefono')) !!}
			</div>
		</div>
		<div class="form-group col-sm">
			{!! Form::label('email', 'Email:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
			<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::email('email', null, array('class' => 'form-control input-xs', 'id' => 'email', 'placeholder' => 'Ingrese correo electrónico')) !!}
			</div>
		</div>
	</div>
	
    <div class="form-group">
		<div class="col-lg-12 col-md-12 col-sm-12 text-right">
			{!! Form::button('<i class="fa fa-check fa-lg"></i> '.$boton, array('class' => 'btn btn-success btn-sm', 'id' => 'btnGuardar', 'onclick' => 'guardar(\''.$entidad.'\', this)')) !!}
			{!! Form::button('<i class="fa fa-exclamation fa-lg"></i> Cancelar', array('class' => 'btn btn-warning btn-sm', 'id' => 'btnCancelar'.$entidad, 'onclick' => 'cerrarModal();')) !!}
		</div>
	</div>
{!! Form::close() !!}
<style>
	.select2-container--default .select2-selection--single {
			  border: 1px solid #ced4da;
			  padding: .46875rem .75rem;
			  height: calc(2.25rem + 2px);
	  }
</style>
<script type="text/javascript">
$(document).ready(function() {
	configurarAnchoModal('900');
	init(IDFORMMANTENIMIENTO+'{!! $entidad !!}', 'M', '{!! $entidad !!}');
	$('#rol_id').select2();
	$(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[id="dni"]').inputmask("99999999");
	$(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[id="ruc"]').inputmask("99999999999");

	$('#botonBuscarRuc').on('click', function(){
		buscarRUC();
	});
	function buscarRUC(){
		var reg = new RegExp('^[0-9]+$');
		if($(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[id="ruc"]').val() == ""){
			toastr.warning("Debe ingresar un RUC.", 'Error:');
		}else if(!reg.test($(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[id="ruc"]').val())){
			toastr.warning("El RUC ingresado es incorrecto.", 'Error:');
		}else{
			$.ajax({
				type: "POST",
				url: "persona/buscarRUC",
				data: "ruc="+$(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[id="ruc"]').val()+"&_token="+$(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[name="_token"]').val(),
				beforeSend(){
					Hotel.notificaciones("Consultando...", "SISCONT" , "info");
				},
				success: function(a) {
					datos=JSON.parse(a);
					if(datos.length == 0){
						Hotel.notificaciones("El RUC ingresado es incorrecto", "SISCONT" , "error");
					}else{
						$("#razonsocial").val(datos.RazonSocial);
						$("#direccion").val(datos.Direccion);
					}
				}
			});
		}
	}

	$("input[name=quetipoes]").change(function () {	
		var valor = $(this).val(); 
		verificarObservacion(valor);
	});

	function verificarObservacion(valor){
		console.log(valor);
		if(valor == 'Proveedor'){
			$('#divProveedor').removeClass('d-none');
			$('#divPersona').addClass('d-none');
		}else {
			$('#divProveedor').addClass('d-none');
			$('#divPersona').removeClass('d-none');
		}
	}

}); 
</script>