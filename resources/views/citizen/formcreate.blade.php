<body>

@extends('layouts.conquer2')
@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="../citizen/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>Create Citizen</li>
        </ul>
    </div>

    <form method="POST" action="{{route('citizen.store')}}">
        @csrf
        <div class="form-group">
            <label for="citizen_id">Citizen ID</label>
            <input type="text" class="form-control" id="citizen_id" name="citizen_id" aria-describedby="citizen_id"
                placeholder="Enter Citizen ID">
            <small id="citizen_id" class="form-text text-muted">Please write down Citizen ID here.</small>
        </div>
        <div class="form-group">
            <label for="name">Citizen Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                placeholder="Enter Citizen Name">
            <small id="name" class="form-text text-muted">Please write down Citizen Name here.</small>
        </div>
        <div class="form-group">
            <label for="name">Citizen Address   </label>
            <textarea class="form-control" id="address" name="address" rows="4" placeholder="Enter your address here" aria-describedby="address"></textarea>
            <small id="name" class="form-text text-muted">Please write down Citizen Address here.</small>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection
</body>