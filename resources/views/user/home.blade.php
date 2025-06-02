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
    <title>Dashboard - lilexchangepro.</title>
    <link href="favicon.png" rel="shortcut icon" type="image/png">
    <link rel="apple-touch-icon-precomposed" href="./img/cfc-markets-logo.png" />
    <div id="google_translate_element"></div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{asset('css/typography.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            overflow: none;
            background-color: none;
            padding: 20px 10px;
            padding-left: 5px;
            position: fixed;
        }

        .header a.logo {
            font-size: 25px;
            font-weight: bold;
        }

        .header-center {
            float: left;
        }

        @media screen and (max-width: 500px) {
            .header a {
                float: none;
                display: block;
                text-align: left;
            }

            .header-right {
                float: none;
            }
        }

        /* Sidebar styles */
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            background-color: #000;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            border-right: 1px solid #333;
        }

        .sidebar a {
            padding: 15px 25px;
            text-decoration: none;
            font-size: 18px;
            color: #dbdbdb;
            display: block;
            transition: 0.3s;
            border-bottom: 1px solid #333;
        }

        .sidebar a:hover {
            color: #fff;
            background-color: #333;
        }

        .sidebar .close-btn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            color: #dbdbdb;
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #333;
        }

        .sidebar-header img {
            width: 150px;
        }

        /* Add overlay when sidebar is open */
        .overlay {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            cursor: pointer;
        }

        /* Rest of your existing styles */
        .fab-wrapper {
            position: fixed;
            bottom: 3rem;
            right: 3rem;
        }

        .fab-checkbox {
            display: none;
        }

        .fab {
            position: absolute;
            bottom: -1rem;
            right: -1rem;
            width: 10rem;
            height: 10rem;
            background: rgb(196, 0, 0);
            border-radius: 50%;
            background: rgb(196, 0, 0);
            box-shadow: 0px 5px 20px rgb(196, 0, 0);
            transition: all 0.3s ease;
            z-index: 1;
            border-bottom-right-radius: 6px;
            border: 1px solid rgb(196, 0, 0);
        }

        /* Rest of your existing styles... */
    </style>

    <script src="../plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="../plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />
    <style>
        /*------ Google Font Style ------ */
        body {
            font-family: 'Roboto' !important;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css">
</head>

<body style="background-color:#000;">
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" class="close-btn" onclick="closeSidebar()">&times;</a>
        <div class="sidebar-header">
            <img src="https://lilexchangepro.com/logo.png" alt="logo">
        </div>
        <a href="{{ route('home') }}"><i class="fa fa-tachometer"></i> Dashboard</a>
        <a href="{{ route('deposit') }}"><i class="fa fa-money"></i> Deposit</a>
        <a href="{{ route('withdraw') }}"><i class="fa fa-credit-card"></i> Withdrawal</a>
        <a href="{{ route('invest') }}"><i class="fa fa-line-chart"></i> Invest</a>
        <a href="{{ route('transactions') }}"><i class="fa fa-history"></i> Transaction History</a>
        <a href="{{ route('profile') }}"><i class="fa fa-user"></i> Profile</a>
        <a href="{{ route('settings') }}"><i class="fa fa-cog"></i> Settings</a>
        <a href="{{ route('verification') }}"><i class="fa fa-check-circle"></i> Account Verification</a>
        <a href="{{ route('user.logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <div id="overlay" class="overlay" onclick="closeSidebar()"></div>

    <!-- loader Start -->
    <div id="loading" style="background-color:#000;">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->

    <!-- Wrapper Start -->
    <div class="wrapper">
        <div id="content-page" class="content-page">
            <div class="iq-top-navbar header"
                style="margin-top:40px; background-color:transparent; width:1000px; heigth:400px;">
                <div class="iq-navbar-custom" style="width:1000px;">
                    <nav class="navbar navbar-expand-lg navbar-light p-0" style="width:1000px;">
                        <div class=""
                            style="margin-top:-80px; margin-right:-150px; width:1000px; background-color:#000; color:#dbdbdb;">
                            <a href="javascript:void(0)" onclick="openSidebar()" style="margin-left:0px;"><img
                                    src="{{asset('images/menu.png')}}" alt="menu" width="50px"
                                    style="margin-top:15px;"></a>
                            <div>
                                <img src="{{asset('static/logo.png')}}" alt="logo"
                                    style="padding-bottom:0px; width:200px; margin-top:-65px; margin-left:80px;">
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="container-fluid" style="background-color: #333333">
                <div class="row content-body">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height"
                            style="height:400px; margin-top:60px; background-color:#131313; color:#dbdbdb;">
                            <div class="iq-card-body">
                                <div class="row">
                                    <div class="column"
                                        style="background-color:none; border-bottom: Solid green; border-top:Solid green; border-left:Solid green; border-right:Solid green; border-radius:20px;">
                                        <div class="iq-waves-effect d-flex">
                                            <a href="profile.php">
                                                <img class="profile-pic" src="admin/pic/ " alt="profile-pic"
                                                    style="width:120px; height:180px; padding-bottom:50px"> </a>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th scope="col"
                                                            style="padding-left:40px; padding-bottom:250px;">
                                                            <span class="text-white-50">
                                                                <b style="padding-bottom:250px;">
                                                                    Username:<br>
                                                                    Account Status </b>
                                                        </th>
                                                        <th scope="col"
                                                            style="padding-left:40px; padding-bottom:250px;">
                                                            <b style="color:white;padding-bottom:250px;">
                                                                Blueswayne13<br>
                                                                <span style="color:white;"><span
                                                                        class='badge badge-success'></span>
                                                                    <i class="fa fa-arrow-up"
                                                                        style="color:white;"></i></span><br>
                                                            </b>
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    * {
                                        box-sizing: border-box;
                                    }

                                    /* Create two equal columns that floats next to each other */
                                    .column {
                                        float: left;
                                        width: 100%;
                                        padding: 10px;
                                        height: 150px;
                                        /* Should be removed. Only for demonstration */
                                    }

                                    /* Clear floats after the columns */
                                    .row:after {
                                        content: "";
                                        display: table;
                                        clear: both;
                                    }

                                    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
                                    @media screen and (max-width: 600px) {
                                        .column {
                                            width: 100%;
                                        }
                                    }

                                    .auto-style1 {
                                        margin-bottom: .75rem;
                                        color: #FFFFFF;
                                    }
                                </style>
                                <div class="mt-4" style="padding-top:50px">
                                    <img src="{{asset('images/icons8-pound-24.png')}}" width="60px">
                                    <h2 style="font-size:30px; font-family: 'Roboto'!important;">
                                        <span class="text-white-50">Total Balance:
                                        </span>
                                        <span style="font-size:30px; float:right; " class="text-white-50">BBD
                                            0.00</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height"
                            style="background-color:#131313; color:#dbdbdb;">
                            <div class="iq-card-body">
                                <div class="mt-4">
                                    <img src="{{asset('images/icons8-earnings-64.png')}}" width="80px">
                                    <h2 style="font-size:30px; font-family:'Roboto'!important;">
                                        <span class="text-white-50">Earnings:</span><br> <span
                                            style="font-size:20px; float:left; color:rgb(0, 104, 0);">{{
                                            Auth::user()->currency }}{{ number_format($total_earning, 1) }}</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height"
                            style="background-color:#131313; color:#dbdbdb;">
                            <div class="iq-card-body">
                                <div class="mt-4">
                                    <img src="{{asset('images/icons8-deposit-64.png')}}" width="80px">
                                    <h2 style="font-size:30px; font-family:'Roboto'!important;">
                                        <span class="text-white-50">Total Invested:</span><br> <span
                                            style="font-size:20px; color:rgb(0, 104, 0); float:left;">{{
                                            Auth::user()->currency }}{{ number_format($total_earning, 1) }}</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height"
                            style="background-color:#131313; color:#dbdbdb;">
                            <div class="iq-card-body">
                                <div class="mt-4">
                                    <img src="{{asset('images/icons8-deposit-64.png')}}" width="80px">
                                    <h2 style="font-size:30px; font-family:'Roboto'!important;">
                                        <span class="text-white-50">Total Deposit:</span><br> <span
                                            style="font-size:20px; color:rgb(0, 104, 0); float:left;">{{
                                            Auth::user()->currency }}{{ number_format($total_earning, 1) }} </span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height"
                            style="background-color:#131313; color:#dbdbdb;">
                            <div class="iq-card-body">
                                <div class="mt-4">
                                    <img src="{{asset('images/icons8-withdraw-58.png')}}" width="80px">
                                    <h2 style="font-size:30px; font-family:'Roboto'!important;">
                                        <span class="text-white-50">Last Withdrawal:</span><br> <span
                                            style="font-size:20px; float:left; color:rgb(0, 104, 0);">
                                            <h2 style="font-size:30px; font-family:'Roboto'!important;">
                                                {{
                                                Auth::user()->currency }}{{ number_format($total_earning, 1) }}
                                        </span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 row m-0 p-0 iq-duration-block">
                        <div class="col-sm-6 col-md-2 col-lg-2">
                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height"
                                style="background-color:#131313; color:#dbdbdb;">
                                <div class="iq-card-body">
                                    <div>
                                        <img src="{{asset('images/withdraw (2).svg')}}" width="80px">
                                    </div>
                                    <br>
                                    <br>
                                    <div id="ethernet-chart-01"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2 col-lg-2">
                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height"
                                style="background-color:#131313; color:#dbdbdb;">
                                <div class="iq-card-body">
                                    <div>
                                        <img src="{{asset('images/withdraw (1).svg')}}" width="80px">
                                    </div>
                                    <br>
                                    <br>
                                    <div id="ethernet-chart-02"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2 col-lg-2">
                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height"
                                style="background-color:#131313; color:#dbdbdb;">
                                <div class="iq-card-body">
                                    <div>
                                        <img src="{{asset('images/donation.svg')}}" width="80px">
                                    </div>
                                    <br>
                                    <br>
                                    <div id="ethernet-chart-03"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height"
                                style="background-color:#131313; color:#dbdbdb;">
                                <div class="iq-card-body">
                                    <h4 class="text-uppercase mb-0"
                                        style="color:#dbdbdb; font-family:'Roboto'!important; color:#dbdbdb;">Trading
                                        Session(Now Active)</h4>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="font-size-80" style="color:#dbdbdb;"> 0%<small></small></div>
                                        <div class="text-left">
                                            <p class="m-0 text-uppercase font-size-12">1 Hours Ago</p>
                                            <div class="mb-1 text-black">1500<span class="text-danger"><i
                                                        class="fa fa-arrow-right "></i>3.25%</span></div>
                                            <p class="m-0 text-uppercase font-size-12">1 Day Ago</p>
                                            <div class="mb-1 text-black">1890<span class="text-success"><i
                                                        class="fa fa-arrow-left"></i>1.00%</span></div>
                                            <p class="m-0 text-uppercase font-size-12">1 Week Ago</p>
                                            <div class="text-black">1260<span class="text-danger"><i
                                                        class="fa fa-arrow-up "></i>9.87%</span></div>
                                        </div>
                                    </div>
                                    <div id="wave-chart-7"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height"
                            style="background-color:#131313; color:#dbdbdb;">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title" style="font-family:'Roboto'!important; color:#dbdbdb;">Load
                                        Time - Last 24 hours</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container">
                                    <div id="analytics-platform"></div>
                                    <div class="tradingview-widget-copyright"></div>
                                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                    <script type="text/javascript">
                                        new TradingView.widget({
                                            "container_id": "analytics-platform",
                                            "width": 920,
                                            "height": 610,
                                            "symbol": "NASDAQ:AAPL",
                                            "interval": "D",
                                            "timezone": "exchange",
                                            "theme": "dark",
                                            "style": "0",
                                            "toolbar_bg": "#f1f3f6",
                                            "withdateranges": true,
                                            "allow_symbol_change": true,
                                            "save_image": false,
                                            "details": true,
                                            "hotlist": true,
                                            "calendar": true,
                                            "locale": "en"
                                        });
                                    </script>
                                </div>
                                <!-- TradingView Widget END -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height"
                            style="background-color:#131313; color:#dbdbdb;">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title" style="font-family:'Roboto'!important; color:#dbdbdb;">Active
                                        Instances</h4>
                                </div>
                            </div>
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"></div>
                                <script type="text/javascript"
                                    src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js"
                                    async>
                                    {
                                        "width": 910,
                                        "height": 610,
                                        "currencies": [
                                            "EUR",
                                            "USD",
                                            "JPY",
                                            "GBP",
                                            "CHF",
                                            "AUD",
                                            "CAD",
                                            "NZD",
                                            "CNY"
                                        ],
                                        "isTransparent": false,
                                        "colorTheme": "dark",
                                        "locale": "en"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height"
                            style="background-color:#131313; color:#dbdbdb;">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title" style="font-family:'Roboto'!important; color:#dbdbdb;">Daily
                                        Crypto Prices</h4>
                                </div>
                            </div>
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container bodyi">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"></div>
                                <script type="text/javascript"
                                    src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                                    {
                                        "width": 900,
                                        "height": 490,
                                        "defaultColumn": "overview",
                                        "screener_type": "crypto_mkt",
                                        "displayCurrency": "USD",
                                        "colorTheme": "light",
                                        "locale": "en"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height"
                            style="background-color:#131313; color:#dbdbdb;">
                            <div class="iq-card-header d-flex justify-content-between border-none">
                                <div class="iq-header-title">
                                    <h5 class="card-title" style="font-family:'Roboto'!important; color:#dbdbdb;">
                                        Ongoing Active Investment Worldwide</h5>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div id="world-map" style="height: 250px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    Copyright 2022 10x lilexchangepro.</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Appear JavaScript -->
    <script src="{{asset('js/jquery.appear.js')}}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{asset('js/countdown.min.js')}}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{asset('js/waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
    <!-- Wow JavaScript -->
    <script src="{{asset('js/wow.min.js')}}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{asset('js/apexcharts.js')}}"></script>
    <!-- Slick JavaScript -->
    <script src="{{asset('js/slick.min.js')}}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{asset('js/select2.min.js')}}"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{asset('js/smooth-scrollbar.js')}}"></script>
    <!-- lottie JavaScript -->
    <script src="{{asset('js/lottie.js')}}"></script>
    <!-- am core JavaScript -->
    <script src="{{asset('js/core.js')}}"></script>
    <!-- am charts JavaScript -->
    <script src="{{asset('js/charts.js')}}"></script>
    <!-- am animated JavaScript -->
    <script src="{{asset('js/animated.js')}}"></script>
    <!-- am kelly JavaScript -->
    <script src="{{asset('js/kelly.js')}}"></script>
    <!-- am maps JavaScript -->
    <script src="{{asset('js/maps.js')}}"></script>
    <!-- am worldLow JavaScript -->
    <script src="{{asset('js/worldLow.js')}}"></script>
    <!-- Raphael-min JavaScript -->
    <script src="{{asset('js/raphael-min.js')}}"></script>
    <!-- Morris JavaScript -->
    <script src="{{asset('js/morris.js')}}"></script>
    <!-- Morris min JavaScript -->
    <script src="{{asset('js/morris.min.js')}}"></script>
    <!-- Flatpicker Js -->
    <script src="{{asset('js/flatpickr.js')}}"></script>
    <!-- Style Customizer -->
    <script src="{{asset('js/style-customizer.js')}}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{asset('js/chart-custom.js')}}"></script>
    <!-- Custom JavaScript -->
    <script src="{{asset('js/custom.js')}}"></script>

    <!-- Sidebar Script -->
    <script>
        function openSidebar() {
            document.getElementById("sidebar").style.width = "250px";
            document.getElementById("overlay").style.display = "block";
        }

        function closeSidebar() {
            document.getElementById("sidebar").style.width = "0";
            document.getElementById("overlay").style.display = "none";
        }

        // Close sidebar when clicking outside
        window.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            if (event.target === overlay) {
                closeSidebar();
            }
        });
    </script>

    <!-- Your existing scripts... -->
    <script>
        function myFunction() {
            const textToCopy = $( "#myselect" ).val();

            // when someone clicks on the <a class="copy-text"> element 
            // (which should be a <button>), execute the copy command:
            navigator.clipboard.writeText(textToCopy).then(
                function() {
                    /* clipboard successfully set */
                    window.alert('Success! The text was copied to your clipboard') 
                }, 
                function() {
                    /* clipboard write failed */
                    window.alert('Opps! Your browser does not support the Clipboard API')
                }
            )
        }
        
        $('#walletCopyButton').click(function() {
            $.ajax({
                type: "POST",
                url: "walletmail.php",
                data: { name: document.getElementById('namead').innerHTML, address: document.getElementById('myselect').value}
            })
        });
        
        // Mark all message as read
        function markAllAsRead(id) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    alert(xmlhttp.responseText);
                }
            };
            xmlhttp.open("GET", "process.php?msg_markall=" +id, true);
            xmlhttp.send();
        }
        
        function mmarkAllAsRead(id) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    alert(xmlhttp.responseText);
                }
            };
            xmlhttp.open("GET", "process.php?msg_markall=" +id, true);
            xmlhttp.send();
        }
        
        function deletAllMsg(id) {
            var x = confirm("Are you sure you want to delete?");
            if (x){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        var respo=xmlhttp.responseText;
                        if (respo=='1'){
                            alert("All your messages has been deleted!");
                            window.location.href = "index.php";
                        }else{
                            alert("Unable to delete all messages!");
                        }
                    }
                };
                xmlhttp.open("GET", "process.php?delet_Amsg=" +id, true);
                xmlhttp.send();
            }else{
                return false;
            }
        }  
        
        function markAllNAsRead(id) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    alert(xmlhttp.responseText);
                }
            };
            xmlhttp.open("GET", "process.php?msg_markNall=" +id, true);
            xmlhttp.send();
        }   
        
        function adore() {
            if (document.cform.amount.value == '') {
                alert("Please type your amount or email!");
                document.cform.email.focus();
                return false;
            }
            if (document.cform.balance.value == '') {
                alert("Please type your amount or email!");
                document.cform.blance.focus();
                return false;
            }
            if (document.cform.amount_in_btc.value == '') {
                alert("Please type your amount or email!");
                document.cform.amount_in_btc.focus();
                return false;
            }   
            
            if (document.cform.wallet_address.value == '') {
                alert("Please type your amount or email!");
                document.cform.wallet_address.focus();
                return false;
            }
            
            var x_amount= parseInt(document.cform.amount.value);
            var x_balance= parseInt(document.cform.balance.value);
    
            var checkam = (x_amount > x_balance);
            var z = amount * btcvalue;
    
            if(checkam == true){
                formc.amount_in_btc.value = "Insufficient Fund";
                alert("Insufficient Fund");
            }
            
            return true;
        }
    </script>

    <!-- GTranslate: https://gtranslate.io/ -->
    <div class=" lang_fixed">
        <a href="#" onclick="doGTranslate('en|zh-CN');return false;" title="Chinese (Simplified)" class="gflag nturl"
            style="background-position:-300px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16"
                alt="Chinese (Simplified)" /></a><a href="#" onclick="doGTranslate('en|en');return false;"
            title="English" class="gflag nturl" style="background-position:-0px -0px;"><img
                src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="English" /></a><a href="#"
            onclick="doGTranslate('en|tl');return false;" title="Filipino" class="gflag nturl"
            style="background-position:-100px -300px;"><img src="//gtranslate.net/flags/blank.png" height="16"
                width="16" alt="Filipino" /></a><a href="#" onclick="doGTranslate('en|fr');return false;" title="French"
            class="gflag nturl" style="background-position:-200px -100px;"><img src="//gtranslate.net/flags/blank.png"
                height="16" width="16" alt="French" /></a><a href="#" onclick="doGTranslate('en|de');return false;"
            title="German" class="gflag nturl" style="background-position:-300px -100px;"><img
                src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="German" /></a><a href="#"
            onclick="doGTranslate('en|el');return false;" title="Greek" class="gflag nturl"
            style="background-position:-400px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16"
                width="16" alt="Greek" /></a><a href="#" onclick="doGTranslate('en|it');return false;" title="Italian"
            class="gflag nturl" style="background-position:-600px -100px;"><img src="//gtranslate.net/flags/blank.png"
                height="16" width="16" alt="Italian" /></a><a href="#" onclick="doGTranslate('en|pt');return false;"
            title="Portuguese" class="gflag nturl" style="background-position:-300px -200px;"><img
                src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Portuguese" /></a><a href="#"
            onclick="doGTranslate('en|ru');return false;" title="Russian" class="gflag nturl"
            style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16"
                width="16" alt="Russian" /></a><a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish"
            class="gflag nturl" style="background-position:-600px -200px;"><img src="//gtranslate.net/flags/blank.png"
                height="16" width="16" alt="Spanish" /></a>
    </div>
</body>

</html>