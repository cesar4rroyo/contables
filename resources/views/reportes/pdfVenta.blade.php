<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Ventas</title>
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
            <th colspan="10" style="text-align: center"><b>REPORTE VENTAS DESDE {{ date_format(date_create($fecinicio),  'd/m/Y') }} HASTA {{ date_format(date_create($fecfin),  'd/m/Y') }} - LAMBAYEQUE TECHNOLOGIES </b></th>
        </tr>
        <tr>
            <th><b>NUMERO</b></th>
            <th><b>ESTADO</b></th>
            <th><b>FECHA REGISTRO</b></th>
            <th><b>FECHA ENVIO</b></th>
            <th><b>ENVIOS</b></th>
            <th><b>TOTAL</b></th>
            <th><b>CLIENTE</b></th>
            <th><b>FACTURA</b></th>
            <th><b>ASESORIA</b></th>
            <th><b>PAGO NRO.</b></th>
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
                <td class="padding-left">{{ date_format(date_create($value->fecharegistro),  'd/m/Y') }}</td>
                <td class="padding-left">{{ date_format(date_create($value->fechaenvio),  'd/m/Y') }}</td>
                <td class="padding-left">{{ ($value->envio) ? count($value->envio) : '-'}}</td>
                <td class="padding-left">{{ $value->total }}</td>
                <td class="padding-left">{{ $value->cliente->razonsocial }}</td>
                <td class="padding-left">{{($value->comprobante) ? $value->comprobante->numero : null }}</td>
                <td class="padding-left">{{ ($value->asesoria) ? 'SI' : 'NO' }}</td>
                @php
                    $numero='NO DISPONIBLE';
                    if($value->pago){
                        foreach($value->pago as $pago){
                            $numero=$pago->numero;
                        }
                    }
                @endphp
                <td class="padding-left">{{ $numero }}</td>
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