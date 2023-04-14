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
                    
                    <form method="POST" action="{{ url('review/update-review/'.$review->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <p id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title">{{ $review->article->title }}</p>
                        </div>

                        <!-- Result -->
                        <div class="mt-4">
                            <x-input-label for="result" :value="__('Result')" />
                            <select id="result" class="block mt-1 w-full" type="text" name="result" :value="old('result')" required autocomplete="result">
                                    <option value="rejected">Reject - the article doesn't meet required quality and accuracy.</option>
                                    <option value="returned">Return - the article needs some improvements </option>
                                    <option value="accepted">Accept - the article meets all the requirements and is ready to be published.</option>
                            </select>
                        </div>

                        <!-- Comment -->
                        <div class="mt-4">
                            <x-input-label for="comment" :value="__('comment')" />
                            <textarea id="comment" class="block mt-1 w-full" type="text" name="comment" :value="old('comment')" required autocomplete="result" >{{ $review->comment }}</textarea>
                        </div>
                        
                        <div class="d-flex justify-content-center">
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-4">
                                    {{ __('Add') }}
                                </x-primary-button>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ url('review/display-review/'.$review->article->id)}}">
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
</x-app-layout>