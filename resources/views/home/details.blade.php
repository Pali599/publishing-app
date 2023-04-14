@extends('layouts.homeWOI')

@section('title','Details')

@section('Headline','Details of the article')

@section('content')
<article class="mb-5 mt-5">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7 border border-1 shadow-lg rounded">
                <h1 class="mt-2">{{ $article->title }}</h2>
                <hr class="my-2" />
                <h6>Author:</h6> 
                <p class="mt-2 fs-6">
                    {{ $article->author->name }} <br>
                    <i class="fs-6 fw-lighter">University: {{ $article->author->university }}</i><br>
                    <i class="fs-6 fw-lighter"> Faculty: {{ $article->author->faculty }} </i>
                </p>
                <h6>Published:</h6>
                <p class="mt-2 fs-6">{{ $article->updated_at->format('d-m-Y') }}</p>
                <h6>Category:</h6>
                <p class="mt-2 fs-6">{{ $article->category->name }}</p>
                <h6>Keywords:</h6>
                <p class="mt-2 fs-6">{{ $article->keywords }}</p>
                <h6>Abstract:</h6>
                <p class="mt-2 fs-6">{{ $article->description }}</p>
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="{{ url('/download/' . $article->file) }}">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-file-pdf fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</article>

@endsection