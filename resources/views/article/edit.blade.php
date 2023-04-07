@section('title','Edit articles')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My articles') }}
        </h2>
    </x-slot>

    <div class="container px-4">
        <h1 class="mt-4">Edit your article</h1>
        <div class="card mt-4">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $errors)
                            <div>{{$errors}}</div>
                        @endforeach
                    </div>
                @endif
                
                <form action="{{ url('article/update-article/'.$article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $article->title }}">
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
                        <input type="text" name="description" class="form-control" value="{{ $article->description }}">
                    </div>
                    <div class="mb-3">
                        <label for="">File</label>
                            <input type="file" name="file" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Keywords</label>
                        <input type="text" name="keywords" class="form-control" value='{{ $article->keywords }}'>
                    </div>
                    <div class="mb-3">
                        <label for="">Author</label>
                        <p type="text" name="keywords" class="form-control" value="">{{ $article->author->name }}</p>
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
</x-app-layout>