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
    <title>Investment Plans - cytopiacapitalpro.</title>
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

        /* Investment Plan Cards */
        .plan-card {
            background-color: #131313;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            border: 1px solid #333;
        }

        .plan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .plan-card.featured {
            border: 2px solid #c40000;
            position: relative;
        }

        .plan-card.featured:after {
            content: "POPULAR";
            position: absolute;
            top: -10px;
            right: 20px;
            background: #c40000;
            color: #fff;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .plan-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #fff;
        }

        .plan-price {
            font-size: 36px;
            font-weight: bold;
            color: #c40000;
            margin-bottom: 20px;
        }

        .plan-features {
            list-style: none;
            padding: 0;
            margin-bottom: 25px;
        }

        .plan-features li {
            padding: 8px 0;
            color: #dbdbdb;
            border-bottom: 1px solid #333;
        }

        .plan-features li:last-child {
            border-bottom: none;
        }

        .plan-features li i {
            margin-right: 10px;
            color: #c40000;
        }

        .account-type-selector {
            margin-bottom: 20px;
        }

        .account-type-btn {
            background-color: #333;
            color: #dbdbdb;
            border: none;
            padding: 10px 15px;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .account-type-btn.active {
            background-color: #c40000;
            color: #fff;
        }

        .btn-invest {
            background-color: #c40000;
            color: #fff;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-invest:hover {
            background-color: #a30000;
            transform: translateY(-2px);
        }

        /* Responsive adjustments */
        @media (max-width: 767px) {
            .plan-card {
                padding: 20px;
            }

            .plan-name {
                font-size: 20px;
            }

            .plan-price {
                font-size: 28px;
            }
        }
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
            <img src="{{asset('static/logo.png')}}" alt="logo">
        </div>
        <a href="{{ route('home') }}"><i class="fa fa-tachometer"></i> Dashboard</a>
        <a href="{{ route('deposit') }}"><i class="fa fa-money"></i> Deposit</a>
        <a href="{{ route('withdraw') }}"><i class="fa fa-credit-card"></i> Withdrawal</a>
        <a href="{{ route('invest') }}"><i class="fa fa-line-chart"></i> Invest</a>
        {{-- <a href="{{ route('transactions') }}"><i class="fa fa-history"></i> Transaction History</a>
        <a href="{{ route('profile') }}"><i class="fa fa-user"></i> Profile</a> --}}
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

            <div class="container-fluid" style="background-color: #333333; padding-top: 20px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height"
                            style="background-color:#131313; color:#dbdbdb; margin-bottom: 30px;">
                            <div class="iq-card-body">
                                <h2 class="text-center mb-4" style="color: #dbdbdb;">Investment Plans</h2>
                                <p class="text-center mb-5">Choose from our carefully crafted investment plans designed
                                    to maximize your returns. Select the plan that best fits your financial goals.</p>

                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($plans as $plan)
                    <div class="col-lg-4 col-md-6">
                        <div class="plan-card {{ $loop->index == 1 ? 'featured' : '' }}">
                            <h3 class="plan-name">{{ $plan->name }}</h3>
                            <div class="plan-price">{{ Auth::user()->currency }}{{ number_format($plan->price, 2) }}
                            </div>
                            <ul class="plan-features">
                                <li><i class="fas fa-check"></i> No Swap Fees</li>
                                <li><i class="fas fa-check"></i> {{ $plan->pairs }} Trading Pairs</li>
                                @if($plan->leverage)
                                <li><i class="fas fa-check"></i> Leverage {{ $plan->leverage }}</li>
                                @endif
                                @if($plan->spread)
                                <li><i class="fas fa-check"></i> Spread {{ $plan->spread }}</li>
                                @endif
                                <li><i class="fas fa-check"></i> 24/7 Customer Support</li>
                                <li><i class="fas fa-check"></i> Advanced Trading Tools</li>
                            </ul>

                            <form method="POST" action="{{ route('invest.submit') }}" id="plan-form-{{ $plan->id }}">
                                @csrf
                                <input type="hidden" name="plan_id" value="{{ $plan->id }}">

                                <div class="account-type-selector mb-3">
                                    <p class="text-white mb-2">Select Account Type:</p>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="account-type-btn active">
                                            <input type="radio" name="account_type" value="holding" checked> Holding
                                        </label>
                                        <label class="account-type-btn">
                                            <input type="radio" name="account_type" value="staking"> Staking
                                        </label>
                                        <label class="account-type-btn">
                                            <input type="radio" name="account_type" value="trading"> Trading
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn-invest">Invest Now</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height"
                            style="background-color:#131313; color:#dbdbdb; margin-top: 30px;">
                            <div class="iq-card-body">
                                <h3 class="mb-4" style="color: #dbdbdb;">Your Investment History</h3>

                                @if($planHistories->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <th>Plan Name</th>
                                                <th>Amount</th>
                                                <th>Account Type</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($planHistories as $history)
                                            <tr>
                                                <td>{{ $history->plan->name }}</td>
                                                <td>{{ Auth::user()->currency }}{{ number_format($history->amount, 2) }}
                                                </td>
                                                <td>{{ ucfirst($history->account_type) }}</td>
                                                <td>{{ $history->created_at->format('M d, Y H:i') }}</td>
                                                <td><span class="badge badge-success">Active</span></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <p class="text-center">You haven't invested in any plans yet.</p>
                                @endif
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
                    Copyright 2022 10x cytopiacapitalpro.</a> All Rights Reserved.
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
        
        // Account type selector
        $(document).ready(function() {
            $('.account-type-btn').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            });
            
            // Confirm before submitting investment
            $('form[id^="plan-form-"]').submit(function(e) {
                if (!confirm('Are you sure you want to invest in this plan?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>

</html>