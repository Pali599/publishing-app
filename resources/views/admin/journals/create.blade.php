@extends('layouts.master')

@section('title','Add journal')

@section('content')
<div class="container px-4">
    <h1 class="mt-4">Add Journal</h1>
    <div class="card mt-4">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $errors)
                        <div>{{$errors}}</div>
                    @endforeach
                </div>
            @endif
            
            <form action="{{ url('admin/add-journal') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Journal title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Journal version</label>
                    <input type="text" name="version" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Journal file</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        
        </div>

</div>

@endsection