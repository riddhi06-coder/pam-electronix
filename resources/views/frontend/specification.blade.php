
<!DOCTYPE html>
<html lang="en-US">

<head>
    @include('components.frontend.head')
</head>


<body class="home theme-creote page-home-default-one">
    <div id="page" class="page_wapper hfeed site">
        <div id="wrapper_full" class="content_all_warpper">

        @include('components.frontend.header')
        
        @foreach($banners as $banner)
                <div class="page_header_default style_one" style="background-image:url('{{ asset('uploads/specifications/' . $banner->banner_image) }}')">
                    <div class="page_header_content">
                        <div class="auto-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="banner_title_inner">
                                        <div class="title_page">
                                            {{ $banner->banner_heading }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="breadcrumbs creote">
                                        <ul class="breadcrumb m-auto">
                                            <li><a href="{{ route('home.page') }}">Home</a></li>
                                            <li class="active">{{ $banner->banner_heading }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="content" class="site-content ">
                <section class="creote-icon-box">
                    <div class="pd_top_60"></div>

                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                               <div class="icon_box_all style_three dark_color_one">
                                  <div class="icon_content ">
                                     <div class="txt_content">
                                        <p>{!! $banner->detailed_description !!}</p>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="col-md-6">
                              <div class="img-sec text-center">
                              <img src="{{ asset('uploads/specifications/' . $banner->image) }}"
                                        alt="Specification Image"
                                        class="img-fluid"
                                        style="max-height: 300px;" />
                              </div>
                          </div>
                         </div>
                    </div>

                    <div class="pd_bottom_60"></div>
                        @foreach ($banners as $banner)
                            @php
                                $headers = json_decode($banner->headers, true);
                                $tempCoeffs = json_decode($banner->spec_temp_coeff, true);
                                $capacitorDrifts = json_decode($banner->spec_capacitor_drift, true);
                            @endphp

                            @if (!empty($headers) && !empty($tempCoeffs))
                                <div class="container woocommerce-cart-form">
                                    <div class="col-lg-12">
                                        <table class="shop_table specification-table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="product-name test">{{ $headers[0]  }}</th>
                                                    <th class="product-price test">{{ $headers[1]  }}</th>
                                                    <th class="product-quantity test">{{ $headers[2] }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tempCoeffs as $index => $temp)
                                                    <tr class="woocommerce-cart-form__cart-item cart_item">
                                                        <td class="product-name test1" ><b>{{ is_string($index) ? $index : chr(67 + $index) }}</b></td>
                                                        <td class="product-name test1">{{ $temp }}</td>
                                                        <td class="product-name test1">{{ $capacitorDrifts[$index] ?? '-' }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        @endforeach

    

                    <div class="pd_bottom_20"></div>
                </section>
            </div>
        @endforeach
        </div>


            @include('components.frontend.footer')

            @include('components.frontend.main-js')

</body>
</html>