<!DOCTYPE html>
<html>
<head>
    <title>Review Updated</title>
</head>
<body>
    <h1>Review was updated!</h1>
    <p>The review has been updated for article: {{ $review->article->title }}</p>
    <p>You can see the updated review in your admin dashboard <a href="{{ url('/admin/display-review/' . $review->id) }}">here</a>.</p>
</body>
</html>