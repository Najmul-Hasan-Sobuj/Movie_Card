@extends('layout.app')
@section('content')
    <div class="card mt-5 shadow">
        <div class="card-header">
            <div class="d-flex">
                <div class="p-2 flex-grow-1 ">
                    <h2>
                        <b>Add Movie</b>
                    </h2>
                </div>
                <div class="p-2">
                    <a href="{{ route('movie.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('movie.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row m-2">
                    <div class="col-md-4">
                        <label for="">Movie Name :</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="movieName" class="form-control" placeholder="Enter Movie Name">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-4">
                        <label for="">Movie Category :</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="categoryName" class="form-control" placeholder="Enter Category Name">
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
