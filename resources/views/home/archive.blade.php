@extends('layouts.homeWOI')

@section('title','Details')

@section('Headline','Details of the article')

@section('content')
<div class="container px-4 px-lg-5 mb-5 mt-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <h2>Journals</h2>
            <hr class="mb-4" />
            <!-- Journal preview-->
            @foreach($journal as $item)
                <div class="post-preview">
                    <a href="{{ url('/home/archive/journal_details/' . $item->id) }}">
                        <h4>{{ $item->title }}</h4>
                        <p class="post-meta">Latest version of the journal: {{ $item->version }}</p>
                    </a>
                </div>
                <hr class="mb-4" />
            @endforeach
        </div>
    </div>
</div>

@endsection