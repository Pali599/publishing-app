@extends('layouts.master')

@section('title','Article')

@section('content')
<div class="container px-4 px-lg-5">
    <div class="mt-4 row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7 border border-1 shadow-lg rounded">
            <h1 class="mt-4">Edit article</h1>

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
                    <label for="">Author</label>
                    <p type="text" name="keywords" class="form-control">{{ $article->author->name }}</p>
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
                        <a href="{{ url('/download/' . $article->file) }}" class="form-control">{{ $article->file }}</a>
                    @else
                        <p>No file available</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="">Keywords</label>
                    <p type="text" name="keywords" class="form-control">{{ $article->keywords }}</p>
                </div>
                <div class="mb-3">
                    <label for="">Suggested reviewers</label>
                    <p type="text" class="form-control">
                        @foreach ($suggested_reviewers as $suggested)
                            {{ $suggested->name}},
                        @endforeach
                    </p>
                </div>
                <div class="mb-3">
                    <label for="">Unwanted reviewers</label>
                    <p type="text" class="form-control">
                        @foreach ($unwanted_reviewers as $unwanted)
                            {{ $unwanted->name}},
                        @endforeach
                    </p>
                </div>
                <div class="mb-3">
                    <label for="">Internal reviewer</label>
                    <select id="reviewer_int" class="form-select" type="text" name="reviewer_int" required autocomplete="title">
                        @foreach($user as $useritem)
                            @if($useritem->type->type == 'internal reviewer')
                            <option value="{{ $useritem->id }}" {{ $article->reviewer_int == $useritem->id ? 'selected' : '' }}>{{ $useritem->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">External Reviewer</label>
                    <select id="reviewer_ext" class="form-select" type="text" name="reviewer_ext" required autocomplete="title">
                        @foreach($user as $useritem)
                            @if($useritem->type->type == 'external reviewer')
                                <option value="{{ $useritem->id }}" {{ $article->reviewer_ext == $useritem->id ? 'selected' : '' }}>{{ $useritem->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Optional Reviewer</label>
                    <select id="reviewer_opt" class="form-select" type="text" name="reviewer_opt" required autocomplete="title">
                        @if($article->reviewer_opt == 0)
                            <option>None</option>
                        @endif
                        @foreach($user as $useritem)
                            <option value="{{ $useritem->id }}" {{ $article->reviewer_opt == $useritem->id ? 'selected' : '' }}>{{ $useritem->name }} -> {{ $useritem->type->type }}</option>
                        @endforeach
                        @if($article->reviewer_opt != 0)
                            <option>None</option>
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Publish</label>
                    <input type="checkbox" name="published">
                </div>
                <div class="row justify-content-md-center mb-3">
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