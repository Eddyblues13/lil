@extends('user.layouts.app')

@section('title', 'Deposit - cytopiacapitalpro')

@section('content')
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

<div class="container-fluid" style="background-color: #333333; padding-top: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="iq-card" style="background-color:#131313; color:#dbdbdb;">
                <div class="iq-card-body">
                    <h4 class="text-center mb-4">Make a Deposit</h4>

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('deposit.store') }}">
                        @csrf

                        <!-- Amount Input -->
                        <div class="form-group">
                            <label>Amount ({{ Auth::user()->currency }})</label>
                            <input type="number" class="form-control" name="amount" placeholder="Enter amount"
                                style="background-color:#333; color:#dbdbdb; border:1px solid #444;" required>
                        </div>

                        <!-- Payment Method Selection -->
                        <div class="form-group mt-4">
                            <label>Select Payment Method</label>
                            <div class="row">
                                @foreach($walletOptions as $wallet)
                                <div class="col-md-6 mb-3">
                                    <div class="payment-method-card" onclick="selectWallet(this, '{{ $wallet->id }}')">
                                        <input type="radio" name="wallet_id" value="{{ $wallet->id }}"
                                            id="wallet_{{ $wallet->id }}" required style="display: none;">
                                        <div class="method-content p-3"
                                            style="border: 1px solid #444; border-radius: 5px;">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $wallet->icon }}" alt="{{ $wallet->coin_name }}"
                                                    width="40">
                                                <div class="ml-3">
                                                    <h6 class="mb-0">{{ $wallet->coin_name }} ({{ $wallet->coin_code }})
                                                    </h6>
                                                    <small>{{ $wallet->wallet_name }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Wallet Details (shown after selection) -->
                        <div id="walletDetails" class="mt-4" style="display: none;">
                            <div class="wallet-info p-3" style="background-color: #222; border-radius: 5px;">
                                <h5>Deposit Instructions</h5>
                                <p>Send your payment to this address:</p>
                                <div class="input-group mb-3">
                                    <input type="text" id="wallet_address" class="form-control"
                                        style="background-color:#333; color:#dbdbdb; border:1px solid #444;" readonly>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary copy-btn" type="button"
                                            style="background-color: rgb(196, 0, 0); color: white;"
                                            onclick="copyToClipboard('wallet_address')">
                                            Copy
                                        </button>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <p>Or scan this QR code:</p>
                                    <div id="qrCodeDisplay"
                                        style="background: white; padding: 10px; display: inline-block;"></div>
                                </div>
                            </div>

                            <!-- Transaction Proof -->
                            <div class="form-group mt-4">
                                <label>Transaction Proof (Screenshot/Receipt)</label>
                                <input type="file" class="form-control-file" name="proof" required>
                            </div>

                            <div class="form-group">
                                <label>Transaction ID/Hash</label>
                                <input type="text" class="form-control" name="transaction_id"
                                    placeholder="Enter your transaction ID"
                                    style="background-color:#333; color:#dbdbdb; border:1px solid #444;" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mt-4"
                                style="background-color: rgb(196, 0, 0); border: none;">
                                Confirm Deposit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include QR Code Generator Library -->
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

<script>
    // Wallet selection function
    function selectWallet(element, walletId) {
        // Remove active class from all cards
        document.querySelectorAll('.payment-method-card').forEach(card => {
            card.querySelector('.method-content').style.borderColor = '#444';
        });
        
        // Add active class to selected card
        element.querySelector('.method-content').style.borderColor = 'rgb(196, 0, 0)';
        
        // Check the radio button
        document.getElementById('wallet_' + walletId).checked = true;
        
        // Get wallet data
        const wallet = @json($walletOptions->keyBy('id'));
        const selectedWallet = wallet[walletId];
        
        // Update wallet details
        document.getElementById('wallet_address').value = selectedWallet.wallet_address;
        
        // Generate QR code
        document.getElementById('qrCodeDisplay').innerHTML = '';
        new QRCode(document.getElementById('qrCodeDisplay'), {
            text: selectedWallet.wallet_address,
            width: 150,
            height: 150,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
        
        // Show wallet details section
        document.getElementById('walletDetails').style.display = 'block';
    }
    
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

<style>
    .payment-method-card {
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .payment-method-card:hover .method-content {
        border-color: #666 !important;
    }

    .method-content {
        transition: all 0.3s ease;
    }
</style>
@endsection