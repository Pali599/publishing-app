<!DOCTYPE html>
<html>
<head>
    <title>Article was reviewed!</title>
</head>
<body>
    <h1>Article was reviewed!</h1>
    <p>The review has been added to your article: {{ $article->title }}</p>
    <p>Review is available <a href="{{ url('/article/display-article/' . $article->id) }}">here</a>.</p>
</body>
</html>
