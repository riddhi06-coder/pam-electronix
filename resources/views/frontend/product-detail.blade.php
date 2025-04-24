
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
<!--                <div class="parallax_cover">
                  <div class="simpleParallax"><img src="assets/images/bg/2148882631.webp" alt="bg_image" class="cover-parallax" /></div>
               </div> -->
               <div class="page_header_content">
                  <div class="auto-container">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="banner_title_inner">
                              <div class="title_page">
                                {{ $product->product_name }}
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="breadcrumbs creote">
                              <ul class="breadcrumb m-auto">
                                 <li><a href="index.html">Home</a></li>
                                 <li class="active">{{ $product->product_name }}</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!----header----->
            <div id="content" class="site-content ">
               <div class="pd_top_90"></div>
                    <div class="product-contain">
                        <div class="container-fluid">
                            @foreach ($banners as $banner)
                                <div class="row">
                                    <div class="service_box style_one dark_color">
                                        <div class="service_content">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="image image_fit">
                                                        <img src="{{ asset('uploads/product/' . $banner->product_image) }}" class="img-fluid mb-4" />
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="content_inner">
                                                        <div class="pd_top_20"></div>
                                                        <p>{!! $banner->product_description !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>


                    
               <div class="product-table">
               <div class="container-fluid">
                  <div class="row default_row">
                     <div class="full_width_box zui-wrapper">
                        <!--===============spacing==============-->
                        <div class="pd_top_70"></div>
                        <!--===============spacing==============-->


                        <form class="woocommerce-cart-form" action="#" method="post">
                           <div class="freeze-table">
                              <table class="zui-table shop_table_responsive" cellspacing="0">
                                 <thead>
                                    <tr>
                                       <th>Sr. No.</th>
                                       <th>Image</th>
                                       <th>Part #</th>
                                       <th>Mfr.</th>
                                       <th>Description</th>
                                       <th>Availability</th>
                                       <th>Pricing (INR)</th>
                                       <th>Qty.</th>
                                       <th></th>
                                       <th>RoHS</th>
                                       <th>Capacitance</th>
                                       <th>Voltage Rating</th>
                                       <th>Termination Style</th>
                                       <th>PF</th>
                                       <th>VOLTAGE</th>
                                       <th>Lead Spacing</th>
                                       <th>Length</th>
                                       <th>Width</th>
                                       <th>Height</th>
                                       <th>Lead wire Diameter</th>
                                       <th>Tolerance</th>
                                       <th>Package/Case IN PLASTIC BAG</th>
                                       <th>Minimum Operating Temperature</th>
                                       <th>Maximum Operating Temperature</th>
                                       <th>Series</th>
                                       <th>Qualification</th>
                                       <th>Packaging</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($Specifications as $index => $spec)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td class="product-thumbnail">
                                            <a href="#">
                                                <img width="300" height="300" src="{{ asset('uploads/product/specifications/' . $spec->product_image) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="img" />
                                            </a>
                                        </td>
                                        <td>{{ $spec->name }}</td>
                                        <td class="product-name" data-title="Product">
                                            <a href="#">{{ $spec->manufacturer }}</a>
                                        </td>
                                        <td>{!! $spec->product_description !!}</td>
                                        <td>{{ $spec->availability }} In Stock</td>
                                        <td class="price-sec">
                                            <div><a href="#">1</a> <span>₹{{ $spec->pricing }}</span></div>
                                            <div><a href="#">10</a> <span>₹{{ $spec->pricing }}</span></div>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity">
                                                <input type="button" value="-" class="qty_button minus">
                                                <input type="text" class="input-text qty text" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric">
                                                <input type="button" value="+" class="qty_button plus">
                                            </div>
                                        </td>
                                        <td><a href="#" target="_blank" rel="nofollow"  data-id="{{ $spec->id }}" class="theme-btn product-page five">Buy Now</a></td>
                                        <td>{{ $spec->rohs }}</td>
                                        <td>{{ $spec->capacitance }}</td>
                                        <td>{{ $spec->voltage_rating }} V</td>
                                        <td>{{ $spec->termination }}</td>
                                        <td>{{ $spec->pf }}</td>
                                        <td>{{ $spec->voltage }} V</td>
                                        <td>{{ $spec->lead_spacing }}</td>
                                        <td>{{ $spec->length }}</td>
                                        <td>{{ $spec->width }}</td>
                                        <td>{{ $spec->height }}</td>
                                        <td>{{ $spec->lead_wire }}</td>
                                        <td>{{ $spec->tolerance }}</td>
                                        <td>{{ $spec->package_case }}</td>
                                        <td>{{ $spec->operating_temp }}</td>
                                        <td>{{ $spec->max_operating_temp }}</td>
                                        <td>{{ $spec->series }}</td>
                                        <td>{{ $spec->qualification }}</td>
                                        <td>{{ $spec->packaging }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>

                              </table>
                           </div>
                        </form>


                        <!--===============spacing==============-->
                        <div class="pd_bottom_60"></div>
                        <!--===============spacing==============-->
                     </div>
                  </div>
               </div>
           </div>
            </div>
         </div>
      </div>
        <div class="prgoress_indicator">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>



            @include('components.frontend.footer')
            
            @include('components.frontend.main-js')
            <script type="text/javascript" src="{{ asset('frontend/assets/js/freeze-table.min.js') }}" defer></script>


            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    document.querySelectorAll('.quantity').forEach(function (container) {
                        const minusBtn = container.querySelector('.minus');
                        const plusBtn = container.querySelector('.plus');
                        const input = container.querySelector('.qty');

                        minusBtn.addEventListener('click', function () {
                            let value = parseInt(input.value) || 0;
                            if (value > 1) {
                                input.value = value - 1;
                            }
                        });

                        plusBtn.addEventListener('click', function () {
                            let value = parseInt(input.value) || 0;
                            input.value = value + 1;
                        });
                    });
                });
            </script>


</body>
</html>