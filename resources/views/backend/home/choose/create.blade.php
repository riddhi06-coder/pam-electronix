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
                  <h4>Add Why Choose Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('home-why-choose.index') }}">Why Choose</a>
                    </li>
                    <li class="breadcrumb-item active">Add Why Choose</li>
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
                        <h4>Why Choose Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('home-why-choose.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                   
                                        <!-- Banner Heading-->
                                        <div class="col-md-6">
                                            <label class="form-label" for="banner_heading">Banner Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="banner_heading" type="text" name="banner_heading" placeholder="Enter Banner Heading" required>
                                            <div class="invalid-feedback">Please enter a Banner Heading.</div>
                                        </div>
                                    
                                             
                                        <!-- Banner Title-->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="banner_title">Banner Title <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="banner_title" type="text" name="banner_title" placeholder="Enter Banner Title" required>
                                            <div class="invalid-feedback">Please enter a Banner Title.</div>
                                        </div>


                                        <!-- Calculations-->
                                        <table class="table table-bordered p-3" id="productTable" style="border: 2px solid #dee2e6;">
                                            <thead>
                                                <tr>
                                                    <th>Image <span class="txt-danger">*</span></th>
                                                    <th>Title <span class="txt-danger">*</span></th>
                                                    <th>Description <span class="txt-danger">*</span></th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="file" class="form-control" name="calculation_images[]" accept="image/*" onchange="previewImage(this, 'calculation_preview_0')" required>
                                                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                        <br>
                                                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                                        <div id="calculation_preview_0" class="mt-2"></div>
                                                    </td>
                                                    <td><input type="text" class="form-control" name="calculation_titles[]" placeholder="Enter Title" required></td>
                                                    <td><textarea class="form-control" name="calculation_descriptions[]" placeholder="Enter Description" required></textarea></td>
                                                    <td><button type="button" class="btn btn-success" onclick="addRow()">Add More</button></td>
                                                    
                                                </tr>
                                            </tbody>
                                        </table>


                                        <!-- Detailed Description with Summernote -->
                                        <div class="col-12 mb-5">
                                            <label class="form-label" for="detailed_description">Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control summernote" id="summernote" name="detailed_description" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter a detailed description.</div>
                                        </div><br><br><br><br><br><br>



                                        <h4><strong># Connect with our experts</strong></h4>

                                        
                                        <!-- Section Heading -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="section_heading">Section Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control @error('section_heading') is-invalid @enderror" id="section_heading" type="text" name="section_heading" placeholder="Enter Section Heading" required value="{{ old('section_heading') }}">
                                            <div class="invalid-feedback">Please enter a Section Heading.</div>
        
                                        </div>

                                        <!-- Section Image-->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="section_image">Section Image <span class="txt-danger">*</span></label>
                                            <input class="form-control @error('section_image') is-invalid @enderror" id="section_image" type="file" name="section_image" accept=".jpg, .jpeg, .png, .webp" required onchange="previewSectionImage()">
                                            <div class="invalid-feedback">Please upload a Section Image.</div>
                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                        </div>
                          
                                        <!-- Preview Section -->
                                        <div class="col-md-12" id="sectionImagePreviewContainer" style="display: none;">
                                            <img id="section_image_preview" src="" alt="Preview" class="img-fluid" style="max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                                        </div>

                                        

                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('home-why-choose.index') }}" class="btn btn-danger px-4">Cancel</a>
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
                const file = document.getElementById('banner_image').files[0];
                const previewContainer = document.getElementById('bannerImagePreviewContainer');
                const previewImage = document.getElementById('banner_image_preview');

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


            function previewSectionImage() {
                const file = document.getElementById('section_image').files[0];
                const previewContainer = document.getElementById('sectionImagePreviewContainer');
                const previewImage = document.getElementById('section_image_preview');

                // Clear the previous preview
                previewImage.src = '';
                
                if (file) {
                    const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp', 'image/svg'];

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


        <script>
            function addRow() {
                let table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
                let rowCount = table.rows.length;
                let row = table.insertRow(rowCount);
                let uniqueId = Date.now(); 

                row.innerHTML = `
                    <td>
                        <input type="file" class="form-control" name="calculation_images[]" accept="image/*" 
                            onchange="previewImage(this, 'calculation_preview_${uniqueId}')" required>
                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                        <br>
                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                        <div id="calculation_preview_${uniqueId}" class="mt-2"></div>
                    </td>
                    <td><input type="text" class="form-control" name="calculation_titles[]" placeholder="Enter Title" required></td>
                    <td><textarea class="form-control" name="calculation_descriptions[]" placeholder="Enter Description" required></textarea></td>
                    <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td>
                `;
            }

            function removeRow(button) {
                let row = button.closest('tr');
                row.remove();
            }

            function previewImage(input, previewId) {
                let previewContainer = document.getElementById(previewId);
                previewContainer.innerHTML = '';

                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = '150px';
                        img.style.marginTop = '5px';
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

        </script>
</body>

</html>