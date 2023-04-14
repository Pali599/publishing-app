@extends('layouts.master')

@section('title','Category')

@section('content')
<div class="container px-4 px-lg-5">
    <div class="mt-4 row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7 border border-1 shadow-lg rounded">
            <h1 class="mt-4">Edit category</h1>

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
                <div class="row justify-content-md-center mb-3">
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <div class="col-md-auto">
                        <a href="{{url('/admin/category')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        
        </div>

</div>

@endsection