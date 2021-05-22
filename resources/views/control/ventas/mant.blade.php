<div id="divMensajeError{!! $entidad !!}"></div>
{!! Form::model($venta, $formData) !!}	
	{!! Form::hidden('listar', $listar, array('id' => 'listar')) !!}
	{!! Form::hidden('listarProductos', null, array('id' => 'listarProductos')) !!}
	@switch($tipo)
		@case('recepcionar')
			<input type="hidden" name="tipo" value="recepcionar">
			<div class="row">
				<div class="col-4 form-group">
					{!! Form::label('fechasolicitud', 'Fecha de Solicitud*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
						{!! Form::date('fechasolicitud', ($venta) ? date_create($venta->fechasolicitud) : date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fechasolicitud', 'readonly'=>'true')) !!}
					</div>
				</div>
				<div class="col-4 form-group">
					{!! Form::label('fechaesperada', 'Fecha Posible de Llegada*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
						{!! Form::date('fechaesperada', ($venta) ? date_create($venta->fechaesperada) : null, array('class' => 'form-control  input-xs', 'id' => 'fechaesperada', 'readonly'=>'true')) !!}
					</div>
				</div>
				<div class="col-4 form-group">
					{!! Form::label('fechaentrega', 'Fecha de Recepcion*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
						{!! Form::date('fechaentrega', date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fechaentrega')) !!}
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
					{!! Form::date('fechasolicitud', ($venta) ? date_create($venta->fechasolicitud) : date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fechasolicitud', 'readonly'=>'true')) !!}
				</div>
			</div>
			<div class="col-4 form-group">
				{!! Form::label('fechaessperada', 'Fecha Posible de Llegada*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::date('fechaesperada', ($venta) ? date_create($venta->fechaesperada) : null, array('class' => 'form-control  input-xs', 'id' => 'fechaesperada', 'readonly'=>'true')) !!}
				</div>
			</div>
			<div class="col-4 form-group">
				{!! Form::label('fechaentrega', 'Fecha de Recepcion*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::date('fechaentrega', date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fechaentrega', 'readonly'=>'true')) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm form-group">
				{!! Form::label('facturafile', 'Digitalizar Factura', array('class' => 'control-label')) !!}
				<div class="col-sm-12 col-md-12 col-lg-12">
					<input type="file" id="facturafile" class="form-control form-control-sm input-xs">
				</div>
			</div>
			<div class="form-group col-sm">
				{!! Form::label('factura', 'Factura Nro. *', array('class' => 'control-label')) !!}
						<div class="col-lg-12 col-md-12 col-sm-12">
							{!! Form::text('factura', null,array('class' => 'form-control form-control-sm input-xs', 'id' => 'factura',  'autocomplete' =>'off')) !!}
						</div>
			</div>
			<div class="form-group col-sm">
				{!! Form::label('total', 'Total', array('class' => 'control-label')) !!}
						<div class="col-lg-12 col-md-12 col-sm-12">
							{!! Form::text('total', $venta->total,array('class' => 'form-control form-control-sm input-xs', 'id' => 'total',  'autocomplete' =>'off', 'readonly'=>'true')) !!}
						</div>
			</div>

		</div>
		<p class=" font-weight-bold">Datos del Cheque de Pago</p>
			<hr>
		<div class="row">
			<div class="col-sm form-group">
				{!! Form::label('fecha', 'Fecha*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::date('fecha',null, array('class' => 'form-control  input-xs', 'id' => 'fecha')) !!}
				</div>
			</div>
			<div class="form-group col-sm">
				{!! Form::label('destinatario', 'Destinatario*', array('class' => 'control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::text('destinatario', $venta->proveedor->razonsocial,array('class' => 'form-control form-control-sm input-xs', 'id' => 'destinatario',  'autocomplete' =>'off')) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-sm">
				{!! Form::label('cuenta', 'Cuenta*', array('class' => 'control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::text('cuenta', null,array('class' => 'form-control form-control-sm input-xs', 'id' => 'cuenta',  'autocomplete' =>'off')) !!}
				</div>
			</div>
			<div class="form-group col-sm">
				{!! Form::label('banco', 'Banco*', array('class' => 'control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::text('banco', null,array('class' => 'form-control form-control-sm input-xs', 'id' => 'banco',  'autocomplete' =>'off')) !!}
				</div>
			</div>
			<div class="form-group col-sm">
				{!! Form::label('monto', 'Monto*', array('class' => 'control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::text('monto', $venta->total,array('class' => 'form-control form-control-sm input-xs', 'id' => 'monto',  'autocomplete' =>'off')) !!}
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
	generarNumero();
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
		subtotal=parcial;
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
							<td width ="12%"><input value="${descuento}" type="number" style="width:80px;" id="descuento${idarea}" name="descuento${idarea}"></td>
							<td width ="12%"><input readonly="true" value="${subtotal}" type="number" style="width:80px;" id="subtotal${idarea}" name="subtotal${idarea}"></td>
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
			seleccionarArea('{{$detalle->id}}' , '{{$detalle->producto->descripcion}}' , '{{$detalle->cantidad}}', '{{$detalle->precioventa}}');
		</script>		
	@endforeach
@endif