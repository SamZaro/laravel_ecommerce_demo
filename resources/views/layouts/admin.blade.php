<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Nucleo Icons -->
    <link href="{{ asset('admin/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
    integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">



    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet">

    <!-- Styles --> <!-- Material Dashboard 2 -->
    <link id="pagestyle" href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">

     <!-- Custom JS -->


    <!-- jQuery -->
     <script src="{{ asset('frontend/js/jquery-3.6.0.min.js')}}" ></script>
     <script src="{{ asset('frontend/js/owl.carousel.min.js')}}" ></script>


</head>


<body class="g-sidenav-show bg-gray-100">

    @include('layouts.inc.sidebar')

    <div class="main-content">


        @include('layouts.inc.adminnav')

        <div class="container">
            @yield('content')
        </div>
    </div>


    <!--   Core JS Files   -->
    <script src="{{ asset('admin/js/core/popper.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/core/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('frontend/js/custom.js')}}" ></script>

    <!-- Material Scripts -->
    <script src="{{ asset('admin/js/plugins/perfect-scrollbar.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/plugins/smooth-scrollbar.min.js') }}" defer></script>

    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('admin/js/material-dashboard.min.js') }}" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('message'))
    <script>
        swal("Great Job!", "{{ session('message') }}", "success",{
            button:"OK",
        });
    </script>
    @endif
    @yield('scripts')


</body>

</html>
