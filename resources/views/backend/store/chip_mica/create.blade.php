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
                  <h4>Add Chip Mica Capacitors Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('manage-chip-mica.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Details</li>
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
                        <h4>Chip Mica Capacitors Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('manage-chip-mica.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <!-- Banner Heading-->
                                        <div class="col-md-6">
                                            <label class="form-label" for="banner_heading">Banner Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="banner_heading" type="text" name="banner_heading" placeholder="Enter Banner Heading" value="{{ old('banner_heading') }}" required>
                                            <div class="invalid-feedback">Please enter a Banner Heading.</div>
                                        </div>
                                        
                                        <!-- Banner Image -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="banner_image">Banner Image <span class="txt-danger">*</span></label>


                                            <input class="form-control" id="banner_image" type="file" name="banner_image" accept=".jpg, .jpeg, .png, .webp" required onchange="previewBannerImage()">
                                            <div class="invalid-feedback">Please upload a Banner Image.</div>
                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>

                                            
                                            <!-- Preview Section - moved here just below the label -->
                                            <div id="bannerImagePreviewContainer" style="display: none; margin-bottom: 10px;">
                                                <img id="banner_image_preview" src="" alt="Preview" class="img-fluid" style="max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                                            </div>
                                        </div>

                                        <hr>

                                        <!-- Image-->
                                        <div class="col-md-6">
                                            <label class="form-label" for="image">Image <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="image" type="file" name="image" accept=".jpg, .jpeg, .png, .webp" required onchange="previewImage()">
                                            <div class="invalid-feedback">Please upload a Image.</div>
                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                        </div>

                                        <!-- Preview Section -->
                                        <div class="col-md-12" id="ImagePreviewContainer" style="display: none;">
                                            <img id="image_preview" src="" alt="Preview" class="img-fluid" style="max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                                        </div>


                                        <!-- Detailed Description with Summernote -->
                                        <div class="col-12 mb-5">
                                            <label class="form-label" for="detailed_description">Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control summernote" id="summernote" name="detailed_description" placeholder="Enter Description" required>{{ old('detailed_description') }} </textarea>
                                            <div class="invalid-feedback">Please enter a detailed description.</div>
                                        </div><br><br><br><br><br><br>
                                        <hr>

                                        <!-- Product Headers Table -->
                                        <h4>Information Table Headers (1)</h4>
                                        <table class="table table-bordered p-3" id="headerTable" style="border: 2px solid #dee2e6;">
                                            <thead>
                                                <tr>
                                                    <th>Header Name <span class="txt-danger">*</span></th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="header[]" placeholder="Enter Name" required></td>
                                                    <td><button type="button" class="btn btn-success" onclick="addHeaderRow()">Add More</button></td>
                                                </tr>
                                            </tbody>
                                        </table>


                                        
                                        <div class="mb-4"></div>


                                        <!-- Product Specification Table -->
                                        <h4>Information (1)</h4>
                                        <table class="table table-bordered p-3" id="specsTable" style="border: 2px solid #dee2e6;">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="case_type[]" placeholder="Enter Data"></td>
                                                    <td><input type="text" class="form-control" name="cap[]" placeholder="Enter Data"></td>
                                                    <td><input type="text" class="form-control" name="catalog500[]" placeholder="Enter Data"></td>
                                                    <td><input type="text" class="form-control" name="catalog100[]" placeholder="Enter Data"></td>
                                                    <td><button type="button" class="btn btn-success" onclick="addSpecRow()">Add More</button></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        </div><br><br><br><br><br><br>
                                        <hr>

                                        <br><br>

                                        <!-- Product Headers Table -->
                                        <h4>Information Table (2) Headers</h4><br>  
                                        <table class="table table-bordered p-3" id="headerTable1" style="border: 2px solid #dee2e6;">
                                            <thead>
                                                <tr>
                                                    <th>Header Name <span class="txt-danger">*</span></th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="header1[]" placeholder="Enter Name" required></td>
                                                    <td><button type="button" class="btn btn-success" onclick="addHeaderRow1()">Add More</button></td>
                                                </tr>
                                            </tbody>
                                        </table>


                                        
                                        <div class="mb-4"></div>


                                        <!-- Product Specification Table -->
                                        <h4>Information (2)</h4><br>  
                                        <table class="table table-bordered p-3" id="specsTable1" style="border: 2px solid #dee2e6;">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="case_type1[]" placeholder="Enter Data"></td>
                                                    <td><input type="text" class="form-control" name="cap1[]" placeholder="Enter Data"></td>
                                                    <td><input type="text" class="form-control" name="catalog5001[]" placeholder="Enter Data"></td>
                                                    <td><input type="text" class="form-control" name="catalog1001[]" placeholder="Enter Data"></td>
                                                    <td><button type="button" class="btn btn-success" onclick="addSpecRow1()">Add More</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>  



                                        </div><br><br>
                                        <hr>

                                        <br><br>

                                        <!-- Product Headers Table -->
                                        <h4>Information Table (3) Headers</h4><br>  
                                        <table class="table table-bordered p-3" id="headerTable2" style="border: 2px solid #dee2e6;">
                                            <thead>
                                                <tr>
                                                    <th>Header Name <span class="txt-danger">*</span></th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="header2[]" placeholder="Enter Name" required></td>
                                                    <td><button type="button" class="btn btn-success" onclick="addHeaderRow2()">Add More</button></td>
                                                </tr>
                                            </tbody>
                                        </table>


                                        
                                        <div class="mb-4"></div>


                                        <!-- Product Specification Table -->
                                        <h4>Information (3)</h4><br>  
                                        <table class="table table-bordered p-3" id="specsTable2" style="border: 2px solid #dee2e6;">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="case_type2[]" placeholder="Enter Data"></td>
                                                    <td><input type="text" class="form-control" name="cap2[]" placeholder="Enter Data"></td>
                                                    <td><input type="text" class="form-control" name="catalog5002[]" placeholder="Enter Data"></td>
                                                    <td><input type="text" class="form-control" name="catalog1002[]" placeholder="Enter Data"></td>
                                                    <td><button type="button" class="btn btn-success" onclick="addSpecRow2()">Add More</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>  


                                        <div class="col-12 mb-5">
                                            <label class="form-label" for="description">Short Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control description" id="description" name="description" placeholder="Enter Description" required>{{ old('description') }} </textarea>
                                        </div>


                                        
                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('manage-chip-mica.index') }}" class="btn btn-danger px-4">Cancel</a>
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

            function previewImage() {
                const file = document.getElementById('image').files[0];
                const previewContainer = document.getElementById('ImagePreviewContainer');
                const previewImage = document.getElementById('image_preview');

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


        <!-- JavaScript to Add and Remove Rows for Info table 1 -->
        <script>
            function addSpecRow() {
                let table = document.getElementById('specsTable').getElementsByTagName('tbody')[0];
                let rowCount = table.rows.length;
                let row = table.insertRow(rowCount);

                row.innerHTML = `
                    <td><input type="text" class="form-control" name="case_type[]" placeholder="Enter Data"></td>
                    <td><input type="text" class="form-control" name="cap[]" placeholder="Enter Data"></td>
                    <td><input type="text" class="form-control" name="catalog500[]" placeholder="Enter Data"></td>
                    <td><input type="text" class="form-control" name="catalog100[]" placeholder="Enter Data"></td>
                    <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td>
                `;
            }

            function addHeaderRow() {
                let table = document.getElementById('headerTable').getElementsByTagName('tbody')[0];
                let rowCount = table.rows.length;
                let row = table.insertRow(rowCount);

                row.innerHTML = `
                    <td><input type="text" class="form-control" name="header[]" placeholder="Enter Name"></td>
                    <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td>
                `;
            }

            function removeRow(button) {
                let row = button.closest('tr');
                row.remove();
            }

        </script>


        <!-- JavaScript to Add and Remove Rows for Info table 2 -->
        <script>
            function addSpecRow1() {
                let table = document.getElementById('specsTable1').getElementsByTagName('tbody')[0];
                let rowCount = table.rows.length;
                let row = table.insertRow(rowCount);

                row.innerHTML = `
                    <td><input type="text" class="form-control" name="case_type1[]" placeholder="Enter Data"></td>
                    <td><input type="text" class="form-control" name="cap1[]" placeholder="Enter Data"></td>
                    <td><input type="text" class="form-control" name="catalog5001[]" placeholder="Enter Data"></td>
                    <td><input type="text" class="form-control" name="catalog1001[]" placeholder="Enter Data"></td>
                    <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td>
                `;
            }

            function addHeaderRow1() {
                let table = document.getElementById('headerTable1').getElementsByTagName('tbody')[0];
                let rowCount = table.rows.length;
                let row = table.insertRow(rowCount);

                row.innerHTML = `
                    <td><input type="text" class="form-control" name="header1[]" placeholder="Enter Name"></td>
                    <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td>
                `;
            }

            function removeRow(button) {
                let row = button.closest('tr');
                row.remove();
            }

        </script>


        <!-- JavaScript to Add and Remove Rows for Info table 3 -->
        <script>
            function addSpecRow2() {
                let table = document.getElementById('specsTable2').getElementsByTagName('tbody')[0];
                let rowCount = table.rows.length;
                let row = table.insertRow(rowCount);

                row.innerHTML = `
                    <td><input type="text" class="form-control" name="case_type2[]" placeholder="Enter Data"></td>
                    <td><input type="text" class="form-control" name="cap2[]" placeholder="Enter Data"></td>
                    <td><input type="text" class="form-control" name="catalog5002[]" placeholder="Enter Data"></td>
                    <td><input type="text" class="form-control" name="catalog1002[]" placeholder="Enter Data"></td>
                    <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td>
                `;
            }

            function addHeaderRow2() {
                let table = document.getElementById('headerTable2').getElementsByTagName('tbody')[0];
                let rowCount = table.rows.length;
                let row = table.insertRow(rowCount);

                row.innerHTML = `
                    <td><input type="text" class="form-control" name="header2[]" placeholder="Enter Name"></td>
                    <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td>
                `;
            }

            function removeRow(button) {
                let row = button.closest('tr');
                row.remove();
            }

        </script>




</body>

</html>