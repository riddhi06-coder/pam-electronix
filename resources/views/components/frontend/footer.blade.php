    <a href="#" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

    <div class="footer_area thirteen" id="footer_contents">
            <div class="footer_widgets_wrap bg_op_1" style="background-color: #504538;">
                <div class="pd_top_50"></div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer_widgets wid_tit style_two">
                                <img alt="Logo" src="{{ asset('frontend/assets/images/logo.webp') }}"/>
                            </div>
                        
                            <div class="pd_bottom_40"></div>
                        </div>


                        @php
                            use App\Models\Product;
                            
                            $products = Product::orderBy('id', 'asc')->get();
                            $chunks = $products->chunk(ceil($products->count() / 2));
                        @endphp
<!--<div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 mb-sm-5 mb-md-5 mb-lg-5 mb-xl-0">-->
<!--    <div class="footer_widgets wid_tit style_two">-->
<!--        <div class="fo_wid_title">-->
<!--            <h2>Quick Links</h2>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="footer_widgets clearfix navigation_foo light_color style_three">-->
<!--        <div class="navigation_foo_box">-->
<!--            <div class="navigation_foo_inner">-->
<!--                <div class="left">-->
<!--                    <div class="menu-information-container">-->
<!--                        <ul>-->
<!--                            <li><a href="{{ route('show.termsconditions') }}">Terms & Conditions</a></li>-->
<!--                            <li><a href="{{ route('show.privacypolicy') }}">Privacy Policy</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

                        <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 mb-sm-5 mb-md-5 mb-lg-5 mb-xl-0">
                            <div class="footer_widgets wid_tit style_two">
                                <div class="fo_wid_title">
                                    <h2>Products</h2>
                                </div>
                            </div>
                            <div class="footer_widgets clearfix navigation_foo light_color style_three">
                                <div class="navigation_foo_box">
                                    <div class="navigation_foo_inner">
                                        <div class="left">
                                            
                                            <div class="menu-information-container">
                                               
<ul>
    @foreach($chunks[0] as $product)
        @switch($product->id)
            @case(1)
                <li>
                    <a href="{{ route('product-details.show', $product->slug) }}">
                        {{ $product->product_name }}
                    </a>
                </li>

                {{-- Static extra links for product ID 1 --}}
                <li>
                    <a href="{{ route('chip_mica_capacitors.show') }}">
                        Chip Mica Capacitors
                    </a>
                </li>
                <li>
                    <a href="{{ route('high_voltage_mica_capacitors.show') }}">
                        High Voltage Mica Capacitors
                    </a>
                </li>
                <li>
                    <a href="{{ route('miniature_dipped_mica_capacitors.show') }}">
                        Miniature Dipped Mica Capacitors
                    </a>
                </li>
                <li>
                    <a href="{{ route('metal_clad_capacitors.show') }}">
                        Metal Clad Capacitors
                    </a>
                </li>
                <li>
                    <a href="{{ route('tape_reel_capacitors.show') }}">
                        Tape Reel Capacitors
                    </a>
                </li>
                <li>
                    <a href="{{ route('molded_capacitor.show') }}">
                        Molded Capacitor
                    </a>
                </li>
                @break

            <!--@default-->
            <!--    <li>-->
            <!--        <a href="{{ route('product-details.show', $product->slug) }}">-->
            <!--            {{ $product->product_name }}-->
            <!--        </a>-->
            <!--    </li>-->
        @endswitch
    @endforeach
</ul>


                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="menu-essentials-container">
                                                <!--<ul>-->
                                                <!--    @foreach($chunks[1] as $product)-->
                                                <!--        <li><a href="{{ route('product-details.show', $product->slug) }}">{{ $product->product_name }}</a></li>-->
                                                <!--    @endforeach-->
                                                <!--</ul>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @php
                            $contact = \App\Models\FooterContact::latest()->first();
                            $platforms = json_decode($contact->social_media_platforms ?? '[]', true);
                            $urls = json_decode($contact->social_media_urls ?? '[]', true);
                        @endphp

                        @if($contact)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer_widgets wid_tit style_two">
                                <div class="fo_wid_title">
                                    <h2>Get In Touch</h2>
                                </div>
                            </div>

                            <div class="footer_contact_list light_color type_one">
                                <div class="same_contact address">
                                    <span class="icon-location2"></span>
                                    <div class="content">
                                        <h6 class="titles">Address</h6>
                                        <p>
                                            <a href="{{ $contact->map_url }}" target="_blank" rel="noopener noreferrer">
                                                {{ $contact->address }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="footer_contact_list light_color type_one">
                                <div class="same_contact mail">
                                    <span class="icon-mail"></span>
                                    <div class="content">
                                        <h6 class="titles">Mail Us</h6>
                                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                        <a href="mailto:{{ $contact->email2 }}">{{ $contact->email2 }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="pd_bottom_20"></div>

                            <div class="footer_contact_list light_color type_one">
                                <div class="same_contact phone">
                                    <span class="icon-telephone"></span>
                                    <div class="content">
                                       @php
    $phoneRaw = preg_replace('/\D/', '', $contact->phone);
    if (strlen($phoneRaw) === 10) {
        $formattedPhone = preg_replace('/(\d{3})(\d{3})(\d{4})/', '$1-$2-$3', $phoneRaw);
    } else {
        $formattedPhone = $contact->phone;
    }
@endphp

<div class="title">
    <a href="tel:+1{{ $phoneRaw }}">+1 {{ $formattedPhone }}</a>
</div>

                                    </div>
                                </div>
                            </div>

                            <div class="pd_bottom_20"></div>

                            <div class="social_media_v_one">
                                <ul>
                                    @foreach($platforms as $index => $platform)
                                        @php
                                            $url = $urls[$index] ?? '#';
                                            $icon = match(strtolower($platform)) {
                                                'facebook' => 'fa-facebook',
                                                'twitter' => 'fa-twitter',
                                                'instagram' => 'fa-instagram',
                                                'linkedin' => 'fa-linkedin',
                                                'youtube' => 'fa-youtube',
                                                'watsapp' => 'fa-whatsapp',
                                                'pinterest' => 'fa-pinterest',
                                                default => 'fa-share-alt',
                                            };
                                        @endphp
                                        <li>
                                            <a href="{{ $url }}" target="_blank" aria-label="Visit our {{ $platform }} page">
                                                <span class="fa {{ $icon }}"></span>
                                                <small>{{ strtolower($platform) }}</small>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="pd_bottom_40"></div>
                        </div>
                        @endif

                    </div>
                </div>
                <div class="pd_bottom_30"></div>
            </div>
            <div class="creote-footer-copyright bg_dark_1">
                <div class="pd_top_15"></div>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class="footer_copy_content color_white">
                                © Copyright {{ date('Y') }} PAM Electronix Pvt Ltd. | Designed By <a target="_blank" href="https://www.matrixbricks.com/">Matrix Bricks.</a> All Rights Reserved
                            </div>
                        </div>

                    </div>
                </div>
                <div class="pd_bottom_15"></div>
            </div>
            </div>
                <div class="crt_mobile_menu">
                    <div class="menu-backdrop"></div>
                    <nav class="menu-box">
                        <div class="close-btn"><i class="icon-close"></i></div>
                        <div class="menu-outer">
                        </div>
                    </nav>
                </div>
            </div>

            <div class="prgoress_indicator">
                <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
                </svg>
            </div>