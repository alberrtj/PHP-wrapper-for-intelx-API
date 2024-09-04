<head>
    <meta charset="utf-8"/>
    <title>@yield('title' , 'admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="intelxio.com" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- jvectormap -->
    <link href="{{asset('assets/admin/libs/jqvmap/jqvmap.min.css')}}" rel="stylesheet"/>

    <!-- DataTables -->
    <link href="{{asset('assets/admin/libs/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/admin/libs/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>

    <!-- App css -->
    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/admin/css/app.min.css')}}?v=0.4" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/admin/css/style.css')}}?v=0.3" rel="stylesheet" type="text/css"/>
    <!-- Jquery Toast css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/toastr.css?v=0.1') }}"/>
    <link href="{{asset('assets/admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>

    @yield('css')

    <style>
        .font-en {
            font-family: Sans-Serif !important;
        }
    </style>

</head>
