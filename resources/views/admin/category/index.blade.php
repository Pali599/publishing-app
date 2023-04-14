@extends('layouts.master')

@section('title','Category')

@section('content')
<div class="container px-4">

    <div class="card mt-4 border border-1 shadow-lg rounded">
        <div class="card-header">
            <h4>
                View Category <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end">Add category</a>
            </h4>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <table class="table table-boardered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category name</th>
                        <th>Description</th>
                        <th>Slug</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>
                            <a href="{{ url('admin/edit-category/'.$item->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="{{ url('admin/delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>





        </div>
    </div>

    
</div>

@endsection