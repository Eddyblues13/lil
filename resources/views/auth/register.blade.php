<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign up – cytopiacapitalpro</title>

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

        .form-control.is-invalid {
            border-color: #dc3545;
        }
    </style>
</head>

<body class="main-body dark-theme">
    <!-- Loading Overlay -->
    <div class="loading-overlay">
        <div class="loading-content">
            <img src="{{ asset('assetss/1.gif') }}" class="loader-img" alt="Loading...">
            <p>Processing your registration...</p>
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
                                <h5 class="mb-4">About us</h5>
                                <p class="mb-4">We are one of the world's leading investment service solution and we've
                                    created a seamless, secure investment experience used by various crypto users.</p>
                            </div>
                        </div>
                    </div>
                    <div class="sign-up-body wd-md-50p">
                        <div class="main-signin-header">
                            <h2>Welcome!</h2>
                            <h4>Please Register with cytopiacapitalpro</h4>
                            <form id="registrationForm" action="{{ route('register') }}" method="post"
                                class="signup-form">
                                @csrf

                                <input type="hidden" name="referral_code" value="{{ $referral_code ?? '' }}">

                                <div class="form-group">
                                    <label>First Name</label>
                                    <input class="form-control" placeholder="Enter your first name" type="text"
                                        name="first_name" value="{{ old('first_name') }}" maxlength="50" id="first_name"
                                        required>
                                    <span class="text-danger" id="first_name-error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input class="form-control" placeholder="Enter your middle name" type="text"
                                        name="middle_name" value="{{ old('middle_name') }}" maxlength="50"
                                        id="middle_name">
                                    <span class="text-danger" id="middle_name-error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" placeholder="Enter your last name" type="text"
                                        name="last_name" value="{{ old('last_name') }}" maxlength="50" id="last_name"
                                        required>
                                    <span class="text-danger" id="last_name-error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" placeholder="Enter your username (letters, numbers, _)"
                                        type="text" name="username" value="{{ old('username') }}" maxlength="30"
                                        id="username" required>
                                    <span class="text-danger" id="username-error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" placeholder="Enter your Password (min 4 characters)"
                                        type="password" name="password" minlength="4" id="password" required>
                                    <span class="text-danger" id="password-error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="form-control" placeholder="Confirm your Password" type="password"
                                        name="password_confirmation" id="password_confirmation" required>
                                </div>

                                <div class="form-group">
                                    <label>Occupation</label>
                                    <input class="form-control" placeholder="Enter your Occupation" type="text"
                                        name="occupation" value="{{ old('occupation') }}" maxlength="100"
                                        id="occupation" required>
                                    <span class="text-danger" id="occupation-error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" placeholder="Enter your email" type="email" name="email"
                                        value="{{ old('email') }}" maxlength="100" id="email" required>
                                    <span class="text-danger" id="email-error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="form-control" type="text" name="phone" value="{{ old('phone') }}"
                                        maxlength="20" id="phone" required placeholder="Eg +62 123 456 789">
                                    <span class="text-danger" id="phone-error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Country</label>
                                    <input class="form-control" type="text" name="country" value="{{ old('country') }}"
                                        required id="country" placeholder="Enter your country">
                                    <span class="text-danger" id="country-error"></span>
                                </div>

                                <div class="form-group">
                                    <label>City</label>
                                    <input class="form-control" type="text" name="city" value="{{ old('city') }}"
                                        maxlength="100" id="city" required placeholder="Enter your city">
                                    <span class="text-danger" id="city-error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Choose your currency</label>
                                    <select class="form-control" name="currency" required id="currency">
                                        <option value="">Select currency</option>
                                        @foreach($currencies as $code => $name)
                                        <option value="{{ $code }}" {{ old('currency')==$code ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="currency-error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender" required id="gender">
                                        <option value="">Select gender</option>
                                        <option value="male" {{ old('gender')=='male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender')=='female' ? 'selected' : '' }}>Female
                                        </option>
                                        <option value="other" {{ old('gender')=='other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                    <span class="text-danger" id="gender-error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Marital Status</label>
                                    <select class="form-control" name="marital_status" required id="marital_status">
                                        <option value="">Select status</option>
                                        <option value="single" {{ old('marital_status')=='single' ? 'selected' : '' }}>
                                            Single</option>
                                        <option value="married" {{ old('marital_status')=='married' ? 'selected' : ''
                                            }}>Married</option>
                                        <option value="divorced" {{ old('marital_status')=='divorced' ? 'selected' : ''
                                            }}>Divorced</option>
                                        <option value="widowed" {{ old('marital_status')=='widowed' ? 'selected' : ''
                                            }}>Widowed</option>
                                    </select>
                                    <span class="text-danger" id="marital_status-error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" name="address" value="{{ old('address') }}"
                                        maxlength="255" id="address" required placeholder="House or Office Address">
                                    <span class="text-danger" id="address-error"></span>
                                </div>

                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="terms" id="terms" required>
                                    <label class="form-check-label" for="terms">I agree to the terms and
                                        conditions</label>
                                    <span class="text-danger" id="terms-error"></span>
                                </div>

                                <button type="submit" class="btn btn-main-primary btn-block">Create Account</button>
                            </form>
                        </div>
                        <div class="main-signup-footer mg-t-10">
                            <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
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
            $('#registrationForm').on('submit', function(e) {
                e.preventDefault();
                
                $('.loading-overlay').show();
                
                // Clear previous errors
                $('.text-danger').text('');
                $('.form-control').removeClass('is-invalid');
                $('.form-check-input').removeClass('is-invalid');
                
                $.ajax({
                    url: $(this).attr('action'),
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        $('.loading-overlay').hide();
                        
                        if (response.success) {
                            toastr.success(response.message);
                            // Redirect after a short delay to allow toast to be seen
                            setTimeout(function() {
                                window.location.href = response.redirect;
                            }, 1500);
                        } else {
                            if (response.errors) {
                                $.each(response.errors, function(key, value) {
                                    const field = $('#' + key);
                                    field.addClass('is-invalid');
                                    $('#' + key + '-error').text(value[0]);
                                });
                                toastr.error('Please correct the errors in the form.');
                            } else {
                                toastr.error(response.message || 'Registration failed. Please try again.');
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        $('.loading-overlay').hide();
                        try {
                            if (xhr.responseJSON) {
                                if (xhr.responseJSON.errors) {
                                    $.each(xhr.responseJSON.errors, function(key, value) {
                                        const field = $('#' + key);
                                        field.addClass('is-invalid');
                                        $('#' + key + '-error').text(value[0]);
                                    });
                                    toastr.error('Please correct the errors in the form.');
                                } else if (xhr.responseJSON.message) {
                                    toastr.error(xhr.responseJSON.message);
                                } else {
                                    toastr.error('An unexpected error occurred. Please try again.');
                                }
                            } else {
                                toastr.error('Network error or server unavailable. Please try again.');
                            }
                        } catch (e) {
                            toastr.error('An unexpected error occurred. Please try again.');
                        }
                    }
                });
            });

            // Basic client-side validation
            $('#registrationForm input, #registrationForm select').on('change', function() {
                const field = $(this);
                if (field.val().trim() === '' && field.prop('required')) {
                    field.addClass('is-invalid');
                    field.next('.text-danger').text('This field is required.');
                } else {
                    field.removeClass('is-invalid');
                    field.next('.text-danger').text('');
                }
            });
            
            // Validate terms checkbox
            $('#terms').on('change', function() {
                if (!$(this).is(':checked')) {
                    $('#terms-error').text('You must accept the terms and conditions.');
                } else {
                    $('#terms-error').text('');
                }
            });
        });
    </script>
</body>

</html>