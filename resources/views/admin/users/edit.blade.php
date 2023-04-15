@extends('layouts.master')

@section('title','Edit user')

@section('content')
<div class="container px-4 px-lg-5">
    <div class="mt-4 row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7 border border-1 shadow-lg rounded">
            <h1 class="mt-4">Edit user</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $errors)
                        <div>{{$errors}}</div>
                    @endforeach
                </div>
            @endif
            
            <form action="{{ url('admin/update-user/'.$user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="">User name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="{{$user->email}}">
                </div>
                <div class="mb-3">
                    <label for="">University</label>
                    <input type="text" name="university" value="{{ $user->university }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Faculty</label>
                    <input type="text" name="faculty" value="{{ $user->faculty }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Type</label>
                    <select id="type_id" class="form-select" type="text" name="type_id" required autocomplete="title">
                        @foreach($type as $typeitem)
                            <option value="{{ $typeitem->id }}" {{ $user->type_id == $typeitem->id ? 'selected' : '' }}>{{ $typeitem->type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Role</label>
                    <select id="role_id" class="form-select" type="text" name="role_id" required autocomplete="title">
                        @foreach($role as $roleitem)
                            <option value="{{ $roleitem->id }}" {{ $user->role_id == $roleitem->id ? 'selected' : '' }}>{{ $roleitem->role }}</option>
                        @endforeach
                    </select>
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

@endsection