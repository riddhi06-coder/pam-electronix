<!doctype html>
<html lang="en">
    
<head>
    @include('components.backend.head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/4.3.0/apexcharts.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/4.3.0/apexcharts.min.js"></script>
</head>
	   
		@include('components.backend.header')

	    <!--start sidebar wrapper-->	
	    @include('components.backend.sidebar')
	   <!--end sidebar wrapper-->



       <div class="page-body"> 
          <div class="container-fluid">            
            <div class="page-title"> 
              <div class="row">
                  <div class="col-xl-3 col-sm-6">
                    <div class="card o-hidden small-widget">
                    @php
                        use App\Models\Product;
                        $products = Product::count();
                    @endphp

                    <div class="card-body total-project border-b-primary border-2">
                        <span class="f-light f-w-500 f-14">Total Products</span>
                        <div class="project-details"> 
                            <div class="project-counter"> 
                                <h2 class="f-w-600">{{ number_format($products) }}</h2> {{-- Dynamically display count --}}
                                <span class="f-12 f-w-400"></span>
                            </div>
                            <div class="product-sub bg-primary-light">
                                <svg class="invoice-icon">
                                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#color-swatch') }}"></use>
                                </svg>
                            </div>
                        </div>
                        <ul class="bubbles">
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                        </ul>
                    </div>
                    
                    </div>
                  </div>
              </div>
            </div>
          </div>


        
        </div>
        <!-- footer start-->
        @include('components.backend.footer')
        </div>

    
    @include('components.backend.main-js')

    









        
</body>

</html>