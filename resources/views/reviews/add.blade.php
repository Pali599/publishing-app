@section('title','Add review')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add review') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $errors)
                                <div>{{$errors}}</div>
                            @endforeach
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ url('review/add-review/'.$article->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div id="step-1">
                            <!-- Title -->
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <p id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title">{{ $article->title }}</p>
                            </div>

                            <!-- Comment -->
                            <div class="mt-4">
                                <x-input-label for="comment" :value="__('General comments')" />
                                <textarea id="comment" class="block mt-1 w-full form-control" type="text" name="comment" :value="old('comment')" required autocomplete="result" ></textarea>
                            </div>

                            <!-- how to improve -->
                            <div class="mt-4">
                                <x-input-label for="improve" :value="__('How to improve')" />
                                <textarea id="improve" class="block mt-1 w-full form-control" type="text" name="improve" :value="old('improve')" autocomplete="result" ></textarea>
                            </div>

                            <!-- Comments to the author -->
                            <div class="mt-4">
                                <x-input-label for="comment_author" :value="__('Comments to the author')" />
                                <textarea id="comment_author" class="block mt-1 w-full form-control" type="text" name="comment_author" :value="old('comment_author')" autocomplete="result" ></textarea>
                            </div>
                        </div>

                        <div id="step-2" style="display: none;">
                            <div class="mt-4">
                                <x-input-label for="" :value="__('Please rate the following: (1 = Excellent) (2 = Good) (3 = Fair) (4 = Poor) (5 = Bad)')" />
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">1</th>
                                            <th scope="col">2</th>
                                            <th scope="col">3</th>
                                            <th scope="col">4</th>
                                            <th scope="col">5</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">Originality</td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <td><input type="radio" name="originality" value="{{ $i }}" onclick="toggleRadio(this)"></td>
                                            @endfor
                                        </tr>
                                        <tr>
                                            <td scope="row">Contribution to the Field</td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <td><input type="radio" name="contribution" value="{{ $i }}" onclick="toggleRadio(this)"></td>
                                            @endfor
                                        </tr>
                                        <tr>
                                            <td scope="row">Technical Quality</td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <td><input type="radio" name="technical_quality" value="{{ $i }}" onclick="toggleRadio(this)"></td>
                                            @endfor
                                        </tr>
                                        <tr>
                                            <td scope="row">Clarity of Presentation</td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <td><input type="radio" name="presentation_clarity" value="{{ $i }}" onclick="toggleRadio(this)"></td>
                                            @endfor
                                        </tr>
                                        <tr>
                                            <td scope="row">Depth of Research</td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <td><input type="radio" name="research_depth" value="{{ $i }}" onclick="toggleRadio(this)"></td>
                                            @endfor
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        
                            <!-- Result -->
                            <div class="mt-4">
                                <x-input-label for="result" :value="__('Result')" />
                                <select id="result" class="block mt-1 w-full" type="text" name="result" :value="old('result')" required autocomplete="result">
                                    <option value="accepted">Accept as it is</option>  
                                    <option value="returned - minor revision">Return - Requires Minor Revision</option>
                                    <option value="returned - major revision">Return - Requires Major Revision</option>
                                    <option value="rejected">Reject</option>
                                </select>
                            </div>
                        </div>


                        
                        <div class="d-flex justify-content-center">
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-4" type="button" id="next-button">
                                    {{ __('Next') }}
                                </x-primary-button>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-4" type="button" id="back-button" style="display: none;">
                                    {{ __('Back') }}
                                </x-primary-button>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-4" type="submit" style="display: none;">
                                    {{ __('Submit') }}
                                </x-primary-button>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ url('/review')}}">
                                    <x-secondary-button class="ml-4">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/article-form.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/review-form.js') }}"></script>
</x-app-layout>