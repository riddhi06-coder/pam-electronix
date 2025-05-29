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
                  <h4>Add Product Specifications Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('product-specifications.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Product Specifications</li>
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
                        <h4>Product Specifications Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('product-specifications.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <!-- Product Name Dropdown -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="product_select">Select Product <span class="txt-danger">*</span></label>
                                            <select class="form-control" id="product_select" name="product_id" required>
                                                <option value="">-- Select Product --</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                                        {{ $product->product_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please select a product.</div>
                                        </div>


                                       <!-- Case Style Dropdown -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="case_style_select">Select Case Type <span class="txt-danger">*</span></label>
                                            <select class="form-control" id="case_style_select" name="case_style" required>
                                                <option value="">-- Select Case Type --</option>
                                            </select>
                                            <div class="invalid-feedback">Please select a case type.</div>
                                        </div>


                                        <!-- Product Image-->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="product_image">Product Image </label>
                                            <input class="form-control" id="product_image" type="file" name="product_image" accept=".jpg, .jpeg, .png, .webp"  onchange="previewBannerImage()">
                                            <div class="invalid-feedback">Please upload a Product Image.</div>
                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>

                                            <!-- Preview Section right below the input -->
                                            <div id="bannerImagePreviewContainer" style="display: none; margin-top: 10px;">
                                                <img id="banner_image_preview" src="" alt="Preview" class="img-fluid" style="max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                                            </div>
                                        </div>


                                        <!-- Name---->
                                        <div class="col-md-6">
                                            <label class="form-label" for="name">Name </label>
                                            <input class="form-control" id="name" type="text" name="name" placeholder="Enter Name" value="{{ old('name') }}" >
                                            <div class="invalid-feedback">Please enter a Name.</div>
                                        </div>

                                        <!-- Manufacturer---->
                                        <div class="col-md-6">
                                            <label class="form-label" for="manufacturer">Manufacturer </label>
                                            <input class="form-control" id="manufacturer" type="text" name="manufacturer" placeholder="Enter Manufacturer" value="{{ old('manufacturer') }}" >
                                            <div class="invalid-feedback">Please enter a Manufacturer.</div>
                                        </div>

                                        <!-- Stock Availability---->
                                        <div class="col-md-6">
                                            <label class="form-label" for="availability">Stock Availability </label>
                                            <input class="form-control" id="availability" type="text" name="availability" placeholder="Enter Stock Availability" value="{{ old('availability') }}" >
                                            <div class="invalid-feedback">Please enter a Stock Availability.</div>
                                        </div>

                                        <!-- Pricing -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="pricing">Pricing </label>
                                            <input class="form-control" id="pricing" type="number" name="pricing" placeholder="Enter Pricing" value="{{ old('pricing') }}"  min="0" step="any">
                                            <div class="invalid-feedback">Please enter a valid Pricing amount.</div>
                                        </div>


                                        <!-- RoHS---->
                                        <div class="col-md-6">
                                            <label class="form-label" for="rohs">RoHS </label>
                                            <input class="form-control" id="rohs" type="text" name="rohs" placeholder="Enter RoHS" value="{{ old('rohs') }}" >
                                            <div class="invalid-feedback">Please enter a RoHS.</div>
                                        </div>


                                        <!-- Capacitance -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="capacitance">Capacitance </label>
                                            <input class="form-control" id="capacitance" type="number" name="capacitance" placeholder="Enter Capacitance" value="{{ old('capacitance') }}"  min="0" step="any">
                                            <div class="invalid-feedback">Please enter a valid Capacitance.</div>
                                        </div>

                                        <!-- Voltage Rating -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="voltage">Voltage Rating </label>
                                            <input class="form-control" id="voltage" type="number" name="voltage" placeholder="Enter Voltage Rating" value="{{ old('voltage') }}"  min="0" step="any">
                                            <div class="invalid-feedback">Please enter a valid Voltage Rating.</div>
                                        </div>

                                        <!-- Termination Style---->
                                        <div class="col-md-6">
                                            <label class="form-label" for="termination">Termination Style </label>
                                            <input class="form-control" id="termination" type="text" name="termination" placeholder="Enter Termination Style" value="{{ old('termination') }}" >
                                            <div class="invalid-feedback">Please enter a Termination Style.</div>
                                        </div>

                                        <!-- PF---->
                                        <div class="col-md-6">
                                            <label class="form-label" for="pf">PF </label>
                                            <input class="form-control" id="pf" type="text" name="pf" placeholder="Enter PF" value="{{ old('pf') }}" >
                                            <div class="invalid-feedback">Please enter a PF.</div>
                                        </div>

                                        <!-- Voltage---->
                                        <div class="col-md-6">
                                            <label class="form-label" for="voltage">Voltage </label>
                                            <input class="form-control" id="voltage" type="number" name="voltage" placeholder="Enter Voltage" value="{{ old('voltage') }}"  min="0" step="any">
                                            <div class="invalid-feedback">Please enter a Voltage.</div>
                                        </div>

                                        <!-- Lead Spacing---->
                                        <div class="col-md-6">
                                            <label class="form-label" for="lead_spacing">Lead Spacing </label>
                                            <input class="form-control" id="lead_spacing" type="text" name="lead_spacing" placeholder="Enter Lead Spacing" value="{{ old('lead_spacing') }}" >
                                            <div class="invalid-feedback">Please enter a Lead Spacing.</div>
                                        </div>


                                        <!-- Length -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="length">Length </label>
                                            <input class="form-control" id="length" type="number" name="length" placeholder="Enter Length" value="{{ old('length') }}"  min="0" step="any">
                                            <div class="invalid-feedback">Please enter a valid Length.</div>
                                        </div>

                                         <!-- Width -->
                                         <div class="col-md-6">
                                            <label class="form-label" for="width">Width </label>
                                            <input class="form-control" id="width" type="number" name="width" placeholder="Enter Width" value="{{ old('width') }}"  min="0" step="any">
                                            <div class="invalid-feedback">Please enter a valid Width.</div>
                                        </div>

                                         <!-- Height -->
                                         <div class="col-md-6">
                                            <label class="form-label" for="height">Height </label>
                                            <input class="form-control" id="height" type="number" name="height" placeholder="Enter Height" value="{{ old('height') }}"  min="0" step="any">
                                            <div class="invalid-feedback">Please enter a valid Height.</div>
                                        </div>

                                        <!-- Lead wire Diameter	---->
                                        <div class="col-md-6">
                                            <label class="form-label" for="lead_wire">Lead wire Diameter</label>
                                            <input class="form-control" id="lead_wire" type="text" name="lead_wire" placeholder="Enter Lead wire Diameter" value="{{ old('lead_wire') }}" >
                                            <div class="invalid-feedback">Please enter a Lead wire Diameter.</div>
                                        </div>


                                        <!-- Tolerance---->
                                        <div class="col-md-6">
                                            <label class="form-label" for="tolerance">Tolerance</label>
                                            <input class="form-control" id="tolerance" type="text" name="tolerance" placeholder="Enter Tolerance" value="{{ old('tolerance') }}" >
                                            <div class="invalid-feedback">Please enter a Tolerance.</div>
                                        </div>


                                        <!-- Package/Case IN PLASTIC BAG -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="package_case">Package/Case IN PLASTIC BAG </label>
                                            <input class="form-control" id="package_case" type="number" name="package_case" placeholder="Enter Package/Case IN PLASTIC BAG" value="{{ old('package_case') }}"  min="0" step="any">
                                            <div class="invalid-feedback">Please enter a valid Package/Case IN PLASTIC BAG.</div>
                                        </div>


                                        <!-- Minimum Operating Temperature---->
                                        <div class="col-md-6">
                                            <label class="form-label" for="operating_temp">Minimum Operating Temperature</label>
                                            <input class="form-control" id="operating_temp" type="text" name="operating_temp" placeholder="Enter Minimum Operating Temperature" value="{{ old('operating_temp') }}" >
                                            <div class="invalid-feedback">Please enter a Minimum Operating Temperature.</div>
                                        </div>


                                        <!-- Maximum Operating Temperature---->
                                         <div class="col-md-6">
                                            <label class="form-label" for="max_operating_temp">Maximum Operating Temperature</label>
                                            <input class="form-control" id="max_operating_temp" type="text" name="max_operating_temp" placeholder="Enter Maximum Operating Temperature" value="{{ old('max_operating_temp') }}" >
                                            <div class="invalid-feedback">Please enter a Maximum Operating Temperature.</div>
                                        </div>

                                        <!-- Series---->
                                        <div class="col-md-6">
                                            <label class="form-label" for="series">Series</label>
                                            <input class="form-control" id="series" type="text" name="series" placeholder="Enter Series" value="{{ old('series') }}" >
                                            <div class="invalid-feedback">Please enter a Series.</div>
                                        </div>


                                        <!-- Qualification---->
                                        <div class="col-md-6">
                                            <label class="form-label" for="qualification">Qualification</label>
                                            <input class="form-control" id="qualification" type="text" name="qualification" placeholder="Enter Qualification" value="{{ old('qualification') }}" >
                                            <div class="invalid-feedback">Please enter a Qualification.</div>
                                        </div>


                                         <!-- Packaging---->
                                         <div class="col-md-6">
                                            <label class="form-label" for="packaging">Packaging</label>
                                            <input class="form-control" id="packaging" type="text" name="packaging" placeholder="Enter Packaging" value="{{ old('packaging') }}" >
                                            <div class="invalid-feedback">Please enter a Packaging.</div>
                                        </div>

                                        
                                        <!-- Product Name with Summernote -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="product_description">Product Description </label>
                                            <textarea class="form-control summernote" id="summernote" name="product_description" placeholder="Enter Product Name" >{{ old('product_description') }}</textarea>
                                            <div class="invalid-feedback">Please enter a Product Name.</div>
                                        </div>


                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('product-specifications.index') }}" class="btn btn-danger px-4">Cancel</a>
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
                const input = document.getElementById('product_image'); // corrected ID
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


        <!-- <script>
            document.getElementById('product_select').addEventListener('change', function() {
                let productId = this.value;
                let caseStyleDropdown = document.getElementById('case_style_select');

                // Clear previous options
                caseStyleDropdown.innerHTML = '<option value="">-- Select Case Type --</option>';

                if (productId) {
                    fetch(`/get-case-styles/${productId}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(function(item) {
                                let option = document.createElement('option');
                                option.value = item.case_style;
                                option.text = item.case_style;
                                caseStyleDropdown.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching case styles:', error);
                        });
                }
            });
        </script> -->


        <script>
            document.getElementById('product_select').addEventListener('change', function() {
                let productId = this.value;
                let caseStyleDropdown = document.getElementById('case_style_select');

                // Clear previous options
                caseStyleDropdown.innerHTML = '<option value="">-- Select Case Type --</option>';

                if (productId) {
                    // Use Laravel named route with placeholder replacement
                    let routeTemplate = `{{ route('getCase.Styles', ['productId' => 'PLACEHOLDER']) }}`;
                    let url = routeTemplate.replace('PLACEHOLDER', productId);

                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(function(item) {
                                let option = document.createElement('option');
                                option.value = item.case_style;
                                option.text = item.case_style;
                                caseStyleDropdown.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching case styles:', error);
                        });
                }
            });
        </script>



</body>

</html>