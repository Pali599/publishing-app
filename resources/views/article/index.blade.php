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
                            <th>Abstract</th>
                            <th>File</th>
                            <th>Keywords</th>
                            <th>Author</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($article as $item)
                            @if($item->created_by == auth()->user()->id)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->file }}</td>
                                    <td>{{ $item->keywords }}</td>
                                    <td>{{ $item->author->name}}</td>
                                    <td>
                                        <a href="{{ url('admin/edit-article/'.$item->id)}}" class="btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/articles/delete-article/'.$item->id)}}" class="btn btn-danger">Delete</a>
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