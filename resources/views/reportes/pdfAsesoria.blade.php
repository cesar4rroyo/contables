<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Asesoria</title>
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
    <table style="width: 100%">
        <thead>
        <tr>
            <th colspan="4" style="text-align: center"><b>REPORTE ASESORIAS DESDE {{ date_format(date_create($fecinicio),  'd/m/Y') }} HASTA {{ date_format(date_create($fecfin),  'd/m/Y') }} - LAMBAYEQUE TECHNOLOGIES </b></th>
        </tr>
        <tr>
            <th><b>FECHA</b></th>
            <th><b>CLIENTE</b></th>
            <th><b>LIMITE CREDITO</b></th>
            <th><b>PRODUCTOS SUGERIDAD</b></th>
        </tr>
        </thead>
        <tbody>
        @php
            $total=0;
        @endphp
        @foreach($lista1 as $key => $value)
            <tr>
                <td class="padding-left">{{ $value->fecha }}</td>
                <td class="padding-left">{{ $value->cliente->razonsocial }}</td>
                <td class="padding-left">{{ $value->credito }}</td>
                {{-- @php
                    $cantidad=0;
                    foreach($value->inventario as $inv){
                        $cantidad+=$inv->cantidad;
                    }
                @endphp
                <td class="padding-left">{{ $cantidad  }}</td> --}}
                <td class="padding-left">{{ $value->credito }}</td>
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