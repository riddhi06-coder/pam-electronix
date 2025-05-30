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
                  <h4>Add Contact Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('footer-contact.index') }}">Home</a>
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
                        <h4>Contact Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('footer-contact.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <!-- Email -->
                                        <div class="col-6">
                                            <label class="form-label" for="email">Email <span class="txt-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" required>
                                            <div class="invalid-feedback">Please enter a valid Email address.</div>
                                        </div>

                                        <!-- Email2 -->
                                        <div class="col-6">
                                            <label class="form-label" for="email2">Email 2 </label>
                                            <input type="email2" class="form-control" id="email2" name="email2" placeholder="Enter Email Address">
                                            <div class="invalid-feedback">Please enter a valid Email address.</div>
                                        </div>

                                        <!-- Phone Number -->
                                        <div class="col-6">
                                            <label class="form-label" for="phone">Phone Number <span class="txt-danger">*</span></label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                placeholder="Enter Phone Number" maxlength="12" pattern="\d{10,12}"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12);" required>
                                            <div class="invalid-feedback">Please enter a valid Phone Number (up to 12 digits only).</div>
                                        </div>


                                        <!-- Map URl -->
                                        <div class="col-6">
                                            <label class="form-label" for="url">Map URL <span class="txt-danger">*</span></label>
                                            <input type="text" class="form-control" id="map_url" name="map_url" placeholder="Enter Map URL" required>
                                            <div class="invalid-feedback">Please enter a Map URl.</div><br><br><br>
                                        </div>


                                        <!-- Address -->
                                        <div class="col-12">
                                            <label class="form-label" for="address">Address <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="address" name="address" placeholder="Enter Address" rows="3" required></textarea>
                                            <div class="invalid-feedback">Please enter an Address.</div>
                                        </div>


                                        <!-- Location URl -->
                                        <div class="col-12">
                                            <label class="form-label" for="url">Location URL <span class="txt-danger">*</span></label>
                                            <input type="text" class="form-control" id="url" name="url" placeholder="Enter Location URL" required>
                                            <div class="invalid-feedback">Please enter a Location URl.</div><br><br><br>
                                        </div>

                                        <h4># Social Media Links</h4>
                                         <!-- Social Media Links Table -->
                                        <table class="table table-bordered p-3" id="socialMediaTable" style="border: 2px solid #dee2e6;">
                                            <thead>
                                                <tr>
                                                    <th>Social Media Platform <span class="txt-danger">*</span></th>
                                                    <th>URL <span class="txt-danger">*</span></th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" name="social_media_platform[]" required>
                                                            <option value="">Select Platform</option>
                                                            <option value="Facebook">Facebook</option>
                                                            <option value="Twitter">Twitter</option>
                                                            <option value="Instagram">Instagram</option>
                                                            <option value="LinkedIn">LinkedIn</option>
                                                            <option value="Youtube">YouTube</option>
                                                            <option value="Watsapp">Watsapp</option>
                                                            <option value="Pinterest">Pinterest</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="url" name="social_media_url[]" placeholder="Enter URL" required>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-success add-row">Add Row</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table><br><br>

                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('footer-contact.index') }}" class="btn btn-danger px-4">Cancel</a>
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
        function previewImage(input, previewId) {
            let previewContainer = document.getElementById(previewId);
            if (!previewContainer) return;

            previewContainer.innerHTML = '';

            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '150px';
                    img.style.marginTop = '5px';
                    img.style.borderRadius = '5px';
                    img.style.border = '1px solid #ddd';
                    previewContainer.appendChild(img);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <!-- JavaScript to add rows dynamically -->
    <script>
        document.querySelector('.add-row').addEventListener('click', function() {
            var tableBody = document.querySelector('#socialMediaTable tbody');
            var newRow = document.createElement('tr');

            newRow.innerHTML = `
                <td>
                    <select class="form-control" name="social_media_platform[]" required>
                        <option value="">Select Platform</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Twitter">Twitter</option>
                        <option value="Instagram">Instagram</option>
                        <option value="LinkedIn">LinkedIn</option>
                        <option value="Youtube">YouTube</option>
                        <option value="Watsapp">Watsapp</option>
                        <option value="Pinterest">Pinterest</option>
                    </select>
                </td>
                <td>
                    <input class="form-control" type="url" name="social_media_url[]" placeholder="Enter URL" required>
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-row">Remove</button>
                </td>
            `;

            // Add the new row to the table body
            tableBody.appendChild(newRow);

            // Add event listener for remove button
            newRow.querySelector('.remove-row').addEventListener('click', function() {
                newRow.remove();
            });
        });
    </script>



</body>

</html>