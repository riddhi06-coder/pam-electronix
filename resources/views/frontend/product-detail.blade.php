
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


                                @if(!empty($capacitances) && !empty($capHeaders))
                                    <form class="woocommerce-cart-form" action="#" method="post">
                                        <table class="zui-table shop_table_responsive" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Capacitance Range</th>
                                                    <th colspan="2">MIL Equivalent</th>
                                                </tr>
                                                <tr>
                                                    @foreach($capHeaders as $header)
                                                        <th>{{ $header }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($capacitances as $row)
                                                    <tr>
                                                        @foreach($row as $index => $cell)
                                                            @if ($loop->first)
                                                                @php
                                                                    // Try to find matching spec by case_style
                                                                    $matchedSpec = $Specifications->firstWhere('case_style', $cell);
                                                                @endphp
                                                                <td>
                                                                    @if ($matchedSpec)
                                                                        <a href="{{ route('productcase.style', [$product->slug, $matchedSpec->case_style_slug]) }}">
                                                                            {{ !empty($cell) ? $cell : '-----' }}
                                                                        </a>
                                                                    @else
                                                                        {{ !empty($cell) ? $cell : '-----' }}
                                                                    @endif
                                                                </td>
                                                            @else
                                                                <td>{{ !empty($cell) ? $cell : '-----' }}</td>
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </form>
                                @endif


                                @foreach ($banners as $desc)
                                    @if(!empty($desc->capacitance_range_description))
                                        <h4>{{ $desc->capacitance_range_heading ?? 'Capacitance Range' }}</h4>
                                        <div class="pd_top_20"></div>
                                        <p>{{ $desc->capacitance_range_description }}</p>
                                    @endif

                                    @if(!empty($desc->voltage_description))
                                        <h4>{{ $desc->voltage_heading ?? 'Voltage Range' }}</h4>
                                        <div class="pd_top_20"></div>
                                        <p>{{ $desc->voltage_description }}</p>
                                    @endif

                                    @if(!empty($desc->operating_description))
                                        <h4>{{ $desc->operating_heading ?? 'Operating Temperature' }}</h4>
                                        <div class="pd_top_20"></div>
                                        <p>{{ $desc->operating_description }}</p>
                                    @endif

                                    @if(!empty($desc->marking_description))
                                        <h4>{{ $desc->marking_heading ?? 'Marking' }}</h4>
                                        <div class="pd_top_20"></div>
                                        {!! $desc->marking_description !!}
                                    @endif

                                    @if(!empty($desc->ordering_heading) || !empty($desc->image))
                                        <h4>{{ $desc->ordering_heading ?? 'Ordering Code' }}</h4>
                                        <div class="pd_top_20"></div>
                                        @if(!empty($desc->image))
                                            <img src="{{ asset('uploads/product/' . $desc->image) }}" alt="Ordering Code">
                                        @endif
                                        <div class="pd_top_20"></div>
                                    @endif

                                    @if(!empty($desc->style_description))
                                        <h4>{{ $desc->style_heading ?? 'Style' }}</h4>
                                        <div class="pd_top_20"></div>
                                        <p>{{ $desc->style_description }}</p>
                                    @endif

                                    @if(!empty($desc->characteristics_description))
                                        <h4>{{ $desc->characteristics_heading ?? 'Characteristic' }}</h4>
                                        <div class="pd_top_20"></div>
                                        <p>{{ $desc->characteristics_description }}</p>
                                    @endif

                                    @if(!empty($desc->capacitance_description)) {{-- Repeated for Capacitance block --}}
                                        <h4>{{ $desc->capacitance_heading ?? 'Capacitance' }}</h4>
                                        <div class="pd_top_20"></div>
                                        <p>{{ $desc->capacitance_description }}</p>
                                    @endif

                                    @if(!empty($desc->leads_description))
                                        <h4>{{ $desc->leads_heading ?? 'Leads' }}</h4>
                                        <div class="pd_top_20"></div>
                                        {!! $desc->leads_description !!}
                                    @endif
                                @endforeach
                                
                                <br>
                                <br>

                                <h4>{{ $desc->special_heading ?? 'Special Features' }}</h4>

                                <div class="pd_top_20"></div>

                                @foreach ($banners as $desc)
                                    @if(!empty($desc->special_description) || !empty($desc->special_image))
                                        <p>Features provided at our customer's request.</p>
                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <div class="icon_box_all style_three dark_color_one">
                                                    <div class="icon_content">
                                                        <div class="txt_content">
                                                            {!! $desc->special_description !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @if(!empty($desc->special_image))
                                                <div class="col-md-6">
                                                    <div class="img-sec text-center">
                                                        <img src="{{ asset('uploads/product/' . $desc->special_image) }}" alt="Dipped Mica Capacitors">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="pd_top_40"></div>
                                    @endif
                                @endforeach

        
                                <div class="pd_top_40"></div>


                                @php
                                    $headers = $infoHeader;
                                    $rows = $infoDetails;
                                    $headerCount = count($headers);
                                @endphp

                                @if(!empty($headers) && !empty($rows))
                                    <form class="woocommerce-cart-form" action="#" method="post">
                                        <table class="zui-table shop_table_responsive" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    @foreach($headers as $header)
                                                        <th>{{ $header }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($rows as $row)
                                                    <tr>
                                                        @for($i = 1; $i <= $headerCount; $i++)
                                                            <td>{{ $row['d' . $i] ?? '-' }}</td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </form>
                                @endif


                                <div class="row align-items-center">
                                    @foreach($images as $image)
                                        <div class="col-md-6">
                                            <div class="img-sec text-center">
                                                <img src="{{ asset('uploads/product/' . $image) }}" alt="{{ $product->name }}">
                                            </div>
                                        </div>
                                    @endforeach
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