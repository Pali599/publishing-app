<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Deleted Notification</title>
</head>
<body>
    <p>Dear {{ $article->author->name }},</p>
    <p>We regret to inform you that your article titled "{{ $article->title }}" has been deleted.</p>
    <!-- Add any other necessary information -->
    <p>Best regards,</p>
    <p>Your Website Team</p>
</body>
</html>
