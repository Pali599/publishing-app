@section('title','My articles')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-7xl">
                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <table class="table table-boardered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Keywords</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($article as $item)
                                @if($item->created_by == auth()->user()->id)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->keywords }}</td>
                                        <td>
                                            <a href="{{ url('article/display-article/'.$item->id)}}">
                                                <x-primary-button class="ml-4">
                                                    {{ __('Show') }}
                                                </x-primary-button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('article/delete-article/'.$item->id)}}">
                                                <x-secondary-button class="ml-4">
                                                    {{ __('Delete') }}
                                                </x-secondary-button>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>