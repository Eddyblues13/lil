<!doctype html>
<html lang="en-uk">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="Account Settings">
    <meta name="keywords" content="settings, profile, account, preferences">
    <meta name="author" content="">
    <meta name="theme-color" content="#000" />
    <!-- Site Properties -->
    <title>Settings - cytopiacapitalpro.</title>
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

        /* Settings specific styles */
        .settings-container {
            background-color: #131313;
            padding: 30px;
            border-radius: 10px;
            margin-top: 20px;
            border: 1px solid #333;
        }

        .settings-header {
            border-bottom: 1px solid #333;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .settings-header h2 {
            color: red;
            font-weight: bold;
        }

        .settings-header h2 i {
            margin-right: 10px;
        }

        .profile-pic-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid red;
        }

        .change-pic-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 15px;
        }

        .change-pic-btn:hover {
            background-color: #cc0000;
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

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
        }

        .submit-btn {
            background-color: red;
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

        /* Section divider */
        .section-divider {
            border-top: 1px solid #333;
            margin: 30px 0;
            padding-top: 20px;
        }

        .section-title {
            color: red;
            font-weight: bold;
            margin-bottom: 20px;
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
        <a href="{{ route('withdraw') }}"><i class="fa fa-credit-card"></i> Withdrawal</a>
        <a href="{{ route('invest') }}"><i class="fa fa-line-chart"></i> Invest</a>
        <!-- <a href="{{ route('transactions') }}"><i class="fa fa-history"></i> Transaction History</a>
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
                        <div class="settings-container">
                            <div class="settings-header">
                                <h2><i class="fa fa-cog"></i> Account Settings</h2>
                            </div>

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

                            <form method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="profile-pic-container">
                                    <img src="{{ asset(auth()->user()->profile_pic ? 'storage/' . auth()->user()->profile_pic : 'images/default-profile.png') }}"
                                        class="profile-pic" id="profile-pic-preview">
                                    <div class="mt-3">
                                        <input type="file" name="profile_pic" id="profile-pic" style="display: none;"
                                            accept="image/*">
                                        <button type="button" class="change-pic-btn"
                                            onclick="document.getElementById('profile-pic').click()">
                                            <i class="fa fa-camera"></i> Change Profile Picture
                                        </button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                value="{{ old('first_name', auth()->user()->first_name) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                value="{{ old('last_name', auth()->user()->last_name) }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ old('username', auth()->user()->username) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email', auth()->user()->email) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                                        value="{{ old('phone_number', auth()->user()->phone_number) }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option value="">Select Gender</option>
                                                <option value="male" {{ old('gender', auth()->user()->gender) == 'male'
                                                    ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ old('gender', auth()->user()->gender) ==
                                                    'female' ? 'selected' : '' }}>Female</option>
                                                <option value="other" {{ old('gender', auth()->user()->gender) ==
                                                    'other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marital_status">Marital Status</label>
                                            <select class="form-control" id="marital_status" name="marital_status">
                                                <option value="">Select Marital Status</option>
                                                <option value="single" {{ old('marital_status', auth()->
                                                    user()->marital_status) == 'single' ? 'selected' : '' }}>Single
                                                </option>
                                                <option value="married" {{ old('marital_status', auth()->
                                                    user()->marital_status) == 'married' ? 'selected' : '' }}>Married
                                                </option>
                                                <option value="divorced" {{ old('marital_status', auth()->
                                                    user()->marital_status) == 'divorced' ? 'selected' : '' }}>Divorced
                                                </option>
                                                <option value="widowed" {{ old('marital_status', auth()->
                                                    user()->marital_status) == 'widowed' ? 'selected' : '' }}>Widowed
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="occupation">Occupation</label>
                                    <input type="text" class="form-control" id="occupation" name="occupation"
                                        value="{{ old('occupation', auth()->user()->occupation) }}">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" id="address" name="address"
                                        rows="3">{{ old('address', auth()->user()->address) }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                value="{{ old('city', auth()->user()->city) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country_code">Country</label>
                                            <select class="form-control" id="country_code" name="country_code" required>
                                                <option value="">Select Country</option>
                                                @foreach($countries as $code => $name)
                                                <option value="{{ $code }}" {{ old('country_code', auth()->
                                                    user()->country_code) == $code ? 'selected' : '' }}>{{ $name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="currency_code">Preferred Currency</label>
                                    <select class="form-control" id="currency_code" name="currency_code" required>
                                        <option value="">Select Currency</option>
                                        @foreach($currencies as $code => $name)
                                        <option value="{{ $code }}" {{ old('currency_code', auth()->
                                            user()->currency_code) == $code ? 'selected' : '' }}>{{ $name }} ({{ $code
                                            }})</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="section-divider">
                                    <h4 class="section-title"><i class="fa fa-lock"></i> Change Password</h4>
                                    <p class="text-muted">Leave blank to keep current password</p>
                                </div>

                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password"
                                        name="current_password">
                                </div>

                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password">
                                </div>

                                <div class="form-group">
                                    <label for="new_password_confirmation">Confirm New Password</label>
                                    <input type="password" class="form-control" id="new_password_confirmation"
                                        name="new_password_confirmation">
                                </div>

                                <button type="submit" class="submit-btn">
                                    <i class="fa fa-save"></i> Save Changes
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
        
        // Profile picture preview
        document.getElementById('profile-pic').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile-pic-preview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>