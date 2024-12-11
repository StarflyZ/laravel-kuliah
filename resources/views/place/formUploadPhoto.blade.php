@extends('layouts.conquer2')
@section('content')
    <h3 class="page-title">Upload Photo for Place</h3>
    <div class="container">
        <form method="POST" enctype="multipart/form-data" action="{{ url('place/savePhoto') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputType">Pilih Photo</label>
                <input type="file" class="form-control" name="file_photo" />
                <input type="hidden" name='id' value="{{ $place->id }}" />
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
@endsection
