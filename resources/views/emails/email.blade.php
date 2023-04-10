<!DOCTYPE html>
<html>
<head>
    <title>New Article in the system</title>
</head>
<body>
    <h1>New Article Created</h1>
    <p>A new article has been created with the title: {{ $article->title }}</p>
    <p>View the article at <a href="{{ url('/admin/edit-article/' . $article->id) }}">here</a>.</p>
</body>
</html>
