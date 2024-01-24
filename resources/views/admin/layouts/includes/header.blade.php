<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Resturant-sys</title>
    <link rel="shortcut icon" href="{{ asset('public/admin/assets/dist/img/logo.png') }}" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/plugins/all.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('public/admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/assets/dist/css/bootstrap.min.css') }}">
    {{--
    <link rel="stylesheet" href="{{ asset('public/assets/dist/css/bootstrap.css') }}"> --}}
    <link rel="stylesheet"
        href="{{ asset('public/admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

    @include('admin.layouts.includes.datatable.css')
    <!-- Custom style for RTL -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/dist/css/custom.css') }}">
    <script src="{{ asset('public/admin/assets/dist/js/jQuery.js') }}"></script>
    
</head>
<audio id="audiotestt">
    <source src="{{asset('public/web/img/ordernotififaction.mp3')}}" type="audio/ogg">
    <source src="{{asset('public/web/img/ordernotififaction.mp3')}}" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>
