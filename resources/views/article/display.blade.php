@section('title','Edit articles')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My article') }}
        </h2>
    </x-slot>

    <div class="container px-4">
        <div class="mt-4">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $errors)
                            <div>{{$errors}}</div>
                        @endforeach
                    </div>
                @endif
                
                <div class="container mt-4">
                    <div class="row d-flex justify-content-evenly">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="mb-4">Article Details</h1>
                                </div>
                                <div class="card-body">
                                    <h2>Title: {{ $article->title }}</h2>
                                    <h3>Category: {{ $article->category->name }}</h3>
                                    <h4>Abstract:</h4>
                                    <p>{{ $article->description }}</p>
                                    <h4>Keywords:</h4>
                                    <p>{{ $article->keywords }}</p>
                                    <p>Download the file: <a href="{{ url('/download/' . $article->file) }}" class="btn btn-primary" target="_blank">Download File</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="mb-4">Review Details</h1>
                                </div>
                                <div class="card-body">
                                    <h2>Internal reviewer</h2>
                                    <h3>Result of the review:</h3>
                                    <h4>Comment:</h4>
                                    <p>Article description goes here...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-auto">
                        <a href="{{ url('article/edit-article/'.$article->id)}}" type="submit" class="btn btn-primary">Edit</a>
                    </div>
                    <div class="col-md-auto">
                        <a href="{{url()->previous()}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            
            </div>
        </div>
    </div>    
</x-app-layout>