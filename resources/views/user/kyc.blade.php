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
    <title>KYC Verification - cytopiacapitalpro.</title>
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

        /* KYC specific styles */
        .kyc-container {
            background-color: #131313;
            padding: 30px;
            border-radius: 10px;
            margin-top: 20px;
            color: white;
            border: 1px solid #333;
        }

        .kyc-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: red;
            border-bottom: 1px solid #333;
            padding-bottom: 10px;
            font-weight: bold;
        }

        .kyc-step {
            margin-bottom: 30px;
        }

        .kyc-step-title {
            font-size: 18px;
            margin-bottom: 15px;
            color: red;
            font-weight: bold;
        }

        .document-option {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 15px;
            border: 1px solid #333;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
            background-color: #1a1a1a;
        }

        .document-option:hover {
            background-color: #333;
            border-color: #444;
        }

        .document-option label {
            color: white;
            cursor: pointer;
            margin-bottom: 0;
        }

        .document-option label strong {
            color: white;
            font-weight: bold;
        }

        .document-option label small {
            color: #ccc;
        }

        .upload-area {
            border: 2px dashed #444;
            padding: 30px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: all 0.3s;
            background-color: #1a1a1a;
        }

        .upload-area:hover {
            border-color: #666;
            background-color: #222;
        }

        .upload-icon {
            font-size: 50px;
            color: #666;
            margin-bottom: 15px;
        }

        .upload-text {
            color: white;
            font-size: 16px;
        }

        .upload-text small {
            color: #aaa;
        }

        .preview-image {
            max-width: 100%;
            max-height: 300px;
            margin-top: 20px;
            display: none;
            border-radius: 5px;
            border: 1px solid #444;
        }

        .requirements {
            background-color: #222;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #333;
        }

        .requirements-title {
            color: red;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .requirements-list {
            padding-left: 20px;
            color: white;
        }

        .requirements-list li {
            margin-bottom: 5px;
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

        .form-check {
            margin-bottom: 20px;
        }

        .form-check-input {
            margin-top: 0.3rem;
        }

        .form-check-label {
            color: white;
            margin-left: 5px;
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

        .alert-warning {
            background-color: #ffc107;
            color: black;
            border-color: #e0a800;
        }

        .alert-danger {
            background-color: #dc3545;
            color: white;
            border-color: #c82333;
        }

        .alert i {
            margin-right: 10px;
        }

        /* Status badges */
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
            margin-left: 10px;
        }

        .status-pending {
            background-color: #ffc107;
            color: black;
        }

        .status-approved {
            background-color: #28a745;
            color: white;
        }

        .status-rejected {
            background-color: #dc3545;
            color: white;
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
        <a href="{{ route('verification') }}" class="active"><i class="fa fa-check-circle"></i> Account Verification</a>
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
                    <div class="col-lg-12">
                        <div class="kyc-container">
                            <h1 class="kyc-title">Account Verification (KYC)</h1>

                            @if(auth()->user()->kycVerification && auth()->user()->kycVerification->status ==
                            'approved')
                            <div class="alert alert-success">
                                <i class="fa fa-check-circle"></i> Your account has been successfully verified. Thank
                                you!
                            </div>
                            @elseif(auth()->user()->kycVerification && auth()->user()->kycVerification->status ==
                            'pending')
                            <div class="alert alert-warning">
                                <i class="fa fa-clock"></i> Your verification documents are under review. Please wait
                                for approval.
                            </div>
                            @elseif(auth()->user()->kycVerification && auth()->user()->kycVerification->status ==
                            'rejected')
                            <div class="alert alert-danger">
                                <i class="fa fa-times-circle"></i> Your verification documents were rejected. Please
                                upload new documents.
                                @if(auth()->user()->kycVerification->rejection_reason)
                                <p class="mt-2 mb-0"><strong>Reason:</strong> {{
                                    auth()->user()->kycVerification->rejection_reason }}</p>
                                @endif
                            </div>
                            @endif

                            @if(!auth()->user()->kycVerification || auth()->user()->kycVerification->status !=
                            'approved')
                            <div class="kyc-step">
                                <h3 class="kyc-step-title">1. Select Document Type</h3>
                                <form id="kycForm" action="{{ route('kyc.submit') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="document-option">
                                        <input type="radio" id="passport" name="document_type" value="passport" required
                                            @if(old('document_type')=='passport' || (auth()->user()->kycVerification &&
                                        auth()->user()->kycVerification->document_type == 'passport')) checked @endif>
                                        <label for="passport">
                                            <strong>Passport</strong><br>
                                            <small>Upload a clear copy of your passport bio page</small>
                                        </label>
                                    </div>

                                    <div class="document-option">
                                        <input type="radio" id="national_id" name="document_type" value="national_id"
                                            @if(old('document_type')=='national_id' || (auth()->user()->kycVerification
                                        && auth()->user()->kycVerification->document_type == 'national_id')) checked
                                        @endif>
                                        <label for="national_id">
                                            <strong>National ID Card</strong><br>
                                            <small>Upload both front and back of your government-issued ID</small>
                                        </label>
                                    </div>

                                    <div class="document-option">
                                        <input type="radio" id="drivers_license" name="document_type"
                                            value="drivers_license" @if(old('document_type')=='drivers_license' ||
                                            (auth()->user()->kycVerification &&
                                        auth()->user()->kycVerification->document_type == 'drivers_license')) checked
                                        @endif>
                                        <label for="drivers_license">
                                            <strong>Driver's License</strong><br>
                                            <small>Upload both front and back of your driver's license</small>
                                        </label>
                                    </div>
                            </div>

                            <div class="kyc-step">
                                <h3 class="kyc-step-title">2. Upload Document</h3>

                                <div class="requirements">
                                    <h4 class="requirements-title">Document Requirements:</h4>
                                    <ul class="requirements-list">
                                        <li>Document must be valid and not expired</li>
                                        <li>Clear, color image with all corners visible</li>
                                        <li>File size must be less than 5MB</li>
                                        <li>Accepted formats: JPG, PNG, PDF</li>
                                        <li>All text must be clearly readable</li>
                                    </ul>
                                </div>

                                <div id="frontUpload" class="upload-area"
                                    onclick="document.getElementById('front_file').click()">
                                    <input type="file" id="front_file" name="front_file" accept="image/*,.pdf"
                                        style="display: none;" required>
                                    <div class="upload-icon">
                                        <i class="fa fa-cloud-upload-alt"></i>
                                    </div>
                                    <div class="upload-text">
                                        Click to upload document front side<br>
                                        <small>or drag and drop file here</small>
                                    </div>
                                    @if(auth()->user()->kycVerification &&
                                    auth()->user()->kycVerification->front_document_path)
                                    <img id="frontPreview" class="preview-image"
                                        src="{{ Storage::url(auth()->user()->kycVerification->front_document_path) }}"
                                        alt="Front Preview" style="display: block;">
                                    @else
                                    <img id="frontPreview" class="preview-image" src="#" alt="Front Preview">
                                    @endif
                                </div>

                                <div id="backUpload" class="upload-area"
                                    onclick="document.getElementById('back_file').click()"
                                    style="@if(!auth()->user()->kycVerification || (auth()->user()->kycVerification && auth()->user()->kycVerification->document_type != 'passport')) display: block; @else display: none; @endif">
                                    <input type="file" id="back_file" name="back_file" accept="image/*,.pdf"
                                        style="display: none;" @if(!auth()->user()->kycVerification ||
                                    (auth()->user()->kycVerification && auth()->user()->kycVerification->document_type
                                    != 'passport')) required @endif>
                                    <div class="upload-icon">
                                        <i class="fa fa-cloud-upload-alt"></i>
                                    </div>
                                    <div class="upload-text">
                                        Click to upload document back side<br>
                                        <small>or drag and drop file here</small>
                                    </div>
                                    @if(auth()->user()->kycVerification &&
                                    auth()->user()->kycVerification->back_document_path)
                                    <img id="backPreview" class="preview-image"
                                        src="{{ Storage::url(auth()->user()->kycVerification->back_document_path) }}"
                                        alt="Back Preview" style="display: block;">
                                    @else
                                    <img id="backPreview" class="preview-image" src="#" alt="Back Preview">
                                    @endif
                                </div>
                            </div>

                            <div class="kyc-step">
                                <h3 class="kyc-step-title">3. Selfie with Document</h3>

                                <div class="requirements">
                                    <h4 class="requirements-title">Selfie Requirements:</h4>
                                    <ul class="requirements-list">
                                        <li>Hold your document next to your face</li>
                                        <li>Your face and document must be clearly visible</li>
                                        <li>No filters or edits</li>
                                        <li>Good lighting conditions</li>
                                        <li>All document details must be readable</li>
                                    </ul>
                                </div>

                                <div id="selfieUpload" class="upload-area"
                                    onclick="document.getElementById('selfie_file').click()">
                                    <input type="file" id="selfie_file" name="selfie_file" accept="image/*"
                                        style="display: none;" required>
                                    <div class="upload-icon">
                                        <i class="fa fa-camera"></i>
                                    </div>
                                    <div class="upload-text">
                                        Click to upload selfie with document<br>
                                        <small>or drag and drop file here</small>
                                    </div>
                                    @if(auth()->user()->kycVerification && auth()->user()->kycVerification->selfie_path)
                                    <img id="selfiePreview" class="preview-image"
                                        src="{{ Storage::url(auth()->user()->kycVerification->selfie_path) }}"
                                        alt="Selfie Preview" style="display: block;">
                                    @else
                                    <img id="selfiePreview" class="preview-image" src="#" alt="Selfie Preview">
                                    @endif
                                </div>
                            </div>

                            <div class="kyc-step">
                                <h3 class="kyc-step-title">4. Additional Information</h3>

                                <div class="form-group">
                                    <label for="full_name">Full Name (as on document)</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name"
                                        value="{{ old('full_name', auth()->user()->kycVerification ? auth()->user()->kycVerification->full_name : auth()->user()->name) }}"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob"
                                        value="{{ old('dob', auth()->user()->kycVerification ? auth()->user()->kycVerification->dob->format('Y-m-d') : '') }}"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="document_number">Document Number</label>
                                    <input type="text" class="form-control" id="document_number" name="document_number"
                                        value="{{ old('document_number', auth()->user()->kycVerification ? auth()->user()->kycVerification->document_number : '') }}"
                                        required>
                                </div>
                            </div>

                            <div class="form-check mb-4">
                                <input type="checkbox" class="form-check-input" id="terms_agree" name="terms_agree"
                                    required @if(old('terms_agree')) checked @endif>
                                <label class="form-check-label" for="terms_agree">I certify that all information
                                    provided is accurate and I agree to the processing of my personal data for
                                    verification purposes.</label>
                            </div>

                            <button type="submit" class="submit-btn">
                                <i class="fa fa-paper-plane"></i> Submit for Verification
                            </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wrapper END -->
    <!-- Footer -->
    <footer class="iq-footer" style="background-color:#000; color:white;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="#" style="color:white;">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#" style="color:white;">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right" style="color:white;">
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
    </script>

    <!-- KYC Form Scripts -->
    <script>
        // Show/hide back upload based on document type
        $('input[name="document_type"]').change(function() {
            if ($(this).val() === 'passport') {
                $('#backUpload').hide();
                $('#back_file').removeAttr('required');
            } else {
                $('#backUpload').show();
                $('#back_file').attr('required', 'required');
            }
        });
        
        // Preview images when selected
        function readURL(input, previewId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#' + previewId).attr('src', e.target.result);
                    $('#' + previewId).show();
                    $('#' + previewId).parent().find('.upload-text').html('File selected: ' + input.files[0].name);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        $("#front_file").change(function() {
            readURL(this, 'frontPreview');
        });
        
        $("#back_file").change(function() {
            readURL(this, 'backPreview');
        });
        
        $("#selfie_file").change(function() {
            readURL(this, 'selfiePreview');
        });
        
        // Drag and drop functionality
        function handleDragOver(event) {
            event.stopPropagation();
            event.preventDefault();
            event.dataTransfer.dropEffect = 'copy';
            $(event.target).css('border-color', '#666');
            $(event.target).css('background-color', '#222');
        }
        
        function handleDragLeave(event) {
            event.stopPropagation();
            event.preventDefault();
            $(event.target).css('border-color', '#444');
            $(event.target).css('background-color', '#1a1a1a');
        }
        
        function handleDrop(event, inputId) {
            event.stopPropagation();
            event.preventDefault();
            $(event.target).css('border-color', '#444');
            $(event.target).css('background-color', '#1a1a1a');
            
            var files = event.dataTransfer.files;
            if (files.length > 0) {
                var input = document.getElementById(inputId);
                input.files = files;
                
                // Trigger change event
                if ("createEvent" in document) {
                    var evt = document.createEvent("HTMLEvents");
                    evt.initEvent("change", false, true);
                    input.dispatchEvent(evt);
                } else {
                    input.fireEvent("onchange");
                }
            }
        }
        
        // Set up drag and drop for all upload areas
        $('.upload-area').each(function() {
            var inputId = $(this).find('input[type="file"]').attr('id');
            
            this.addEventListener('dragover', handleDragOver, false);
            this.addEventListener('dragleave', handleDragLeave, false);
            this.addEventListener('drop', function(e) { handleDrop(e, inputId); }, false);
        });
        
        // Form validation
        $('#kycForm').submit(function(e) {
            var valid = true;
            var errorMessages = [];
            
            // Check if document type is selected
            if (!$('input[name="document_type"]:checked').val()) {
                errorMessages.push('Please select a document type');
                valid = false;
            }
            
            // Check if front file is uploaded
            if (!$('#front_file').val() && !$('#frontPreview').is(':visible')) {
                errorMessages.push('Please upload the front of your document');
                valid = false;
            }
            
            // Check if back file is required and uploaded
            if ($('#backUpload').is(':visible') && !$('#back_file').val() && !$('#backPreview').is(':visible')) {
                errorMessages.push('Please upload the back of your document');
                valid = false;
            }
            
            // Check if selfie is uploaded
            if (!$('#selfie_file').val() && !$('#selfiePreview').is(':visible')) {
                errorMessages.push('Please upload a selfie with your document');
                valid = false;
            }
            
            // Check if terms are agreed
            if (!$('#terms_agree').is(':checked')) {
                errorMessages.push('You must agree to the terms');
                valid = false;
            }
            
            if (!valid) {
                e.preventDefault();
                alert('Please fix the following errors:\n\n' + errorMessages.join('\n'));
            }
        });
        
        // Initialize form based on existing KYC data
        $(document).ready(function() {
            @if(auth()->user()->kycVerification)
                // Show back upload if document type requires it
                if ($('input[name="document_type"]:checked').val() !== 'passport') {
                    $('#backUpload').show();
                }
                
                // Update file input texts if files exist
                @if(auth()->user()->kycVerification->front_document_path)
                    $('#frontUpload .upload-text').html('File uploaded: {{ basename(auth()->user()->kycVerification->front_document_path) }}');
                @endif
                
                @if(auth()->user()->kycVerification->back_document_path)
                    $('#backUpload .upload-text').html('File uploaded: {{ basename(auth()->user()->kycVerification->back_document_path) }}');
                @endif
                
                @if(auth()->user()->kycVerification->selfie_path)
                    $('#selfieUpload .upload-text').html('File uploaded: {{ basename(auth()->user()->kycVerification->selfie_path) }}');
                @endif
            @endif
        });
    </script>
</body>

</html>