
<!DOCTYPE html>
<html lang="en-US">

<head>
    @include('components.frontend.head')
</head>


<body class="home theme-creote page-home-default-one">
    <div id="page" class="page_wapper hfeed site">
        <div id="wrapper_full" class="content_all_warpper">

            @include('components.frontend.header')
	       
            <div id="content" class="site-content ">

                <section class="slider style_page_thirteen nav_position_one position-relative">
                    <div class="banner_carousel owl-carousel owl_nav_block owl_dots_none theme_carousel owl-theme"
                        data-options='{
                            "loop": true,
                            "margin": 0,
                            "autoheight":true,
                            "lazyload":true,
                            "nav": false,
                            "dots": false,
                            "autoplay": false,
                            "autoplayTimeout": 7000,
                            "smartSpeed": 1800,
                            "responsive": {
                                "0": { "items": "1" },
                                "768": { "items": "1" },
                                "1000": { "items": "1" }
                            }
                        }'>

                        @foreach($banners as $banner)
                            <div class="slide-item-content">
                                <div class="slide-item content_left">
                                    <div class="image-layer" style="background-image:url('{{ asset('uploads/home/' . $banner->banner_images) }}')">
                                    </div>
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                                <div class="slider_content">
                                                    <h2 class="animate_up">{{ $banner->banner_heading }}</h2>
                                                    <p class="animate_right pd_bottom_40">{{ $banner->banner_title }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </section>

                <!---slider-end--->

                <section class="about-section">
                    <div class="pd_top_60"></div>
                    <div class="container">
                        <div class="row align-items-center">

                            <div class="col-xl-6 col-lg-10 col-md-12">
                                <div class="image_boxes style_seven">
                                    <div class="image_box">
                                        <img 
                                            src="{{ asset('uploads/home/' . $homeIntro->banner_image) }}" 
                                            class="img-fluid height_590px object-fit-cover" 
                                            alt="about"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-12 col-md-12 mb-sm-5 mb-md-5 mb-lg-5 mb-xl-0">
                                <div class="title_all_box style_one dark_color">
                                    <div class="title_sections left">
                                        <p>{!! $homeIntro->description !!}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="pd_bottom_60"></div>
                </section>


                <section class="project-carousel" id="projects" 
                                            style="background-image: url('{{ asset('uploads/home/' . $homeIntro->section_image) }}'); 
                                                background-size: cover; 
                                                background-position: center; 
                                                background-attachment: fixed;">
    
                    <div class="pd_top_60"></div>
                    <div class="container">
                        <div class="row">
                            <div class="title_all_box style_one text-center dark_color">
                                <div class="title_sections">
                                    <h2>{{ $homeIntro->section_heading }}</h2>
                                </div>
                                <div class="mr_bottom_10"></div>
                            </div>
                        </div>
                    </div>


                    <div class="container">
                        <div class="row gutter_15px">
                                 <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="icon_box_all  style_two">
                                       <div class="icon_content  icon_imgs ">
                                          <div class="icon">
                                             <img src="{{ asset('frontend/assets/images/icons/right-chevron.svg') }}" class="img-fluid svg_image" alt="icon png">
                                          </div>
                                          <div class="txt_content">
                                             <h3><a href="#" target="_blank" rel="nofollow">Dipped Mica Capacitors</a>
                                             </h3>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="icon_box_all  style_two">
                                       <div class="icon_content  icon_imgs ">
                                          <div class="icon">
                                             <img src="{{ asset('frontend/assets/images/icons/right-chevron.svg') }}" class="img-fluid svg_image" alt="icon png">
                                          </div>
                                          <div class="txt_content">
                                             <h3><a href="#" target="_blank" rel="nofollow">Chip Mica Capacitors</a></h3>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="icon_box_all  style_two">
                                       <div class="icon_content  icon_imgs ">
                                          <div class="icon">
                                             <img src="{{ asset('frontend/assets/images/icons/right-chevron.svg') }}" class="img-fluid svg_image" alt="icon png">
                                          </div>
                                          <div class="txt_content">
                                             <h3><a href="#" target="_blank" rel="nofollow">High Voltage Mica Capacitors</a></h3>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="icon_box_all  style_two">
                                       <div class="icon_content  icon_imgs ">
                                          <div class="icon">
                                             <img src="{{ asset('frontend/assets/images/icons/right-chevron.svg') }}" class="img-fluid svg_image" alt="icon png">
                                          </div>
                                          <div class="txt_content">
                                             <h3><a href="#" target="_blank" rel="nofollow">Miniature Dipped Mica Capacitors</a></h3>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="icon_box_all  style_two">
                                       <div class="icon_content  icon_imgs ">
                                          <div class="icon">
                                             <img src="{{ asset('frontend/assets/images/icons/right-chevron.svg') }}" class="img-fluid svg_image" alt="icon png">
                                          </div>
                                          <div class="txt_content">
                                             <h3><a href="#" target="_blank" rel="nofollow">Metal Clad Capacitors</a></h3>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="icon_box_all  style_two">
                                       <div class="icon_content  icon_imgs ">
                                          <div class="icon">
                                             <img src="{{ asset('frontend/assets/images/icons/right-chevron.svg') }}" class="img-fluid svg_image" alt="icon png">
                                          </div>
                                          <div class="txt_content">
                                             <h3><a href="#" target="_blank" rel="nofollow">Tape & Reel Capacitors</a></h3>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="icon_box_all  style_two">
                                       <div class="icon_content  icon_imgs ">
                                          <div class="icon">
                                             <img src="{{ asset('frontend/assets/images/icons/right-chevron.svg') }}" class="img-fluid svg_image" alt="icon png">
                                          </div>
                                          <div class="txt_content">
                                             <h3><a href="#" target="_blank" rel="nofollow">Molded Capacitor</a></h3>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="icon_box_all  style_two">
                                       <div class="icon_content  icon_imgs ">
                                          <div class="icon">
                                             <img src="{{ asset('frontend/assets/images/icons/right-chevron.svg') }}" class="img-fluid svg_image" alt="icon png">
                                          </div>
                                          <div class="txt_content">
                                             <h3><a href="#" target="_blank" rel="nofollow">Made to Order Capacitors</a></h3>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                             </div>

                    </div>
                    <div class="pd_bottom_60"></div>
                </section>


                <section class="content-section choose-us bg_light_1">
                    <div class="row">
                        <div class="col-xxl-5 col-xl-4 col-lg-4 col-md-12 pd_zero bg_op_1 text-center"
                            style="background-image:url({{ asset('frontend/assets/images/icons/P229.5.png') }}); opacity: 0.3;">

                            <div class="video_btn_all">
                                <!--===============spacing==============-->
                                <div class="pd_top_200"></div>
                                <div class="pd_top_70"></div>
                                <!--===============spacing==============-->
                                <div class="pd_top_80"></div>
                                <!--===============spacing==============-->
                            </div>
                        </div>

                        <div class="col-xxl-7 col-xl-8 col-lg-8 col-md-12 bg_op_1">
                            <div class="row">
                                <div class="col-xxl-1 col-xl-1 col-md-12"></div>
                                <div class="col-xxl-10 col-xl-10 col-md-12">
                                    <div class="content-wrapper">
                                        <!--===============spacing==============-->
                                        <div class="pd_top_80"></div>
                                        <!--===============spacing==============-->
                                        <div class="title_all_box style_one">
                                            <div class="title_sections left">
                                                <h2>{{ $homeWhyChoose->banner_heading }}</h2>
                                                <p>{{ $homeWhyChoose->banner_title }}</p>
                                            </div>
                                        </div>
                                        <!--===============spacing==============-->
                                        <div class="pd_bottom_20"></div>
                                        <!--===============spacing==============-->
                                        <div class="row">
                                            @foreach(json_decode($homeWhyChoose->section_titles) as $index => $title)
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="icon_box_all style_seven light_color">
                                                        <div class="icon_content">
                                                            <div class="icon">
                                                                <img src="{{ asset('uploads/home/' . json_decode($homeWhyChoose->section_images)[$index]) }}" class="img-fluid svg_image" alt="icon png">
                                                            </div>
                                                            <div class="text_box">
                                                                <h2>{{ $title }}</h2>
                                                                <p>{!! json_decode($homeWhyChoose->section_descriptions)[$index] !!}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!--===============spacing==============-->
                                        <p>{!! $homeWhyChoose->detailed_description !!}</p>
                                        <!--===============spacing==============-->
                                        <div class="pd_bottom_70"></div>
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-xl-2 col-md-12"></div>
                            </div>
                        </div>
                    </div>
                </section>


                <section class="contact-section bg_op_1"  style="background-image: url({{ asset('uploads/home/' . $homeIntro->section_image) }});">
                    <div class="pd_top_80"></div>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-12 mb-sm-5 mb-md-5 mb-lg-5 mb-xl-0">
                                <div class="title_all_box style_one light_color">
                                    <div class="title_sections">
                                        <h2>{{ $homeWhyChoose->section_heading }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="contact_form_box_all type_two">
                                    <div class="contact_form_box_inner">
                                        <div class="contact_form_shortcode">
                                            <div class="heading">
                                                <h2>Connect with our experts</h2>
                                            </div>
                                            <div class="_form">
                                                <div role="form" class="wpcf7" id="wpcf7-f2367-p2076-o1" lang="en-US" dir="ltr">
                                                    <div class="screen-reader-response">
                                                        <p role="status" aria-live="polite" aria-atomic="true"></p>
                                                        <ul></ul>
                                                    </div>
                                                    <form action="#" method="post" class="wpcf7-form init" novalidate>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <input type="text" id="your-name" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Your Name">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="email" id="your-email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Your Email">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="tel" id="tel-922" name="tel-922" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel" aria-invalid="false" placeholder="Your Number">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" id="your-subject" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Your Subject">
                                                            </div>
                                                            <div class="col-lg-12 text_area">
                                                                <textarea id="your-message" name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Your Message"></textarea>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <input type="submit" value="Submit" class="wpcf7-form-control has-spinner wpcf7-submit">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pd_bottom_80"></div>
                </section>
            </div>
        </div>

@include('components.frontend.footer')

@include('components.frontend.main-js')

</body>
</html>