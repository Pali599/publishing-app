@extends('layouts.master')

@section('title','Admin Dashboard')

@section('content')
<div class="container-fluid px-4">

    <div class="card mt-4">
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
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($review as $item)
                            <tr>
                                <td>{{ $item->article->title }}</td>
                                <td>{{ $item->reviewer->name }}</td>
                                <td>{{ $item->reviewer->type }}</td>
                                <td>{{ $item->result }}</td>
                                <td>{{ $item->comment }}</td>
                                <td>
                                    <a href="{{ url('admin/edit-article/'.$item->article_id)}}" class="btn btn-success">Edit article</a>
                                </td>
                                <td>
                                    <a href="{{ url('admin/articles/delete-article/'.$item->article->id)}}" class="btn btn-danger">Delete article</a>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>





        </div>
    </div>

    
</div>

@endsection