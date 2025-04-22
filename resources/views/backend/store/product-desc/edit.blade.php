<!doctype html>
<html lang="en">
    
<head>
    @include('components.backend.head')
</head>
	   
		@include('components.backend.header')

	    <!--start sidebar wrapper-->	
	    @include('components.backend.sidebar')
	   <!--end sidebar wrapper-->


        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Edit Product Description Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('product-descriptions.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Product Description</li>
                </ol>

                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                        <h4>Product Description Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('product-descriptions.update', $details->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')  

                                       <!-- Product Name Dropdown -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="product_select">Select Product <span class="txt-danger">*</span></label>
                                            <select class="form-control" id="product_select" name="product_id" required>
                                                <option value="">-- Select Product --</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}"
                                                        {{ old('product_id', $details->product_id) == $product->id ? 'selected' : '' }}>
                                                        {{ $product->product_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please select a product.</div>
                                        </div>


                                               
                                        <!-- Banner Image-->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="banner_image">Banner Image <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="banner_image" type="file" name="banner_image" accept=".jpg, .jpeg, .png, .webp" required onchange="previewBannerImage()">
                                            <div class="invalid-feedback">Please upload a Banner Image.</div>
                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>

                                            <!-- Preview Section right below the input -->
                                            @if ($details->banner_image)
                                                <div id="bannerImagePreviewContainer" style="margin-top: 10px;">
                                                    <img id="banner_image_preview" src="{{ asset('uploads/product/' . $details->banner_image) }}" class="img-fluid" style="max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                                                </div>
                                            @endif
                                        </div>


                                        <!-- Product Name with Summernote -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="product_description">Product Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control summernote" id="summernote" name="product_description" required>
                                                {{ old('product_description', $details->product_description) }}
                                            </textarea>
                                            <div class="invalid-feedback">Please enter a Product Name.</div>
                                        </div>

                                

                                        <!-- Product Image-->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="product_image">Product Image <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="product_image" type="file" name="product_image" accept=".jpg, .jpeg, .png, .webp" required onchange="previewProductImage()">
                                            <div class="invalid-feedback">Please upload a Product Image.</div>
                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                        </div>


                                        <!-- Preview Section -->
                                        @if ($details->product_image)
                                            <div id="productImagePreviewContainer" style="margin-top: 10px;">
                                                <img id="product_image_preview" src="{{ asset('uploads/product/' . $details->product_image) }}" class="img-fluid" style="max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                                            </div>
                                        @endif




                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('product-descriptions.index') }}" class="btn btn-danger px-4">Cancel</a>
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            </div>
                        </div>
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
        </div>
       
       @include('components.backend.main-js')

        <script>
            function previewBannerImage() {
                const input = document.getElementById('banner_image');
                const previewContainer = document.getElementById('bannerImagePreviewContainer');
                const previewImage = document.getElementById('banner_image_preview');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewContainer.style.display = 'block';
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function previewProductImage() {
                const file = document.getElementById('product_image').files[0];
                const previewContainer = document.getElementById('productImagePreviewContainer');
                const previewImage = document.getElementById('product_image_preview');

                // Clear the previous preview
                previewImage.src = '';
                
                if (file) {
                    const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];

                    if (validImageTypes.includes(file.type)) {
                        const reader = new FileReader();

                        reader.onload = function (e) {
                            // Display the image preview
                            previewImage.src = e.target.result;
                            previewContainer.style.display = 'block';  // Show the preview section
                        };

                        reader.readAsDataURL(file);
                    } else {
                        alert('Please upload a valid image file (jpg, jpeg, png, webp).');
                    }
                }
            }
        </script>

</body>

</html>