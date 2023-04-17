@extends('layouts.homeWOI')

@section('title','Details')

@section('Headline','Details of the article')

@section('content')
<div class="container px-4 px-lg-5 mb-5 mt-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <h2>Journal</h2>
            <hr class="mb-4" />
            <!-- Journal preview-->
            <div class="post-preview">
                <a href="#!">
                    <h4>{{ $journal->title }}</h4>
                    <p class="post-meta">Latest version of the journal: {{ $journal->version }}</p>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{ url('/download/journal/' . $journal->file) }}">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-file-pdf fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </a>
            </div>
        </div>

        <div class="col-md-10 col-lg-8 col-xl-7 mt-5">
            <h2>Articles</h2>
            <hr class="mb-4" />
            <!-- Post preview-->
            @foreach($selected_articles as $articles)
                <div class="post-preview">
                    <h4>{{ $articles->title }}</h4>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{ url('/download/' . $articles->file) }}">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-file-pdf fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="post-meta">
                        Published by
                        <a href="#!">{{ $articles->author->name}}</a>
                        on {{ $articles->updated_at}}
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
            @endforeach
        </div>
    </div>
</div>

@endsection