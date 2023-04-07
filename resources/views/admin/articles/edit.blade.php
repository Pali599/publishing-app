@extends('layouts.master')

@section('title','Article')

@section('content')
<div class="container px-4">
    <h1 class="mt-4">Edit article</h1>
    <div class="card mt-4">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $errors)
                        <div>{{$errors}}</div>
                    @endforeach
                </div>
            @endif
            
            <form action="{{ url('admin/update-article/'.$article->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="">Title</label>
                    <p type="text" name="title" class="form-control">{{ $article->title }}</p>
                </div>
                <div class="mb-3">
                    <label for="">Category</label>
                    <select id="category" class="form-select" type="text" name="category_id" :value="old('category')" required autocomplete="title">
                        @foreach($category as $cateitem)
                            <option value="{{ $cateitem->id }}" {{ $article->category_id == $cateitem->id ? 'selected' : '' }}>{{ $cateitem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Abstract</label>
                    <p type="text" name="description" class="form-control">{{ $article->description }}</p>
                </div>
                <div class="mb-3">
                    <label for="">File</label>
                    @if($article->file)
                        <a href="uploads/article/" download="{{ $article->file }}" class="form-control">{{ $article->file }}</a>
                    @else
                        <p>No file available</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="">Keywords</label>
                    <p type="text" name="keywords" class="form-control">{{ $article->keywords }}</p>
                </div>
                <div class="mb-3">
                    <label for="">Author</label>
                    <p type="text" name="keywords" class="form-control">{{ $article->author->name }}</p>
                </div>
                <div class="mb-3">
                    <label for="">Intern reviewer</label>
                    <select id="reviewer_int" class="form-select" type="text" name="reviewer_int" required autocomplete="title">
                        @foreach($user as $useritem)
                            @if($useritem->type == 'internal')
                                <option value="{{ $useritem->id }}">{{ $useritem->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Extern Reviewer</label>
                    <select id="reviewer_ext" class="form-select" type="text" name="reviewer_ext" required autocomplete="title">
                        @foreach($user as $useritem)
                            @if($useritem->type == 'external')
                                <option value="{{ $useritem->id }}">{{ $useritem->name }}</option>
                            @endif
                        @endforeach
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
</div>

@endsection