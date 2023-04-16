@section('title','Edit articles')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My articles') }}
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
                    
                    <form action="{{ url('article/update-article/'.$article->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div id="step-1">
                            <div class="mb-3">
                                <x-input-label for="title" :value="__('Title')" />
                                <input type="text" name="title" class="form-control" value="{{ $article->title }}" required>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="category" :value="__('Category')" />
                                <select id="category" class="form-select" type="text" name="category_id" :value="old('category')" required autocomplete="title">
                                    @foreach($category as $cateitem)
                                        <option value="{{ $cateitem->id }}" {{ $article->category_id == $cateitem->id ? 'selected' : '' }}>{{ $cateitem->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="description" :value="__('Abstract')" />
                                <input type="text" name="description" class="form-control" value="{{ $article->description }}" required>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="file" :value="__('File')" />
                                <input type="file" name="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <x-input-label for="keywords" :value="__('Keywords')" />
                                <input type="text" name="keywords" class="form-control" value='{{ $article->keywords }}' required>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="author" :value="__('Author')" />
                                <p type="text" name="author" class="form-control" >{{ $article->author->name }}</p>
                            </div>
                        </div>

                        <div id="step-2" style="display: none;">
                            <!-- Cover letter -->
                            <div class="mt-4">
                                <x-input-label for="letter" :value="__('Cover letter (optional)')" />
                                <x-text-input id="letter" class="block mt-1 w-full form-control" type="file" name="letter" :value="old('letter')" autocomplete="title" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="suggested_reviewers" :value="__('Suggested reviewers')" />
                                <select id="suggested_reviewers" class="block mt-1 w-full form-control" name="suggested_reviewers[]" multiple>
                                    @foreach($user as $useritem)
                                        @if($useritem->type_id != 3 && $useritem->role_id != 1)
                                            <option value="{{ $useritem->id}}">{{ $useritem->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="selected_reviewers" :value="__('Selected reviewers:')" />
                                <div id="selected_reviewers" class="block mt-1 w-full"></div>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="unwanted_reviewers" :value="__('Unwanted reviewers (optional)')" />
                                <select id="unwanted_reviewers" class="block mt-1 w-full form-control" name="unwanted_reviewers[]" multiple>
                                    @foreach($user as $useritem)
                                        @if($useritem->type_id != 3 && $useritem->role_id != 1)
                                            <option value="{{ $useritem->id}}">{{ $useritem->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="selected_unwanted_reviewers" :value="__('Selected unwanted reviewers:')" />
                                <div id="selected_unwanted_reviewers" class="block mt-1 w-full"></div>
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
                                    {{ __('Edit') }}
                                </x-primary-button>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ url('/article')}}">
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
    <script src="{{ asset('assets/js/article-form-reviewers.js') }}"></script>
</x-app-layout>