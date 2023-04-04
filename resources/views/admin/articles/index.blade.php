@extends('layouts.master')

@section('title','Admin Dashboard')

@section('content')
<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4>
                View Articles <a href="{{ url('article/add') }}" class="btn btn-primary btn-sm float-end">Add article</a>
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
                        <th>Category</th>
                        <th>Description</th>
                        <th>File</th>
                        <th>Keywords</th>
                        <th>Author</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($article as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->file }}</td>
                        <td>{{ $item->keywords }}</td>
                        <td>{{ $item->author->name}}</td>
                        <td>
                            <a href="{{ url('admin/edit-category/'.$item->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="{{ url('admin/articles/delete-article/'.$item->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>





        </div>
    </div>

    
</div>

@endsection