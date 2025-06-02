<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - lilexchangepro</title>

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

        .forgot-password {
            text-align: right;
            margin-top: -10px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body class="main-body dark-theme">
    <!-- Loading Overlay -->
    <div class="loading-overlay">
        <div class="loading-content">
            <img src="{{ asset('assetss/1.gif') }}" class="loader-img" alt="Loading...">
            <p>Authenticating...</p>
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
                                <img src="{{asset('static/logo.png')}}" class="m-0 mb-4" alt="logo">
                                <h5 class="mb-4">Welcome Back!</h5>
                                <p class="mb-4">We're glad to see you again. Login to access your account and continue
                                    your investment journey.</p>
                            </div>
                        </div>
                    </div>
                    <div class="sign-up-body wd-md-50p">
                        <div class="main-signin-header">
                            <h2>Sign In</h2>
                            <h4>Please sign in to continue</h4>
                            <form id="loginForm" method="post" class="signup-form">
                                @csrf

                                <div class="form-group">
                                    <label>Email or Username</label>
                                    <input class="form-control" type="text" name="login" value="{{ old('login') }}"
                                        placeholder="Enter your email or username" required>
                                    <span class="text-danger" id="login-error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password"
                                        placeholder="Enter your password" required>
                                    <span class="text-danger" id="password-error"></span>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember"
                                            name="remember">
                                        <label class="custom-control-label" for="remember">Remember Me</label>
                                    </div>
                                </div>

                                <div class="forgot-password">
                                    <a href="{{ route('password.request') }}">Forgot password?</a>
                                </div>

                                <button type="submit" class="btn btn-main-primary btn-block">Sign In</button>
                            </form>
                        </div>
                        <div class="main-signup-footer mg-t-10">
                            <p>Don't have an account? <a href="{{ route('register') }}">Create an Account</a></p>
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
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();
                
                $('.loading-overlay').show();
                
                // Clear previous errors
                $('.text-danger').text('');
                
                $.ajax({
                    url: "{{ route('login') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        $('.loading-overlay').hide();
                        
                        if (response.success) {
                            toastr.success(response.message);
                            window.location.href = response.redirect;
                        } else {
                            if (response.errors) {
                                $.each(response.errors, function(key, value) {
                                    $('#' + key + '-error').text(value[0]);
                                });
                            } else {
                                toastr.error(response.message);
                                if (response.redirect) {
                                    window.location.href = response.redirect;
                                }
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        $('.loading-overlay').hide();
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                $('#' + key + '-error').text(value[0]);
                            });
                        } else {
                            toastr.error('An error occurred. Please try again.');
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>