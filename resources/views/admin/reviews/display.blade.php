@extends('layouts.master')

@section('title','Article')

@section('content')
<div class="container px-4 px-lg-5">
    <div class="mt-4 row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7 border border-1 shadow-lg rounded">
            <h2 class="mt-4">Review details</h2>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h4 class="mt-4">Review from: {{ $review->reviewer->name }} <br> To article: {{ $review->article->title }}</h4>
                    </header>
                    <hr class="my-2" />
                    <h6>Result:</h6> 
                    <p class="mb-3 fs-6">{{ $review->result }}</p>
                    <h6>General Comment:</h6>
                    <p class="mb-3 fs-6">{{ $review->comment }}</p>
                    <h6>How to Improve:</h6>
                    <p class="mb-3 fs-6">{{ $review->improve }}</p>
                    <h6>Comment to Author:</h6>
                    <p class="mb-3 fs-6">{{ $review->comment_author }}</p>
                    <h6>Grades to Properties:</h6>
                    <p class="mb-3 fs-6">(1 = Excellent) (2 = Good) (3 = Fair) (4 = Poor) (5 = Bad)</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Property</th>
                                <th scope="col">Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Originality</td>
                                <td>{{ $review->originality }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Contribution to the Field</td>
                                <td>{{ $review->contribution }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Technical Quality</td>
                                <td>{{ $review->technical_quality }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Clarity of Presentation</td>
                                <td>{{ $review->presentation_clarity }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Depth of Research</td>
                                <td>{{ $review->research_depth }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="{{ url('/generate-pdf/' . $review->id) }}">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-file-pdf fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="row justify-content-md-end mb-3">
                        <div class="col-md-auto">
                            <a href="{{ url('/admin/reviews') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    <div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection