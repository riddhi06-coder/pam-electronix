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
                  <h4>Edit Why Choose Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('home-why-choose.index') }}">Why Choose</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Why Choose</li>
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
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('home-why-choose.update', $details->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                   
                                        <!-- Banner Heading-->
                                        <div class="col-md-6">
                                            <label class="form-label" for="banner_heading">Banner Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="banner_heading" type="text" name="banner_heading" placeholder="Enter Banner Heading" required value="{{ $details->banner_heading }}">
                                            <div class="invalid-feedback">Please enter a Banner Heading.</div>
                                        </div>
                                    
                                             
                                        <!-- Banner Title-->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="banner_title">Banner Title <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="banner_title" type="text" name="banner_title" placeholder="Enter Banner Title" required value="{{ $details->banner_title }}">
                                            <div class="invalid-feedback">Please enter a Banner Title.</div>
                                        </div>


                                     
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h3 class="mb-0">Why Choose Section</h3>
                                            <button type="button" class="btn btn-success" onclick="addRow()">Add More</button>
                                        </div>


                                        <!-- Calculations Table -->
                                    
                                        <table class="table table-bordered p-3" id="productTable">
                                            <thead>
                                                <tr>
                                                    <th>Image <span class="txt-danger">*</span></th>
                                                    <th>Title <span class="txt-danger">*</span></th>
                                                    <th>Description <span class="txt-danger">*</span></th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="productTableBody">
                                                @foreach ($calculation_images as $index => $image)
                                                    <tr data-index="{{ $index }}">
                                                        <td>
                                                            <input type="file" class="form-control" name="calculation_images[]" accept="image/*" onchange="previewImage(this, 'calculation_preview_{{ $index }}')">
                                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                            <br>
                                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                                            @if ($image)
                                                                <img src="{{ asset('uploads/home/' . $image) }}" width="100" class="mt-2" alt="Current Image">
                                                                <input type="hidden" name="existing_images[]" value="{{ $image }}">
                                                            @endif
                                                            <div id="calculation_preview_{{ $index }}" class="mt-2"></div>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="calculation_titles[]" 
                                                                value="{{ $calculation_titles[$index] ?? '' }}" required>
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="calculation_descriptions[]" required>{{ $calculation_descriptions[$index] ?? '' }}</textarea>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger removeRow" data-image="{{ $image }}">Remove</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                            <!-- Hidden input to store deleted images -->
                                            <input type="hidden" name="deleted_calculation_images" id="deleted_calculation_images">


                                        </table>



                                        <!-- Detailed Description with Summernote -->
                                        <div class="col-12 mb-5">
                                            <label class="form-label" for="detailed_description">Detailed Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control summernote" id="summernote" name="detailed_description" required>{{ $details->detailed_description }}</textarea>
                                            <div class="invalid-feedback">Please enter a detailed description.</div>
                                        </div><br><br><br><br><br><br>



                                        <h4><strong># Connect with our experts</strong></h4>

                                        
                                        <!-- Section Heading -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="section_heading">Section Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control @error('section_heading') is-invalid @enderror" id="section_heading" type="text" name="section_heading" placeholder="Enter Section Heading" required value="{{ old('section_heading', $details->section_heading) }}">
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
                          
                                        
                                        <!-- Preview Section (default hidden, shown via JS or if editing) -->
                                        <div class="col-md-12" id="sectionImagePreviewContainer" style="{{ isset($details->section_image) ? '' : 'display: none;' }}">
                                            <img
                                                id="section_image_preview"
                                                src="{{ isset($details->section_image) ? asset('uploads/home/' . $details->section_image) : '' }}"
                                                alt="Section Image"
                                                class="img-fluid"
                                                style="max-height: 200px; border: 1px solid #ddd; padding: 5px;"
                                            >
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
                const fileInput = document.getElementById('section_image');
                const file = fileInput.files[0];
                const previewContainer = document.getElementById('sectionImagePreviewContainer');
                const previewImage = document.getElementById('section_image_preview');

                // Clear the previous preview
                previewImage.src = '';
                previewContainer.style.display = 'none';

                if (file) {
                    const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];

                    if (validImageTypes.includes(file.type)) {
                        if (file.size <= 2 * 1024 * 1024) { // 2MB check
                            const reader = new FileReader();

                            reader.onload = function (e) {
                                previewImage.src = e.target.result;
                                previewContainer.style.display = 'block';
                            };

                            reader.readAsDataURL(file);
                        } else {
                            alert('File size must be less than 2MB.');
                            fileInput.value = ''; // Clear file input
                        }
                    } else {
                        alert('Please upload a valid image file (JPG, JPEG, PNG, WEBP).');
                        fileInput.value = ''; // Clear file input
                    }
                }
            }

        </script>


        <script>
            // When the DOM is ready
            document.addEventListener('DOMContentLoaded', function () {
                // Handle remove buttons in pre-rendered rows
                document.querySelectorAll('.removeRow').forEach(function (btn) {
                    btn.addEventListener('click', function () {
                        this.closest('tr').remove();
                    });
                });
            });

            // Alternatively, pure JavaScript delegation for dynamically added rows
            document.addEventListener('click', function (e) {
                if (e.target.classList.contains('removeRow')) {
                    e.target.closest('tr').remove();
                }
            });

            function addRow() {
                let table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
                let rowCount = table.rows.length;
                let uniqueId = Date.now();

                let row = table.insertRow(rowCount);
                row.innerHTML = `
                    <td>
                        <input type="file" class="form-control" name="calculation_images[]" accept="image/*"
                            onchange="previewImage(this, 'calculation_preview_${uniqueId}')" required>
                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                        <div id="calculation_preview_${uniqueId}" class="mt-2"></div>
                    </td>
                    <td><input type="text" class="form-control" name="calculation_titles[]" placeholder="Enter Title" required></td>
                    <td><textarea class="form-control" name="calculation_descriptions[]" placeholder="Enter Description" required></textarea></td>
                    <td><button type="button" class="btn btn-danger removeRow">Remove</button></td>
                `;
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