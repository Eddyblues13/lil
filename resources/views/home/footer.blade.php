<script type="text/javascript">
    (function() {
                var options = {
                    whatsapp: "+1(613) 663-2946", // WhatsApp number
                    call_to_action: "Message us", // Call to action
                    button_color: "#FF6550", // Color of button
                    position: "left", // Position may be 'right' or 'left'
                };
                var proto = 'https:',
                    host = "getbutton.io",
                    url = proto + '//static.' + host;
                var s = document.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.src = url + '/widget-send-button/js/init.js';
                s.onload = function() {
                    WhWidgetSendButton.init(host, proto, options);
                };
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(s, x);
            })();
</script>

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
    var _smartsupp = _smartsupp || {};
_smartsupp.key = '19b12ee1de62b4fa83e330e587391205e71fd2d7';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
<footer>
    <!-- footer content begin -->
    <div class="uk-section uk-section-primary uk-padding-large uk-padding-remove-horizontal uk-margin-medium-top"
        style="background-color:#010847;">
        <div class="uk-container">
            <div class="uk-child-width-1-2@s uk-child-width-1-5@m uk-flex" data-uk-grid>
                <div>
                    <h4 class="uk-heading-bullet">Overview</h4>
                    <ul class="uk-list uk-link-text">
                        <li><a href="{{ route('register') }}">Stock indices Account</a></li>
                        <li><a href="{{ route('register') }}">Commodities Account</a></li>
                        <li><a href="{{ route('register') }}">Forex Account</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="uk-heading-bullet">Company</h4>
                    <ul class="uk-list uk-link-text">
                        <li><a href="{{ url('/about') }}">About</a></li>
                        <li><a href="{{ route('login') }}">Login Now</a></li>
                        <li><a href="{{ route('register') }}">Start with us</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="uk-heading-bullet">Legal</h4>
                    <ul class="uk-list uk-link-text">
                        <li><a href="{{ url('/terms') }}">Terms &amp; Conditions</a></li>
                        <li><a href="{{ url('/about') }}">Privacy &amp; Policy</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="uk-visible@m">
                    <h4 class="uk-heading-bullet">Support</h4>
                    <ul class="uk-list uk-link-text">
                        <li><a href="cdn-cgi/l/email-protection.html#0960676f66496d607d6c716a666067276a6664"><i
                                    class="fas fa-envelope uk-margin-small-right"></i> Account Issue</a></li>
                        <li><a href="cdn-cgi/l/email-protection.html#fa93949c95ba9e938e9f8299959394d4999597"><i
                                    class="fas fa-envelope uk-margin-small-right"></i> Finance Complications</a></li>
                        <li><a href="cdn-cgi/l/email-protection.html#eb82858d84ab8f829f8e9388848285c5888486"><i
                                    class="fas fa-envelope uk-margin-small-right"></i> Report a bug</a></li>
                    </ul>
                </div>
            </div>
            <div class="uk-grid uk-flex uk-flex-center uk-margin-large-top" data-uk-grid>
                <div class="uk-width-5-6@m uk-margin-bottom">
                    <div class="in-footer-warning in-margin-top-20@s">
                        <h5 class="uk-text-small uk-text-uppercase"><span>Risk Warning</span></h5>
                        <p class="uk-text-small">Trading derivatives and leveraged products carries a high level of
                            risk, including the risk of losing substantially more than your initial investment. It
                            is not suitable for everyone. Before you make any decision in relation to a financial
                            product you should obtain and consider our Product Disclosure Statement (PDS) and
                            Financial Services Guide (FSG) available on our website and seek independent advice if
                            necessary </p>
                    </div>
                </div>
                <div class="uk-width-1-2@m in-copyright-text">
                    <p>© {{ date('Y') }} Cytopia Capital Pro. All rights reserved.</p>
                </div>
                <div class="uk-width-1-2@m uk-text-right@m in-footer-socials">
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- footer content end -->

    <!-- module totop begin -->
    <div class="uk-visible@m">
        <a href="#" class="in-totop fas fa-chevron-up" data-uk-scroll></a>
    </div>
    <!-- module totop begin -->
</footer>

<script src="{{ asset('alert/ui/js/jquery-2.2.3.js') }}"></script>
<script src="{{ asset('alert/ui/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('alert/js/jquery.fake-notification.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#notification-1').Notification({
            // Notification variables
            Varible1: ["Dirk", "Johnny", "Watkin ", "Alejandro", "Vina", "Tony", "Ahmed","Jackson", "Noah", "Aiden", "Darren", "Isabella", "Aria", "John", "Greyson", "Peter", "Mohammed", "William",
            "Lucas", "Amelia", "Mason", "Mathew", "Richard", "Chris", "Mia", "Oliver"],
            Varible2: ["USA","UAE","ITALY", "FLORIDA", "MEXICO", "INDIA", "CHINA", "CAMBODIA", "UNITED KINGDOM", "GERMANY", "AUSTRALIA", "BANGLADESH", "SWEDEN", "PAKISTAN", "MALDIVES", "SEYCHELLES", 
            "BOLIVIA", "SOUTH AFRICA", "ZAMBIA", "ZIMBABWE", "LEBANESE", "SAUDI ARABIA", "CHILE", "PEUTO RICO"],
            
            Amount: [9000, 2500,5000,6669,4440,7989,7052],          
            Content: '[Varible1] from [Varible2] has just Earned <b>$[Amount]</b>',
            // Timer
            Show: ['stable', 5, 10],
            Close: 5,
            Time: [0, 23],
            // Notification style 
            LocationTop: [true, '50%'],
            LocationBottom:[false, '10%'],
            LocationRight: [false, '10%'],            
            LocationLeft:[true, '10px'],
            Background: '#000000',
            BorderRadius: 5,
            BorderWidth: 1,
            BorderColor: '#ff9900',
            TextColor: 'white',
            IconColor: '#ffffff',
            // Notification Animated   
            AnimationEffectOpen: 'slideInUp',
            AnimationEffectClose: 'slideOutDown',
            // Number of notifications
            Number: 40,
            // Notification link
            Link: [false, 'index.html', '_blank']
        });     
    });

    $("form#contact-form").submit(function(e) {
        e.preventDefault();    
        var formData = new FormData(this);
        $.ajax({
            url: 'process-contact.php',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnContact').html("Sending Message <i class='fa fa-spinner fa-spin'></i>").attr("disabled", true);
            },
            success: function (data) {
                $('#btnContact').html("Send Message <i class='fa fa-rocket'></i>").attr("disabled", false);
                if (data == "Done") {
                    swal("Message Sent", "You message was successfully sent to support. You will get a feedback soon", "success");
                    $("form#contact-form").trigger("reset");
                } else {
                    swal("Error", data, "warning");
                }   
            },
            error:function(){
                swal("Network Unavailable", "Please check your internet connection", "warning");
                $('#btnContact').html("Send Message <i class='fa fa-rocket'></i>").attr("disabled", false);
            }
        });
    });
</script>

<!-- Javascript -->
<script data-cfasync="false" src="//cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{ asset('static/files/new/js/vendors/uikit.min.js') }}"></script>
<script src="{{ asset('static/files/new/js/vendors/indonez.min.js') }}"></script>
<script src="https://widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" defer></script>
<script src="{{ asset('static/files/new/js/config-theme.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init();
</script>

<script>
    $(window).on('load', function() { // makes sure the whole site is loaded 
        $('#status').fadeOut(); // will first fade out the loading animation 
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
        $('body').delay(350).css({'overflow':'visible'});
    })
</script>

<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "#", // WhatsApp number
            call_to_action: "Reachout to us", // Call to action
            button_color: "#FF6550", // Color of button
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = 'https:', host = "getbutton.io", url = proto + '//static.' + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Faker/3.1.0/faker.min.js"></script>

<script>
    setInterval(function(){
        let info = faker.helpers.createCard();
        let {name, email, address:{city,country,zipcode}} = info; 
        var amount = (Math.random()*10000).toFixed(2);
        var label_message = "<font color='white'>"+name+" who lives in city of "+city+","+country+". withdraw the sum of $"+amount+".</font>";
        var header_message = "<font color='white'>Recent Withdrawal!</font>";
        toastr["success"](label_message, header_message);
    }, 10000);
    
    //message
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "600",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>

</body>

</html>