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
			<td>{{ $value->fecha }}</td>
			<td>{{ $value->total }}</td>
			<td>{{ $value->estado }}</td>
			<td>{{ $value->empleado->apellodppaterno . ' ' . $value->empleado->apellidomaterno . ' ' . $value->empleado->nombres }}</td>
			@if ((session()->get('personal')['cargo_id']==7 || session()->get('personal')['id']==5) && $value->estado=='REGISTRADO')
				<td>{!! Form::button('<div class="fas fa-check-circle"></div> Autorizar', array('onclick' => 'modal (\''.URL::route($ruta["edit"], array($value->id, 'listar'=>'SI', 'tipo'=>'autorizar')).'\', \''.'Autorizar preparacion de cheques'.'\', this);', 'class' => 'btn btn-sm btn-info')) !!}</td>
			@endif
			@if ((session()->get('personal')['cargo_id']==8 || session()->get('personal')['id']==5) && $value->estado=='AUTORIZADO POR RESPONS. CUENTAS')
				<td>{!! Form::button('<div class="fas fa-money-bill"></div> Preparar Cheques', array('onclick' => 'modal (\''.URL::route($ruta["edit"], array($value->id, 'listar'=>'SI', 'tipo'=>'preparar')).'\', \''.'Preparar cheques de pago'.'\', this);', 'class' => 'btn btn-sm btn-warning')) !!}</td>
			@endif
			@if ((session()->get('personal')['cargo_id']==2 || session()->get('personal')['id']==5) && $value->estado=='CHEQUE PREPARADO' )
				<td>{!! Form::button('<div class="fas fa-check-double"></div> Distribuir Pagos', array('onclick' => 'modal (\''.URL::route($ruta["edit"], array($value->id, 'listar'=>'SI', 'tipo'=>'distribuir')).'\', \''.'Desembolsar efectivo'.'\', this);', 'class' => 'btn btn-sm btn-danger')) !!}</td>
			@endif
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