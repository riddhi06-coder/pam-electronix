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
                  <h4>Edit Introduction Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('home-intro.index') }}">Introduction</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Introduction</li>
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
                        <h4>Introduction Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('home-intro.update', $intro->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') 

                                    <!-- Banner Image-->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="banner_image">Image <span class="txt-danger">*</span></label>
                                        <input class="form-control @error('banner_image') is-invalid @enderror" id="banner_image" type="file" name="banner_image" accept=".jpg, .jpeg, .png, .webp" onchange="previewBannerImage()">
                                        <div class="invalid-feedback">Please upload a Image.</div>
                                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                        <br>
                                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>

                                        {{-- Existing Image Preview --}}
                                        @if ($intro->banner_image)
                                            <div class="mt-2 existing-image-preview">
                                                <img src="{{ asset('uploads/home/' . $intro->banner_image) }}" alt="Current Image" class="img-fluid" style="max-height: 150px; border: 1px solid #ccc; padding: 4px;">
                                            </div>
                                        @endif

                                        <!-- Preview Section -->
                                        <div class="col-md-12" id="bannerImagePreviewContainer" style="display: none;">
                                            <img id="banner_image_preview" src="" alt="Preview" class="img-fluid" style="max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                                        </div>  
                                    </div>


                                    <!-- Description -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="description">Description <span class="txt-danger">*</span></label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="summernote" name="description" rows="3" placeholder="Enter Description" required>{{ old('description', $intro->description) }}</textarea>
                                        <div class="invalid-feedback">Please enter a Description.</div>
                                    </div>

                                    <h4><strong># Shop Our Products</strong></h4>

                                    <!-- Section Heading -->
                                    <div class="col-md-12">
                                        <label class="form-label" for="section_heading">Section Heading <span class="txt-danger">*</span></label>
                                        <input class="form-control @error('section_heading') is-invalid @enderror" id="section_heading" type="text" name="section_heading" placeholder="Enter Section Heading" required value="{{ old('section_heading', $intro->section_heading) }}">
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
                              
                                        
                                        {{-- Existing Image Preview --}}
                                        @if ($intro->section_image)
                                            <div class="mt-2 existing-image-preview-1">
                                                <img src="{{ asset('uploads/home/' . $intro->section_image) }}" alt="Current Image" class="img-fluid" style="max-height: 150px; border: 1px solid #ccc; padding: 4px;">
                                            </div>
                                        @endif

                        
                                        <!-- Preview Section -->
                                        <div class="col-md-12" id="sectionImagePreviewContainer" style="display: none;">
                                            <img id="section_image_preview" src="" alt="Preview" class="img-fluid" style="max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                                        </div>
                                    </div>


                                    <!-- Form Actions -->
                                    <div class="col-12 text-end">
                                        <a href="{{ route('home-intro.index') }}" class="btn btn-danger px-4">Cancel</a>
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
                const existingImage = document.querySelector('.existing-image-preview');

                // Clear the previous preview
                previewImage.src = '';

                if (file) {
                    const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];

                    // Hide the existing image if a new file is selected
                    if (existingImage) {
                        existingImage.style.display = 'none';
                    }

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
                const existingImage = document.querySelector('.existing-image-preview-1');

               
                // Clear the previous preview
                previewImage.src = '';

                if (file) {
                    const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];

                    // Hide the existing image if a new file is selected
                    if (existingImage) {
                        existingImage.style.display = 'none';
                    }

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