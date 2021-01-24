<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Bbootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- App -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts.topbar_menu')

        <!-- Main Sidebar Container -->
        @include('layouts.sidebar_menu')

        <div class="content-wrapper">
            @yield('content')
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2019-2020 <a href="{{ config('APP_URL') }}">{{ config('app.name') }}</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block"><b>Version</b> 1.0.0</div>
        </footer>
    </div>

    <script>
        var App = {
            baseUrl: "{{ url('/') }}",
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.js') }}"></script>
    <!-- App -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
