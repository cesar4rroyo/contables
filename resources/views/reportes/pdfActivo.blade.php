<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Compras de Activos Fijos</title>
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
            <th colspan="8" style="text-align: center"><b>REPORTE COMPRAS ACTVIOS FIJOS DESDE {{ date_format(date_create($fecinicio),  'd/m/Y') }} HASTA {{ date_format(date_create($fecfin),  'd/m/Y') }} - LAMBAYEQUE TECHNOLOGIES </b></th>
        </tr>
        <tr>
            <th><b>NUMERO</b></th>
            <th><b>ESTADO</b></th>
            <th><b>FECHA SOLICITUD</b></th>
            <th><b>FECHA ENTREGA</b></th>
            <th><b>TOTAL</b></th>
            <th><b>PROVEEDOR</b></th>
            <th><b>FACTURA</b></th>
            <th><b>AREA</b></th>
        </tr>
        </thead>
        <tbody>
        @php
            $total=0;
        @endphp
        @foreach($lista1 as $key => $value)
            <tr>
                <td class="padding-left">{{ $value->numero }}</td>
                <td class="padding-left">{{ $value->estado }}</td>
                <td class="padding-left">{{ $value->fechasolicitud }}</td>
                <td class="padding-left">{{ $value->fechaentrega }}</td>
                <td class="padding-left">{{ $value->total }}</td>
                <td class="padding-left">{{ $value->proveedor->razonsocial }}</td>
                <td class="padding-left">{{ $value->factura }}</td>
                <td class="padding-left">{{ $value->area->descripcion }}</td>
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