@extends('layouts.master')

@section('title','Users')

@section('content')
<div class="container px-4">

    <div class="card mt-4 border border-1 shadow-lg rounded">
        <div class="card-header">
            <h4>
                Users <a href="{{ url('admin/add-user') }}" class="btn btn-primary btn-sm float-end">Add user</a>
            </h4>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <table class="table table-boardered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>University</th>
                        <th>Faculty</th>
                        <th>Type</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->university }}</td>
                        <td>{{ $item->faculty }}</td>
                        <td>{{ $item->type->type }}</td>
                        <td>{{ $item->role->role }}</td>
                        <td>
                            <a href="{{ url('admin/edit-user/'.$item->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="{{ url('admin/delete-user/'.$item->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>





        </div>
    </div>

    
</div>

@endsection