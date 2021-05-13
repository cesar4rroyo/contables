<div id="divMensajeError{!! $entidad !!}"></div>
{!! Form::model($modelo, $formData) !!}
{!! Form::hidden('listar', $listar, array('id' => 'listar')) !!}
@switch($accion)
	@case('aceptar')
		{!!'<div class="callout callout-warning"><p class="text-primary">¿Esta seguro de aceptar el trámite?</p></div>' !!}
		@break
	@case('rechazar')
		{!!'<div class="callout callout-warning"><p class="text-primary">¿Esta seguro de rechazar el trámite?</p></div>' !!}
		@break
	@case('finalizar')
		{!!'<div class="callout callout-warning"><p class="text-primary">¿Esta seguro de finalizar el trámite?</p></div>' !!}
		@break
@endswitch
@php
	$showbtn=true;
@endphp
@if($accion=='seguimiento')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">				
                <div class="card-body">
					<div class="float-right">
						<a href="{{route('tramite.printseguimiento', $modelo->id)}}" target="_blank">
							<button type="button" class="btn btn-warning btn-sm">
								<i class="fas fa-print"></i> Imprimir
							</button>
						</a>
					</div>
                    <div id="content">
                        <ul class="timeline">
							@foreach ($modelo->seguimientos as $item)
                            <li class="event">
								<h3> <i class="fas fa-calendar-times"></i> {{$item->fecha}}</h3>
								@if ($item->accion == 'DERIVAR')
                                	<h3> <i class="fas fa-map-marker-alt"></i> Área de origen:  {{ $item->area }}</h3>
									<h3><i class="fas fa-arrow-down"></i></h3>
                                	<h3> <i class="fas fa-map-marker-alt"></i> Área de destino: {{$item->areas->descripcion }}</h3>
								@else
                                	<h3> <i class="fas fa-map-marker-alt"></i> {{($item->areas) ? $item->areas->descripcion : $item->area }}</h3>
								@endif
                                <h3>  ESTADO: 
									<span class="badge {{($item->accion=='RECHAZAR')?'badge-danger':(($item->accion=='FINALIZAR')?'badge-success':(($item->accion=='ADJUNTAR')?'badge-warning':'badge-info'))}}">
										{{$item->accion}}
									</span>
								</h3>
								@if ($item->observacion)
                                	<h3>  OBSERVACION: {{$item->observacion}}</h3>
								@endif
								<h3> RESPONSABLE: {{$item->personal->nombres . ' ' .$item->personal->apellidopaterno .' ' . $item->personal->apellidomaterno}}</h3>
								@if ($item->accion=='ADJUNTAR')
									<a href="{{asset($item->ruta)}}" target="_blank"> <i class="fas fa-file-download"></i> Descargar archivo </a>
								@endif
							</li>  
							@endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if ($accion=='comentar')
<div class="form-group">
	{!! Form::label('observacion', 'Observación', array('class' => 'control-label')) !!}
	<div class="col-lg-12 col-md-12 col-sm-12">
	{!! Form::textarea('observacion', '',array('class' => 'form-control form-control-sm input-xs', 'id' => 'observacion', "rows"=>2 , "style"=>"resize:none;")) !!}
	</div>
</div>
@endif
@if($accion=='derivar' || $accion=='archivar')
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="info-box">
			<span class="info-box-icon bg-yellow"><i class="fa fa-file-alt"></i></span>
			<div class="info-box-content">
				<span class="info-box-number">Nro. {{$modelo->numero}}</span>
				<span class="info-box-number"> <i class="fas fa-file-archive"></i> {{$modelo->asunto}}</span>
				<span class="info-box-number"> <i class="fas fa-user-alt"></i> {{$modelo->remitente}}</span>
			</div>
			</div>
		</div>
	</div>
	@if ($accion=='derivar')
		@if ($modelo->tipo == 'TUPA')
		@foreach ($modelo->procedimiento->rutas as $ruta)
			@if (($ruta->areainicial_id)==$area_actual)
				@if ($ruta->areafinal_id==$area_actual)
					<div class="container">
						<p class=" text-bold">No se puede derivar a otra área, este documento finaliza aquí.</p>
					</div>
					@php
						$showbtn=false;
					@endphp
					@break
				@endif
				<div class="form-group">
					{!! Form::label('area_id', 'Área de destino:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
						{!! Form::hidden('area_id', $ruta->areafinal_id, array('class' => 'form-control input-xs')) !!}
						{!! Form::text('descripcion', $ruta->areafin->descripcion, array('class' => 'form-control input-xs', 'id' => 'area_id', 'readonly'=>'true')) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('observacion', 'Observación', array('class' => 'control-label')) !!}
					<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::textarea('observacion', '',array('class' => 'form-control form-control-sm input-xs', 'id' => 'observacion', "rows"=>2 , "style"=>"resize:none;")) !!}
					</div>
				</div>
				@break
			@endif
		@endforeach
		@else
			<div class="form-group">
				{!! Form::label('area_id', 'Área de destino:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
					{!! Form::select('area_id', $cboAreas, null, array('class' => 'form-control input-xs', 'id' => 'area_id')) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('observacion', 'Observación', array('class' => 'control-label')) !!}
				<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::textarea('observacion', '',array('class' => 'form-control form-control-sm input-xs', 'id' => 'observacion', "rows"=>2 , "style"=>"resize:none;")) !!}
				</div>
			</div>
		@endif
	@endif
	@if ($accion=='archivar')
		<div class="form-group">
			{!! Form::label('archivador_id', 'Archivador:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
			<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::select('archivador_id', $cboArchivadores, null, array('class' => 'form-control input-xs', 'id' => 'archivador_id')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('observacion', 'Observación', array('class' => 'control-label')) !!}
			<div class="col-lg-12 col-md-12 col-sm-12">
			{!! Form::textarea('observacion', '',array('class' => 'form-control form-control-sm input-xs', 'id' => 'observacion', "rows"=>2 , "style"=>"resize:none;")) !!}
			</div>
		</div>
	@endif
	
@endif
@if ($accion=='rechazar' || $accion=='finalizar' || $accion=='adjuntar')
		@if ($accion=='adjuntar')
			{!! Form::label('archivo', 'Archivo', array('class' => 'control-label')) !!}
			<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::file('archivo', array('id'=>'archivo')) !!}
			</div>
		@endif		
		@if ($accion=='rechazar')
		<div class="form-group">
			{!! Form::label('motivorechazo_id', 'Motivo de Rechazo:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
			<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::select('motivorechazo_id', $cboMotivos, null, array('class' => 'form-control input-xs', 'id' => 'motivorechazo_id', 'required'=>'true')) !!}
			</div>
		</div>	
		<div class="form-group">
			{!! Form::label('envio', '¿Desea enviar el trámite al área anterior o desea finalizarlo?', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
			<div class="col-lg-12 col-md-12 col-sm-12">
				{!! Form::select('envio', $cboOpcion, null, array('class' => 'form-control input-xs', 'id' => 'envio', 'required'=>'true')) !!}
			</div>
		</div>	
		@endif	
		<div class="form-group">
			{!! Form::label('observacion', 'Observación', array('class' => 'control-label')) !!}
			<div class="col-lg-12 col-md-12 col-sm-12">
			{!! Form::textarea('observacion', '',array('class' => 'form-control form-control-sm input-xs', 'id' => 'observacion', "rows"=>2 , "style"=>"resize:none;")) !!}
			</div>
		</div>	
@endif
<div class="form-group">
	<div class="col-lg-12 col-md-12 col-sm-12 text-right">	
		@if ($accion != 'seguimiento' && $showbtn)
		{!! Form::button('<i class="fa fa-check "></i> '.$boton, array('class' => 'btn btn-warning btn-sm', 'id' => 'btnGuardar', 'type' => 'submit')) !!}
		@endif	
		{!! Form::button('<i class="fa fa-undo "></i> Cancelar', array('class' => 'btn btn-default btn-sm', 'id' => 'btnCancelar'.$entidad, 'onclick' => 'cerrarModal((contadorModal - 1));')) !!}
	</div>
</div>
{!! Form::close() !!}
<style>
	body{margin-top:20px;}
.timeline {
    border-left: 3px solid #727cf5;
    border-bottom-right-radius: 4px;
    border-top-right-radius: 4px;
    background: rgba(114, 124, 245, 0.09);
    margin: 0 auto;
    letter-spacing: 0.2px;
    position: relative;
    line-height: 1.4em;
    font-size: 1.03em;
    padding: 50px;
    list-style: none;
    text-align: left;
    max-width: 80%;
}

@media (max-width: 767px) {
    .timeline {
        max-width: 98%;
        padding: 25px;
    }
}

.timeline h1 {
    font-weight: 300;
    font-size: 1.4em;
}

.timeline h2,
.timeline h3 {
    font-weight: 600;
    font-size: 1rem;
    margin-bottom: 10px;
}

.timeline .event {
    border-bottom: 1px dashed #e8ebf1;
    padding-bottom: 25px;
    margin-bottom: 25px;
    position: relative;
}

@media (max-width: 767px) {
    .timeline .event {
        padding-top: 30px;
    }
}

.timeline .event:last-of-type {
    padding-bottom: 0;
    margin-bottom: 0;
    border: none;
}

.timeline .event:before,
.timeline .event:after {
    position: absolute;
    display: block;
    top: 0;
}

.timeline .event:before {
    left: -207px;
    content: attr(data-date);
    text-align: right;
    font-weight: 100;
    font-size: 0.9em;
    min-width: 120px;
}

@media (max-width: 767px) {
    .timeline .event:before {
        left: 0px;
        text-align: left;
    }
}

.timeline .event:after {
    -webkit-box-shadow: 0 0 0 3px #727cf5;
    box-shadow: 0 0 0 3px #727cf5;
    left: -55.8px;
    background: #fff;
    border-radius: 50%;
    height: 9px;
    width: 9px;
    content: "";
    top: 5px;
}

@media (max-width: 767px) {
    .timeline .event:after {
        left: -31.8px;
    }
}

.rtl .timeline {
    border-left: 0;
    text-align: right;
    border-bottom-right-radius: 0;
    border-top-right-radius: 0;
    border-bottom-left-radius: 4px;
    border-top-left-radius: 4px;
    border-right: 3px solid #727cf5;
}

.rtl .timeline .event::before {
    left: 0;
    right: -170px;
}

.rtl .timeline .event::after {
    left: 0;
    right: -55.8px;
}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		init(IDFORMMANTENIMIENTO+'{!! $entidad !!}', 'M', '{!! $entidad !!}');
		configurarAnchoModal('600');
		$( IDFORMMANTENIMIENTO + '{{ $entidad }}').submit(function( event ) {
			event.preventDefault();
			var idformulario = IDFORMMANTENIMIENTO + '{{ $entidad }}';
			var entidad = "{{$entidad}}";
			var formData = new FormData($(this)[0]);
			var respuesta = '';
			var listar       = 'NO';
			if ($(idformulario + ' :input[id = "listar"]').length) {
				var listar = $(idformulario + ' :input[id = "listar"]').val();
			};
			var request = $.ajax({
			url     : $(this).attr('action'),
			method  : "POST",
			data    : formData,
			processData: false,  
			contentType: false,
			});
			request.done(function(msg) {
				respuesta = msg;
				console.log('eeeee');
			}).fail(function(jqXHR, textStatus) {
				respuesta = 'ERROR';
			}).always(function(){
				if(respuesta.trim() === 'ERROR'){
				}else {
					if (respuesta.trim() === 'OK') {
						console.log('eeee');
						cerrarModal();
						Hotel.notificaciones("Accion realizada correctamente", "Realizado" , "success");
						if (listar.trim() === 'SI') {							
							buscarCompaginado('', 'Accion realizada correctamente', entidad, 'OK');
						}        
					} else {
						mostrarErrores(respuesta, idformulario, entidad);
					}
				}
			}); 
    	});
	}); 
	
</script>