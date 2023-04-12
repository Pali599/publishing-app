<!DOCTYPE html>
<html>
<head>
    <title>Article was edited</title>
</head>
<body>
    <h1>Article is awaiting for new review</h1>
    <p>An article has been edited and is awaiting your new review: {{ $article->title }}</p>
    <p>Review the article at <a href="{{ url('/review/display-review/' . $article->id) }}">here</a>.</p>
</body>
</html>