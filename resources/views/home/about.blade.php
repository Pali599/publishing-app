@extends('layouts.home')

@section('title','EasyPublish')

@section('content')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">Man must explore, and this is exploration at its greatest</h2>
                    <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on September 24, 2022
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Post preview-->
            <div class="post-preview">
                <a href="post.html"><h2 class="post-title">I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.</h2></a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on September 18, 2022
                </p>
            </div>
        </div>
    </div>
</div>

@endsection