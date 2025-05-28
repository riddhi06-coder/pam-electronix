<div style="font-family: Arial, sans-serif; color: #333; background-color: #f9f9f9; padding: 20px; border-radius: 6px; max-width: 600px; margin: auto;">

   <div class="header" style="text-align: center;">
        <div style="background-color: black; display: inline-block; padding: 10px; border-radius: 8px;">
            <a class="logo" href="#">
                <img class="img-fluid for-dark" src="{{ asset('admin/assets/images/logo/logo.webp') }}" alt="loginpage" style="max-width: 130px;">
            </a>
        </div>
    </div>

    <p>Hi {{ $name ?? 'there' }},</p>

    <p>Thanks for contacting us! We’ve received your message and will get back to you soon.</p><br>

    <p>Best regards,<br>Team PAM Electronix</p>

    <hr>

    <div style="margin-top: 30px; text-align: center; color: #777;">
        <p style="font-size: 14px;">&copy; {{ date('Y') }} PAM Electronix. All rights reserved</p>
    </div>
</div>
