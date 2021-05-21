<div id="divMensajeError{!! $entidad !!}"></div>
{!! Form::model($nomina, $formData) !!}	
	{!! Form::hidden('listar', $listar, array('id' => 'listar')) !!}
	{!! Form::hidden('listarProductos', null, array('id' => 'listarProductos')) !!}
	@switch($tipo)
		@case('autorizar')
			<input type="hidden" name="tipo" value="autorizar">
			<div class="row">
				<div class="col-12 form-group">
					{!! Form::label('fecha', 'Fecha de Autorzacion*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
						{!! Form::date('fecha', date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fecha', 'readonly'=>'true')) !!}
					</div>
				</div>
				
			
			
				<div class="form-group col-12">
					{!! Form::label('observacion', 'Observación ', array('class' => 'control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::textarea('observacion', null,array('class' => 'form-control form-control-sm input-xs', 'id' => 'observacion', "rows"=>5 , "style"=>"resize:none;")) !!}
					</div>
				</div>
				<div class="form-group col-12">
					{!! Form::label('estadoenvio', 'Estado ', array('class' => 'control-label')) !!}
					<select name="estadoenvio" id="estadoenvio" class="form-control">
						<option value="">Seleccione</option>
						<option value="AUTORIZAR">Conforme</option>
						<option value="RECHAZAR">Faltan productos</option>
					</select>
				</div>
			@break
		@case('preparar')
		<input type="hidden" name="tipo" value="preparar">
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
				{!! Form::label('beneficiario', 'Destinatario*', array('class' => 'control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::text('beneficiario', $nomina->empleado->apellidopaterno . ' ' . $nomina->empleado->apellidomaterno . ' ' . $nomina->empleado->nombres,array('class' => 'form-control form-control-sm input-xs', 'id' => 'beneficiario',  'autocomplete' =>'off')) !!}
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
					{!! Form::text('monto', $nomina->total,array('class' => 'form-control form-control-sm input-xs', 'id' => 'monto',  'autocomplete' =>'off', 'readonly'=>'true')) !!}
				</div>
			</div>
		</div>
		</div>
		<div class="row">
			<div class="form-group col-sm">
				{!! Form::label('observacion', 'Observación ', array('class' => 'control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::textarea('observacion', null,array('class' => 'form-control form-control-sm input-xs', 'id' => 'observacion', "rows"=>5 , "style"=>"resize:none;")) !!}
				</div>
			</div>
		</div>
			@break
		@case('distribuir')
		<input type="hidden" name="tipo" value="distribuir">
		<p class=" alert alert-warning">Entregar cheque</p>
		<input type="hidden" name="fecha" value="{{$nomina->fecha}}">
		@break
		@case(null)
		<div class="row">
			<div class="col-12 form-group">
				{!! Form::label('fecha', 'Fecha de Registro*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::date('fecha', ($nomina) ? date_create($nomina->fecha) : date('Y-m-d'), array('class' => 'form-control  input-xs', 'id' => 'fecha')) !!}
				</div>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('empleado', 'Empleado*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label', 'id'=>'lblnrodocumento')) !!}
			<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::select('empleado', $cboempleado, null, array('class' => 'form-control  input-xs', 'id' => 'empleado', 'onchange'=>'getData();')) !!}
			</div>
		</div>
		<div class="row" id="datos">
			<div class="form-group">
				{!! Form::label('impuesto', 'Impuesto*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label', 'id'=>'lblnrodocumento')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::select('impuesto', $impuestos, null, array('class' => 'form-control  input-xs', 'id' => 'impuesto', 'onchange'=>'suma();')) !!}
				</div>
			</div>
			<div class="form-group col-sm">
				{!! Form::label('horastrabajadas', 'Horas trabajadas*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label', 'id'=>'lblnrodocumento')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::number('horastrabajadas', null, array('class' => 'form-control  input-xs', 'id' => 'horastrabajadas', 'readonly'=>'true')) !!}
				</div>
			</div>
			<div class="form-group col-sm">
				{!! Form::label('salario', 'Pago Semanal*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label', 'id'=>'lblnrodocumento')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::number('salario', null, array('class' => 'form-control  input-xs', 'id' => 'salario', 'readonly'=>'true')) !!}
				</div>
			</div>
			<div class="form-group col-sm">
				{!! Form::label('total', 'Total a Pagar*', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label', 'id'=>'lblnrodocumento')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::number('total', null, array('class' => 'form-control  input-xs', 'id' => 'total', 'readonly'=>'true')) !!}
				</div>
			</div>
		</div>
		
	@endswitch
	
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
	$('#empleado').select2();

	

	
	
	
}); 
function suma(){
		var salario = $('#salario').val();
		var impuesto = $('#impuesto').val();
		var horastrabajadas = $('#horastrabajadas').val();
		var parcial=0;

		if(horastrabajadas!='40'){
			parcial= horastrabajadas*salario/40;
			parcial=parcial.toFixed(2);
		}else{
			parcial = salario;
		}

		var total = parcial - (parcial*impuesto/100);
		total=total.toFixed(2);
		$(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[name="total"]').val(total);
		
	}
function getData(){
	var value = $('#empleado').val();
	$.ajax({
			type: 'POST',
			url: "{{route('empleado.getInfo')}}",
			data: "_token="+$(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[name="_token"]').val() +"&id="+value,
			success: function(a) {
				console.log(a);
				$(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[name="horastrabajadas"]').val(a.horas);
				$(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[name="salario"]').val(a.salario);
				$(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[name="impuesto"]').val('');
				$(IDFORMMANTENIMIENTO + '{!! $entidad !!} :input[name="total"]').val('');
			}
	});
}




	
</script>

