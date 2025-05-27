
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
                                            Cart
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="breadcrumbs creote">
                                        <ul class="breadcrumb m-auto">
                                            <li><a href="index.html">Home</a></li>
                                            <li class="active">Cart</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="content" class="site-content ">
                    <div class="cart-page">
                        <div class="pd_top_60"></div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-page-inner">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-dark">
                                                    <th>No.</th>
                                                    <th>Image</th>
                                                    <th>Product</th>
                                                    <th>Part #</th>
                                                    <th>Description </th>
                                                    <th>Quantity</th>
                                                    <th>Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="align-middle">
                                                    @foreach($cartItems as $index => $item)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>
                                                                <a href="#"><img src="{{ asset('uploads/product/specifications/' . $item['image']) }}" alt="Image" width="80"></a>
                                                            </td>
                                                            <td>
                                                               {{ $item['product_name'] }}
                                                            </td>
                                                            <td>{{ $item['name'] }}</td>
                                                            <td>{{ $item['description'] }}</td>
                                                            <td>
                                                                <div class="qty">
                                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                                    <input type="text" value="{{ $item['quantity'] }}">
                                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button><i class="fa fa-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="cart-page-inner">
                                        <div class="row">
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-offset-6 col-md-6">
                                                <div class="cart-summary">
                                                    <div class="cart-btn">
                                                        <button class="contact-toggler">Ask to Quote</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pd_bottom_60"></div>

                    </div>
                </div>
        </div>
    </div>


     <!---==============modal popup =================-->
   <div class="modal_popup one">
      <div class="modal-popup-inner">
         <div class="close-modal"><i class="fa fa-times"></i></div>
         <div class="modal_box">
            <div class="row">
               <div class="col-lg-12 col-md-12 form_inner">
                    <div class="form_content">
                        <form class="contact-form" method="post" action="sendemail.php">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="name" value="" size="40" aria-required="true"
                                    aria-invalid="false" placeholder="Company Name" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="name" value="" size="40" aria-required="true"
                                    aria-invalid="false" placeholder="Contact Person" />
                                </div> 
                                <div class="col-md-6">
                                    <input type="text" name="name" value="" size="40" aria-required="true"
                                    aria-invalid="false" placeholder="Designation" />
                                </div>
                                <div class="col-md-6">
                                <input type="text" name="name" value="" size="40" aria-required="true"
                                    aria-invalid="false" placeholder="Phone No" />
                                </div>
                                <div class="col-md-12">
                                    <input type="email" name="email" value="" size="40" aria-required="true"
                                    aria-invalid="false" placeholder="Enter Your Email" />
                                </div>
                                <div class="col-md-12">
                                    <textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea"
                                    aria-invalid="false" placeholder="Enter Your Message"></textarea>
                                </div>
                                <div class="col-md-12">
                            <p><input type="submit" value="Submit" /></p>

                                </div>
                            </div>

                        </form>
                    </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!---==============modal popup end=================-->

                @include('components.frontend.footer')
            
                @include('components.frontend.main-js')

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