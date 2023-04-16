@section('title','Add article')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add article') }}
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
                    
                    <form method="POST" action="{{ url('article/add') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div id="step-1">
                            <!-- Title -->
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <input id="title" class="block mt-1 w-full form-control" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                            </div>

                            <!-- Category -->
                            <div class="mt-4">
                                <x-input-label for="category" :value="__('Category')" />
                                <select id="category" class="block mt-1 w-full form-control" type="text" name="category_id" :value="old('category')" required autocomplete="title">
                                    @foreach($category as $cateitem)
                                        <option value="{{ $cateitem->id}}">{{ $cateitem->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Description -->
                            <div class="mt-4">
                                <x-input-label for="description" :value="__('Abstract')" />
                                <textarea id="description" class="block mt-1 w-full form-control" type="text" name="description" :value="old('description')" required autocomplete="title" ></textarea>
                            </div>

                            <!-- File -->
                            <div class="mt-4">
                                <x-input-label for="file" :value="__('File')" />
                                <input id="file" class="block mt-1 w-full form-control" type="file" name="file" :value="old('file')" required autocomplete="title" />
                            </div>
                            

                            <!-- Keywords-->
                            <div class="mt-4">
                                <x-input-label for="keywords" :value="__('Keywords')" />
                                <input id="keywords" class="block mt-1 w-full form-control" type="text" name="keywords" :value="old('keywords')" required autocomplete="title" />
                            </div>
                        </div>

                        <div id="step-2" style="display: none;">
                            <!-- Cover letter -->
                            <div class="mt-4">
                                <x-input-label for="letter" :value="__('Cover letter (optional)')" />
                                <input id="letter" class="block mt-1 w-full form-control" type="file" name="letter" :value="old('letter')" autocomplete="title" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="suggested_reviewers" :value="__('Suggested reviewers')" />
                                <select id="suggested_reviewers" class="block mt-1 w-full form-control" name="suggested_reviewers[]" multiple required>
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
                                    {{ __('Submit') }}
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