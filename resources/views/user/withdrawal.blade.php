<!doctype html>
<html lang="en-uk">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="Withdrawal Page">
    <meta name="keywords" content="withdrawal, funds, money, transfer">
    <meta name="author" content="">
    <meta name="theme-color" content="#000" />
    <!-- Site Properties -->
    <title>Withdraw Funds - lilexchangepro.</title>
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
            background-color: #000;
            color: white;
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

        /* Withdrawal specific styles */
        .withdraw-container {
            background-color: #131313;
            padding: 30px;
            border-radius: 10px;
            margin-top: 20px;
            border: 1px solid #333;
        }

        .withdraw-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: red;
            border-bottom: 1px solid #333;
            padding-bottom: 10px;
            font-weight: bold;
            text-align: center;
        }

        .balance-info {
            background-color: #131313;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            border: 1px solid #333;
        }

        .balance-info h4 {
            color: white;
            font-weight: bold;
        }

        .balance-info h4 i {
            color: red;
            margin-right: 10px;
        }

        .form-group label {
            color: red;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-control {
            background-color: #222;
            border: 1px solid #333;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .form-control:focus {
            background-color: #222;
            color: white;
            border-color: #666;
            box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25);
        }

        .form-text {
            color: #aaa;
        }

        .submit-btn {
            background-color: #ff0000;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 20px;
        }

        .submit-btn:hover {
            background-color: #cc0000;
            transform: translateY(-2px);
        }

        .submit-btn i {
            margin-right: 10px;
        }

        /* Alert messages */
        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid transparent;
        }

        .alert-success {
            background-color: #28a745;
            color: white;
            border-color: #218838;
        }

        .alert-danger {
            background-color: #dc3545;
            color: white;
            border-color: #c82333;
        }

        .alert i {
            margin-right: 10px;
        }
    </style>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />
    <style>
        /*------ Google Font Style ------ */
        body {
            font-family: 'Roboto' !important;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css">
</head>

<body>
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" class="close-btn" onclick="closeSidebar()">&times;</a>
        <div class="sidebar-header">
            <img src="{{asset('static/logo.png')}}" alt="logo">
        </div>
        <a href="{{ route('home') }}"><i class="fa fa-tachometer"></i> Dashboard</a>
        <a href="{{ route('deposit') }}"><i class="fa fa-money"></i> Deposit</a>
        <a href="{{ route('withdraw') }}" class="active"><i class="fa fa-credit-card"></i> Withdrawal</a>
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

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="balance-info">
                            <h4><i class="fa fa-wallet"></i> Available Balance: {{ Auth::user()->currency }}{{
                                number_format($balance, 2) }}</h4>
                        </div>

                        <div class="withdraw-container">
                            <h3 class="withdraw-title"><i class="fa fa-credit-card"></i> Withdraw Funds</h3>

                            @if(session('success'))
                            <div class="alert alert-success">
                                <i class="fa fa-check-circle"></i> {{ session('success') }}
                            </div>
                            @endif

                            @if(session('error'))
                            <div class="alert alert-danger">
                                <i class="fa fa-times-circle"></i> {{ session('error') }}
                            </div>
                            @endif

                            <form action="{{ route('withdraw.submit') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="amount">Amount to Withdraw ({{ Auth::user()->currency }})</label>
                                    <input type="number" class="form-control" id="amount" name="amount" step="0.01"
                                        min="10" required value="{{ old('amount') }}">
                                    <small class="form-text">Minimum withdrawal amount: {{ Auth::user()->currency
                                        }}10.00</small>
                                </div>

                                <div class="form-group">
                                    <label for="payment_method">Payment Method</label>
                                    <select class="form-control" id="payment_method" name="payment_method" required>
                                        <option value="">Select Payment Method</option>
                                        <option value="btc" @if(old('payment_method')=='btc' ) selected @endif>Bitcoin
                                            (Bitcoin)</option>
                                        <option value="eth" @if(old('payment_method')=='eth' ) selected @endif>Ethereum
                                            (ERC20)</option>
                                        <option value="xrp" @if(old('payment_method')=='xrp' ) selected @endif>XRP (XRP
                                            Ledger)</option>
                                        <option value="sol" @if(old('payment_method')=='sol' ) selected @endif>Solana
                                            (Solana)</option>
                                        <option value="usdt" @if(old('payment_method')=='usdt' ) selected @endif>Tether
                                            (TRC20)</option>
                                        <option value="doge" @if(old('payment_method')=='doge' ) selected @endif>
                                            Dogecoin (Dogecoin)</option>
                                        <option value="ltc" @if(old('payment_method')=='ltc' ) selected @endif>Litecoin
                                            (Litecoin)</option>
                                        <option value="ada" @if(old('payment_method')=='ada' ) selected @endif>Cardano
                                            (Cardano)</option>
                                        <option value="bch" @if(old('payment_method')=='bch' ) selected @endif>Bitcoin
                                            Cash (BCH)</option>
                                    </select>
                                </div>

                                <div class="form-group" id="wallet_address_group" style="display: none;">
                                    <label for="wallet_address">Wallet Address</label>
                                    <input type="text" class="form-control" id="wallet_address" name="wallet_address"
                                        value="{{ old('wallet_address') }}">
                                </div>

                                <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>

                                <button type="submit" class="submit-btn">
                                    <i class="fa fa-paper-plane"></i> Submit Withdrawal Request
                                </button>
                            </form>
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
                        <li class="list-inline-item"><a href="#" style="color:#dbdbdb;">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#" style="color:#dbdbdb;">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right" style="color:#dbdbdb;">
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
        
        // Show/hide wallet address field based on payment method
        $(document).ready(function() {
            $('#payment_method').change(function() {
                const method = $(this).val();
                
                if (method === 'btc' || method === 'eth' || method === 'xrp' || 
                    method === 'sol' || method === 'usdt' || method === 'doge' || 
                    method === 'ltc' || method === 'ada' || method === 'bch') {
                    $('#wallet_address_group').show();
                } else {
                    $('#wallet_address_group').hide();
                }
            });
            
            // Trigger change on page load if there's a previously selected value
            if ($('#payment_method').val()) {
                $('#payment_method').trigger('change');
            }
        });
    </script>
</body>

</html>