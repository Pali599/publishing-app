@extends('layouts.master')

@section('title','Admin Dashboard')

@section('content')
<div class="container px-4">

    <div class="card mt-4 border border-1 shadow-lg rounded ">
        <div class="card-header">
            <h4>
                Journals <a href="{{ url('/admin/add-journal') }}" class="btn btn-primary btn-sm float-end">Add journal</a>
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
                        <th>Version</th>
                        <th>File</th>
                        <th>Created by</th>
                        <th>Published</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($journal as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->version }}</td>
                            <td>
                                <a href="{{ url('/download/journal/' . $item->file) }}">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-file-pdf fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </td>
                            <td>{{ $item->author->name }}</td>
                            <td>{{ $item->published }}</td>
                            <td>
                                <a href="{{ url('admin/edit-journal/'.$item->id)}}" class="btn btn-success btn-sm">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('admin/delete-journal/'.$item->id)}}" class="btn btn-danger btn-sm" onclick="confirmDelete(event, '{{ url('admin/delete-journal/'.$item->id) }}')">Delete</a>
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