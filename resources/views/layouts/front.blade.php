<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/jpg"
        href="https://cdn.pixabay.com/photo/2015/12/23/01/14/edit-1105049__340.png" />
    <title>
        @yield('title')
    </title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="Demen E-com">
    <link href="{{ asset('frontend/style.css') }}" rel="stylesheet" />
    {{-- exzoom --}}
    <link href="{{ asset('frontend/productimageslider/style.css') }}" rel="stylesheet" />
    {{-- exzoomends --}}
    <link href="{{ asset('frontend/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/owl.carousel.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
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
    <!-- fonts links -->
    <!-- Scripts -->
    {{-- @vite(['resources/js/app.js']) --}}
</head>

<body>
    <!-- preloader here -->
    <div class="loader">
        <img src="https://fyp.udsm.ac.tz/assets/dist/img/load-gif.gif" alt="">
    </div>

    <!--  Content here -->

    @include('layouts.inc.topnavbar')
    <div class="home-section">
        @include('layouts.inc.frontnavbar')
        <div class="main-content">
            @yield('content')

            <!-- End Page-content -->
            @include('layouts.inc.frontendfooter')
        </div>
    </div>
    <br /> <br /> <br />
    <a href="https://wa.me/+2349032491755?text=I%20love%20your%20goods,%20how%20can%20i get%20it." target="_blank"
        class="arrow2 ">
        <i>
            <img src="./whatsapp/tawkto/whatsapp.png" alt="" width="50px">
        </i>
    </a>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/633d70b654f06e12d8988c71/1gek01k3o';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    <!-- bootstrap cdn js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{ asset('frontend/custom.js') }}"></script>
    <script src="{{ asset('frontend/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/productimageslider/custom.js') }}"></script>
    <script>
        // search
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/product-list",
            success: function(response) {
                // console.log(response);
                startAutoComplete(response)
            }
        });

        function startAutoComplete(availableTags) {
            $("#search_product").autocomplete({
                source: availableTags
            });
        }
    </script>
    <script>
        // curriencies
        function currency_change(currency_code) {

            $.ajax({
                method: "POST",
                url: '{{ route('currency.load') }}',
                data: {
                    currency_code: currency_code,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    if (response['status']) {
                        location.reload();
                    } else {
                        alert('server error');
                    }
                }
            });
        }
    </script>
    {{-- preloader --}}
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
