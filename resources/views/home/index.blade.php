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
                        <a href="{{ url('/home/details/' . $item->id) }}">
                            <h2 class="post-title">{{ $item->title }}</h2>
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