<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Factura Nro. {{$data->numero}}</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .gray {
            background-color: lightgray
        }
    </style>

</head>

<body>

    <table width="100%">
        <tr>
            <td valign="top"><img src="{{asset('imagenes/2.png')}}" alt="" width="150" /></td>
            <td align="right">
                <h3>LAMBAYEQUE TECHNOLOGIES S.A.C.</h3>
                <pre>
                RUC 20605066942
                CALLE LUIS GONZALES NRO. 795
                LAMBAYEQUE - CHICLAYO - CHICLAYO
            </pre>
            </td>
        </tr>

    </table>

    <table width="100%">
        <tr>
            <td align="center">
                <h3><strong>FACTURA ELECTRÓNICA: {{$data->numero}}</strong></h3>
                <hr>
            </td>
        </tr>
        <hr>
        <tr>
            <td><strong>FECHA:</strong> {{$data->fecha}}</td>
        </tr>
        <tr>
            <td><strong>RUC:</strong> {{$data->cliente->ruc}}</td>
        </tr>
        <tr>
            <td><strong>NOMBRE:</strong>
                {{$data->cliente->razonsocial}}
            </td>
        </tr>
        <tr>
            <td><strong>DIRECCION:</strong>{{$data->cliente->direccion}}
            </td>
        </tr>
    </table>

    <br />

    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>#</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Precio Unitario S/.</th>
                <th>Subtotal S/.</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->detallecomprobante as $item)
            <tr>
                <th scope="row">{{($loop->index)+1}}</th>
                <td>{{$item->producto->descripcion}}</td>
                <td>{{$item->cantidad}}</td>
                <td>{{$item->preciocompra}}</td>
                <td>{{$item->precioventa}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td align="right">Op. Gravada S/.</td>
                <td align="right">{{round($base, 2)}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td align="right">I.G.V (18%)</td>
                <td align="right">{{round($igv,2)}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td align="right">Op. Inafecta</td>
                <td align="right">{{'0.00'}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td align="right">Op. Exonerada</td>
                <td align="right">{{'0.00'}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td align="right">TOTAL S/.</td>
                <td align="right" class="gray">{{round($data->total, 2)}}</td>
            </tr>
        </tfoot>
    </table>
    <hr>
    <table width="100%">
        <tr>
            <td align="center">
                <h4><strong>¡Gracias por su preferencia!</strong></h4>
            </td>
        </tr>
        <tr>
            <td align="center">
                <p><strong>Representación impresa del Comprobante
                        Electrónico, consulte en https://hgitconsultingraaaa.com</strong></p>
            </td>
        </tr>
    </table>
    <div class="text-center">
        <img class=" float-right" src="data:image/svg+xml;base64,{{ base64_encode($qr) }}">
    </div>
</body>

</html>
