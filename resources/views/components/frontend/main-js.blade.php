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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.2.0/jquery.magnific-popup.js" defer></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/sharer.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/creote-extension.js') }}" defer></script>


<!-- Include Notyf CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notyf/3.10.0/notyf.min.css" type="text/css" media="all">
<script src="https://cdnjs.cloudflare.com/ajax/libs/notyf/3.10.0/notyf.min.js"></script>

<script>
    // Initialize Notyf
    var notyf = new Notyf({
        duration: 7000,
        ripple: true,
        position: {
            x: 'right',
            y: 'top',
        },
        dismissible: true,
        types: [
            {
                type: 'custom-success',
                background: 'black',
                icon: {
                    className: 'fa fa-check-circle',
                    tagName: 'i',
                    color: 'white'
                }
            },
            {
                type: 'custom-error',
                background: 'black',
                icon: {
                    className: 'fa fa-times-circle',
                    tagName: 'i',
                    color: 'white'
                }
            },
            {
                type: 'custom-info',
                background: '#0dcaf0',
                icon: {
                    className: 'fa fa-info-circle',
                    tagName: 'i',
                    color: 'white'
                }
            },
            {
                type: 'custom-warning',
                background: '#ffc107',
                icon: {
                    className: 'fa fa-exclamation-triangle',
                    tagName: 'i',
                    color: 'white'
                }
            }
        ]
    });

    // Display notifications based on session messages
    @if(Session::has('message'))
        notyf.open({
            type: 'custom-success',
            message: "{{ session('message') }}"
        });
    @endif

    @if(Session::has('error'))
        notyf.open({
            type: 'custom-error',
            message: "{{ session('error') }}"
        });
    @endif

    @if(Session::has('info'))
        notyf.open({
            type: 'custom-info',
            message: "{{ session('info') }}"
        });
    @endif

    @if(Session::has('warning'))
        notyf.open({
            type: 'custom-warning',
            message: "{{ session('warning') }}"
        });
    @endif
</script>
