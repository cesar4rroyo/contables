<div id="divMensajeError{!! $entidad !!}"></div>
{!! Form::model($asesoria, $formData) !!}	
	{!! Form::hidden('listar', $listar, array('id' => 'listar')) !!}
	{!! Form::hidden('listarProductos', null, array('id' => 'listarProductos')) !!}
	<div class="form-group">
		<div class="col-12 form-group">
			{!! Form::label('fecha', 'Fecha de Asesoria*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
			<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::date('fecha', date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fecha')) !!}
			</div>
		</div>
	</div>
	<div class="row">
		@if ($asesoria)
		<div class="form-group col-sm">
			{!! Form::label('cliente', 'Cliente*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label', 'id'=>'lblnrodocumento')) !!}
			<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::select('cliente', $cboClientes, $asesoria->cliente->id, array('class' => 'form-control  input-xs', 'id' => 'cliente')) !!}
			</div>
		</div>
		@else
		<div class="form-group col-sm">
			{!! Form::label('cliente', 'Cliente*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label', 'id'=>'lblnrodocumento')) !!}
			<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::select('cliente', $cboClientes, null, array('class' => 'form-control  input-xs', 'id' => 'cliente')) !!}
			</div>
		</div>
		@endif
		<div class="form-group col-sm">
			{!! Form::label('credito', 'Límite de Crédito*', array('class' => 'control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::text('credito', null,array('class' => 'form-control form-control-sm input-xs', 'id' => 'credito',  'autocomplete' =>'off')) !!}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="px-3">
			<table class="table table-bordered table-sm px-2 table-striped " id ="tableproductos">
				<legend>Productos sugeridos</legend>
				<div class="form-group">
					<div class="col-lg-12 col-md-12 col-sm-12">
						{!! Form::select('productos_id', $productos , '', array('class' => 'form-control input-xs', 'id' => 'productos_id')) !!}
					</div>
				</div>
				<thead>
					<tr>
						{{-- <th>CODIGO</th> --}}
						<th>PRODUCTO</th>
						<th>QUITAR</th>
					</tr>
				</thead>	
				<tbody>
	
				</tbody>
			</table>
		</div>
	</div>
    <div class="form-group">
		<div class="col-lg-12 col-md-12 col-sm-12 text-right">
			{!! Form::button('<i class="fa fa-check fa-lg"></i> '.$boton, array('class' => 'btn btn-success btn-sm', 'id' => 'btnGuardar',  'onclick' => '$(\'#listarProductos\').val(JSON.stringify(carro_areas)); guardarTramite(\''.$entidad.'\', this);')) !!}
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
	configurarAnchoModal('700');
	init(IDFORMMANTENIMIENTO+'{!! $entidad !!}', 'M', '{!! $entidad !!}');
	$('#productos_id').select2();
	//$('#areafin_id').select2();
	$("select[name=productos_id]").change(function(){
		var idarea = $(this).val();
		if(idarea == "" || !idarea) {
			return false;
		}
        var nombre = $('select[name=productos_id] option:selected').text();
		var plazo = prompt("Confirmar pedido:");
		if(!isNaN(plazo) && plazo != null && plazo != ""){
			seleccionarArea(idarea , nombre , plazo);
  		}else{
			  toastr.error('Debe ingresar un numero');
		  }
    });
}); 
var carro_areas = new Array();
	function seleccionarArea(idarea , nombre, plazo){
		var detalle = `<tr id="tr${idarea}">
							<td width ="80%">${nombre}</td>
							<td width ="15%" style="display:none;"><input value="${plazo}" type="number" style="width:80px" id="plazo${idarea}" name="plazo${idarea}"></td>
							<td width ="5%"><a href='#' onclick="quitarDetalle('${idarea}');"><i class='fa fa-minus-circle ' title='Quitar' width='20px' height='20px'></i></td>
						</tr>`;
		
		var area = {"idarea" : idarea, "plazo" : plazo};
		carro_areas.push(area);
		$("#tableproductos").append(detalle);
	}
	function quitarDetalle(idarea){
		$("#tr"+idarea).remove();
		
		for(c=0; c < carro_areas.length; c++){
            if(carro_areas[c]["idarea"] == idarea) {
                carro_areas.splice(c,1);
            }
        }
	}
	function guardarTramite(entidad , boton){
		if(carro_areas.length < 1){
			toastr.warning("Debes indicar al menos un producto" , "");
		}else{
			guardar(entidad, boton);
		}
	}


	
</script>

@if(!is_null($asesoria))
	@foreach ($asesoria->detalleasesoria as $detalle)
		<script>
			seleccionarArea('{{$detalle->id}}' , '{{$detalle->producto->descripcion}}' , '{{$detalle->cantidad}}', '{{$detalle->preciocompra}}');
		</script>		
	@endforeach
@endif