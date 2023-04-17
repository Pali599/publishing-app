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
        <div class="card-body">
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

@endsection