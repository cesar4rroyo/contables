<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISCONT</title>
    <link rel="shortcut icon" href="{{asset("assets/$theme/dist/img/AdminLTELogo.png")}}" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fontawesome-free/css/all.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
    <link rel="stylesheet" href="{{asset("select2/css/select2.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/typeaheadjs.css")}}">
    
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include("theme/$theme/header")
        @include("theme/$theme/aside")
        <div class="content-wrapper">
            <section class="content p-3">
                    {{-- @yield('content') --}}
                    @include("theme/$theme/home")
            </section>
        </div>
    </div>

    <script src="{{asset("assets/$theme/plugins/jquery/jquery.min.js")}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset("assets/$theme/dist/js/adminlte.min.js")}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset("assets/$theme/dist/js/demo.js")}}"></script>
    <script src="{{asset("assets/$theme/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
    <script src="{{asset("js/admin/rolpersona/index.js")}}"></script>
    <script src="{{asset("js/admin/acceso/index.js")}}"></script>
    <script src="{{asset("js/admin/scripts.js")}}"></script>
    <script src="{{asset("js/funciones.js")}}"></script>
    <script src="{{asset("js/funciones2.js")}}"></script>
    <script src="{{asset("js/bootbox.min.js")}}"></script>
    <script src="{{asset("js/bootstrap3-typeahead.min.js")}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset("select2/js/select2.min.js")}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

{{--     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/inputmask.js"></script> --}}

    <script src={{asset("js/input-mask/jquery.inputmask/jquery.inputmask.js")}}></script>
    <script src={{asset("js/input-mask/jquery.inputmask/jquery.inputmask.extensions.js")}}></script>
    <script src={{asset("js/input-mask/jquery.inputmask/jquery.inputmask.date.extensions.js")}}></script>
    <script src={{asset("js/input-mask/jquery.inputmask/jquery.inputmask.numeric.extensions.js")}}></script>
    <script src={{asset("js/input-mask/jquery.inputmask/jquery.inputmask.phone.extensions.js")}}></script>
    <script src={{asset("js/input-mask/jquery.inputmask/jquery.inputmask.regex.extensions.js")}}></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" />
    @yield('scripts')



</body>
@include("theme/$theme/footer")


</html>