<div id="divMensajeError{!! $entidad !!}"></div>
{!! Form::model($usuario, $formData) !!}	
	{!! Form::hidden('listar', $listar, array('id' => 'listar')) !!}
	<div class="form-group">
		{!! Form::label('login', 'Usuario:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
		<div class="col-lg-12 col-md-12 col-sm-12">
			{!! Form::text('login', null, array('class' => 'form-control input-xs', 'id' => 'login', 'placeholder' => 'Ingrese la descripción')) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('password', 'Contraseña:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
		<div class="col-lg-12 col-md-12 col-sm-12">
			{!! Form::password('password', array('class' => 'form-control x-s', 'id' => 'password', 'placeholder' => 'Ingrese la contraseña')) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('tipousuario_id', 'Tipo de Usuario:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
		<div class="col-lg-12 col-md-12 col-sm-12">
			{!! Form::select('tipousuario_id', $cboTiposUsuario, null, array('class' => 'form-control input-xs', 'id' => 'tipousuario_id')) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('personal_id', 'Personal:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
		<div class="col-lg-12 col-md-12 col-sm-12">
			{!! Form::select('personal_id', $cboPersonal, null, array('class' => 'form-control input-xs', 'id' => 'personal_id')) !!}
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
	configurarAnchoModal('400');
	init(IDFORMMANTENIMIENTO+'{!! $entidad !!}', 'M', '{!! $entidad !!}');
	$('#personal_id').select2();

}); 
</script>