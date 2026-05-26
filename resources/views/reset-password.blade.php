<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    body { font-family: 'Poppins', Arial, sans-serif; background: #f9f9f9; margin: 0; padding: 0; }
    .container { max-width: 520px; margin: 40px auto; background: #fff; border-radius: 10px; padding: 40px; box-shadow: 0 5px 20px rgba(0,0,0,0.07); }
    h2 { color: #1a1a2e; font-size: 22px; margin-bottom: 10px; }
    h2 em { color: #f5a425; font-style: normal; }
    p { color: #666; font-size: 14px; line-height: 1.7; }
    .btn { display: inline-block; margin: 20px 0; padding: 13px 30px; background-color: #f5a425; color: #fff; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 15px; }
    .footer { margin-top: 30px; font-size: 12px; color: #aaa; }
    .url-fallback { word-break: break-all; color: #f5a425; font-size: 12px; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Reset Your <em>Password</em></h2>
    <p>Hi {{ $user->name }},</p>
    <p>We received a request to reset the password for your Car Rental account. Click the button below to set a new password. This link will expire in <strong>60 minutes</strong>.</p>

    <a href="{{ $resetUrl }}" class="btn">Reset My Password</a>

    <p>If the button doesn't work, copy and paste this link into your browser:</p>
    <p class="url-fallback">{{ $resetUrl }}</p>

    <p>If you didn't request a password reset, you can safely ignore this email — your password will remain unchanged.</p>

    <div class="footer">
      &copy; {{ date('Y') }} Car Rental Website. All rights reserved.
    </div>
  </div>
</body>
</html>
