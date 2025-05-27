
<!DOCTYPE html>
<html lang="en-US">

<head>
    @include('components.frontend.head')
</head>


<body class="home theme-creote page-home-default-one">
    <div id="page" class="page_wapper hfeed site">
        <div id="wrapper_full" class="content_all_warpper">

                @include('components.frontend.header')


            <div class="page_header_default style_one" style="background-image: url('{{ asset('uploads/product/' . ($banners->first()->banner_image ?? 'default.jpg')) }}');">>
                <div class="page_header_content">
                    <div class="auto-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="banner_title_inner">
                                    <div class="title_page">
                                        {{ $product->product_name }} - {{ $specification->first()->case_style }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="breadcrumbs creote">
                                    <ul class="breadcrumb m-auto">
                                        <li><a href="{{ route('home.page') }}">Home</a></li>
                                        <li class="active"> {{ $product->product_name }} - {{ $specification->first()->case_style }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="content" class="site-content ">
                <div class="pd_top_90"></div>

                <div class="product-table">
                    <div class="container-fluid">
                        <div class="row default_row">
                            <div class="full_width_box zui-wrapper">
                                <!--===============spacing==============-->
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
                                            <!-- <th>Availability</th> -->
                                            <!-- <th>Pricing (INR)</th> -->
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
                                            @foreach($specification as $spec)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>

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

                                                    <td class="product-quantity" data-title="Quantity">
                                                        <div class="quantity">
                                                            <input type="button" value="-" class="qty_button minus">
                                                            <input type="text" class="input-text qty text" name="quantity[{{ $spec->id }}]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric">
                                                            <input type="button" value="+" class="qty_button plus">
                                                        </div>
                                                    </td>

                                                    <td><a href="{{ route('cart.details') }}" target="_blank" rel="nofollow" class="theme-btn product-page five">Add To Cart</a></td>

                                                    <td>{{ $spec->rohs ?? 'N/A' }}</td>
                                                    <td>{{ $spec->capacitance ?? 'N/A' }}</td>
                                                    <td>{{ $spec->voltage_rating ?? 'N/A' }} V</td>
                                                    <td>{{ $spec->termination ?? 'N/A' }}</td>
                                                    <td>{{ $spec->pf ?? 'N/A' }} PF</td>
                                                    <td>{{ $spec->voltage ?? 'N/A' }} V</td>
                                                    <td>{{ $spec->lead_spacing ?? 'N/A' }} MM</td>
                                                    <td>{{ $spec->length ?? 'N/A' }}</td>
                                                    <td>{{ $spec->width ?? 'N/A' }}</td>
                                                    <td>{{ $spec->height ?? 'N/A' }}</td>
                                                    <td>{{ $spec->lead_wire ?? 'N/A' }} MM</td>
                                                    <td>{{ $spec->tolerance ?? 'N/A' }} %</td>
                                                    <td>{{ $spec->package_case ?? 'N/A' }}</td>
                                                    <td>{{ $spec->operating_temp ?? 'N/A' }} C</td>
                                                    <td>{{ $spec->max_operating_temp ?? 'N/A' }} C</td>
                                                    <td>{{ $spec->series ?? 'N/A' }}</td>
                                                    <td>{{ $spec->qualification ?? '' }}</td>
                                                    <td>{{ $spec->packaging ?? 'N/A' }}</td>
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