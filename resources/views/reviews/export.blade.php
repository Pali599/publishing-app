<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Export</title>
    <style>
        /* Add any custom styles here */
    </style>
</head>
<body>
    <h1>Review Details</h1>
    <p><strong>ID:</strong> {{ $review->id }}</p>
    <p><strong>Title:</strong> {{ $review->title }}</p>
    <p><strong>Content:</strong> {{ $review->comment }}</p>
    <!-- Add any other fields that you want to display -->
</body>
</html>
