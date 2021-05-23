@if(count($lista) == 0)
<h3 class="text-warning">No se encontraron resultados.</h3>
@else
{!! $paginacion !!}
<table id="example1" class="table table-bordered table-striped table-condensed table-hover">

	<thead>
		<tr>
			@foreach($cabecera as $key => $value)
				<th @if((int)$value['numero'] > 1) colspan="{{ $value['numero'] }}" @endif>{!! $value['valor'] !!}</th>
			@endforeach
		</tr>
	</thead>
	<tbody>
		<?php
		$contador = $inicio + 1;
		?>
		@foreach ($lista as $key => $value)
        <tr>
			<td>{{ $contador }}</td>
			<td>{{ $value->numero }}</td>
			<td>{{ $value->fecharegistro }}</td>
			<td>{{ $value->fechaenvio }}</td>
			<td>{{ $value->estado }}</td>
			<td>{{ $value->cliente->razonsocial }}</td>
			<td>{{ $value->total }}</td>
            <td>
				@if ((session()->get('personal')['cargo_id']==9 && session()->get('personal')['area_id']==5) || session()->get('personal')['id']==5)
					{!! Form::button('<div class="fas fa-truck-moving"></div> Enviar', array('onclick' => 'modal (\''.URL::route($ruta["edit"], array($value->id, 'listar'=>'SI', 'tipo'=>'enviar')).'\', \''.'Envio de pedido'.'\', this);', 'class' => 'btn btn-sm btn-warning')) !!}	
				@endif
				
				{{-- {!! Form::button('<div class="glyphicon glyphicon-remove"></div> Eliminar', array('onclick' => 'modal (\''.URL::route($ruta["delete"], array($value->id, 'SI')).'\', \''.$titulo_eliminar.'\', this);', 'class' => 'btn btn-sm btn-danger')) !!} --}}
			</td>
			<td>
				@if ((session()->get('personal')['cargo_id']==2 && session()->get('personal')['area_id']==9) || session()->get('personal')['id']==5)
				{!! Form::button('<div class="fas fa-money-bill"></div> Pago', array('onclick' => 'modal (\''.URL::route($ruta["edit"], array($value->id, 'listar'=>'SI', 'tipo'=>'pago')).'\', \''.'Documentacion de pago'.'\', this);', 'class' => 'btn btn-sm btn-info')) !!}
				@endif
			</td>
			@if ($value->estado == 'ENVIADO')
			<td>
				<td>{!! Form::button('<div class="fas fa-print"></div> Factura', array('onclick' =>'pdf(\''.$value->comprobante->id.'\')', 'class' => 'btn btn-sm btn-success')) !!}</td>
			</td>
			@endif
			
		</tr>
		<?php
		$contador = $contador + 1;
		?>
		@endforeach
	</tbody>
	<tfoot>
		<tr>
			@foreach($cabecera as $key => $value)
				<th @if((int)$value['numero'] > 1) colspan="{{ $value['numero'] }}" @endif>{!! $value['valor'] !!}</th>
			@endforeach
		</tr>
	</tfoot>
</table>
{!! $paginacion!!}
@endif
<script>
	function pdf(id){
		window.open( 'venta/exportPdf/'+id , '_blank');
	}
</script>