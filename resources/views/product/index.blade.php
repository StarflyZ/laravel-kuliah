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
<a href="#modalCreate" data-toggle="modal" class="btn btn-info"> + New Citizen with modals</a>
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

                <a href="#modalEditA" class="btn btn-info" data-toggle="modal"
                    onclick="getEditForm({{ $p->product_id }})">Edit Type A</a>

                <form method="POST" action="{{ route('product.destroy', $p->product_id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="delete" class="btn btn-danger"
                        onclick="return confirm('Are you sure to delete {{ $p->product_id }} - {{ $p->name }} ? ');">
                </form>

                <a href="#" class="btn btn-danger"
                    onclick="if(confirm('Are you sure to delete {{ $p->product_id }} - {{ $p->name }} ?')) deleteDataRemoveTR({{ $p->product_id }})">Delete
                    without Reload</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add New Product</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('product.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                            placeholder="Enter Product Name">
                        <small id="name" class="form-text text-muted">Please write down Product Name here.</small>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEditA" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide">
        <div class="modal-content">
            <div class="modal-body" id="modalContent">
                {{-- You can put animated loading image here... --}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    function getEditForm(product_id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('product.getEditForm') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': product_id
                },
                success: function(data) {
                    $('#modalContent').html(data.msg)
                }
            });
        }
    function deleteDataRemoveTR(product_id) {
        $.ajax({
            type: 'POST',
            url: '{{ route('product.deleteData') }}',
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'id': product_id
            },
            success: function(data) {
                if (data.status == "oke") {
                    $('#tr_' + product_id).remove();
                }
            }
        });
    }
</script>
@endsection