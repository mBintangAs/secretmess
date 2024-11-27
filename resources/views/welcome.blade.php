<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Secret Message APP</title>
    <link href="/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    {{-- <link href="/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" /> --}}
    <link href="/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="/assets/css/app.css" rel="stylesheet">
    
    <link href="/assets/css/icons.css" rel="stylesheet">

    <!-- Fonts -->
    @stack('styles')
</head>

<body class="antialiased">
    @yield('content')
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
	{{-- <script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script> --}}

    <script src="/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="/assets/js/index.js"></script>
	<!--app JS-->
	<script src="/assets/js/app.js"></script>
    @stack('scripts')
</body>

</html>
