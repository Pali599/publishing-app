@extends('layouts.master')

@section('title','Category')

@section('content')
<div class="container px-4 px-lg-5">
    <div class="mt-4 row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7 border border-1 shadow-lg rounded">
            <h1 class="mt-4">Create user</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $errors)
                        <div>{{$errors}}</div>
                    @endforeach
                </div>
            @endif
            
            <form action="{{ url('admin/add-user') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="">User name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">University</label>
                    <input type="text" name="university" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Faculty</label>
                    <input type="text" name="faculty" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Reviewer type</label>
                    <select id="type_id" class="form-select" type="text" name="type_id" required autocomplete="title">
                            <option value="1">Internal</option>
                            <option value="2">External</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Role</label>
                    <select id="role_id" class="form-select" type="text" name="role_id" required autocomplete="title">
                        <option value="2">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="row justify-content-md-center mb-3">
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <div class="col-md-auto">
                        <a href="{{url('/admin/users')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        
        </div>
    </div>
</div>

@endsection