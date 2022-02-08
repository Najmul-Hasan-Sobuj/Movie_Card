@extends('layout.app')
@section('content')
    <div class="card mt-5 shadow">
        <div class="card-header">
            <div class="d-flex">
                <div class="p-2 flex-grow-1 ">
                    <h2>
                        <b>Update Movie</b>
                    </h2>
                </div>
                <div class="p-2">
                    <a href="{{ route('movie.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('movie.update', [$dataEdit->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row m-2">
                    <div class="col-md-4">
                        <label for="">Movie Name :</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="movieName" value="{{ $dataEdit->movieName }}" class="form-control"
                            placeholder="Enter Movie Name">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-4">
                        <label for="">Movie Category :</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="categoryName" value="{{ $dataEdit->categoryName }}"
                            class="form-control" placeholder="Enter Category Name">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-4">
                        <label for="">Movie Poster :</label>
                    </div>
                    <div class="col-md-8">
                        <input type="file" name="moviePoster" class="form-control">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
