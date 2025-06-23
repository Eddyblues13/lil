<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forgot Password - cytopiacapitalpro</title>

    <!-- Favicon -->
    <link href="{{ asset('favicon.png') }}" rel="shortcut icon" type="image/png">

    <!-- CSS Assets -->
    <link href="{{ asset('assetss/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assetss/plugins/sidebar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assetss/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assetss/css/sidemenu.css') }}" rel="stylesheet">
    <link href="{{ asset('assetss/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assetss/css/skin-modes.css') }}" rel="stylesheet">
    <link href="{{ asset('assetss/css/style-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('assetss/css/animate.css') }}" rel="stylesheet">

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <style>
        .goog-logo-link {
            display: none !important;
        }

        .goog-te-gadget {
            color: transparent !important;
        }

        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            display: none;
        }

        .loading-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
        }

        .text-danger {
            color: #dc3545;
            font-size: 0.875em;
        }

        .login-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>

<body class="main-body dark-theme">
    <!-- Loading Overlay -->
    <div class="loading-overlay">
        <div class="loading-content">
            <img src="{{ asset('assetss/1.gif') }}" class="loader-img" alt="Loading...">
            <p>Sending reset link...</p>
        </div>
    </div>

    <!-- Page -->
    <div class="page">
        <!-- main-signin-wrapper -->
        <div class="my-auto page page-h">
            <div class="main-signin-wrapper">
                <div class="main-card-signin d-md-flex wd-100p">
                    <div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white">
                        <div class="my-auto authentication-pages">
                            <div>
                                <img src="{{ asset('static/logo.png') }}" class="m-0 mb-4" alt="logo">
                                <h5 class="mb-4">Reset Your Password</h5>
                                <p class="mb-4">Enter your email address and we'll send you instructions to reset your
                                    password.</p>
                            </div>
                        </div>
                    </div>
                    <div class="sign-up-body wd-md-50p">
                        <div class="main-signin-header">
                            <h2>Password Recovery</h2>
                            <h4>Enter your registered email</h4>
                            <form id="forgotPasswordForm" method="POST" class="signup-form">
                                @csrf

                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                                        placeholder="Enter your email" required>
                                    <span class="text-danger" id="email-error"></span>
                                </div>

                                <button type="submit" class="btn btn-main-primary btn-block">Send Reset Link</button>
                            </form>
                        </div>
                        <div class="main-signup-footer mg-t-10">
                            <p>Remember your password? <a href="{{ route('login') }}">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assetss/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assetss/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            // Toastr configuration
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            // Form submission
            $('#forgotPasswordForm').on('submit', function(e) {
                e.preventDefault();
                
                $('.loading-overlay').show();
                $('#email-error').text('');
                
                $.ajax({
                    url: "{{ route('password.email') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        $('.loading-overlay').hide();
                        
                        if (response.success) {
                            toastr.success(response.message || 'Password reset link sent successfully!');
                        } else {
                            if (response.errors) {
                                $.each(response.errors, function(key, value) {
                                    $('#' + key + '-error').text(value[0]);
                                });
                            } else {
                                toastr.error(response.message || 'An error occurred. Please try again.');
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        $('.loading-overlay').hide();
                        
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('#' + key + '-error').text(value[0]);
                            });
                        } else {
                            toastr.error('A system error occurred. Please try again later.');
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>