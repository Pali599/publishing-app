<!DOCTYPE html>
<html>
<head>
    <title>Review Updated</title>
</head>
<body>
    <h1>Review was updated!</h1>
    <p>The review has been updated to your article: {{ $review->article->title }}</p>
    <p>Updated review is available <a href="{{ url('/article/display-article/' . $review->article->id) }}">here</a>.</p>
</body>
</html>