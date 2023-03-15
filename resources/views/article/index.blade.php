@section('title','My articles')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        Your articles
    </div>
</x-app-layout>