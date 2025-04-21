<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery-3.6.0.min.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap.min.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.fancybox.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.flexslider-min.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/owl.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/swiper.min.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/isotope.min.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/countdown.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/simpleParallax.min.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/appear.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.countTo.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/sharer.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/creote-extension.js') }}" defer></script>


<!-- Include Notyf CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notyf/3.10.0/notyf.min.css" type="text/css" media="all">
<script src="https://cdnjs.cloudflare.com/ajax/libs/notyf/3.10.0/notyf.min.js"></script>

<script>
    // Initialize Notyf
    var notyf = new Notyf({
        duration: 3000, // Notification duration
        ripple: true, // Adds a ripple effect
        position: {
            x: 'right',
            y: 'top',
        },
        dismissible: true,
        types: [
            {
                type: 'custom-success',
                background: 'black',  // Black background
                icon: {
                    className: 'fa fa-check-circle', // FontAwesome success icon
                    tagName: 'i',
                    color: 'white'  // White icon color
                }
            }
        ]
    });

    // Display notifications based on session messages
    @if(Session::has('message'))
        notyf.open({
            type: 'custom-success',
            message: " {{ session('message') }}",
        });
    @endif

    @if(Session::has('error'))
        notyf.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
        notyf.open({
            type: 'info',
            message: "<strong>ℹ Info:</strong> {{ session('info') }}"
        });
    @endif

    @if(Session::has('warning'))
        notyf.open({
            type: 'warning',
            message: " {{ session('warning') }}"
        });
    @endif
</script>
