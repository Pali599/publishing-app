@section('title','View article')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <div class="d-flex justify-content-center">
                            <div class="flex items-center justify-end">
                                <h1 class="my-2">{{ $article->title }}</h2>
                                <a href="{{ url('article/edit-article/'.$article->id)}}">
                                    <x-primary-button class="ml-4">
                                    {{ __('Edit') }}
                                    </x-primary-button>
                                </a>
                            </div>
                        </div>
                    </header>
                    <hr class="my-2" />
                    <h6>Author:</h6> 
                    <p class="mb-3 fs-6">
                        {{ $article->author->name }} <br>
                        <i class="fs-6 fw-lighter">University: {{ $article->author->university }}</i><br>
                        <i class="fs-6 fw-lighter"> Faculty: {{ $article->author->faculty }} </i>
                    </p>
                    <h6>Category:</h6>
                    <p class="mb-3 fs-6">{{ $article->category->name }}</p>
                    <h6>Keywords:</h6>
                    <p class="mb-3 fs-6">{{ $article->keywords }}</p>
                    <h6>Abstract:</h6>
                    <p class="mb-3 fs-6">{{ $article->description }}</p>
                    <h6>Cover letter:</h6>
                    <a href="{{ url('/download/letter/' . $article->letter) }}">
                        <x-primary-button class="mb-2">
                            {{ __('Download') }}
                        </x-primary-button>
                    </a>
                    <h6>Suggested reviewers:</h6>
                    <p class="mb-3 fs-6">
                        @foreach ($suggested_reviewers as $suggested)
                            {{ $suggested->name}},
                        @endforeach
                    </p>
                    <h6>Unwanted reviewers:</h6>
                    <p class="mb-3 fs-6">
                        @foreach ($unwanted_reviewers as $unwanted)
                            {{ $unwanted->name}},
                        @endforeach
                    </p>
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

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h1 class="my-2">Review from an internal reviewer</h2>
                    <hr class="my-2" />
                    @if($review_int)
                        <h6>Result:</h6> 
                        <p class="mb-3 fs-6">{{ $review_int->result }}</p>
                        <h6>General Comment:</h6>
                        <p class="mb-3 fs-6">{{ $review_int->comment }}</p>
                        <h6>How to Improve:</h6>
                        <p class="mb-3 fs-6">{{ $review_int->improve }}</p>
                        <h6>Comment to Author:</h6>
                        <p class="mb-3 fs-6">{{ $review_int->comment_author }}</p>
                        <h6>Grades to Properties:</h6>
                        <p class="mb-3 fs-6">(1 = Excellent) (2 = Good) (3 = Fair) (4 = Poor) (5 = Bad)</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Originality</td>
                                    <td>{{ $review_int->originality }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Contribution to the Field</td>
                                    <td>{{ $review_int->contribution }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Technical Quality</td>
                                    <td>{{ $review_int->technical_quality }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Clarity of Presentation</td>
                                    <td>{{ $review_int->presentation_clarity }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Depth of Research</td>
                                    <td>{{ $review_int->research_depth }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <p class="mb-3 fs-6">No review to this article so far.</p>
                    @endif
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h1 class="my-2">Review from an external reviewer</h2>
                    <hr class="my-2" />
                    @if($review_ext)
                        <h6>Result:</h6> 
                        <p class="mb-3 fs-6">{{ $review_ext->result }}</p>
                        <h6>General Comment:</h6>
                        <p class="mb-3 fs-6">{{ $review_ext->comment }}</p>
                        <h6>How to Improve:</h6>
                        <p class="mb-3 fs-6">{{ $review_ext->improve }}</p>
                        <h6>Comment to Author:</h6>
                        <p class="mb-3 fs-6">{{ $review_ext->comment_author }}</p>
                        <h6>Grades to Properties:</h6>
                        <p class="mb-3 fs-6">(1 = Excellent) (2 = Good) (3 = Fair) (4 = Poor) (5 = Bad)</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Originality</td>
                                    <td>{{ $review_ext->originality }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Contribution to the Field</td>
                                    <td>{{ $review_ext->contribution }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Technical Quality</td>
                                    <td>{{ $review_ext->technical_quality }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Clarity of Presentation</td>
                                    <td>{{ $review_ext->presentation_clarity }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Depth of Research</td>
                                    <td>{{ $review_ext->research_depth }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <p class="mb-3 fs-6">No review to this article so far.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>    
</x-app-layout>