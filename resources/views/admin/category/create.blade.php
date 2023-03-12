@extends('layouts.master')

@section('title','Category')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Add category</h1>
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Add category </h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $errors)
                        <div>{{$errors}}</div>
                    @endforeach
                </div>
            @endif
            
            <form action="{{ url('admin/add-category') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="">Category name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Category description</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Category slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        
        </div>

</div>

@endsection