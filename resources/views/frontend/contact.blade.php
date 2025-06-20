
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
                                <p><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
@if(!empty($contact->email2))
    <p><a href="mailto:{{ $contact->email2 }}">{{ $contact->email2 }}</a></p>
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
@php
    $phoneRaw = preg_replace('/\D/', '', $contact->phone);
    if (strlen($phoneRaw) === 10) {
        $formattedPhone = preg_replace('/(\d{3})(\d{3})(\d{4})/', '$1-$2-$3', $phoneRaw);
    } else {
        $formattedPhone = $contact->phone;
    }
@endphp


    <p><a href="tel:+1{{ $phoneRaw }}">+1 {{ $formattedPhone }}</a></p>
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
            <div class="col-sm-6">
                <div class="form-group">
                    <!--<label>First Name</label>-->
                    <input type="text" name="first_name" placeholder="First Name">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <!--<label>Last Name</label>-->
                    <input type="text" name="last_name" placeholder="Last Name">
                </div>
            </div>
             <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <!--<label>Email</label>-->
                    <input type="text" name="email" placeholder="Email">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <!--<label>Phone No.</label>-->
                    <input type="text" name="tel_no" placeholder="Phone No">
                </div>
            </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <!--<label>Topic of Interest</label>-->
                    <input type="text" name="topic" placeholder="Topic of Interest">
                </div>
            </div>
                    <div class="row">

            <div class="col-sm-6">
                <div class="form-group">
                    <!--<label>Website URL</label>-->
                    <input type="text" name="website" placeholder="Website URL">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <!--<label>Company Name</label>-->
                    <input type="text" name="company" placeholder="Company Name">
                </div>
            </div>
         </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <!--<label>Message / Feedback</label>-->
                    <textarea name="message" placeholder="Your message" rows="3" style="height: 69px;"></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group mg_top apbtn">
                    <button class="theme_btn" type="submit">Submit</button>
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
    e.preventDefault();
    let form = e.target;
    let isValid = true;
    form.querySelectorAll('.error-message').forEach(el => el.remove());

    const showError = (input, message) => {
        const error = document.createElement('div');
        error.classList.add('error-message');
        error.style.color = 'red';
        error.textContent = message;
        input.parentElement.appendChild(error);
    };

    // Validation rules
    const firstName = form.querySelector('input[name="first_name"]');
    if (!firstName.value.trim()) {
        showError(firstName, 'Please enter your first name.');
        isValid = false;
    }

    const lastName = form.querySelector('input[name="last_name"]');
    if (!lastName.value.trim()) {
        showError(lastName, 'Please enter your last name.');
        isValid = false;
    }

    const email = form.querySelector('input[name="email"]');
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.value.trim()) {
        showError(email, 'Please enter your email.');
        isValid = false;
    } else if (!emailPattern.test(email.value)) {
        showError(email, 'Please enter a valid email.');
        isValid = false;
    }

    const tel = form.querySelector('input[name="tel_no"]');
    if (!tel.value.trim()) {
        showError(tel, 'Please enter your telephone number.');
        isValid = false;
    }

    const topic = form.querySelector('input[name="topic"]');
    if (!topic.value.trim()) {
        showError(topic, 'Please enter topic of interest.');
        isValid = false;
    }

    const website = form.querySelector('input[name="website"]');
    if (!website.value.trim()) {
        showError(website, 'Please enter website URL.');
        isValid = false;
    }

    const company = form.querySelector('input[name="company"]');
    if (!company.value.trim()) {
        showError(company, 'Please enter company name.');
        isValid = false;
    }

    const message = form.querySelector('textarea[name="message"]');
    if (!message.value.trim()) {
        showError(message, 'Please enter your message/feedback.');
        isValid = false;
    }

    if (isValid) {
        form.submit();
    }
});
</script>


</body>
</html>