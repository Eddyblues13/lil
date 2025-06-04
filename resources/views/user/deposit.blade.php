<!-- deposit.blade.php -->
<!DOCTYPE html>
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
    <title>Deposit - cytopiacapitalpro.</title>
    <link href="{{ asset('favicon.png') }}" rel="shortcut icon" type="image/png">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('img/cfc-markets-logo.png') }}" />
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
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #000;
            color: #dbdbdb;
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

        /* Overlay styles */
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

        /* Deposit form styles */
        .payment-methods {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 10px;
        }

        .payment-method-card {
            background-color: #333;
            border-radius: 8px;
            padding: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid #444;
        }

        .payment-method-card:hover {
            background-color: #444;
            transform: translateY(-2px);
        }

        .payment-method-card input[type="radio"] {
            display: none;
        }

        .payment-method-card input[type="radio"]:checked+label {
            color: #fff;
        }

        .payment-method-card input[type="radio"]:checked+label .method-content {
            border-color: rgb(196, 0, 0);
        }

        .method-content {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px;
            border: 2px solid transparent;
            border-radius: 5px;
        }

        .method-content h6 {
            margin: 0;
            font-size: 16px;
            color: #dbdbdb;
        }

        .method-content small {
            color: #aaa;
            font-size: 12px;
        }

        .wallet-info {
            background-color: #222;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
        }

        .address-container p,
        .qr-code-container p {
            color: #dbdbdb;
            margin-bottom: 10px;
        }

        .deposit-container {
            background-color: #333333;
            padding: 20px;
            min-height: 100vh;
        }
    </style>
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

    <!-- Header -->
    <div class="iq-top-navbar header" style="margin-top:50px; background-color:transparent; width:100%;">
        <div class="iq-navbar-custom" style="width:100%;">
            <nav class="navbar navbar-expand-lg navbar-light p-0" style="width:100%;">
                <div style="margin-top:-80px; margin-right:-150px; width:100%; background-color:#000; color:#dbdbdb;">
                    <a href="javascript:void(0)" onclick="openSidebar()" style="margin-left:0px;">
                        <img src="{{ asset('images/menu.png') }}" alt="menu" width="50px" style="margin-top:15px;">
                    </a>
                    <div>
                        <img src="{{asset('static/logo.png')}}" alt="logo"
                            style="padding-bottom:0px; width:200px; margin-top:-65px; margin-left:80px;">
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Deposit Content -->
    <div class="deposit-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="iq-card" style="background-color:#131313; color:#dbdbdb;">
                        <div class="iq-card-header" style="border-bottom: 1px solid #333;">
                            <h4 class="text-center" style="color: #dbdbdb;">Make a Deposit</h4>
                        </div>

                        <div class="iq-card-body">
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form method="POST" action="{{ route('deposit.store') }}" enctype="multipart/form-data">
                                @csrf

                                <!-- Amount Input -->
                                <div class="form-group mb-4">
                                    <label for="amount" style="color: #dbdbdb;">Amount ({{ Auth::user()->currency
                                        }})</label>
                                    <input type="number" class="form-control" id="amount" name="amount"
                                        placeholder="Enter amount to deposit"
                                        style="background-color: #333; color: #dbdbdb; border: 1px solid #444;"
                                        required>
                                </div>

                                <!-- Payment Method Selection -->
                                <div class="form-group mb-4">
                                    <label style="color: #dbdbdb;">Select Payment Method</label>
                                    <div class="payment-methods">
                                        @foreach($walletOptions as $wallet)
                                        <div class="payment-method-card" data-wallet-id="{{ $wallet->id }}">
                                            <input type="radio" id="wallet_{{ $wallet->id }}" name="wallet_id"
                                                value="{{ $wallet->id }}" required>
                                            <label for="wallet_{{ $wallet->id }}">
                                                <div class="method-content">
                                                    {{-- <img src="{{ asset($wallet->icon) }}"
                                                        alt="{{ $wallet->coin_name }}" width="40" height="40"
                                                        class="me-3"> --}}

                                                    <div>
                                                        <h6>{{ $wallet->coin_name }} ({{ $wallet->coin_code }})</h6>
                                                        <small>{{ $wallet->wallet_name }} - {{ $wallet->network_type
                                                            }}</small>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Wallet Details (Shown after selection) -->
                                <div id="walletDetails" style="display: none; margin-bottom: 20px;">
                                    <div class="wallet-info">
                                        <h5 style="color: #dbdbdb;">Deposit Instructions</h5>
                                        <div class="address-container">
                                            <p>Send your payment to this address:</p>
                                            <div class="input-group mb-3">
                                                <input type="text" id="wallet_address" class="form-control"
                                                    style="background-color: #333; color: #dbdbdb; border: 1px solid #444;"
                                                    readonly>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary copy-btn" type="button"
                                                        style="background-color: rgb(196, 0, 0); color: white;"
                                                        onclick="copyToClipboard('wallet_address')">
                                                        Copy
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="qr-code-container text-center mb-3">
                                            <p>Or scan this QR code:</p>
                                            <div id="qrCodeDisplay"
                                                style="background: white; padding: 10px; display: inline-block;"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Transaction Proof -->
                                <div id="proofSection" style="display: none;">
                                    <div class="form-group mb-4">
                                        <label for="proof" style="color: #dbdbdb;">Transaction Proof
                                            (Screenshot/Receipt)</label>
                                        <input type="file" class="form-control-file" id="proof" name="proof" required>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="transaction_id" style="color: #dbdbdb;">Transaction ID/Hash</label>
                                        <input type="text" class="form-control" id="transaction_id"
                                            name="transaction_id" placeholder="Enter your transaction ID"
                                            style="background-color: #333; color: #dbdbdb; border: 1px solid #444;"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"
                                            style="background-color: rgb(196, 0, 0); border: none;">
                                            Confirm Deposit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Include other JS files as needed -->

    <!-- QR Code Generator Library -->
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

    <script>
        // Sidebar functions
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

        // Show wallet details when a payment method is selected
        document.querySelectorAll('.payment-method-card').forEach(card => {
            card.addEventListener('click', function() {
                const walletId = this.getAttribute('data-wallet-id');
                const wallet = @json($walletOptions->keyBy('id'));
                
                // Update wallet details
                document.getElementById('wallet_address').value = wallet[walletId].wallet_address;
                
                // Generate QR code
                document.getElementById('qrCodeDisplay').innerHTML = '';
                new QRCode(document.getElementById('qrCodeDisplay'), {
                    text: wallet[walletId].wallet_address,
                    width: 150,
                    height: 150,
                    colorDark : "#000000",
                    colorLight : "#ffffff",
                    correctLevel : QRCode.CorrectLevel.H
                });
                
                // Show details and proof section
                document.getElementById('walletDetails').style.display = 'block';
                document.getElementById('proofSection').style.display = 'block';
            });
        });

        // Copy to clipboard function
        function copyToClipboard(elementId) {
            const copyText = document.getElementById(elementId);
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand('copy');
            
            // Change button text temporarily
            const btn = document.querySelector('.copy-btn');
            const originalText = btn.innerText;
            btn.innerText = 'Copied!';
            setTimeout(() => {
                btn.innerText = originalText;
            }, 2000);
        }
    </script>
</body>

</html>