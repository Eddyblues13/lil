<!doctype html>
<html lang="en-uk">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="Withdrawal Page">
    <meta name="keywords" content="withdrawal, funds, money, transfer">
    <meta name="author" content="">
    <meta name="theme-color" content="#000" />
    <title>Withdraw Funds - lilexchangepro.</title>

    <!-- Favicon and icons -->
    <link href="favicon.png" rel="shortcut icon" type="image/png">
    <link rel="apple-touch-icon-precomposed" href="./img/cfc-markets-logo.png" />

    <!-- Google Translate -->
    <div id="google_translate_element"></div>

    <!-- CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />

    <style>
        body {
            background-color: #000;
            font-family: 'Roboto' !important;
            color: #dbdbdb;
        }

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

        .withdraw-container {
            background-color: #131313;
            padding: 30px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .form-control {
            background-color: #333;
            border: 1px solid #444;
            color: #fff;
        }

        .form-control:focus {
            background-color: #444;
            color: #fff;
        }

        .btn-primary {
            background-color: #c40000;
            border-color: #c40000;
        }

        .btn-primary:hover {
            background-color: #a30000;
            border-color: #a30000;
        }

        .balance-info {
            background-color: #131313;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
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

    <!-- Wrapper Start -->
    <div class="wrapper">
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <a href="javascript:void(0)" onclick="openSidebar()"><img src="{{asset('images/menu.png')}}"
                                    alt="menu" width="50px"></a>
                            <div>
                                <img src="https://lilexchangepro.com/logo.png" alt="logo"
                                    style="width:200px; margin-left: 30px;">
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="balance-info">
                            <h4><i class="fa fa-wallet"></i> Available Balance: {{ Auth::user()->currency }}{{
                                number_format($balance, 2) }}</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="withdraw-container">
                            <h3 class="text-center mb-4"><i class="fa fa-credit-card"></i> Withdraw Funds</h3>

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

                            <form action="{{ route('withdraw.submit') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="amount">Amount to Withdraw ({{ Auth::user()->currency }})</label>
                                    <input type="number" class="form-control" id="amount" name="amount" step="0.01"
                                        min="10" required>
                                    <small class="form-text text-muted">Minimum withdrawal amount: {{
                                        Auth::user()->currency }}10.00</small>
                                </div>

                                <div class="form-group">
                                    <label for="payment_method">Payment Method</label>
                                    <select class="form-control" id="payment_method" name="payment_method" required>
                                        <option value="">Select Payment Method</option>
                                        <option value="bank">Bank Transfer</option>
                                        <option value="paypal">PayPal</option>
                                        <option value="crypto">Cryptocurrency</option>
                                    </select>
                                </div>

                                <div class="form-group" id="bank_details" style="display: none;">
                                    <label for="bank_account">Bank Account Details</label>
                                    <textarea class="form-control" id="bank_account" name="bank_account"
                                        rows="3"></textarea>
                                </div>

                                <div class="form-group" id="crypto_details" style="display: none;">
                                    <label for="wallet_address">Wallet Address</label>
                                    <input type="text" class="form-control" id="wallet_address" name="wallet_address">
                                    <label for="crypto_type" class="mt-2">Cryptocurrency Type</label>
                                    <select class="form-control" id="crypto_type" name="crypto_type">
                                        <option value="BTC">Bitcoin (BTC)</option>
                                        <option value="ETH">Ethereum (ETH)</option>
                                        <option value="USDT">Tether (USDT)</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block mt-4">Submit Withdrawal
                                    Request</button>
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

    <!-- JavaScript Files -->
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
        
        // Show/hide payment method details
        $(document).ready(function() {
            $('#payment_method').change(function() {
                const method = $(this).val();
                
                $('#bank_details').hide();
                $('#crypto_details').hide();
                
                if (method === 'bank') {
                    $('#bank_details').show();
                } else if (method === 'crypto') {
                    $('#crypto_details').show();
                }
            });
        });
    </script>
</body>

</html>