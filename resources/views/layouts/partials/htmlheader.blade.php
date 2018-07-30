<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> AdminLTE 2 with Laravel - @yield('htmlheader_title', 'Admin') </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="{{ asset('theme/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{ asset('theme/bower_components/font-awesome/css/font-awesome.min.css')}}" type="text/css" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('theme/bower_components/select2/dist/css/select2.min.css')}}">

    <link href="{{ asset('theme/dist/css/AdminLTE.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{ asset('theme/dist/css/skins/_all-skins.min.css')}}" type="text/css" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('theme/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">



    <!-- jQuery 3 -->
    <script src="{{ asset('theme/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('theme/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('theme/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- DataTables -->
    <script src="{{ asset('theme/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{ asset('theme/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
