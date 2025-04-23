
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
                                    <tr>
                                       <td>1</td>
                                       <td class="product-thumbnail">
                                          <a href="shop-details.html">
                                          <img width="300" height="300" src="assets/images/Dipped-Mica-Capacitors/20230330_152003.webp" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="img" />
                                          </a>
                                       </td>
                                       <td>DM05EC470J03-RH
                                       </td>
                                       <td class="product-name" data-title="Product">
                                          <a href="#l">Simic Electronics</a>                      
                                       </td>
                                       <td>DM05 47PF 5% 300V ROHS</td>
                                       <td>156 In Stock</td>
                                       <td class="price-sec">
                                          <div><a href="#">1</a> <span>$1,536.42</span></div>
                                          <div><a href="#">10 </a> <span>$1,171.02</span></div>
                                       </td>
                                       <td class="product-quantity" data-title="Quantity">
                                          <div class="quantity">
                                             <label class="screen-reader-text" for="quantity_637c9d01773f8">Quantity</label>
                                             <input type="button" value="-" class="qty_button minus">
                                             <input type="text" id="quantity_637c9d01773f8" class="input-text qty text" step="1" min="0" max="" name="cart[d8bf84be3800d12f74d8b05e9b89836f][qty]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
                                             <input type="button" value="+" class="qty_button plus">
                                          </div>
                                       </td>
                                       <td><a href="#" target="_blank" rel="nofollow" class="theme-btn product-page five">Buy Now</a></td>
                                       <td>ROHS</td>
                                       <td>47</td>
                                       <td>300V</td>
                                       <td>TH</td>
                                       <td>47 PF</td>
                                       <td>300V</td>
                                       <td>3.0 MM</td>
                                       <td>6.9</td>
                                       <td>5.3</td>
                                       <td>3.6</td>
                                       <td>0.4 MM</td>
                                       <td>5%</td>
                                       <td>1000</td>
                                       <td>- 55 C</td>
                                       <td>125 C</td>
                                       <td>DM 05</td>
                                       <td></td>
                                       <td>BULK</td>
                                    </tr>
                                    <tr>
                                       <td>2</td>
                                       <td class="product-thumbnail">
                                          <a href="shop-details.html">
                                          <img width="300" height="300" src="assets/images/Dipped-Mica-Capacitors/20230330_152003.webp" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="img" />
                                          </a>
                                       </td>
                                       <td>DM05FA151J03-RH
                                       </td>
                                       <td class="product-name" data-title="Product">
                                          <a href="#l">Simic Electronics</a>                      
                                       </td>
                                       <td>DM05 150PF 5% 100V ROHS</td>
                                       <td>156 In Stock</td>
                                       <td class="price-sec">
                                          <div><a href="#">1</a> <span>$1,536.42</span></div>
                                          <div><a href="#">10 </a> <span>$1,171.02</span></div>
                                       </td>
                                       <td class="product-quantity" data-title="Quantity">
                                          <div class="quantity">
                                             <label class="screen-reader-text" for="quantity_637c9d01773f8">Quantity</label>
                                             <input type="button" value="-" class="qty_button minus">
                                             <input type="text" id="quantity_637c9d01773f8" class="input-text qty text" step="1" min="0" max="" name="cart[d8bf84be3800d12f74d8b05e9b89836f][qty]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
                                             <input type="button" value="+" class="qty_button plus">
                                          </div>
                                       </td>
                                       <td><a href="#" target="_blank" rel="nofollow" class="theme-btn product-page five">Buy Now</a></td>
                                       <td>ROHS</td>
                                       <td>150</td>
                                       <td>100V</td>
                                       <td>TH</td>
                                       <td>150 PF</td>
                                       <td>100V</td>
                                       <td>3.0 MM</td>
                                       <td>6.9</td>
                                       <td>6.1</td>
                                       <td>4.3</td>
                                       <td>0.4 MM</td>
                                       <td>5%</td>
                                       <td>1000</td>
                                       <td>- 55 C</td>
                                       <td>125 C</td>
                                       <td>DM 05</td>
                                       <td></td>
                                       <td>BULK</td>
                                    </tr>
                                    <tr>
                                       <td>3</td>
                                       <td class="product-thumbnail">
                                          <a href="shop-details.html">
                                          <img width="300" height="300" src="assets/images/Dipped-Mica-Capacitors/20230330_152003.webp" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="img" />
                                          </a>
                                       </td>
                                       <td>DM05FC101J03-RH
                                       </td>
                                       <td class="product-name" data-title="Product">
                                          <a href="#l">Simic Electronics</a>                      
                                       </td>
                                       <td>DM05 100PF 5% 300V ROHS</td>
                                       <td>156 In Stock</td>
                                       <td class="price-sec">
                                          <div><a href="#">1</a> <span>$1,536.42</span></div>
                                          <div><a href="#">10 </a> <span>$1,171.02</span></div>
                                       </td>
                                       <td class="product-quantity" data-title="Quantity">
                                          <div class="quantity">
                                             <label class="screen-reader-text" for="quantity_637c9d01773f8">Quantity</label>
                                             <input type="button" value="-" class="qty_button minus">
                                             <input type="text" id="quantity_637c9d01773f8" class="input-text qty text" step="1" min="0" max="" name="cart[d8bf84be3800d12f74d8b05e9b89836f][qty]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
                                             <input type="button" value="+" class="qty_button plus">
                                          </div>
                                       </td>
                                       <td><a href="#" target="_blank" rel="nofollow" class="theme-btn product-page five">Buy Now</a></td>
                                       <td>ROHS</td>
                                       <td>100</td>
                                       <td>300V</td>
                                       <td>TH</td>
                                       <td>100PF</td>
                                       <td>300V</td>
                                       <td>3.0 MM</td>
                                       <td>6.9</td>
                                       <td>6.1</td>
                                       <td>4.6</td>
                                       <td>0.4 MM</td>
                                       <td>5%</td>
                                       <td>1000</td>
                                       <td>- 55 C</td>
                                       <td>125 C</td>
                                       <td>DM 05</td>
                                       <td></td>
                                       <td>BULK</td>
                                    </tr>
                                    <tr>
                                       <td>4</td>
                                       <td class="product-thumbnail">
                                          <a href="shop-details.html">
                                          <img width="300" height="300" src="assets/images/Dipped-Mica-Capacitors/20230330_152003.webp" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="img" />
                                          </a>
                                       </td>
                                       <td>DM05FC101G03-RH
                                       </td>
                                       <td class="product-name" data-title="Product">
                                          <a href="#l">Simic Electronics</a>                      
                                       </td>
                                       <td>DM05 100PF 300V 2% ROHS</td>
                                       <td>156 In Stock</td>
                                       <td class="price-sec">
                                          <div><a href="#">1</a> <span>$1,536.42</span></div>
                                          <div><a href="#">10 </a> <span>$1,171.02</span></div>
                                       </td>
                                       <td class="product-quantity" data-title="Quantity">
                                          <div class="quantity">
                                             <label class="screen-reader-text" for="quantity_637c9d01773f8">Quantity</label>
                                             <input type="button" value="-" class="qty_button minus">
                                             <input type="text" id="quantity_637c9d01773f8" class="input-text qty text" step="1" min="0" max="" name="cart[d8bf84be3800d12f74d8b05e9b89836f][qty]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
                                             <input type="button" value="+" class="qty_button plus">
                                          </div>
                                       </td>
                                       <td><a href="#" target="_blank" rel="nofollow" class="theme-btn product-page five">Buy Now</a></td>
                                       <td>ROHS</td>
                                       <td>100</td>
                                       <td>300V</td>
                                       <td>TH</td>
                                       <td>10PF</td>
                                       <td>300V</td>
                                       <td>3.0 MM</td>
                                       <td>6.9</td>
                                       <td>6.1</td>
                                       <td>4.6</td>
                                       <td>0.4 MM</td>
                                       <td>2%</td>
                                       <td>1000</td>
                                       <td>- 55 C</td>
                                       <td>125 C</td>
                                       <td>DM 05</td>
                                       <td></td>
                                       <td>BULK</td>
                                    </tr>
                                    <tr>
                                       <td>5</td>
                                       <td class="product-thumbnail">
                                          <a href="shop-details.html">
                                          <img width="300" height="300" src="assets/images/Dipped-Mica-Capacitors/20230330_152003.webp" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="img" />
                                          </a>
                                       </td>
                                       <td>DM05FC100J03-RH
                                       </td>
                                       <td class="product-name" data-title="Product">
                                          <a href="#l">Simic Electronics</a>                      
                                       </td>
                                       <td>DM05 10PF 5% 300V ROHS</td>
                                       <td>156 In Stock</td>
                                       <td class="price-sec">
                                          <div><a href="#">1</a> <span>$1,536.42</span></div>
                                          <div><a href="#">10 </a> <span>$1,171.02</span></div>
                                       </td>
                                       <td class="product-quantity" data-title="Quantity">
                                          <div class="quantity">
                                             <label class="screen-reader-text" for="quantity_637c9d01773f8">Quantity</label>
                                             <input type="button" value="-" class="qty_button minus">
                                             <input type="text" id="quantity_637c9d01773f8" class="input-text qty text" step="1" min="0" max="" name="cart[d8bf84be3800d12f74d8b05e9b89836f][qty]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
                                             <input type="button" value="+" class="qty_button plus">
                                          </div>
                                       </td>
                                       <td><a href="#" target="_blank" rel="nofollow" class="theme-btn product-page five">Buy Now</a></td>
                                       <td>ROHS</td>
                                       <td>10</td>
                                       <td>300V</td>
                                       <td>TH</td>
                                       <td>10PF</td>
                                       <td>300V</td>
                                       <td>3.0 MM</td>
                                       <td>6.9</td>
                                       <td>4.8</td>
                                       <td>2.8</td>
                                       <td>0.4 MM</td>
                                       <td>5%</td>
                                       <td>1000</td>
                                       <td>- 55 C</td>
                                       <td>125 C</td>
                                       <td>DM 05</td>
                                       <td></td>
                                       <td>BULK</td>
                                    </tr>
                                    <tr>
                                       <td class="zui-sticky-col">6</td>
                                       <td class="product-thumbnail zui-sticky-col2">
                                          <a href="shop-details.html">
                                          <img width="300" height="300" src="assets/images/Dipped-Mica-Capacitors/20230330_152003.webp" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="img" />
                                          </a>
                                       </td>
                                       <td>DM05FY121J03-RH</td>
                                       <td class="product-name" data-title="Product">
                                          <a href="#l">Simic Electronics</a>                      
                                       </td>
                                       <td>DM05 120PF 5% 50V ROHS</td>
                                       <td>156 In Stock</td>
                                       <td class="price-sec">
                                          <div><a href="#">1</a> <span>$1,536.42</span></div>
                                          <div><a href="#">10 </a> <span>$1,171.02</span></div>
                                       </td>
                                       <td class="product-quantity" data-title="Quantity">
                                          <div class="quantity">
                                             <label class="screen-reader-text" for="quantity_637c9d01773f8">Quantity</label>
                                             <input type="button" value="-" class="qty_button minus">
                                             <input type="text" id="quantity_637c9d01773f8" class="input-text qty text" step="1" min="0" max="" name="cart[d8bf84be3800d12f74d8b05e9b89836f][qty]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
                                             <input type="button" value="+" class="qty_button plus">
                                          </div>
                                       </td>
                                       <td><a href="#" target="_blank" rel="nofollow" class="theme-btn product-page five">Buy Now</a></td>
                                       <td>ROHS</td>
                                       <td>120</td>
                                       <td>50V</td>
                                       <td>TH</td>
                                       <td>120PF</td>
                                       <td>50V</td>
                                       <td>3.0 MM</td>
                                       <td>6.9</td>
                                       <td>6.4</td>
                                       <td>4.8</td>
                                       <td>0.4 MM</td>
                                       <td>5%</td>
                                       <td>1000</td>
                                       <td>- 55 C</td>
                                       <td>125 C</td>
                                       <td>DM 05</td>
                                       <td></td>
                                       <td>BULK</td>
                                    </tr>
                                    <tr>
                                       <td class="zui-sticky-col">7</td>
                                       <td class="product-thumbnail zui-sticky-col2">
                                          <a href="shop-details.html">
                                          <img width="300" height="300" src="assets/images/Dipped-Mica-Capacitors/20230330_152003.webp" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="img" />
                                          </a>
                                       </td>
                                       <td>DM05CC120J03-RH</td>
                                       <td class="product-name" data-title="Product">
                                          <a href="#l">Simic Electronics</a>                      
                                       </td>
                                       <td>DM05 12PF 5% 300V ROHS</td>
                                       <td>156 In Stock</td>
                                       <td class="price-sec">
                                          <div><a href="#">1</a> <span>$1,536.42</span></div>
                                          <div><a href="#">10 </a> <span>$1,171.02</span></div>
                                       </td>
                                       <td class="product-quantity" data-title="Quantity">
                                          <div class="quantity">
                                             <label class="screen-reader-text" for="quantity_637c9d01773f8">Quantity</label>
                                             <input type="button" value="-" class="qty_button minus">
                                             <input type="text" id="quantity_637c9d01773f8" class="input-text qty text" step="1" min="0" max="" name="cart[d8bf84be3800d12f74d8b05e9b89836f][qty]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
                                             <input type="button" value="+" class="qty_button plus">
                                          </div>
                                       </td>
                                       <td><a href="#" target="_blank" rel="nofollow" class="theme-btn product-page five">Buy Now</a></td>
                                       <td>ROHS</td>
                                       <td>12</td>
                                       <td>300V</td>
                                       <td>TH</td>
                                       <td>12PF</td>
                                       <td>300V</td>
                                       <td>3.0 MM</td>
                                       <td>6.9</td>
                                       <td>4.8</td>
                                       <td>2.8</td>
                                       <td>0.4 MM</td>
                                       <td>5%</td>
                                       <td>1000</td>
                                       <td>- 55 C</td>
                                       <td>125 C</td>
                                       <td>DM 05</td>
                                       <td></td>
                                       <td>BULK</td>
                                    </tr>
                                    <tr>
                                       <td class="zui-sticky-col">8</td>
                                       <td class="product-thumbnail zui-sticky-col2">
                                          <a href="shop-details.html">
                                          <img width="300" height="300" src="assets/images/Dipped-Mica-Capacitors/20230330_152003.webp" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="img" />
                                          </a>
                                       </td>
                                       <td>DM05CC150J03-RH</td>
                                       <td class="product-name" data-title="Product">
                                          <a href="#l">Simic Electronics</a>                      
                                       </td>
                                       <td>DM05 15PF 5% 300V ROHS</td>
                                       <td>156 In Stock</td>
                                       <td class="price-sec">
                                          <div><a href="#">1</a> <span>$1,536.42</span></div>
                                          <div><a href="#">10 </a> <span>$1,171.02</span></div>
                                       </td>
                                       <td class="product-quantity" data-title="Quantity">
                                          <div class="quantity">
                                             <label class="screen-reader-text" for="quantity_637c9d01773f8">Quantity</label>
                                             <input type="button" value="-" class="qty_button minus">
                                             <input type="text" id="quantity_637c9d01773f8" class="input-text qty text" step="1" min="0" max="" name="cart[d8bf84be3800d12f74d8b05e9b89836f][qty]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
                                             <input type="button" value="+" class="qty_button plus">
                                          </div>
                                       </td>
                                       <td><a href="#" target="_blank" rel="nofollow" class="theme-btn product-page five">Buy Now</a></td>
                                       <td>ROHS</td>
                                       <td>15</td>
                                       <td>300V</td>
                                       <td>TH</td>
                                       <td>15PF</td>
                                       <td>300V</td>
                                       <td>3.0 MM</td>
                                       <td>6.8</td>
                                       <td>4.8</td>
                                       <td>3</td>
                                       <td>0.4 MM</td>
                                       <td>5%</td>
                                       <td>1000</td>
                                       <td>- 55 C</td>
                                       <td>125 C</td>
                                       <td>DM 05</td>
                                       <td></td>
                                       <td>BULK</td>
                                    </tr>
                                    <tr>
                                       <td class="zui-sticky-col">9</td>
                                       <td class="product-thumbnail zui-sticky-col2">
                                          <a href="shop-details.html">
                                          <img width="300" height="300" src="assets/images/Dipped-Mica-Capacitors/20230330_152003.webp" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="img" />
                                          </a>
                                       </td>
                                       <td>DM05EC180J03-RH</td>
                                       <td class="product-name" data-title="Product">
                                          <a href="#l">Simic Electronics</a>                      
                                       </td>
                                       <td>DM05 18PF 5% 300V ROHS</td>
                                       <td>156 In Stock</td>
                                       <td class="price-sec">
                                          <div><a href="#">1</a> <span>$1,536.42</span></div>
                                          <div><a href="#">10 </a> <span>$1,171.02</span></div>
                                       </td>
                                       <td class="product-quantity" data-title="Quantity">
                                          <div class="quantity">
                                             <label class="screen-reader-text" for="quantity_637c9d01773f8">Quantity</label>
                                             <input type="button" value="-" class="qty_button minus">
                                             <input type="text" id="quantity_637c9d01773f8" class="input-text qty text" step="1" min="0" max="" name="cart[d8bf84be3800d12f74d8b05e9b89836f][qty]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
                                             <input type="button" value="+" class="qty_button plus">
                                          </div>
                                       </td>
                                       <td><a href="#" target="_blank" rel="nofollow" class="theme-btn product-page five">Buy Now</a></td>
                                       <td>ROHS</td>
                                       <td>18</td>
                                       <td>300V</td>
                                       <td>TH</td>
                                       <td>18PF</td>
                                       <td>300V</td>
                                       <td>3.0 MM</td>
                                       <td>6.9</td>
                                       <td>5.1</td>
                                       <td>3</td>
                                       <td>0.4 MM</td>
                                       <td>5%</td>
                                       <td>1000</td>
                                       <td>- 55 C</td>
                                       <td>125 C</td>
                                       <td>DM 05</td>
                                       <td></td>
                                       <td>BULK</td>
                                    </tr>
                                    <tr>
                                       <td class="zui-sticky-col">10</td>
                                       <td class="product-thumbnail zui-sticky-col2">
                                          <a href="shop-details.html">
                                          <img width="300" height="300" src="assets/images/Dipped-Mica-Capacitors/20230330_152003.webp" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="img" />
                                          </a>
                                       </td>
                                       <td>DM05CC010D-RH</td>
                                       <td class="product-name" data-title="Product">
                                          <a href="#l">Simic Electronics</a>                      
                                       </td>
                                       <td>DM05 1PF 0.5PF 300V ROHS</td>
                                       <td>156 In Stock</td>
                                       <td class="price-sec">
                                          <div><a href="#">1</a> <span>$1,536.42</span></div>
                                          <div><a href="#">10 </a> <span>$1,171.02</span></div>
                                       </td>
                                       <td class="product-quantity" data-title="Quantity">
                                          <div class="quantity">
                                             <label class="screen-reader-text" for="quantity_637c9d01773f8">Quantity</label>
                                             <input type="button" value="-" class="qty_button minus">
                                             <input type="text" id="quantity_637c9d01773f8" class="input-text qty text" step="1" min="0" max="" name="cart[d8bf84be3800d12f74d8b05e9b89836f][qty]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
                                             <input type="button" value="+" class="qty_button plus">
                                          </div>
                                       </td>
                                       <td><a href="#" target="_blank" rel="nofollow" class="theme-btn product-page five">Buy Now</a></td>
                                       <td>ROHS</td>
                                       <td>1</td>
                                       <td>300V</td>
                                       <td>TH</td>
                                       <td>1PF</td>
                                       <td>300V</td>
                                       <td>3.0 MM</td>
                                       <td>6.9</td>
                                       <td>4.8</td>
                                       <td>2.9</td>
                                       <td>0.4 MM</td>
                                       <td>0.5PF</td>
                                       <td>1000</td>
                                       <td>- 55 C</td>
                                       <td>125 C</td>
                                       <td>DM 05</td>
                                       <td></td>
                                       <td>BULK</td>
                                    </tr>
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

</body>
</html>