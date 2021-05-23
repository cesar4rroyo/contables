<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Compras</title>
</head>
<style>
    body {
        font-family: 'Courier New', Courier, monospace;
    }
    table , table tr , table tr td , table th{
        border: 1px solid black;
    }
    table {
        border-collapse: collapse;
    }
    body{
        font-size: 14.5px;
    }
    table {
        margin-left: 10px;
        margin-right: 10px;
    }
    .align-center {
        text-align: center;
    }
    .padding-left{
        padding : 0px 3px;
    }
        
</style>
<body>
    @if (count($lista1)>0)
    <table>
        <thead>
        <tr>
            <th colspan="8" style="text-align: center"><b>REPORTE NOMINAS DESDE {{ date_format(date_create($fecinicio),  'd/m/Y') }} HASTA {{ date_format(date_create($fecfin),  'd/m/Y') }} - LAMBAYEQUE TECHNOLOGIES </b></th>
        </tr>
        <tr>
            {{-- <th><b>NUMERO</b></th> --}}
            <th><b>FECHA REGISTRO</b></th>
            <th><b>EMPLEADO</b></th>
            <th><b>ESTADO</b></th>
            <th><b>PAGO SEMANAL</b></th>
            <th><b>HORAS TRABAJADAS SEM.</b></th>
            <th><b>IMPUESTO</b></th>
            <th><b>TOTAL A PAGAR</b></th>
            <th><b>CHEQUE NRO.</b></th>
        </tr>
        </thead>
        <tbody>
        @php
            $total=0;
        @endphp
      
        @foreach($lista1 as $key => $value)
            <tr>
                <td class="padding-left">{{ $value->fecha }}</td>
                <td class="padding-left">{{ $value->empleado->nombres . ' ' .  $value->empleado->apellidopaterno  . ' ' . $value->empleado->apellidomaterno}}</td>
                <td class="padding-left">{{ $value->estado }}</td>
                <td class="padding-left">{{ $value->carpteempleado->salario }}</td>
                @php
                    $horas=0;
                    foreach($value->carpteempleado->tarjetas as $tarjeta){
                        $horas=$horas + $tarjeta->horastrabajadas;
                    }
                    $arr=$value->carpteempleado->tarjetas->toArray();
                    $fecha1=$arr[0]['fecha'];
                    $fecha2=$arr[count($arr)-1]['fecha'];
                @endphp
                <td>{{$horas . 'Hrs. ' . '(' .date_format(date_create($fecha1),  'd/m/Y') . ' hasta ' . date_format(date_create($fecha2), 'd/m/Y') . ')'}}</td>
                <td class="padding-left">{{ $value->impuesto->descripcion}}</td>
                <td class="padding-left">{{ $value->total}}</td>
                @php
                    $numero='AUN NO DISPONIBLE';
                    foreach ($value->cheques as $che) {
                        $numero=$che->numero;
                    } 
                @endphp
                <td class="padding-left">{{$numero}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <table>
        <tr>
            <td>
                SIN RESULTADOS
            </td>
        </tr>
    </table>
@endif
</body>
</html>