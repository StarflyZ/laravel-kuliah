@extends('layouts.conquer2')
@section('content')
    @if (@session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>Create Citizen</li>
        </ul>
    </div>
    <h3>List of Citizen</h3>
    <a class="btn btn-primary" href="{{ route('citizen.create') }}"> + New Citizen</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Citizen</th>
                <th>Employee</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($citizen as $c)
                <tr>
                    <td>{{ $c->citizen_id }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->address }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('citizen.edit', $c->citizen_id) }}">Edit</a>
                        <form method="POST" action="{{ route('citizen.destroy', $c->citizen_id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete"
                                class="btn btn-danger"
                              onclick="return confirm('Are you sure to delete {{ $c->citizen_id }} - {{ $c->name }} ? ');">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
