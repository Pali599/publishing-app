@extends('layouts.home')

@section('title','EasyPublish')

@section('Headline','Welcome in the future')

@section('content')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            @foreach($article as $item)
                @if($item->published == "yes")
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">{{ $item->title }}</h2>
                            <button class="btn btn-dark btn-sm rounded-pill" target="_blank"><a href="{{ url('/download/' . $item->file) }}" class="text-white">PDF</a></button>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">{{ $item->author->name}}</a>
                            on {{ $item->updated_at}}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @endif
            @endforeach
        </div>
    </div>
</div>

@endsection