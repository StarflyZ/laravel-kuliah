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
            <li>Create Product</li>
        </ul>
    </div>
    <h3>List of Product</h3>
    <a class="btn btn-primary" href="{{route('product.create')}}"> + New Product</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $p)
                <tr>
                    <td>{{ $p->product_id }}</td>
                    <td>{{ $p->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
