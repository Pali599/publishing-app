@section('title','Review article')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles assigned to me') }}
        </h2>
    </x-slot>


    <div class="py-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <div class="d-flex justify-content-center">
                            <div class="flex items-center justify-end">
                                <h1 class="my-2">{{ $article->title }}</h2>
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
                    <header>
                        <div class="d-flex justify-content-center">
                            <div class="flex items-center justify-end">
                                <h1 class="my-2">My review</h2>
                                @if($review)
                                    <a href="{{ url('review/edit-review/'.$review->id)}}">
                                        <x-primary-button class="ml-4">
                                        {{ __('Edit review') }}
                                        </x-primary-button>
                                    </a>
                                @else
                                    <a href="{{ url('review/add-review/'.$article->id)}}">
                                        <x-primary-button class="ml-4">
                                        {{ __('Review') }}
                                        </x-primary-button>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </header>
                    <hr class="my-2" />
                    @if($review)
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
                                    <th scope="col"></th>
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
                    @else
                        <p class="mb-3 fs-6">There is no review to display.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>  
</x-app-layout>