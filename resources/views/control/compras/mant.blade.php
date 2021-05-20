<div id="divMensajeError{!! $entidad !!}"></div>
{!! Form::model($compra, $formData) !!}	
	{!! Form::hidden('listar', $listar, array('id' => 'listar')) !!}
	{!! Form::hidden('listarProductos', null, array('id' => 'listarProductos')) !!}
	@switch($tipo)
		@case('recepcionar')
			<input type="hidden" name="tipo" value="recepcionar">
			<div class="row">
				<div class="col-4 form-group">
					{!! Form::label('fechasolicitud', 'Fecha de Solicitud*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
						{!! Form::date('fechasolicitud', ($compra) ? date_create($compra->fechasolicitud) : date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fechasolicitud', 'readonly'=>'true')) !!}
					</div>
				</div>
				<div class="col-4 form-group">
					{!! Form::label('fechaesperada', 'Fecha Posible de Llegada*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
						{!! Form::date('fechaesperada', ($compra) ? date_create($compra->fechaesperada) : null, array('class' => 'form-control  input-xs', 'id' => 'fechaesperada', 'readonly'=>'true')) !!}
					</div>
				</div>
				<div class="col-4 form-group">
					{!! Form::label('fechaesperada', 'Fecha de Recepcion*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
						{!! Form::date('fechaesperada', date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fechaesperada')) !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="px-3">
					<table class="table table-bordered table-sm px-2 table-striped " id ="tableproductos">
						<legend>Detalle de la compra</legend>
						<thead>
							<tr>
								{{-- <th>CODIGO</th> --}}
								<th>PRODUCTO</th>
								<th>PRECIO UNITARIO</th>
								<th>CANTIDAD</th>
								<th>QUITAR</th>
							</tr>
						</thead>	
						<tbody>
			
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm">
					{!! Form::label('observacion', 'Observación ', array('class' => 'control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::textarea('observacion', null,array('class' => 'form-control form-control-sm input-xs', 'id' => 'observacion', "rows"=>5 , "style"=>"resize:none;")) !!}
					</div>
				</div>
				<div class="col-sm form-group">
					{!! Form::label('estadoenvio', 'Estado ', array('class' => 'control-label')) !!}
					<select name="estadoenvio" id="estadoenvio" class="form-control">
						<option value="">Seleccione</option>
						<option value="CONFORME">Conforme</option>
						<option value="FALTA">Faltan productos</option>
						<option value="DANO">Productos dañados</option>
					</select>
				</div>
			</div>
			
			</div>
			@break
		@case('pagar')
		<input type="hidden" name="tipo" value="pagar">
		<div class="row">
			<div class="col-4 form-group">
				{!! Form::label('fechasolicitud', 'Fecha de Solicitud*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::date('fechasolicitud', ($compra) ? date_create($compra->fechasolicitud) : date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fechasolicitud', 'readonly'=>'true')) !!}
				</div>
			</div>
			<div class="col-4 form-group">
				{!! Form::label('fechaesperada', 'Fecha Posible de Llegada*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::date('fechaesperada', ($compra) ? date_create($compra->fechaesperada) : null, array('class' => 'form-control  input-xs', 'id' => 'fechaesperada', 'readonly'=>'true')) !!}
				</div>
			</div>
			<div class="col-4 form-group">
				{!! Form::label('fechaentrega', 'Fecha de Recepcion*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::date('fechaentrega', date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fechaentrega', 'readonly'=>'true')) !!}
				</div>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('factura', 'Factura Nro. *', array('class' => 'control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
						{!! Form::text('factura', null,array('class' => 'form-control form-control-sm input-xs', 'id' => 'factura',  'autocomplete' =>'off')) !!}
					</div>
		</div>
		<div class="row">
			<div class="px-3">
				<table class="table table-bordered table-sm px-2 table-striped " id ="tableproductos">
					<legend>Detalle de la compra</legend>
					<thead>
						<tr>
							{{-- <th>CODIGO</th> --}}
							<th>PRODUCTO</th>
							<th>PRECIO UNITARIO</th>
							<th>CANTIDAD</th>
							<th>QUITAR</th>
						</tr>
					</thead>	
					<tbody>
		
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-sm">
				{!! Form::label('observacion', 'Observación ', array('class' => 'control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::textarea('observacion', null,array('class' => 'form-control form-control-sm input-xs', 'id' => 'observacion', "rows"=>5 , "style"=>"resize:none;")) !!}
				</div>
			</div>
			<div class="col-sm form-group">
				{!! Form::label('estadoenvio', 'Estado ', array('class' => 'control-label')) !!}
				<select name="estadoenvio" id="estadoenvio" class="form-control">
					<option value="">Seleccione</option>
					<option value="CONFORME">Conforme</option>
					<option value="ERROR">Error de factura</option>
				</select>
			</div>
		</div>
		
			@break
		@case(null)
		<div class="row">
			<div class="col-4 form-group">
				{!! Form::label('fechasolicitud', 'Fecha de Solicitud*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::date('fechasolicitud', ($compra) ? date_create($compra->fechasolicitud) : date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fechasolicitud')) !!}
				</div>
			</div>
			<div class="col-4 form-group">
				{!! Form::label('fechaesperada', 'Fecha Posible de Llegada*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::date('fechaesperada', ($compra) ? date_create($compra->fechaesperada) : null, array('class' => 'form-control  input-xs', 'id' => 'fechaesperada')) !!}
				</div>
			</div>
			<div class="col-4 form-group">
				{!! Form::label('numero', 'Pedido de Compra Número*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label', 'id'=>'lblnrodocumento')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::text('numero', null, array('class' => 'form-control  input-xs', 'id' => 'numero')) !!}
				</div>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('proveedor', 'Proveedor*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label', 'id'=>'lblnrodocumento')) !!}
			<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::select('proveedor', $cboProveedor, null, array('class' => 'form-control  input-xs', 'id' => 'proveedor')) !!}
			</div>
		</div>
		<div class="row">
				<div class="px-3">
					<table class="table table-bordered table-sm px-2 table-striped " id ="tableproductos">
						<legend>Detalle de la compra</legend>
						<div class="form-group">
							<div class="col-lg-12 col-md-12 col-sm-12">
								{!! Form::select('productos_id', $productos , '', array('class' => 'form-control input-xs', 'id' => 'productos_id')) !!}
							</div>
						</div>
						<thead>
							<tr>
								{{-- <th>CODIGO</th> --}}
								<th>PRODUCTO</th>
								<th>PRECIO UNITARIO</th>
								<th>CANTIDAD</th>
								<th>QUITAR</th>
							</tr>
						</thead>	
						<tbody>
			
						</tbody>
					</table>
				</div>
		</div>
	@endswitch
	
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
	configurarAnchoModal('900');
	init(IDFORMMANTENIMIENTO+'{!! $entidad !!}', 'M', '{!! $entidad !!}');
	$('#productos_id').select2();
	$('#areafin_id').select2();
	$("select[name=productos_id]").change(function(){
		var idarea = $(this).val();
		if(idarea == "" || !idarea) {
			return false;
		}
        var nombre = $('select[name=productos_id] option:selected').text();
		var precio = prompt("Ingrese el precio de compra unitario:");
		var plazo = prompt("Ingrese la cantidad:");
		if(!isNaN(plazo) && plazo != null && plazo != ""){
			seleccionarArea(idarea , nombre , plazo, precio);
  		}else{
			  toastr.error('Debe ingresar un numero');
		  }
    });
}); 
var carro_areas = new Array();
	function seleccionarArea(idarea , nombre, plazo, precio){
		var detalle = `<tr id="tr${idarea}">
							<td width ="70%">${nombre}</td>
							<td width ="10%"><input value="${precio}" type="number" style="width:80px;" id="precio${idarea}" name="precio${idarea}"></td>
							<td width ="15%"><input value="${plazo}" type="number" style="width:80px;" id="plazo${idarea}" name="plazo${idarea}"></td>
							<td width ="5%"><a href='#' onclick="quitarDetalle('${idarea}');"><i class='fa fa-minus-circle ' title='Quitar' width='20px' height='20px'></i></td>
						</tr>`;
		
		var area = {"idarea" : idarea, "plazo" : plazo, "precio":precio};
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
			toastr.warning("Debes indicar al menos un prodcuto" , "");
		}else{
			guardar(entidad, boton);
		}
	}
</script>

@if(!is_null($compra))
	@foreach ($compra->detallecompra as $detalle)
		<script>
			seleccionarArea('{{$detalle->id}}' , '{{$detalle->producto->descripcion}}' , '{{$detalle->cantidad}}', '{{$detalle->preciocompra}}');
		</script>		
	@endforeach
@endif