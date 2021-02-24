<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="egitriyanaf - SM-Ecommerce">
    <meta name="author" content="egitriyanaf">
    <meta name="keyword" content="aplikasi ecommerce laravel, Fashion, Pakaian Pria, Pakaian Wanita, online shop">
    
    @yield('title')

    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/simple-line-icons.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">

</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

    @include('layouts.module.header')

    <div class="app-body" id="dw">
        <div class="sidebar">

            @include('layouts.module.sidebar')

            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>

        @yield('content')
   
    </div>
    
    <footer class="app-footer">
        <div>
            <a href="https://egitriyanaf.github.io/My-Portfolio">Egi Triyana Fidollah</a>
            <span>&copy; 2021</span>
        </div>
        <div class="ml-auto">
            <span>Powered By</span>
            <a href="https://inovasijet.com">Inovasi Jet</a>
        </div>
    </footer>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/coreui.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-tooltips.min.js') }}"></script>
    
    @yield('js')

</body>
</html>