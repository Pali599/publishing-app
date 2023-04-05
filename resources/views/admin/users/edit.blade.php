@extends('layouts.master')

@section('title','Edit user')

@section('content')
<div class="container px-4">
    <h1 class="mt-4">Edit user</h1>
    <div class="card mt-4">
        <div class="card-body">

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
                    <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Departure</label>
                    <input type="text" name="departure" value="{{ $user->departure }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Reviewer type</label>
                    <select id="reviewer" class="form-select" type="text" name="type" required autocomplete="title">
                        <option value="internal">Internal Reviewer</option>
                        <option value="external">External Reviewer</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Role</label>
                    <select id="role" class="form-select" type="text" name="role" required autocomplete="title">
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                    </select>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <div class="col-md-auto">
                        <a href="{{url()->previous()}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        
        </div>

</div>

@endsection