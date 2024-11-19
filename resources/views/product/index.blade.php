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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $p)
                <tr>
                    <td>{{ $p->product_id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('product.edit', $p->product_id) }}">Edit</a>
                        <form method="POST" action="{{ route('product.destroy', $p->product_id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete"
                                class="btn btn-danger"
                              onclick="return confirm('Are you sure to delete {{ $p->product_id }} - {{ $p->name }} ? ');">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
