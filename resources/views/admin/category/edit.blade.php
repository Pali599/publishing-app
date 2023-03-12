@extends('layouts.master')

@section('title','Category')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit category</h1>
    <div class="card mt-4">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $errors)
                        <div>{{$errors}}</div>
                    @endforeach
                </div>
            @endif
            
            <form action="{{ url('admin/update-category/'.$category->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="">Category name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Category description</label>
                    <input type="text" name="description" value="{{ $category->description }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Category slug</label>
                    <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        
        </div>

</div>

@endsection