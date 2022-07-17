<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title', '') </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
    integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Styles --> <!-- Bootstrap 5 -->
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

    <!-- Styles --> <!-- Material 2 -Theme CSS -->
    <link href="{{ asset('frontend/css/material-kit.min.css') }}" rel="stylesheet">
    <link id="pagestyle" href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">

    <!-- Owl Carousel -->
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">

    <!-- Custom JS -->

    <script src="{{ asset('frontend/js/custom.js')}}" ></script>
    <!-- jQuery -->

    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js')}}" ></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js')}}" ></script>
</head>

<body class="g-sidenav-show bg-gray-100">
    @include('partials.nav')

    <div class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Scripts --><!-- Core -->
    <script src="{{ asset('frontend/js/material-kit.min.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('frontend/js/custom.js')}}" ></script>
    <script src="{{ asset('frontend/js/popper.min.js')}}" ></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>

    <!-- Sweetalert-->
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
