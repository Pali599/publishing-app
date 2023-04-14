@extends('layouts.master')

@section('title','Create journal')

@section('content')
<div class="container px-4 px-lg-5">
    <div class="mt-4 row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7 border border-1 shadow-lg rounded">
            <h1 class="mt-4">Create journal</h1>

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
                <div class="row justify-content-md-center mb-3">
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <div class="col-md-auto">
                        <a href="{{url('/admin/journals')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        
        </div>

</div>

@endsection