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
            <div class="alert alert-danger alert-dismissible">
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
                    Gallery - List
                    <a href="{{ route('galeries.create') }}" class="btn btn-sm btn-primary float-right">Add New</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col" width="60">No</th>
                                {{-- <th scope="col" width="60">ID</th> --}}
                                <th scope="col">Url</th>
                                <th scope="col" width="200">Created By</th>
                                <th scope="col" width="130">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($galeries as $index => $gallery)
                            <tr>
                                <td>{{ $index + $galeries->firstItem() }}</td>
                                {{-- <td>{{ $category->id }}</td> --}}
                                <td>{{ asset('storage/galleries/'. $gallery->image_url) }}</td>
                                <td>{{ $gallery->user->name }}</td>
                                <td>
                                    {{-- <a href="{{ route('galeries.edit', $gallery->id )}}"
                                    class="btn btn-sm btn-primary">Edit</a> --}}
                                    {!! Form::open(['route' => ['galeries.destroy', $gallery->id], 'method' =>
                                    'delete', 'style' => 'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" style="text-align: center;">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="clearfix mt-4">
                        {{ $galeries->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
