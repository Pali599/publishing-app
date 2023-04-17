@extends('layouts.master')

@section('title','Edit journal')

@section('content')
<div class="container px-4 px-lg-5">
    <div class="mt-4 row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7 border border-1 shadow-lg rounded">
            <h1 class="mt-4">Edit journal</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $errors)
                        <div>{{$errors}}</div>
                    @endforeach
                </div>
            @endif
            
            <form action="{{ url('admin/update-journal/'.$journal->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div id="step-1">
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $journal->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Version</label>
                        <input type="text" name="version" class="form-control" value="{{ $journal->version }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="">File</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Author</label>
                        <p type="text" name="keywords" class="form-control">{{ $journal->author->name }}</p>
                    </div>
                </div>

                <div id="step-2" style="display: none;">
                    <div class="mt-4">
                        <label for="">Choose articles</label>
                        <select id="articles" class="block mt-1 w-full form-control" name="articles[]" multiple>
                            @foreach($article as $item)
                                @if($item->published == 'yes')
                                    <option value="{{ $item->id}}">{{ $item->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <label for="">Selected articles:</label>
                        <div id="selected_articles" class="block my-2 w-full"></div>
                    </div>
                    <div class="mb-4">
                        <label for="">Publish</label>
                        <input type="checkbox" name="published">
                    </div>
                </div>

                <div class="row justify-content-md-center mb-3">
                    <div class="col-md-auto">
                        <button class="btn btn-primary" type="button" id="next-button">Next</button>
                    </div>
                    <div class="col-md-auto">
                        <button class="btn btn-primary" type="button" id="back-button" style="display: none;">Back</button>
                    </div>
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-primary" style="display: none;">Save</button>
                    </div>
                    <div class="col-md-auto">
                        <a href="{{url('/admin/journals')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/article-form.js') }}"></script>
<script src="{{ asset('assets/js/journal-form-articles.js') }}"></script>

@endsection