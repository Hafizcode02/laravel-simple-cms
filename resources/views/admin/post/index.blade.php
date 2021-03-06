@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col mb-1">
            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session('message') }}
            </div>
            @endif

            @if (session()->has('del-message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session('del-message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Post - List
                    <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary float-right">Add New</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col" width="60">No</th>
                                {{-- <th scope="col" width="60">ID</th> --}}
                                <th scope="col">Title</th>
                                <th scope="col" width="200">Created By</th>
                                <th scope="col" width="130">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($posts as $index => $post)
                            <tr>
                                <td>{{ $index + $posts->firstItem() }}</td>
                                {{-- <td>{{ $category->id }}</td> --}}
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>
                                    <a href="{{ route('posts.edit', $post->id )}}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' =>
                                    'delete', 'style' => 'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix mt-4">
                        {{ $posts->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
