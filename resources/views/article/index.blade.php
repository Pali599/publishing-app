@section('title','My articles')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My articles') }}
        </h2>
    </x-slot>

    <div class="container px-4">

        <div class="card mt-4">
            <div class="card-body">
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
                                        <a href="{{ url('article/display-article/'.$item->id)}}" class="btn btn-success">Show</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('article/delete-article/'.$item->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>





            </div>
        </div>
    
    </div>
</x-app-layout>