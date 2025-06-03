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
    <title>Investment Plans - lilexchangepro.</title>
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

    <style>
        /* Your existing styles from dashboard */
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

        /* Investment Plan Specific Styles */
        .plan-card {
            background-color: #131313;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            color: #dbdbdb;
            transition: all 0.3s ease;
            border: 1px solid #333;
        }

        .plan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border-color: #007bff;
        }

        .plan-features {
            list-style-type: none;
            padding-left: 0;
        }

        .plan-features li {
            padding: 5px 0;
            border-bottom: 1px solid #333;
        }

        .btn-invest {
            background-color: #007bff;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
        }

        .plan-header {
            border-bottom: 1px solid #333;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .account-type-selector {
            margin-bottom: 30px;
        }

        .account-type-btn {
            background-color: #333;
            color: #dbdbdb;
            border: none;
            margin-right: 10px;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .account-type-btn.active {
            background-color: #007bff;
            color: white;
        }
    </style>
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
        <!-- <a href="{{ route('invest') }}"><i class="fa fa-line-chart"></i> Invest</a>
        <a href="{{ route('transactions') }}"><i class="fa fa-history"></i> Transaction History</a>
        <a href="{{ route('profile') }}"><i class="fa fa-user"></i> Profile</a> -->
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
                style="margin-top:40px; background-color:transparent; width:1000px; height:400px;">
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
                    <div class="col-lg-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height"
                            style="background-color:#131313; color:#dbdbdb;">
                            <div class="iq-card-body">
                                <h2 class="text-center mb-4">Choose an Investment Plan</h2>

                                <!-- Account Type Selector -->
                                <div class="account-type-selector text-center">
                                    <h4 class="mb-3">Select Account Type:</h4>
                                    <div>
                                        <button class="account-type-btn active" data-type="holding">Holding
                                            Account</button>
                                        <button class="account-type-btn" data-type="staking">Staking Account</button>
                                        <button class="account-type-btn" data-type="trading">Trading Account</button>
                                    </div>
                                </div>

                                <!-- Investment Plans -->
                                <div class="row">
                                    @foreach($plans as $plan)
                                    <div class="col-md-4">
                                        <div class="plan-card">
                                            <div class="plan-header">
                                                <h3>{{ $plan->name }}</h3>
                                                <h2>{{ Auth::user()->currency }}{{ number_format($plan->price, 2) }}
                                                </h2>
                                            </div>
                                            <ul class="plan-features">
                                                <li><i class="fa fa-check"></i> {{ $plan->swap_fee ? 'With Swap Fees' :
                                                    'No Swap Fees' }}</li>
                                                <li><i class="fa fa-check"></i> {{ $plan->pairs }} Trading Pairs</li>
                                                @if($plan->leverage)
                                                <li><i class="fa fa-check"></i> Leverage: {{ $plan->leverage }}</li>
                                                @endif
                                                @if($plan->spread)
                                                <li><i class="fa fa-check"></i> Spread: {{ $plan->spread }}</li>
                                                @endif
                                            </ul>
                                            <form action="{{ route('invest.submit') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                                <input type="hidden" name="account_type" value="holding"
                                                    id="account_type_{{ $plan->id }}">
                                                <button type="submit" class="btn-invest">Invest Now</button>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
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

    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

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

        // Handle account type selection
        document.querySelectorAll('.account-type-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.account-type-btn').forEach(b => {
                    b.classList.remove('active');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Get the account type
                const accountType = this.dataset.type;
                
                // Update all hidden account_type fields
                document.querySelectorAll('[id^="account_type_"]').forEach(input => {
                    input.value = accountType;
                });
            });
        });
    </script>
</body>

</html>