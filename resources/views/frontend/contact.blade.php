
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
                <div class="page_header_content">
                    <div class="auto-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="banner_title_inner">
                                    <div class="title_page">
                                        Contact Us
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="breadcrumbs creote">
                                    <ul class="breadcrumb m-auto">
                                        <li><a href="{{ route('home.page') }}">Home</a></li>
                                        <li class="active">Contact Us</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content" class="site-content ">
                            <section class="contact-section">
               <!--===============spacing==============-->
               <div class="pd_top_90"></div>
               <!--===============spacing==============-->
               <div class="container">
                  <div class="row align-items-center">
                                          <div class="col-xl-6 col-lg-6">
                        <div class="title_all_box style_one dark_color">
                           <div class="title_sections left">
                              <h2>Reach Our Expert Team</h2>
                              <p>Send a message through given form, If your enquiry is time sensitive please use below
                                 contact details.</p>
                           </div>
                        </div>

                        <div class="contact_box_content style_one">
                           <div class="contact_box_inner icon_yes">
                              <div class="icon_bx">
                                 <span class=" icon-placeholder"></span>
                              </div>
                              <div class="contnet">
                                 <h3>Address </h3>
                                    <a href="{{ $contact->map_url }}" target="_blank" rel="noopener noreferrer">
                                        {{ $contact->address }}
                                    </a>

                              </div>
                           </div>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_15"></div>
                        <!--===============spacing==============-->
                        <div class="contact_box_content style_one">
                           <div class="contact_box_inner icon_yes">
                              <div class="icon_bx">
                                 <span class="icon-phone-call"></span>
                              </div>
                              <div class="contnet">
                                 <h3> Mail Us</h3>
                                 <p>{{ $contact->email }}</p>
                                    @if(!empty($contact->email2))
                                        <p>{{ $contact->email2 }}</p>
                                    @endif

                              </div>
                           </div>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_15"></div>
                        <!--===============spacing==============-->
                        <div class="contact_box_content style_one">
                           <div class="contact_box_inner icon_yes">
                              <div class="icon_bx">
                                 <span class="fa fa-clock-o"></span>
                              </div>
                              <div class="contnet">
                                 <h3>Phone </h3>
                                 <p>+1 {{ $contact->phone }}</p>

                              </div>
                           </div>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_40"></div>
                        <!--===============spacing==============-->
                        <div class="social_media_v_one style_two">
                            @php
                                $platforms = json_decode($contact->social_media_platforms, true);
                                $urls = json_decode($contact->social_media_urls, true);
                            @endphp

                            @if($platforms && $urls && count($platforms) === count($urls))
                                <ul>
                                    @foreach($platforms as $index => $platform)
                                        <li>
                                            <a href="{{ $urls[$index] ?? '#' }}" target="_blank">
                                                <span class="fa fa-{{ strtolower($platform) }}"></span>
                                                <small>{{ ucfirst($platform) }}</small>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6">
                        <div class="contact_form_box_all type_one">
                           <div class="contact_form_box_inner">
                              <div class="contact_form_shortcode">

                                <form id="contact-form" method="POST" action="{{ route('contact.submit') }}" role="form">
                                    @csrf
                                    <div class="messages"></div>

                                    <div class="controls">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                   <label> Your Name<br /></label>
                                                    <input type="text" name="name" placeholder="Your Name *" data-error="Enter Your Name">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                   <label> Your Email<br /></label>
                                                    <input type="text" name="email" placeholder="Email *" data-error="Enter Your Email Id">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                   <label> Your Subject<br /></label>
                                                    <input type="text" name="subject" placeholder=" Subject ">
                                                </div>
                                            </div>
                                           
                                            
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                   <label> Your Message<br /></label>
                                                    <textarea name="message" placeholder="Additional Information... " rows="2" data-error="Please, leave us a message."></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                <div class="form-group mg_top apbtn">
                                                    <button class="theme_btn" type="submit">Appointment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                    
                              </div>
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
               <!--===============spacing==============-->
               <div class="pd_top_70"></div>
               <!--===============spacing==============-->
            </section>
             <section class="contact-map-section">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-12">
                        <iframe src="{{ $contact->url }}" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>
                  </div>
               </div>
               <div class="pd_top_60"></div>
            </section>
            </div>

            
        </div>




@include('components.frontend.footer')

@include('components.frontend.main-js')


<script>
    document.getElementById('contact-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent form submission
        let form = e.target;
        let isValid = true;

        // Clear all previous error messages
        form.querySelectorAll('.error-message').forEach(el => el.remove());

        // Helper to show error
        const showError = (input, message) => {
            const error = document.createElement('div');
            error.classList.add('error-message');
            error.style.color = 'red';
            error.style.marginTop = '5px';
            error.textContent = message;
            input.parentElement.appendChild(error);
        };


        // Validate name
        const name = form.querySelector('input[name="name"]');
        const namePattern = /^[A-Za-z\s]+$/;
        if (!name.value.trim()) {
            showError(name, 'Please enter your name.');
            isValid = false;
        } else if (!namePattern.test(name.value.trim())) {
            showError(name, 'Name can only contain letters and spaces.');
            isValid = false;
        }

        // Validate email
        const email = form.querySelector('input[name="email"]');
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email.value.trim()) {
            showError(email, 'Please enter your email.');
            isValid = false;
        } else if (!emailPattern.test(email.value)) {
            showError(email, 'Please enter a valid email address.');
            isValid = false;
        }

        // Validate subject
        const subject = form.querySelector('input[name="subject"]');
        if (!subject.value.trim()) {
            showError(subject, 'Please enter a subject.');
            isValid = false;
        }

        // Validate message
        const message = form.querySelector('textarea[name="message"]');
        if (!message.value.trim()) {
            showError(message, 'Please enter your message.');
            isValid = false;
        }

        if (isValid) {
            form.submit(); // Submit only if all fields are valid
        }
    });
</script>


</body>
</html>