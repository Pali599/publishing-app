@extends('layouts.master')

@section('title','Admin Dashboard')

@section('content')
<div class="container px-4">

    <div class="card mt-4 border border-1 shadow-lg rounded">
        <div class="card-header">
            <h4>
                Assigned Articles <a href="{{ url('article/add') }}" class="btn btn-primary btn-sm float-end">Add article</a>
            </h4>
        </div>
        <div id="articles" class="card-body">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <table class="table table-boardered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Internal Reviewer</th>
                        <th>External Reviewer</th>
                        <th>Optional Reviewer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($article as $item)
                        @if($item->reviewer_int != 0 && $item->reviewer_ext != 0 && $item->published != 'yes')
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->author->name}}</td>
                                <td>{{ $item->internal->name}}</td>
                                <td>{{ $item->external->name}}</td>
                                @if($item->reviewer_opt == 0)
                                    <td>Not assigned</td>
                                @else
                                    <td>{{ $item->reviewerOpt->name}}</td>
                                @endif
                                <td>
                                    <a href="{{ url('admin/edit-article/'.$item->id)}}" class="btn btn-success btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ url('admin/articles/delete-article/'.$item->id)}}" class="btn btn-danger btn-sm" onclick="confirmDelete(event, '{{ url('admin/articles/delete-article/'.$item->id) }}')">Delete</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/delete-warning.js') }}"></script>

<script>
    const searchModel = 'article'; // Change this to the desired model (user, journal, category, etc.)

    document.querySelector('#search').addEventListener('input', (event) => {
        const query = event.target.value;
        if (query.length >= 3) {
            fetch(`/admin/search/article?query=${query}`)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then((articles) => {
                    displaySearchResults(articles);
                })
                .catch((error) => {
                    console.error('Error fetching search results:', error);
                });
        } else {
            fetch(`/admin/search/article`)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then((articles) => {
                    displaySearchResults(articles);
                })
                .catch((error) => {
                    console.error('Error fetching search results:', error);
                });
        }
    });

    function displaySearchResults(articles) {
        let output = '';
        articles.forEach(article => {
            if (article.reviewer_int !== 0 && article.reviewer_ext !== 0 && article.published !== 'yes') {
                output += `
                    <tr>
                        <td>${article.title}</td>
                        <td>${article.author.name}</td>
                        <td>${article.internal.name}</td>
                        <td>${article.external.name}</td>
                        <td>${article.reviewerOpt ? article.reviewerOpt.name : 'Not assigned'}</td>
                        <td>
                            <a href="/admin/edit-article/${article.id}" class="btn btn-success btn-sm">Edit</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete(event, '/admin/articles/delete-article/${article.id}')">Delete</a>
                        </td>
                    </tr>
                `;
            }
        });

        document.querySelector('#articles tbody').innerHTML = output;
    }
</script>


@endsection