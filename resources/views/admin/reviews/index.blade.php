@extends('layouts.master')

@section('title','Admin Dashboard')

@section('content')
<div class="container px-4">

    <div class="card mt-4 border border-1 shadow-lg rounded ">
        <div class="card-header">
            <h4>
                View reviews
            </h4>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <table class="table table-boardered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Reviewer</th>
                        <th>Type</th>
                        <th>Result</th>
                        <th>Comment</th>
                        <th>Published</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($review as $item)
                            <tr>
                                <td>{{ $item->article->title }}</td>
                                <td>{{ $item->reviewer->name }}</td>
                                <td>{{ $item->reviewer->type->type }}</td>
                                <td>{{ $item->result }}</td>
                                <td>{{ $item->comment }}</td>
                                <td>{{ $item->article->published }}</td>
                                <td>
                                    <a href="{{ url('admin/display-review/'.$item->id)}}" class="btn btn-success">View review</a>
                                </td>
                                <td>
                                    <a href="{{ url('admin/edit-article/'.$item->article_id)}}" class="btn btn-success">Edit article</a>
                                </td>
                                <td>
                                    <a href="{{ url('admin/articles/delete-article/'.$item->article->id)}}" class="btn btn-danger" onclick="confirmDelete(event, '{{ url('admin/articles/delete-article/'.$item->article->id) }}')">Delete article</a>
                                </td>
                                <td>
                                    <a href="{{ url('admin/delete-review/'.$item->id)}}" class="btn btn-danger" onclick="confirmDelete(event, '{{ url('admin/delete-review/'.$item->id) }}')">Delete review</a>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>





        </div>
    </div>

    
</div>

<script src="{{ asset('assets/js/delete-warning.js') }}"></script>

@endsection