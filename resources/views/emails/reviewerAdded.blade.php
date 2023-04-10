<!DOCTYPE html>
<html>
<head>
    <title>Article Awaiting Review</title>
</head>
<body>
    <h1>Article Awaiting Review</h1>
    <p>An article has been created and is awaiting your review: {{ $article->title }}</p>
    <p>Review the article at <a href="{{ url('/review/display-review/' . $article->id) }}">here</a>.</p>
</body>
</html>
