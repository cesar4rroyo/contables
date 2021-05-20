<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Inventario</title>
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
            <th colspan="5" style="text-align: center"><b>REPORTE {{$tipo}} - LAMBAYEQUE TECHNOLOGIES </b></th>
        </tr>
        <tr>
            <th><b>CODIGO</b></th>
            <th><b>NOMBRE</b></th>
            <th><b>MARCA</b></th>
            <th><b>CANTIDAD</b></th>
            <th><b>PRECIO UNITARIO</b></th>
        </tr>
        </thead>
        <tbody>
        @php
            $total=0;
        @endphp
        @foreach($lista1 as $key => $value)
            <tr>
                <td class="padding-left">{{ $value->producto->codigo }}</td>
                <td class="padding-left">{{ $value->producto->descripcion }}</td>
                <td class="padding-left">{{ $value->producto->marca }}</td>
                <td class="padding-left">{{ $value->cantidad  }}</td>
                <td class="padding-left">{{ $value->producto->preciounitario }}</td>
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