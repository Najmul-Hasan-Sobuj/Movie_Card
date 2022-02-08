@extends('layout.app')
@section('title')
    All Movie Page
@endsection
@section('content')
    <div class="card mt-5 shadow">
        <div class="card-header">
            <div class="d-flex">
                <div class="p-2 flex-grow-1 ">
                    <h2>
                        <b>Movies</b>
                    </h2>
                </div>
                <div class="p-2">
                    <a href="{{ route('movie.create') }}" class="btn btn-success">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>CATEGORY</th>
                        <th>POSTER</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data)
                        @foreach ($data as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->movieName }}</td>
                                <td>{{ $value->categoryName }}</td>
                                <td><img class="img-responsive w-25 h-25 img-thumbnail img-fluid"
                                        src="{{ asset('uploads/' . $value->moviePoster) }}" alt=""></td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-primary" href="{{ route('movie.edit', [$value->id]) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="{{ route('movie.destroy', [$value->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
