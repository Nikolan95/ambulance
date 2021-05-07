<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Ambulance application</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

         <!-- DataTables -->
         <link href="{{asset ('css/plugins/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
         <link href="{{asset('css/plugins/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

         <!-- Responsive datatable examples -->
         <link href="{{asset('css/plugins/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" /> 

        <!-- Sweet Alert -->
        <link href="{{asset('css/plugins/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">

        <!-- App css -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <!-- leftbar-tab-menu -->
        @include('layouts.leftbar')
        <!-- Top Bar Start -->
        @include('layouts.topbar')
        <!-- Top Bar End -->
        <div class="page-wrapper">
            <!-- Page Content-->
            @yield('content')
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->
        @include('layouts.modals')
    </body>

     <!-- jQuery  -->
     <script src="{{ asset('js/jquery.min.js') }}"></script>
     <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
     <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
     <script src="{{ asset('js/metismenu.min.js') }}"></script>
     <script src="{{ asset('js/waves.js') }}"></script>
     <script src="{{ asset('js/feather.min.js') }}"></script>
     <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
     <script src="{{ asset('js/plugins/apexcharts.min.js') }}"></script> 

     <script src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
     <script src="{{asset('js/plugins/dataTables.bootstrap4.min.js')}}"></script>
     <script src="{{asset('js/jquery.hospital_dashboard.init.js')}}"></script>
     
     
            
     <!-- Sweet-Alert  -->
     <script src="{{asset('js/plugins/sweetalert2.min.js')}}"></script>
     <script src="{{asset('js/jquery.sweet-alert.init.js')}}"></script>
     
     <!-- App js -->
     <script src="{{ asset('js/app.js') }}"></script>
    
     <script src="{{ asset('js/custom.js') }}"></script>

</html>