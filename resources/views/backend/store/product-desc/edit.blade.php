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




                                        <hr>

                                        <!-- Product Headers Table -->
                                        <h4>Capacitance Range Headers</h4>
                                        <table class="table table-bordered p-3" id="headerTable" style="border: 2px solid #dee2e6;">
                                            <thead>
                                                <tr>
                                                    <th>Header Name <span class="txt-danger">*</span></th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($details->header))
                                                    @foreach($details->header as $index => $header)
                                                        <tr>
                                                            <td>
                                                                <input type="text" class="form-control" name="header[]" placeholder="Enter Name" value="{{ $header }}" required>
                                                            </td>
                                                            <td>
                                                                @if($index == 0)
                                                                    <button type="button" class="btn btn-success" onclick="addHeaderRow()">Add More</button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="header[]" placeholder="Enter Name" required></td>
                                                        <td><button type="button" class="btn btn-success" onclick="addHeaderRow()">Add More</button></td>
                                                    </tr>
                                                @endif
                                            </tbody>


                                        </table>
                                        
                                        <div class="mb-4"></div>

                                        <!-- Product Specification Table -->
                                        <h4>Capacitance Range Details</h4>
                                        <table class="table table-bordered p-3" id="specsTable" style="border: 2px solid #dee2e6;">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($details->case_style))
                                                    @foreach($details->case_style as $index => $row)
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="case_style[]" value="{{ $row['case_style'] ?? '' }}" placeholder="Enter Data"></td>
                                                        <td><input type="text" class="form-control" name="commercial[]" value="{{ $row['commercial'] ?? '' }}" placeholder="Enter Data"></td>
                                                        <td><input type="text" class="form-control" name="mil[]" value="{{ $row['mil'] ?? '' }}" placeholder="Enter Data"></td>
                                                        <td><input type="text" class="form-control" name="straight_leads[]" value="{{ $row['straight_leads'] ?? '' }}" placeholder="Enter Data"></td>
                                                        <td><input type="text" class="form-control" name="crimped_leads[]" value="{{ $row['crimped_leads'] ?? '' }}" placeholder="Enter Data"></td>
                                                        <td>
                                                            @if($index == 0)
                                                                <button type="button" class="btn btn-success" onclick="addSpecRow()">Add More</button>
                                                            @else
                                                                <button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="case_style[]" placeholder="Enter Data"></td>
                                                        <td><input type="text" class="form-control" name="commercial[]" placeholder="Enter Data"></td>
                                                        <td><input type="text" class="form-control" name="mil[]" placeholder="Enter Data"></td>
                                                        <td><input type="text" class="form-control" name="straight_leads[]" placeholder="Enter Data"></td>
                                                        <td><input type="text" class="form-control" name="crimped_leads[]" placeholder="Enter Data"></td>
                                                        <td><button type="button" class="btn btn-success" onclick="addSpecRow()">Add More</button></td>
                                                    </tr>
                                                @endif
                                            </tbody>


                                        </table>

                                        <div class="my-3"></div>

                                        <hr>

                                        <h4>Capacitance Range Description</h4>
                                        
                                        <!-- Capacitance Heading-->
                                        <div class="col-md-6">
                                            <label class="form-label" for="capacitance_heading">Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="capacitance_heading" type="text" name="capacitance_heading" placeholder="Enter Heading" value="{{ old('capacitance_heading', $details->capacitance_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>

                                        <!-- Description Name with Summernote -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="capacitance_description">Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="capacitance_description" name="capacitance_description" placeholder="Enter Description" required>{{ old('capacitance_description', $details->capacitance_description) }}</textarea>
                                            <div class="invalid-feedback">Please enter a Description.</div>
                                        </div>


                                        <div class="my-3"></div>
                                        <hr>
                                        
                                        <h4>Voltage Range Description</h4>
                                        
                                        <!-- Voltage Heading-->
                                        <div class="col-md-6">
                                            <label class="form-label" for="voltage_heading">Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="voltage_heading" type="text" name="voltage_heading" placeholder="Enter Heading" value="{{ old('voltage_heading', $details->voltage_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>

                                        <!-- Description Name with Summernote -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="voltage_description">Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="voltage_description" name="voltage_description" placeholder="Enter Description" required>{{ old('voltage_description', $details->voltage_description) }}</textarea>
                                            <div class="invalid-feedback">Please enter a Description.</div>
                                        </div>


                                        <div class="my-3"></div>
                                        <hr>
                                        
                                        <h4>Operating Temperature Description</h4>
                                        
                                        <!-- Voltage Heading-->
                                        <div class="col-md-6">
                                            <label class="form-label" for="operating_heading">Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="operating_heading" type="text" name="operating_heading" placeholder="Enter Heading" value="{{ old('operating_heading', $details->operating_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>

                                        <!-- Description Name with Summernote -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="operating_description">Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="operating_description" name="operating_description" placeholder="Enter Description" required>{{ old('operating_description', $details->operating_description) }}</textarea>
                                            <div class="invalid-feedback">Please enter a Description.</div>
                                        </div>



                                        <div class="my-3"></div>
                                        <hr>
                                        
                                        <h4>Marking Details</h4>

                                        <!-- Voltage Heading-->
                                        <div class="col-md-6">
                                            <label class="form-label" for="marking_heading">Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="marking_heading" type="text" name="marking_heading" placeholder="Enter Heading" value="{{ old('marking_heading' , $details->marking_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>


                                        <!-- Description Name with Summernote -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="marking_description">Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="marking_description" name="marking_description" placeholder="Enter Description" required>{{ old('marking_description' , $details->marking_description) }}</textarea>
                                            <div class="invalid-feedback">Please enter a Description.</div>
                                        </div>
                                        

                                        <div class="my-3"></div>
                                        <hr>
                                        
                                        <h4>Ordering Code Details</h4>

                                        <!-- Voltage Heading-->
                                        <div class="col-md-6">
                                            <label class="form-label" for="ordering_heading">Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="ordering_heading" type="text" name="ordering_heading" placeholder="Enter Heading" value="{{ old('ordering_heading' , $details->ordering_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>


                                        
                                        <!-- Product Image -->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="image">Image <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="image" type="file" name="image" accept=".jpg, .jpeg, .png, .webp" onchange="previewImage()">
                                            <div class="invalid-feedback">Please upload an image.</div>
                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                        </div>

                                        <!-- Preview Section -->
                                        <div class="col-md-12" id="ImagePreviewContainer" style="{{ $details->image ? '' : 'display: none;' }}">
                                            <img id="image_preview" 
                                                src="{{ $details->image ? asset('uploads/product/' . $details->image) : '' }}" 
                                                alt="Preview" 
                                                class="img-fluid" 
                                                style="max-height: 300px; border: 1px solid #ddd; padding: 5px;">
                                        </div>


                                        <div class="my-3"></div>
                                        <hr>
                                        
                                        <h4>Style Details</h4>

                                        <!-- Voltage Heading-->
                                        <div class="col-md-6">
                                            <label class="form-label" for="style_heading">Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="style_heading" type="text" name="style_heading" placeholder="Enter Heading" value="{{ old('style_heading' , $details->style_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>


                                        <!-- Description Name with Summernote -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="style_description">Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="style_description" name="style_description" placeholder="Enter Description" required>{{ old('style_description' , $details->style_description) }}</textarea>
                                            <div class="invalid-feedback">Please enter a Description.</div>
                                        </div>


                                        <div class="my-3"></div>
                                        <hr>
                                        
                                        <h4>Characteristic Details</h4>

                                        <!-- Voltage Heading-->
                                        <div class="col-md-6">
                                            <label class="form-label" for="characteristics_heading">Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="characteristics_heading" type="text" name="characteristics_heading" placeholder="Enter Heading" value="{{ old('characteristics_heading' , $details->characteristics_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>


                                        <!-- Description Name with Summernote -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="characteristics_description">Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="characteristics_description" name="characteristics_description" placeholder="Enter Description" required>{{ old('characteristics_description' , $details->characteristics_description) }}</textarea>
                                            <div class="invalid-feedback">Please enter a Description.</div>
                                        </div>



                                        <div class="my-3"></div>
                                        <hr>
                                        
                                        <h4>Capacitance Details</h4>

                                        <!-- Voltage Heading-->
                                        <div class="col-md-6">
                                            <label class="form-label" for="capacitance_heading">Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="capacitance_heading" type="text" name="capacitance_heading" placeholder="Enter Heading" value="{{ old('capacitance_heading' , $details->capacitance_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>


                                        <!-- Description Name with Summernote -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="capacitance_description">Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="capacitance_description" name="capacitance_description" placeholder="Enter Description" required>{{ old('capacitance_description' , $details->capacitance_description) }}</textarea>
                                            <div class="invalid-feedback">Please enter a Description.</div>
                                        </div>



                                        <div class="my-3"></div>
                                        <hr>
                                        
                                        <h4>Leads Details</h4>

                                        <!-- Voltage Heading-->
                                        <div class="col-md-6">
                                            <label class="form-label" for="leads_heading">Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="leads_heading" type="text" name="leads_heading" placeholder="Enter Heading" value="{{ old('leads_heading' , $details->leads_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>


                                        <!-- Description Name with Summernote -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="leads_description">Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="leads_description" name="leads_description" placeholder="Enter Description" required>{{ old('leads_description' , $details->leads_description) }}</textarea>
                                            <div class="invalid-feedback">Please enter a Description.</div>
                                        </div>



                                        <div class="my-3"></div>
                                        <hr>
                                        
                                        <h4>Special Features Details</h4>

                                        <!-- Voltage Heading-->
                                        <div class="col-md-6">
                                            <label class="form-label" for="special_heading">Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="special_heading" type="text" name="special_heading" placeholder="Enter Heading" value="{{ old('special_heading', $details->special_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>


                                        <!-- Description Name with Summernote -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="special_description">Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="special_description" name="special_description" placeholder="Enter Description" required>{{ old('special_description', $details->special_description) }}</textarea>
                                            <div class="invalid-feedback">Please enter a Description.</div>
                                        </div>
                                        

                                        <!-- Product Image -->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="special_image">Image <span class="txt-danger">*</span></label>
                                            <input 
                                                class="form-control" 
                                                id="special_image" 
                                                type="file" 
                                                name="special_image" 
                                                accept=".jpg, .jpeg, .png, .webp" 
                                                onchange="previewSpecialImage()"
                                                {{ empty($details->special_image) ? 'required' : '' }}
                                            >
                                            <div class="invalid-feedback">Please upload an image.</div>
                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                        </div>

                                        <!-- Preview Section -->
                                        <div class="col-md-12" id="specialImagePreviewContainer" style="{{ !empty($details->special_image) ? '' : 'display: none;' }}">
                                            <img 
                                                id="special_image_preview" 
                                                src="{{ !empty($details->special_image) ? asset('uploads/product/' . $details->special_image) : '' }}" 
                                                alt="Preview" 
                                                class="img-fluid" 
                                                style="max-height: 300px; border: 1px solid #ddd; padding: 5px;"
                                            >
                                        </div>



                                        <div class="my-3"></div>
                                        <hr>
                                        
                                        <h4>Information</h4>


                                        <!-- Product Headers Table -->
                                        <h4>Information Headers</h4>
                                        <table class="table table-bordered p-3" id="infoTable" style="border: 2px solid #dee2e6;">
                                            <thead>
                                                <tr>
                                                    <th>Header Name <span class="txt-danger">*</span></th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($details->info_header) && is_array($details->info_header))
                                                    @foreach($details->info_header as $index => $header)
                                                        <tr>
                                                            <td><input type="text" class="form-control" name="info_header[]" value="{{ $header }}" placeholder="Enter Name" required></td>
                                                            <td>
                                                                @if($index == 0)
                                                                    <button type="button" class="btn btn-success" onclick="addinfoHeaderRow()">Add More</button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="info_header[]" placeholder="Enter Name" required></td>
                                                        <td><button type="button" class="btn btn-success" onclick="addinfoHeaderRow()">Add More</button></td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>

                                        

                                        <div class="mb-4"></div>

                                        <!-- Product Specification Table -->
                                        <h4>Information Details</h4>
                                        <table class="table table-bordered p-3" id="specs1Table" style="border: 2px solid #dee2e6;">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($details->info_details) && is_array($details->info_details))
                                                    @foreach($details->info_details as $index => $row)
                                                        <tr>
                                                            <td><input type="text" class="form-control" name="d1[]" value="{{ $row['d1'] ?? '' }}" placeholder="Enter Data"></td>
                                                            <td><input type="text" class="form-control" name="d2[]" value="{{ $row['d2'] ?? '' }}" placeholder="Enter Data"></td>
                                                            <td><input type="text" class="form-control" name="d3[]" value="{{ $row['d3'] ?? '' }}" placeholder="Enter Data"></td>
                                                            <td><input type="text" class="form-control" name="d4[]" value="{{ $row['d4'] ?? '' }}" placeholder="Enter Data"></td>
                                                            <td><input type="text" class="form-control" name="d5[]" value="{{ $row['d5'] ?? '' }}" placeholder="Enter Data"></td>
                                                            <td><input type="text" class="form-control" name="d6[]" value="{{ $row['d6'] ?? '' }}" placeholder="Enter Data"></td>
                                                            <td><input type="text" class="form-control" name="d7[]" value="{{ $row['d7'] ?? '' }}" placeholder="Enter Data"></td>
                                                            <td><input type="text" class="form-control" name="d8[]" value="{{ $row['d8'] ?? '' }}" placeholder="Enter Data"></td>
                                                            <td>
                                                                @if($index == 0)
                                                                    <button type="button" class="btn btn-success" onclick="addinfoRow()">Add More</button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="d1[]" placeholder="Enter Data"></td>
                                                        <td><input type="text" class="form-control" name="d2[]" placeholder="Enter Data"></td>
                                                        <td><input type="text" class="form-control" name="d3[]" placeholder="Enter Data"></td>
                                                        <td><input type="text" class="form-control" name="d4[]" placeholder="Enter Data"></td>
                                                        <td><input type="text" class="form-control" name="d5[]" placeholder="Enter Data"></td>
                                                        <td><input type="text" class="form-control" name="d6[]" placeholder="Enter Data"></td>
                                                        <td><input type="text" class="form-control" name="d7[]" placeholder="Enter Data"></td>
                                                        <td><input type="text" class="form-control" name="d8[]" placeholder="Enter Data"></td>
                                                        <td><button type="button" class="btn btn-success" onclick="addinfoRow()">Add More</button></td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>

                                        <div class="my-3"></div>
                                        <hr>
                                        
                                        <h4>Images</h4>

                                       
                                        <!-- Product Prints Image Upload -->
                                       <div class="table-container" style="margin-bottom: 20px;">
                                            <table class="table table-bordered p-3" id="printsTable" style="border: 2px solid #dee2e6;">
                                                <thead>
                                                    <tr>
                                                        <th>Images</th>
                                                        <th>Preview</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(!empty($details->print_image) && is_array($details->print_image))
                                                        @foreach($details->print_image as $index => $print_image)
                                                            <tr>
                                                                <td>
                                                                    <input type="file" onchange="previewPrintImage(this, {{ $index }})" accept=".png, .jpg, .jpeg, .webp" name="print_image[]" id="print_image_{{ $index }}" class="form-control">
                                                                    <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                                                    <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                                                </td>
                                                                <td>
                                                                    <div id="print-preview-container-{{ $index }}">
                                                                        <img src="{{ asset('uploads/product/' . $print_image) }}" alt="Preview" class="img-fluid" style="max-height: 150px; border: 1px solid #ddd; padding: 5px;">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    @if($index === 0)
                                                                        <button type="button" class="btn btn-primary" id="addPrintRow">Add More</button>
                                                                    @else
                                                                        <button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td>
                                                                <input type="file" onchange="previewPrintImage(this, 0)" accept=".png, .jpg, .jpeg, .webp" name="print_image[]" id="print_image_0" class="form-control">
                                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                                            </td>
                                                            <td>
                                                                <div id="print-preview-container-0"></div>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary" id="addPrintRow">Add More</button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>


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

            function previewSpecialImage() {
                const file = document.getElementById('special_image').files[0];
                const previewContainer = document.getElementById('specialImagePreviewContainer');
                const previewImage = document.getElementById('special_image_preview');

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

            function previewSpecialImage1() {
                const file = document.getElementById('image1').files[0];
                const previewContainer = document.getElementById('specialImage1PreviewContainer');
                const previewImage = document.getElementById('image1_preview');

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

            function previewSpecialImage2() {
                const file = document.getElementById('image2').files[0];
                const previewContainer = document.getElementById('specialImage2PreviewContainer');
                const previewImage = document.getElementById('image2_preview');

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

         <!-- JavaScript to Add and Remove Rows for Sepcification -->
        <script>
            function addImageRow() {
                let table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
                let rowCount = table.rows.length;
                let row = table.insertRow(rowCount);
                let uniqueId = Date.now();

                row.innerHTML = `
                    <td>
                        <input type="file" class="form-control" name="product_images[]" accept="image/*" 
                            onchange="previewImage(this, 'imagePreview_${uniqueId}')" required>
                        <small class="text-secondary"><b>Max size: 2MB | Formats: .jpg, .jpeg, .png, .webp</b></small>
                    </td>
                    <td class="text-center">
                        <img src="#" alt="Image Preview" id="imagePreview_${uniqueId}" class="img-thumbnail d-none" width="100">
                    </td>
                    <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td>
                `;
            }

            function addSpecRow() {
                let table = document.getElementById('specsTable').getElementsByTagName('tbody')[0];
                let rowCount = table.rows.length;
                let row = table.insertRow(rowCount);

                row.innerHTML = `
                            <td><input type="text" class="form-control" name="case_style[]" placeholder="Enter Data"></td>
                            <td><input type="text" class="form-control" name="commercial[]" placeholder="Enter Data"></td>
                            <td><input type="text" class="form-control" name="mil[]" placeholder="Enter Data"></td>
                            <td><input type="text" class="form-control" name="straight_leads[]" placeholder="Enter Data"></td>
                            <td><input type="text" class="form-control" name="crimped_leads[]" placeholder="Enter Data"></td>
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


        <script>
            $(document).ready(function() {
                $('#marking_description').summernote({
                    height: 200, // Adjust height as needed
                    focus: true   // Focus the editor when initialized
                });


                $('#special_description').summernote({
                    height: 200, // Adjust height as needed
                    focus: true   // Focus the editor when initialized
                });
            });
        </script>

        <!--Product Prints Image Preview & Add More Option-->
        <script>

            document.addEventListener("DOMContentLoaded", function () {
                let rowIndex = 1; // Start row index for new rows

                // Add row functionality
                document.getElementById("addPrintRow").addEventListener("click", function () {
                    const tableBody = document.querySelector("#printsTable tbody");
                    const newRow = document.createElement("tr");

                    newRow.innerHTML = `
                        <td>
                            <input type="file" onchange="previewPrintImage(this, ${rowIndex})" accept=".png, .jpg, .jpeg, .webp" name="print_image[]" id="print_image_${rowIndex}" class="form-control" placeholder="Upload Print Image" required>
                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                            <br>
                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                        </td>
                        <td>
                            <div id="print-preview-container-${rowIndex}"></div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger removePrintRow">Remove</button>
                        </td>
                    `;

                    tableBody.appendChild(newRow);
                    rowIndex++; // Increment row index for unique IDs
                });

                // Remove row functionality
                document.querySelector("#printsTable").addEventListener("click", function (e) {
                    if (e.target.classList.contains("removePrintRow")) {
                        const row = e.target.closest("tr");
                        row.remove();
                    }
                });
            });

            // Image preview function
            function previewPrintImage(input, index) {
                const previewContainer = document.getElementById(`print-preview-container-${index}`);
                previewContainer.innerHTML = ""; // Clear previous preview
                if (input.files) {
                    Array.from(input.files).forEach((file) => {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            const img = document.createElement("img");
                            img.src = e.target.result;
                            img.style.width = "100px";
                            img.style.marginRight = "10px";
                            previewContainer.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    });
                }
            }

        </script>



        <!-- JavaScript to Add and Remove Rows for Sepcification -->
        <script>
            function addinfoRow() {
                let table = document.getElementById('specs1Table').getElementsByTagName('tbody')[0];
                let rowCount = table.rows.length;
                let row = table.insertRow(rowCount);

                row.innerHTML = `
                            <td><input type="text" class="form-control" name="d1[]" placeholder="Enter Data"></td>
                            <td><input type="text" class="form-control" name="d2[]" placeholder="Enter Data"></td>
                            <td><input type="text" class="form-control" name="d3[]" placeholder="Enter Data"></td>
                            <td><input type="text" class="form-control" name="d4[]" placeholder="Enter Data"></td>
                            <td><input type="text" class="form-control" name="d5[]" placeholder="Enter Data"></td>
                            <td><input type="text" class="form-control" name="d6[]" placeholder="Enter Data"></td>
                            <td><input type="text" class="form-control" name="d7[]" placeholder="Enter Data"></td>
                            <td><input type="text" class="form-control" name="d8[]" placeholder="Enter Data"></td>
                            <td><button type="button" class="btn btn-danger" onclick="removeinfoRow(this)">Remove</button></td>
                `;
            }

            function addinfoHeaderRow() {
                let table = document.getElementById('infoTable').getElementsByTagName('tbody')[0];
                let rowCount = table.rows.length;
                let row = table.insertRow(rowCount);

                row.innerHTML = `
                    <td><input type="text" class="form-control" name="info_header[]" placeholder="Enter Name"></td>
                    <td><button type="button" class="btn btn-danger" onclick="removeinfoRow(this)">Remove</button></td>
                `;
            }

            function removeinfoRow(button) {
                let row = button.closest('tr');
                row.remove();
            }

        </script>

</body>

</html>