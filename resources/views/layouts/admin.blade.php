<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>
        @yield('title')
    </title>

    <link rel="shortcut icon" type="image/jpg"
        href="https://cdn.pixabay.com/photo/2015/12/23/01/14/edit-1105049__340.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
        integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('admin/css/theme.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" type="text/css" /> --}}
    <style>
        .navbar-brand {
            display: none;
        }

        /* preloader */
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            background: white;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99999;
        }

        .disppear {
            animation: vanish 1s forwards;
        }

        @keyframes vanish {
            100% {
                opacity: 0;
                visibility: hidden;
            }
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <!-- preloader here -->
    <div class="loader">
        <img src="https://fyp.udsm.ac.tz/assets/dist/img/load-gif.gif" alt="">
    </div>
    <div id="layout-wrapper">
        <!-- ========== navbar Start ========== -->
        <header id="page-topbar">
            @include('layouts.inc.adminnav')
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu shadow">
                @include('layouts.inc.sidebar')
            </div>
            <!-- ========== Left Sidebar Start ========== -->
            <!--  Content here -->

            <div class="main-content shadow">
                @yield('content')
                <!-- End Page-content -->
                <br />
                <br />
                @include('layouts.inc.adminfooter')
            </div>

        </header>
    </div>
    <!-- Overlay-->
    <div class="menu-overlay"></div>
    <!-- jQuery  -->
    {{-- <script src="{{ asset('admin/js/jquery.min.js') }}"></script> --}}
    {{-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('admin/js/waves.js') }}"></script>
    <script src="{{ asset('admin/js/simplebar.min.js') }}"></script>
    <!-- Morris Js-->
    <script src="{{ asset('admin/js/morris.min.js') }}"></script>
    <!-- Raphael Js-->
    <script src="{{ asset('admin/js/raphael.min.js') }}"></script>
    <!-- Morris Custom Js-->
    <script src="{{ asset('admin/js/dashboard-demo.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('admin/js/theme.js') }}"></script>
    <script>
        var loader = document.querySelector(".loader")

        window.addEventListener("load", vanish);

        function vanish() {
            loader.classList.add("disppear");
        }
    </script>
    @yield('scripts')
</body>

</html>
