
<!DOCTYPE html>
<html lang="en-US">

<head>
    @include('components.frontend.head')

    <style>
        .error-message {
            margin-top: 5px;
            color: red;
            font-size: 0.9em;
        }


    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>


<body class="home theme-creote page-home-default-one">
                <div id="page" class="page_wapper hfeed site">
                    <div id="wrapper_full" class="content_all_warpper">

                            @include('components.frontend.header')

                    <form class="contact-form" method="POST" action="{{ route('contact.send') }}">
                                    @csrf
                                    <div class="page_header_default style_one">
                                        <div class="page_header_content">
                                            <div class="auto-container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="banner_title_inner">
                                                            <div class="title_page">
                                                                Cart
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="breadcrumbs creote">
                                                            <ul class="breadcrumb m-auto">
                                                                <li><a href="{{ route('home.page') }}">Home</a></li>
                                                                <li class="active">Cart</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="content" class="site-content ">
                                        <div class="cart-page">
                                            <div class="pd_top_60"></div>

                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="cart-page-inner">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered">
                                                                    <thead class="thead-dark">
                                                                        <th>No.</th>
                                                                        <th>Image</th>
                                                                        <th>Product</th>
                                                                        <th>Part #</th>
                                                                        <th>Description </th>
                                                                        <th>Quantity</th>
                                                                        <th>Remove</th>
                                                                        </tr>
                                                                    </thead>
                                                                
                                                                        <tbody class="align-middle">
                                                                            @if($cartItems->isEmpty())
                                                                                <tr>
                                                                                    <td colspan="7" class="text-center">No items found in the cart.</td>
                                                                                </tr>
                                                                            @else
                                                                                @foreach($cartItems as $index => $item)
                                                                                    <tr>
                                                                                        <td>{{ $index + 1 }}</td>
                                                                                        <td>
                                                                                            <a href="#">
                                                                                                <img src="{{ asset('uploads/product/specifications/' . $item['image']) }}" width="80">
                                                                                            </a>
                                                                                        </td>
                                                                                        <td>{{ $item['product_name'] }}</td>
                                                                                        <td>{{ $item['name'] }}</td>
                                                                                        <td>{{ $item['description'] }}</td>
                                                                                        <td>

                                                                                        <div class="qty" style="display: flex; align-items: center;">
                                                                                            <!-- <input type="button" value="-" class="qty_button minus"> -->
                                                                                            <button class="btn-minus qty_button minus"><i class="fa fa-minus"></i></button>
                                                                                            <input type="text"
                                                                                                class="input-text qty text"
                                                                                                name="quantities[{{ $item['id'] }}]"
                                                                                                value="{{ $item['quantity'] }}"

                                                                                                inputmode="numeric"
                                                                                                style="width: 60px; padding: 5px; font-size: 16px; color: #000;">
                                                                                            <!-- <input type="button" value="+" class="qty_button plus"> -->
                                                                                             <button class="qty_button plus"><i class="fa fa-plus"></i></button>
                                                                                        </div>


                                                                                            <!-- <div class="qty">
                                                                                                <input type="text" value="{{ $item['quantity'] }}" style="width: 60px;" readonly>
                                                                                            </div> -->
                                                                                        </td>
                                                                                        <td>
                                                                                            <button class="remove-from-cart-btn" data-id="{{ $item['id'] }}">
                                                                                                <i class="fa fa-trash"></i>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            @endif
                                                                        </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="cart-page-inner">
                                                            <div class="row g-3 align-items-stretch justify-content-center justify-content-md-between">
                                                                <!-- Add More Button -->
                                                                <div class="col-12 col-md-6 col-lg-5">
                                                                    <div class="cart-summary d-flex justify-content-center justify-content-md-start">
                                                                        <div class="cart-btn w-100" style="max-width: 300px;">
                                                                            <button type="button" class="btn btn-primary w-100" onclick="window.location.href='https://anvayafoundation.com/pam_electronix/home'">
                                                                              ←
                                                                            </button>
                                                    
                                                    
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    
                                                                <!-- Ask to Quote Button -->
                                                                <div class="col-12 col-md-6 col-lg-5">
                                                                    <div class="cart-summary d-flex justify-content-center justify-content-md-end">
                                                                        <div class="cart-btn w-100" style="max-width: 300px;">
                                                                            <button type="button" class="btn btn-success w-100 contact-toggler" {{ $cartItems->isEmpty() ? 'disabled' : '' }}>
                                                                                Ask to Quote
                                                                            </button>
                                                    
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pd_bottom_60"></div>

                                        </div>
                                    </div>
                            </div>
                        </div>

                        <!---==============modal popup =================-->
                        <div class="modal_popup one">
                          <div class="modal-popup-inner">
                            <div class="close-modal"><i class="fa fa-times"></i></div>
                            <br>
                        <h3 class="modal-title" style="text-align: center;">Ask to Quote</h3><br>
                            <div class="modal_box">
                              <form class="contact-form" method="POST" action="{{ route('contact.send') }}">
                                @csrf
                                <div class="row">
                                  <div class="col-md-6">
                                    <input type="text" name="company_name" placeholder="Company Name*">
                                  </div>
                                  <div class="col-md-6">
                                    <input type="text" name="contact_person" placeholder="Contact Person*">
                                  </div>
                                  <div class="col-md-6">
                                    <input type="text" name="designation" placeholder="Designation*">
                                  </div>
                                  <div class="col-md-6">
                                    <input type="text" name="phone" placeholder="Phone No*">
                                  </div>
                                  <div class="col-md-12">
                                    <input type="email" name="email" placeholder="Enter Your Email*">
                                  </div>
                                  <div class="col-md-12">
                                    <textarea name="message" placeholder="Enter Your Message*"></textarea>
                                  </div>
                                  <div class="col-md-12">
                                    <p><input type="submit" class="type" value="Submit"></p>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                    </form>
                <!---==============modal popup end=================-->



                @include('components.frontend.footer')
            
                @include('components.frontend.main-js')


                <!---- Add to cart functionality----->
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                
                        document.querySelectorAll('.remove-from-cart-btn').forEach(button => {
                            button.addEventListener('click', function () {
                                const itemId = this.getAttribute('data-id');
                
                                if (!confirm('Are you sure you want to remove this item from the cart?')) {
                                    return;
                                }
                
                                // Get Laravel route dynamically
                                const removeUrl = `{{ route('cart.remove', ['id' => '__id__']) }}`.replace('__id__', itemId);
                
                                fetch(removeUrl, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': csrfToken,
                                        'Accept': 'application/json',
                                        'Content-Type': 'application/json'
                                    }
                                })
                                .then(response => {
                                    const contentType = response.headers.get('content-type');
                                    if (contentType && contentType.includes('application/json')) {
                                        return response.json();
                                    } else {
                                        throw new Error('Server did not return JSON');
                                    }
                                })
                                .then(data => {
                                    if (data.success) {
                                        notyf.open({
                                            type: 'custom-success',
                                            message: data.message
                                        });
                                        setTimeout(() => location.reload(), 1000); // slight delay so notification is visible
                                    } else {
                                        notyf.open({
                                            type: 'custom-error',
                                            message: data.message
                                        });
                                    }
                                })
                                .catch(error => {
                                    console.error('Error removing item:', error);
                                    notyf.open({
                                        type: 'custom-error',
                                        message: 'Something went wrong. Please try again.'
                                    });
                                });
                            });
                        });
                    });
                </script>


                <!---- Form Validations----->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                      const askQuoteBtn = document.querySelector('.contact-toggler');
                      const modal = document.querySelector('.modal_popup.one');
                      const closeBtn = modal.querySelector('.close-modal');
                    
                      askQuoteBtn.addEventListener('click', function() {
                        modal.classList.add('active');
                      });
                    
                      closeBtn.addEventListener('click', function() {
                        modal.classList.remove('active');
                    
                        // Optional: reset form and remove errors if any
                        const form = modal.querySelector('.contact-form');
                        form.reset();
                        form.querySelectorAll('.error-message').forEach(el => el.remove());
                      });
                    });
                    
                    document.addEventListener('DOMContentLoaded', function() {
                        const form = document.querySelector('.contact-form');
                    
                        if (!form) return;
                    
                        form.addEventListener('submit', function(e) {
                            // Clear all previous error messages before validation
                            form.querySelectorAll('.error-message').forEach(el => el.remove());
                    
                            let hasError = false;
                    
                            function showError(input, message) {
                                const error = document.createElement('div');
                                error.className = 'error-message';
                                error.style.color = 'red';
                                error.style.fontSize = '0.9em';
                                error.textContent = message;
                                input.insertAdjacentElement('afterend', error);
                            }
                    
                            // Validate company_name (required)
                            const companyName = form.company_name;
                            if (!companyName.value.trim()) {
                                showError(companyName, 'Company Name is required.');
                                hasError = true;
                            }
                    
                            // Validate contact_person (required, no numbers)
                            const contactPerson = form.contact_person;
                            if (!contactPerson.value.trim()) {
                                showError(contactPerson, 'Contact Person is required.');
                                hasError = true;
                            } else if (/\d/.test(contactPerson.value.trim())) {
                                showError(contactPerson, 'Contact Person should not contain numbers.');
                                hasError = true;
                            }
                    
                            // Validate designation (required)
                            const designation = form.designation;
                            if (!designation.value.trim()) {
                                showError(designation, 'Designation is required.');
                                hasError = true;
                            }
                    
                            // Validate phone (required, up to 15 digits, optional leading +)
                            const phone = form.phone;
                            if (!phone.value.trim()) {
                                showError(phone, 'Phone number is required.');
                                hasError = true;
                            } else if (!/^\+?\d{1,15}$/.test(phone.value.trim())) {
                                showError(phone, 'Please enter a valid phone number up to 15 digits (optional leading +).');
                                hasError = true;
                            }
                    
                            // Validate email (required, valid format)
                            const email = form.email;
                            if (!email.value.trim()) {
                                showError(email, 'Email is required.');
                                hasError = true;
                            } else {
                                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                if (!emailRegex.test(email.value.trim())) {
                                    showError(email, 'Please enter a valid email address.');
                                    hasError = true;
                                }
                            }
                    
                            // Validate message (required, max 2000 chars)
                            const message = form.message;
                            if (!message.value.trim()) {
                                showError(message, 'Message is required.');
                                hasError = true;
                            } else if (message.value.trim().length > 2000) {
                                showError(message, 'Message should not exceed 2000 characters.');
                                hasError = true;
                            }
                    
                            if (hasError) {
                                e.preventDefault(); // Prevent form submission if there are errors
                            }
                        });
                    });
                </script>


                <!----Qunatity ------>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        document.querySelectorAll('.qty').forEach(container => {
                            const minus = container.querySelector('.minus');
                            const plus = container.querySelector('.plus');
                            const input = container.querySelector('.qty');

                            if (minus && plus && input) {
                                minus.addEventListener('click', () => {
                                    let val = parseInt(input.value) || 1;
                                    if (val > 1) input.value = val - 1;
                                });

                                plus.addEventListener('click', () => {
                                    let val = parseInt(input.value) || 1;
                                    input.value = val + 1;
                                });
                            }
                        });
                    });
                </script>





              


</body>
</html>