
<!DOCTYPE html>
<html lang="en-US">

<head>
    @include('components.frontend.head')
</head>


<body class="home theme-creote page-home-default-one">
    <div id="page" class="page_wapper hfeed site">
        <div id="wrapper_full" class="content_all_warpper">


        @include('components.frontend.header')

         <div class="page_header_default style_one">
            </div>
            <div id="content" class="site-content ">
                <section class="creote-icon-box">
                    <div class="pd_top_60"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 m-auto">
                                <div class="thank-you-sec">
                                    <img src="{{ asset('frontend/assets/images/icons/check-mark.svg') }}" alt="">
                                    <h2>Thank You</h2>
                                    <p>Thank you for reaching out to us! Your message has been successfully received. <br>
                                        We appreciate your interest and look forward to connecting with you.</p>

                                        <a href="{{ route('home.page') }}" class="theme-btn-new-one">Back To Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pd_bottom_60"></div>
                </section>
            </div>
        </div>

        @include('components.frontend.footer')

        @include('components.frontend.main-js')

</body>
</html>