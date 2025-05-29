
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
                                <form class="woocommerce-cart-form" action="{{ route('cart.details') }}" method="POST">
                                    @csrf
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
                                                    <tr class="cart-row" data-id="{{ $spec->id }}">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td class="product-thumbnail">
                                                            <a href="#">
                                                                <img width="300" height="300" src="{{ asset('uploads/product/specifications/' . $spec->product_image) }}" alt="img" />
                                                            </a>
                                                        </td>
                                                        <td>{{ $spec->name }}</td>
                                                        <td class="product-name" data-title="Product">
                                                            <a href="#">{{ $spec->manufacturer }}</a>
                                                        </td>
                                                        <td>{!! $spec->product_description !!}</td>

                                                        <td class="product-quantity">
                                                            <div class="quantity">
                                                                <input type="button" value="-" class="qty_button minus">
                                                                <input type="text"
                                                                    class="input-text qty text"
                                                                    name="quantity"
                                                                    value="0"
                                                                    inputmode="numeric"
                                                                    >
                                                                <input type="button" value="+" class="qty_button plus">
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <button type="button" class="add-to-cart-btn theme-btn product-page five" value="{{ $spec->id }}">
                                                                Add To Cart
                                                            </button>
                                                        </td>

                                                        <td>{{ $spec->rohs ?? ' ' }}</td>
                                                        <td>{{ $spec->capacitance ?? ' ' }}</td>
                                                        <td>{{ $spec->voltage_rating ?? ' ' }} V</td>
                                                        <td>{{ $spec->termination ?? ' ' }}</td>
                                                        <td>{{ $spec->pf ?? ' ' }} PF</td>
                                                        <td>{{ $spec->voltage ?? ' ' }} V</td>
                                                        <td>{{ $spec->lead_spacing ?? ' ' }} MM</td>
                                                        <td>{{ $spec->length ?? ' ' }}</td>
                                                        <td>{{ $spec->width ?? ' ' }}</td>
                                                        <td>{{ $spec->height ?? ' ' }}</td>
                                                        <td>{{ $spec->lead_wire ?? ' ' }} MM</td>
                                                        <td>{{ $spec->tolerance ?? ' ' }} %</td>
                                                        <td>{{ $spec->package_case ?? ' ' }}</td>
                                                        <td>{{ $spec->operating_temp ?? ' ' }} C</td>
                                                        <td>{{ $spec->max_operating_temp ?? ' ' }} C</td>
                                                        <td>{{ $spec->series ?? ' ' }}</td>
                                                        <td>{{ $spec->qualification ?? '' }}</td>
                                                        <td>{{ $spec->packaging ?? ' ' }}</td>

                                                        <!-- Hidden inputs for extra data -->
                                                        <input type="hidden" name="spec_id" value="{{ $spec->id }}">
                                                        <input type="hidden" name="product_id" value="{{ $spec->product_id }}">
                                                        <input type="hidden" name="product_image" value="{{ $spec->product_image }}">
                                                        <input type="hidden" name="name" value="{{ $spec->name }}">
                                                        <input type="hidden" name="manufacturer" value="{{ $spec->manufacturer }}">
                                                        <input type="hidden" name="description" value="{{ strip_tags($spec->product_description) }}">
                                                        <input type="hidden" name="product_name" value="{{ $spec->product->product_name ?? 'N/A' }}">
     
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

            <!----Qunatity ------>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Quantity buttons
                    document.querySelectorAll('.quantity').forEach(container => {
                        const minus = container.querySelector('.minus');
                        const plus = container.querySelector('.plus');
                        const input = container.querySelector('.qty');

                        minus.addEventListener('click', () => {
                            let val = parseInt(input.value) || 1;
                            if (val > 1) input.value = val - 1;
                        });

                        plus.addEventListener('click', () => {
                            let val = parseInt(input.value) || 1;
                            input.value = val + 1;
                        });
                    });
                });
            </script>

            <!----addd to cartttt------>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    console.log("DOM fully loaded");

                    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
                        button.addEventListener('click', (event) => {
                            event.preventDefault();
                            console.log('Add to cart clicked');

                            const row = button.closest('.cart-row');
                            if (!row) {
                                console.error('Cart row not found.');
                                notyf.open({
                                    type: 'custom-error',
                                    message: 'Cart row missing. Please refresh.'
                                });
                                return;
                            }

                            const formData = new FormData();
                            row.querySelectorAll('input[name]').forEach(input => {
                                formData.append(input.name, input.value);
                            });

                            console.log('FormData prepared', [...formData.entries()]);

                            fetch("{{ route('add.cart') }}", {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: formData
                            })
                            .then(response => response.json())

                            .then(data => {
                                console.log('Response:', data);
                                if (data.success) {
                                    notyf.open({
                                        type: 'custom-success',
                                        message: data.message || 'Added to cart!'
                                    });
                                    setTimeout(() => {
                                        location.reload();
                                    }, 500); 
                                } else {
                                    notyf.open({
                                        type: 'custom-error',
                                        message: data.message || 'Could not add to cart.'
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Fetch error:', error);
                                notyf.open({
                                    type: 'custom-error',
                                    message: 'An error occurred. Try again.'
                                });
                            });
                        });
                    });
                });
            </script>



</body>
</html>