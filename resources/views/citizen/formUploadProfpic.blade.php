@extends('layouts.conquer2')
@section('content')
    <h3 class="page-title">Upload Profile Picture for Citizen {{ $citizen->name }}</h3>
    <div class="container">
        <form method="POST" enctype="multipart/form-data" action="{{ url('citizen/saveProfpic') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputType">Pilih Profile Picture</label>
                <input type="file" class="form-control" name="file_profpic" />
                <input type="hidden" name='citizen_id' value="{{ $citizen->citizen_id }}" />
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
@endsection
