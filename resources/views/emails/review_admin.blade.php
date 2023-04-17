<!DOCTYPE html>
<html>
<head>
    <title>Article was reviewed!</title>
</head>
<body>
    <h1>Article was reviewed!</h1>
    <p>The review has been added for article: {{ $review->article->title }}</p>
    <p>You can see the review in your admin dashboard <a href="{{ url('/admin/display-review/' . $review->id) }}">here</a>.</p>
</body>
</html>