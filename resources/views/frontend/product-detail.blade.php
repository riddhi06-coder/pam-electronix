
<!DOCTYPE html>
<html lang="en-US">

<head>
    @include('components.frontend.head')
</head>


<body class="home theme-creote page-home-default-one">
    <div id="page" class="page_wapper hfeed site">
        <div id="wrapper_full" class="content_all_warpper">

            @include('components.frontend.header')


            <div class="page_header_default style_one" 
                style="background-image: url('{{ asset('uploads/product/' . ($banners->first()->banner_image ?? 'default.jpg')) }}');">

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
                                 <li><a href="{{ route('home.page') }}">Home</a></li>
                                 <li class="active">{{ $product->product_name }}</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

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


                
                <div class="product-contain">
                    <div class="container-fluid">
                    <div class="row">
                        <div class="service_box style_one dipped-sec dark_color">
                        <div class="service_content">
                            <div class="content_inner">
                            <form class="woocommerce-cart-form" action="#" method="post">
                                <table class="zui-table shop_table_responsive" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th colspan="3">Capacitance Range</th>
                                    <th colspan="2">MIL Equivalent</th>
                                    </tr>
                                    <tr>
                                    <th>Case Style</th>
                                    <th>Commercial </th>
                                    <th>MIL </th>
                                    <th>Straight Leads</th>
                                    <th>Crimped Leads</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td class="product-name" data-title="Product">
                                        <a href="DM5.html">DM5</a>
                                    </td>
                                    <td>1-390</td>
                                    <td>-----</td>
                                    <td>none </td>
                                    <td>none</td>
                                    </tr>
                                    <tr>
                                    <td class="product-name" data-title="Product">
                                        <a href="#l">DM10</a>
                                    </td>
                                    <td>1-470</td>
                                    <td>1-390 </td>
                                    <td>CM04 </td>
                                    <td>CM09</td>
                                    </tr>
                                    <tr>
                                    <td class="product-name" data-title="Product">
                                        <a href="#l">DM12</a>
                                    </td>
                                    <td>1-1500 </td>
                                    <td>----- </td>
                                    <td>none </td>
                                    <td>none</td>
                                    </tr>
                                    <tr>
                                    <td class="product-name" data-title="Product">
                                        <a href="#l">DM15</a>
                                    </td>
                                    <td>1-1200 </td>
                                    <td>1-390 </td>
                                    <td>CM05 </td>
                                    <td>CM10</td>
                                    </tr>
                                    <tr>
                                    <td class="product-name" data-title="Product">
                                        <a href="#l">DM19</a>
                                    </td>
                                    <td>100-8200 </td>
                                    <td>430-4700 </td>
                                    <td>CM06 </td>
                                    <td>CM11</td>
                                    </tr>
                                    <tr>
                                    <td class="product-name" data-title="Product">
                                        <a href="#l">DM20</a>
                                    </td>
                                    <td>680-12000 </td>
                                    <td>----- </td>
                                    <td>none </td>
                                    <td>none</td>
                                    </tr>
                                    <tr>
                                    <td class="product-name" data-title="Product">
                                        <a href="#l">DM30</a>
                                    </td>
                                    <td>5100-20000 </td>
                                    <td>5100-20000 </td>
                                    <td>CM07 </td>
                                    <td>CM12</td>
                                    </tr>
                                    <tr>
                                    <td class="product-name" data-title="Product">
                                        <a href="#l">DM42</a>
                                    </td>
                                    <td>16000-100000 </td>
                                    <td>22000-62000 </td>
                                    <td>CM08 </td>
                                    <td>CM13</td>
                                    </tr>
                                    <tr>
                                    <td class="product-name" data-title="Product">
                                        <a href="#l">VDM16</a>
                                    </td>
                                    <td>1-1000 </td>
                                    <td>----- </td>
                                    <td>none </td>
                                    <td>none</td>
                                    </tr>
                                </tbody>
                                </table>
                            </form>
                            <h4>Capacitance Range</h4>
                            <div class="pd_top_20"></div>
                            <p> 1pF through 100000pF in case styles DM5 through DM42 </p>
                            <h4>Voltage Range</h4>
                            <div class="pd_top_20"></div>
                            <p> 50VDCW through 500 VDCW higher voltages on request </p>
                            <h4>Operating Temperature</h4>
                            <div class="pd_top_20"></div>
                            <p>150°C at full rated voltage</p>
                            <h4>Marking</h4>
                            <div class="pd_top_20"></div>
                            <p>Simic dipped micas are permanently marked in a manner designed to withstand the environment requirements of the applicable MIL and EIA specifications, as also the permanency and durability requirements of MIL-M-13231.</p>
                            <p>As a minimum, markings will consist of capacitance in picofarad, capacitance tolerance in percent, and manufacture identifying symbol. Where space does not permit, the capacitance tolerance will be expressed as a single letter.</p>
                            <p>Parts supplied to the military specification will bear full, or abbreviated, military designation as required by MIL-C-5.</p>
                            <h4>Ordering Code</h4>
                            <div class="pd_top_20"></div>
                            <img src="assets/images/products/dipped-mica.jpg" alt="Dipped Mica Capacitors">
                            <div class="pd_top_20"></div>
                            <h4>Style</h4>
                            <div class="pd_top_20"></div>
                            <p>Indicated by letters CM or DM followed by two digits identifying case size.</p>
                            <h4>Characteristic</h4>
                            <div class="pd_top_20"></div>
                            <p>Identified by a single letter indicating stability with change in temperature.</p>
                            <h4>Capacitance</h4>
                            <div class="pd_top_20"></div>
                            <p>Normal capacitance is expressed in pF and is identified by a three number digit. The first two digits represent significant figures. The third digit indicates the number of digits to follow (sometimes referred to as the decimal multiplier). Where a third significant figure is required a four-digit number would be applied. The first three would indicate significant figures.</p>
                            <h4>Leads</h4>
                            <div class="pd_top_20"></div>
                            <p>All Simic dipped mica capacitors are manufactured with copper-clad steel leads. The copper-clad leads are annealed and manufactured with steel wire SAE 1010 or SAE 1006; having a 30% minimum conductivity copper coating. The leads are finished with 100% tin coating, having a minimum thickness of 0.0001" (0.00254mm).</p>
                            <p>Normal production is supplied with straight radial leads. Crimped and/or cut variations are available on order. Capacitors with working voltage of 1000 VDC, 2500 VDC are available on order.</p>
                            <h4>Special Features</h4>
                            <div class="pd_top_20"></div>
                            <p>Features provided at our customer's request.</p>
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                <div class="icon_box_all style_three dark_color_one">
                                    <div class="icon_content ">
                                    <div class="txt_content">
                                        <ul>
                                        <li>Metallurgical bonding.</li>
                                        <li>Thin coat (single dip)for high installation density.</li>
                                        <li>Crimped and cut leads.</li>
                                        <li>Crimped and cutleads with tape and reel package. </li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="img-sec text-center">
                                    <img src="assets/images/products/dipped2.jpg" alt="Dipped Mica Capacitors">
                                </div>
                                </div>
                            </div>
                            <div class="pd_top_40"></div>
                            <form class="woocommerce-cart-form" action="#" method="post">
                                <table class="zui-table shop_table_responsive" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th>DIM</th>
                                    <th>DM5</th>
                                    <th>DM10</th>
                                    <th>DM15</th>
                                    <th>DM19</th>
                                    <th>DM20</th>
                                    <th>DM30</th>
                                    <th>DM42</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>B</td>
                                    <td>3.05 ±.79</td>
                                    <td>3.57 ±.79</td>
                                    <td>5.95 ±.79</td>
                                    <td>8.73 ±.79</td>
                                    <td>11.11 ±.79</td>
                                    <td>11.11 ±.79</td>
                                    <td>26.99 ±.79</td>
                                    </tr>
                                    <tr>
                                    <td>C </td>
                                    <td>#26 (0.4039)</td>
                                    <td>#26 (0.4039)</td>
                                    <td>#22 (0.635)</td>
                                    <td>#20 (0.813)</td>
                                    <td>#20 (0.813)</td>
                                    <td>#18 (1.016)</td>
                                    <td>#18 (1.016)</td>
                                    </tr>
                                    <tr>
                                    <td>R </td>
                                    <td>1.98 MAX</td>
                                    <td>1.98 MAX</td>
                                    <td>1.98 MAX</td>
                                    <td>3.18 MAX</td>
                                    <td>3.18 MAX</td>
                                    <td>3.18 MAX</td>
                                    <td>3.18 MAX</td>
                                    </tr>
                                </tbody>
                                </table>
                            </form>
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                <div class="img-sec text-center">
                                    <img src="assets/images/products/dipped1.jpg" alt="Dipped Mica Capacitors">
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="img-sec text-center">
                                    <img src="assets/images/products/dipped1_1.jpg" alt="Dipped Mica Capacitors">
                                </div>
                                </div>
                            </div>
                            <div class="pd_top_20"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
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