<!-- Content Header (Page header) -->
<div class="container" id="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-8 col-offset-2">
            <div class="card">
                <div class="card-header">Reporte Inventario</div>

                <div class="card-body">
                    <div class="row">
                        {!! Form::open(['route' => 'reporteinventario.pdfInventario', 'method' => 'POST' ,'onsubmit' => 'return false;', 'class' => 'w-100  mt-3', 'role' => 'form', 'autocomplete' => 'off', 'id' => 'formBusqueda'.$entidad]) !!}
                        {!! Form::hidden('page', 1, array('id' => 'page')) !!}
                        {!! Form::hidden('accion', 'listar', array('id' => 'accion')) !!}

                        
                        <div class="col-lg-12 col-md-12  form-group">
                            {!! Form::label('tipo', 'TIPO') !!}
                            {!! Form::select('tipo', $tipos , '' ,array('class' => 'form-control  input-xs', 'id' => 'tipo')) !!}
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
            window.open("reporteinventario/pdfInventario?tipo="+$("#tipo").val(),"_blank");
        }
</script>