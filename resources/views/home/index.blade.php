@extends('layouts.home')

@section('title','EasyPublish')

@section('Headline','Welcome in the future')

@section('content')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <h2>Journal</h2>
            <hr class="mb-4" />
            <!-- Journal preview-->
            @if($journal)
                <div class="post-preview">
                    <a href="{{ url('/home/details/' . $item->id) }}">
                        <h4>{{ $journal->title }}</h4>
                        <p class="post-meta">Version of the latest journal: {{ $journal->version }}</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{ url('/download/' . $item->file) }}">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-file-pdf fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </a>
                </div>
            @else
                <p class="post-meta">
                    Journal is being prepared. Stay tuned!
                </p>
            @endif
        </div>

        <div class="col-md-10 col-lg-8 col-xl-7">
            <h2>Articles</h2>
            <hr class="mb-4" />
            <!-- Post preview-->
            @foreach($article as $item)
                @if($item->published == "yes")
                    <div class="post-preview">
                        <a href="{{ url('/home/details/' . $item->id) }}">
                            <h4>{{ $item->title }}</h4>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="{{ url('/download/' . $item->file) }}">
                                        <span class="fa-stack fa-lg">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-file-pdf fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </a>
                        <p class="post-meta">
                            Published by
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