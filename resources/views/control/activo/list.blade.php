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
			<td>{{ $value->fechasolicitud }}</td>
			<td>{{ $value->area->descripcion }}</td>
			<td>{{ $value->fechaentrega }}</td>
			<td>{{ $value->estado }}</td>
			<td>{{ $value->proveedor->razonsocial }}</td>
			<td>{{ $value->total }}</td>
			@if (session()->get('personal')['area_id']==5)
			@endif
			<td>{!! Form::button('<div class="fas fa-check-double"></div> Recibir Activo', array('onclick' => 'modal (\''.URL::route($ruta["edit"], array($value->id, 'listar'=>'SI', 'tipo'=>'recepcionar')).'\', \''.'Recepción y Verificación de compra de activos'.'\', this);', 'class' => 'btn btn-sm btn-info')) !!}</td>
			<td>{!! Form::button('<div class="fas fa-money-bill"></div> Desembolsar Efectivo', array('onclick' => 'modal (\''.URL::route($ruta["edit"], array($value->id, 'listar'=>'SI', 'tipo'=>'pagar')).'\', \''.'Desembolso de Efectivo'.'\', this);', 'class' => 'btn btn-sm btn-warning')) !!}</td>
            {{-- <td>{!! Form::button('<div class="fas fa-trash-alt"></div> Eliminar', array('onclick' => 'modal (\''.URL::route($ruta["delete"], array($value->id, 'SI')).'\', \''.$titulo_eliminar.'\', this);', 'class' => 'btn btn-sm btn-danger')) !!}</td> --}}
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