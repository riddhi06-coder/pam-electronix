<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Form Details</title>
    <style>
        .header {
            text-align: center; /* Centers inline elements like img */
            margin-bottom: 20px;
        }

        .logo {
            width: 50%;
            max-width: 200px;
            height: auto;
            display: block;
            margin: 0 auto; /* Centers the image */
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('frontend/assets/images/logo.webp') }}" alt="PAM Electronix" class="logo">
    </div>

    <h2>Quote Form Submission</h2>
    <p><strong>Company Name:</strong> {{ $emailData['company_name'] }}</p>
    <p><strong>Contact Person:</strong> {{ $emailData['name'] }}</p>
    <p><strong>Designation:</strong> {{ $emailData['designation'] }}</p>
    <p><strong>Phone:</strong> {{ $emailData['phone'] }}</p>
    <p><strong>Email:</strong> {{ $emailData['email'] }}</p>
    <p><strong>Message:</strong> {{ $emailData['message'] }}</p>

    <br>

    @if(!empty($cartItems) && count($cartItems) > 0)
        <h3>Quoted Items: </h3>
        <table border="1" cellpadding="8" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Part Number</th>
                    <th>Description</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><img src="{{ asset('uploads/product/specifications/' . $item->product_image) }}" width="60" alt="Image"></td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif


    <br>
    <hr>
    <!-- Footer Section -->
    <div class="footer">
        <div class="copyright">© {{ date('Y') }} PAM Electronix. All rights reserved.</div>
    </div>
</body>
</html>
