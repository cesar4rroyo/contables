<div id="divMensajeError{!! $entidad !!}"></div>
{!! Form::model($venta, $formData) !!}	
	{!! Form::hidden('listar', $listar, array('id' => 'listar')) !!}
	{!! Form::hidden('listarProductos', null, array('id' => 'listarProductos')) !!}
	@switch($tipo)
		@case('enviar')
			<input type="hidden" name="tipo" value="enviar">
			<div class="row">
				<div class="col-sm form-group">
					{!! Form::label('fecharegistro', 'Fecha de Registro*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
						{!! Form::date('fecharegistro', ($venta) ? date_create($venta->fecharegistro) : date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fecharegistro', 'readonly'=>'true')) !!}
					</div>
				</div>
				<div class="col-sm form-group">
					{!! Form::label('fechaenvio', 'Fecha de Envio*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
						{!! Form::date('fechaenvio', date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fechaenvio')) !!}
					</div>
				</div>
				<div class="col-sm form-group">
					{!! Form::label('numero', 'Registro Venta Número*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label', 'id'=>'lblnrodocumento')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
						{!! Form::text('numero', ($venta) ? $venta->numero : null, array('class' => 'form-control  input-xs', 'id' => 'numero', 'readonly'=>'true')) !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="px-3">
					<table class="table table-bordered table-sm px-2 table-striped " id ="tableproductos">
						<legend>Detalle de la venta</legend>
						<thead>
							<tr>
								{{-- <th>CODIGO</th> --}}
								<th>PRODUCTO</th>
								<th>PRECIO UNITARIO</th>
								<th>CANTIDAD</th>
								<th>PENDIENTE</th>
								<th>DESCUENTO(%)</th>
								<th>SUBTOTAL</th>
								<th>QUITAR</th>
							</tr>
						</thead>	
						<tbody>
			
						</tbody>
					</table>
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('total', 'Total ', array('class' => 'control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::text('total', ($venta) ? $venta->total : null,array('class' => 'form-control form-control-sm input-xs', 'id' => 'total',  'autocomplete' =>'off', 'readonly'=>'true')) !!}
				</div>
			</div>
			<p class=" font-weight-bold">Datos del Comprobante</p>
			<div class="row">
				<div class="col-sm form-group">
					{!! Form::label('comprobante', 'Factura Nro.*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label', 'id'=>'lblnrodocumento')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
						{!! Form::text('comprobante', null, array('class' => 'form-control  input-xs', 'id' => 'comprobante', 'readonly'=>'true')) !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm">
					{!! Form::label('observacion', 'Observación ', array('class' => 'control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::textarea('observacion', null,array('class' => 'form-control form-control-sm input-xs', 'id' => 'observacion', "rows"=>2 , "style"=>"resize:none;")) !!}
					</div>
				</div>
				<div class="col-sm form-group">
					{!! Form::label('estadoenvio', 'Estado ', array('class' => 'control-label')) !!}
					<select name="estadoenvio" id="estadoenvio" class="form-control">
						<option value="">Seleccione</option>
						<option value="CONFORME">Autorizar Envio</option>
						<option value="ERROR">Error</option>
					</select>
				</div>
			</div>
			
			@break
		@case('pago')
		<input type="hidden" name="tipo" value="pago">
		<div class="row">
			<div class="col-sm form-group">
				{!! Form::label('fecharegistro', 'Fecha de Registro*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::date('fecharegistro', ($venta) ? date_create($venta->fecharegistro) : date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fecharegistro', 'readonly'=>'true')) !!}
				</div>
			</div>
			<div class="col-sm form-group">
				{!! Form::label('fechaenvio', 'Fecha de Envio*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::date('fechaenvio', date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fechaenvio')) !!}
				</div>
			</div>
			<div class="col-sm form-group">
				{!! Form::label('numero', 'Registro Venta Número*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label', 'id'=>'lblnrodocumento')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::text('numero', ($venta) ? $venta->numero : null, array('class' => 'form-control  input-xs', 'id' => 'numero', 'readonly'=>'true')) !!}
				</div>
			</div>
		</div>
		<p class="font-weight-bold">Documentacion de Pagos</p>
		<hr>
		<div class="row">
			<div class="col-sm form-group">
				{!! Form::label('fechapago', 'Fecha de Pago*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::date('fechapago', ($venta) ? date_create($venta->fechapago) : date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fechapago')) !!}
				</div>
			</div>
			<div class="col-sm form-group">
				{!! Form::label('facturafile', 'Voucher de Pago', array('class' => 'control-label')) !!}
				<div class="col-sm-12 col-md-12 col-lg-12">
					<input type="file" id="facturafile" class="form-control form-control-sm input-xs">
				</div>
			</div>
			<div class="form-group col-sm">
				{!! Form::label('deposito', 'Nro. de Operación*', array('class' => 'control-label')) !!}
						<div class="col-lg-12 col-md-12 col-sm-12">
							{!! Form::text('deposito', null,array('class' => 'form-control form-control-sm input-xs', 'id' => 'deposito',  'autocomplete' =>'off')) !!}
						</div>
			</div>
			<div class="form-group col-sm">
				{!! Form::label('total', 'Total', array('class' => 'control-label')) !!}
						<div class="col-lg-12 col-md-12 col-sm-12">
							{!! Form::text('total', ($venta) ? $venta->total : null,array('class' => 'form-control form-control-sm input-xs', 'id' => 'total',  'autocomplete' =>'off', 'readonly'=>'false')) !!}
						</div>
			</div>

		</div>
		<p class=" font-weight-bold">Detalles de Factura</p>
		<div class="form-group">
			<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::text('factura', ($venta) ? $venta->comprobante->numero : null,array('class' => 'form-control form-control-sm input-xs', 'id' => 'factura',  'autocomplete' =>'off', 'readonly'=>'false')) !!}
			</div>
		</div>
		<div class="row">
			<div class="px-3">
				<table class="table table-bordered table-sm px-2 table-striped " id ="tableproductos">
					<legend>Detalle de la venta</legend>
					<thead>
						<tr>
							{{-- <th>CODIGO</th> --}}
							<th>PRODUCTO</th>
							<th>PRECIO UNITARIO</th>
							<th>CANTIDAD</th>
							<th>PENDIENTE</th>
							<th>DESCUENTO(%)</th>
							<th>SUBTOTAL</th>
							<th>QUITAR</th>
						</tr>
					</thead>	
					<tbody>
		
					</tbody>
				</table>
			</div>
		</div>
		
			@break
		@case(null)
		<div class="row">
			<div class="col-sm form-group">
				{!! Form::label('fecharegistro', 'Fecha de Solicitud*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::date('fecharegistro', ($venta) ? date_create($venta->fecharegistro) : date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fecharegistro')) !!}
				</div>
			</div>
			<div class="col-sm form-group">
				{!! Form::label('numero', 'Registro Venta Número*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label', 'id'=>'lblnrodocumento')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::text('numero', null, array('class' => 'form-control  input-xs', 'id' => 'numero', 'readonly'=>'true')) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-sm">
				{!! Form::label('cliente', 'Cliente*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label', 'id'=>'lblnrodocumento')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::select('cliente', $cbocliente, null, array('class' => 'form-control  input-xs', 'id' => 'cliente')) !!}
				</div>
			</div>
			<div class="form-group col-sm">
				{!! Form::label('asesoria', 'Asesoría', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label', 'id'=>'lblnrodocumento')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::select('asesoria', $cboAsesoria, null, array('class' => 'form-control  input-xs', 'id' => 'asesoria')) !!}
				</div>
			</div>
		</div>
		<div class="row">
				<div class="px-3">
					<table class="table table-bordered table-sm px-2 table-striped " id ="tableproductos">
						<legend>Detalle de la venta</legend>
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
								<th>PENDIENTE</th>
								<th>DESCUENTO(%)</th>
								<th>SUBTOTAL</th>
								<th>QUITAR</th>
							</tr>
						</thead>	
						<tbody>
			
						</tbody>
					</table>
				</div>
		</div>
		<div class="form-group">
			<div class="form-group col-sm">
				{!! Form::label('motivo', 'Motivo Descuento', array('class' => 'control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::textarea('motivo', null,array('class' => 'form-control form-control-sm input-xs', 'id' => 'motivo', "rows"=>2 , "style"=>"resize:none;")) !!}
				</div>
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
	
	factura();
	$('#areafin_id').select2();
	$("select[name=productos_id]").change(function(){
		var idarea = $(this).val();
		if(idarea == "" || !idarea) {
			return false;
		}
		$.ajax({
			type: "POST",
			url: "{{route('venta.getProducto')}}",
			data: "_token="+$(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[name="_token"]').val()+'&id='+idarea,
			success: function(a) {
				console.log(a);
				var nombre = $('select[name=productos_id] option:selected').text();
				var precio = a.precio;
				var plazo = prompt("Ingrese la cantidad: (Max. " + a.cantidad + ')');
				var pendiente = 0;
				if(plazo>a.cantidad){
					pendiente=plazo-a.cantidad;
					plazo=a.cantidad;
				}
				var desc = prompt('Ingrese el descuento(opcional):');
				if(!isNaN(plazo) && plazo != null && plazo != ""){
					seleccionarArea(idarea , nombre , plazo, precio, desc, pendiente);
				}else{
					toastr.error('Debe ingresar un numero');
				}
			},
			error: function(e){
				console.log(e.message);
			}
		});
        
    });

	$('#cliente').on('change', function(){
		var value = $(this).val();
		asesoriaSelect(value);
		console.log('ra');
	});
}); 
var carro_areas = new Array();
	function seleccionarArea(idarea , nombre, plazo, precio, descuento=0, pendiente=0){
		var subtotal=0;
		var parcial = plazo*precio;
		subtotal=parcial.toFixed(2);
		console.log(descuento);
		if(descuento!=='0'){
			preciodescontado=parcial*descuento/100;
			console.log(preciodescontado);
			subtotal = parcial-preciodescontado;
			console.log(subtotal);
		}
		console.log(subtotal + '-sssss');
		var detalle = `<tr id="tr${idarea}">
							<td width ="45%">${nombre}</td>
							<td width ="8%"><input value="${precio}" type="number" style="width:80px;" id="precio${idarea}" name="precio${idarea}"></td>
							<td width ="8%"><input value="${plazo}" type="number" style="width:80px;" id="plazo${idarea}" name="plazo${idarea}"></td>
							<td width ="10%"><input value="${pendiente}" type="number" style="width:80px;" id="pendiente${idarea}" name="pendiente${idarea}"></td>
							<td width ="8%"><input value="${descuento}" type="number" style="width:80px;" id="descuento${idarea}" name="descuento${idarea}"></td>
							<td width ="16%"><input readonly="true" value="${subtotal}" type="number" style="width:80px;" id="subtotal${idarea}" name="subtotal${idarea}"></td>
							<td width ="5%"><a href='#' onclick="quitarDetalle('${idarea}');"><i class='fa fa-minus-circle ' title='Quitar' width='20px' height='20px'></i></td>
						</tr>`;
		
		var area = {"idarea" : idarea, "plazo" : plazo, "precio":precio, "descuento":descuento};
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

	function generarNumero(){
		$.ajax({
			type: "POST",
			url: "{{route('venta.generarnumero')}}",
			data: "_token="+$(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[name="_token"]').val(),
			success: function(a) {
				$(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[name="numero"]').val(a);
			}
		});
	}
	function factura(){
		$.ajax({
			type: "POST",
			url: "{{route('venta.generarfacturas')}}",
			data: "_token="+$(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[name="_token"]').val(),
			success: function(a) {
				$(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[name="comprobante"]').val(a);
			}
		});
	}
	function asesoriaSelect(tipo){
		$('#asesoria').select2({
			ajax: {
				delay: 250,
				url: '{{route('asesoria.listarAsesoria')}}',
				data: function (params) {
					var query = {
						search: params.term,
						tipo: tipo,
					}
					return query;
				},
				placeholder: 'Seleccione asesoria..',
				minimumInputLength: 1,
				processResults: function (res) {
					var datos = JSON.parse(res);
					return {
						results: datos.results
					};
				}
			}
		});
} 
</script>

@if(!is_null($venta))
	@foreach ($venta->detalleventa as $detalle)
		<script>
			seleccionarArea('{{$detalle->id}}' , '{{$detalle->producto->descripcion}}' , '{{$detalle->cantidad}}', '{{$detalle->producto->preciounitario}}', '{{$detalle->descuento}}');
		</script>		
	@endforeach
@endif

@if ($tipo==null) 
<script>
		generarNumero();
</script>
@endif