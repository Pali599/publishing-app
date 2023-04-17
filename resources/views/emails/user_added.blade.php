<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Created</title>
</head>
<body>
    <p>Dear {{ $user->name }},</p>
    <p>We would like to let you know that there has been created new account for you! Please continue according to steps below:</p>
    <br>
    <p>1. Change your password here: <a href="{{ url('/forgot-password') }}"><button>Change Password</button></a></p>
    <br>
    <p>2. Verify your email address here: <a href="{{ url('/verify-email') }}"><button>Verify Email Address</button></a></p>
    <br>
    <p>Best regards,</p>
    <p>Your EasyPublish Team</p>
</body>
</html>