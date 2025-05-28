<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Details</title>
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
    <div class="header" style="text-align: center;">
        <div style="background-color: black; display: inline-block; padding: 10px; border-radius: 8px;">
            <a class="logo" href="#">
                <img class="img-fluid for-dark" src="{{ asset('admin/assets/images/logo/logo.webp') }}" alt="loginpage" style="max-width: 130px;">
            </a>
        </div>
    </div>

    <h2 style="text-align: center;">New Contact Form Enquiry</h2>

    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Subject:</strong> {{ $subject }}</p>
    <p><strong>Message:</strong> {{ $user_message }}</p>

    <hr>
    <!-- Footer Section -->
    <div class="footer">
        <div class="copyright">© {{ date('Y') }} PAM Electronix. All rights reserved.</div>
    </div>
</body>
</html>
