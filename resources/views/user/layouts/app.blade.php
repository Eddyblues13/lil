<!doctype html>
<html lang="en-uk">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords"
        content="investment, Forex, Trading, Bitcoin, Cryptocurrency, Global investment, Live Trade, Trading class, indics">
    <meta name="author" content="">
    <meta name="theme-color" content="#000" />

    <!-- Site Properties -->
    <title>@yield('title', 'Dashboard - cytopiacapitalpro.')</title>

    <!-- Favicon -->
    <link href="{{ asset('favicon.png') }}" rel="shortcut icon" type="image/png">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('img/cfc-markets-logo.png') }}" />

    <!-- Google Translate -->
    <div id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <!-- SweetAlerts -->
    <script src="{{ asset('plugins/sweetalerts/promise-polyfill.js') }}"></script>
    <link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />

    @stack('styles')
</head>

<body style="background-color:#000;">
    <!-- Loading Screen -->
    <div id="loading" style="background-color:#000;">
        <div id="loading-center"></div>
    </div>

    <!-- Include Sidebar -->
    @include('user.partials.sidebar')

    <!-- Wrapper Start -->
    <div class="wrapper">
        @yield('content')
    </div>
    <!-- Wrapper END -->

    <!-- Footer -->
    <footer class="iq-footer" style="background-color:#000; color:#dbdbdb;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    Copyright {{ date('Y') }} cytopiacapitalpro. All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Other JS files -->
    <script src="{{ asset('js/appear.js') }}"></script>
    <script src="{{ asset('js/countdown.min.js') }}"></script>
    <!-- Include all other JS files as needed -->

    @stack('scripts')
</body>

</html>