<!-- Content Header (Page header) -->
<div class="container" id="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-8 col-offset-2">
            <div class="card">
                <div class="card-header">Reporte Activos</div>

                <div class="card-body">
                    <div class="row">
                        {!! Form::open(['route' => 'reporteactivo.pdfActivo', 'method' => 'POST' ,'onsubmit' => 'return false;', 'class' => 'w-100  mt-3', 'role' => 'form', 'autocomplete' => 'off', 'id' => 'formBusqueda'.$entidad]) !!}
                        {!! Form::hidden('page', 1, array('id' => 'page')) !!}
                        {!! Form::hidden('accion', 'listar', array('id' => 'accion')) !!}
                        <div class="row">
                            <div class="col-md-6 form-group">
                              {!! Form::label('fechainicio', 'Fecha inicio') !!}
                              {!! Form::date('fechainicio', date('Y-m-d'), array('class' => 'form-control input-xs', 'id' => 'fechainicio' ,'onchange' => 'buscar(\''.$entidad.'\')')) !!}
                            </div>
                            <div class="col-md-6 form-group">
                              {!! Form::label('fechafin', 'Fecha fin') !!}
                              {!! Form::date('fechafin', '', array('class' => 'form-control input-xs', 'id' => 'fechafin' ,'onchange' => 'buscar(\''.$entidad.'\')')) !!}
                            </div>
                          </div>
                        
                        <div class="row">
                            <div class="col-lg-6 col-md-6  form-group">
                                {!! Form::label('cliente', 'Proveedor') !!}
                                {!! Form::select('cliente', $proveedor , '' ,array('class' => 'form-control  input-xs', 'id' => 'cliente', 'required'=>'true')) !!}
                            </div>
                            <div class="col-lg-6 col-md-6  form-group">
                                {!! Form::label('estado', 'Estado') !!}
                                {!! Form::select('estado', $estado , '' ,array('class' => 'form-control  input-xs', 'id' => 'estado', 'required'=>'true')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                          {!! Form::label('area', 'Area') !!}
                          {!! Form::select('area', $area , '' ,array('class' => 'form-control  input-xs', 'id' => 'area', 'required'=>'true')) !!}
                        </div>
                          <div class="col-lg-12 col-md-12 form-group text-center pt-4">
                            {!! Form::button('GENERAR REPORTE <i class="fa fa-file ml-2"></i> ', array('class' => 'btn btn-primary   ', 'id' => 'btnDetalle', 'onclick' => 'imprimirpdf();' ,'style'=>'width:60%;')) !!}   
                          </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
   $(document).ready(function ()  {
		    init(IDFORMBUSQUEDA+'{{ $entidad }}', 'B', '{{ $entidad }}');
	});
        function imprimirpdf(){
            window.open("reporteactivo/pdfActivo?fechainicio="+$("#fechainicio").val()+"&fechafin="+$("#fechafin").val()+"&cliente="+$("#cliente").val()+"&estado="+$("#estado").val()+"&area="+$("#area").val(),"_blank");
        }
</script>