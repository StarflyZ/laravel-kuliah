@extends('layouts.conquer2')
@section('content')
    @if (@session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="../citizen/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>Create Employee</li>
        </ul>
    </div>
    <h3>List of Product</h3>
    <a class="btn btn-primary" href="{{route('employee.create')}}"> + New Employee</a>
    <table class="table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employee as $e)
                <tr>
                    <td>{{ $e->username }}</td>
                    <td>{{ $e->email }}</td>
                    <td>{{ $e->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
