@extends('layouts.conquer2')
@section('content')
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
<h3>List of Contribution</h3>
<a class="btn btn-primary" href="{{route('contribution.create')}}"> + New Contribution</a>
<a href="#modalCreate" data-toggle="modal" class="btn btn-info"> + New Contribution with modals</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Citizen</th>
            <th>Employee</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contributions as $c)
        <tr>
            <td>{{ $c->contribution_id }}</td>
            <td>{{ $c->citizen->name }}</td>
            <td>{{ $c->employee->name }}</td>
            <td>{{ $c->contribution_date }}</td>
            <td>
                <a class="btn btn-primary" href="#detail-modal" data-toggle="modal"
                    onclick="getDetailData({{ $c->contribution_id }})">Show details</a>
                <a class="btn btn-warning" href="{{ route('contribution.edit', $c->contribution_id) }}">Edit</a>

                <a href="#modalEditA" class="btn btn-warning" data-toggle="modal"
                    onclick="getEditForm('{{ $c->contribution_id }}')">Edit Type A</a>

                <form method="POST" action="{{ route('contribution.destroy', $c->contribution_id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="delete" class="btn btn-danger"
                        onclick="return confirm('Are you sure to delete {{ $c->contribution_id }} - {{ $c->username }} ? ');">
                </form>
                <a href="#" class="btn btn-danger"
                    onclick="if(confirm('Are you sure to delete {{ $c->contribution_id }} - {{ $c->username }} ?')) deleteDataRemoveTR('{{ $c->contribution_id }}')">Delete
                    without Reload</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="detail-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Contribution</h4>
            </div>
            <div class="modal-body" id="msg"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add New Contribution</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('contribution.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="citizen_id">Citizen</label>
                        <select name="citizen_id" id="citizen_id" class="form-control" required>
                            <option value="">Select Citizen</option>
                            @foreach($citizens as $c)
                            <option value="{{ $c->citizen_id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="username">Employee</label>
                        <select name="username" id="username" class="form-control" required>
                            <option value="">Select Employee</option>
                            @foreach($employees as $e)
                            <option value="{{ $e->username }}">{{ $e->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Products</label>
                        <div id="product-fields">
                            <div class="product-field">
                                <select name="products[0][id]" class="form-control" required>
                                    <option value="">Select Product</option>
                                    @foreach($products as $p)
                                    <option value="{{ $p->product_id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                                <input type="number" name="products[0][amount]" class="form-control"
                                    placeholder="Amount" required min="1">
                            </div>
                        </div>
                        <a href="{{route('product.create')}}">+ New Product</a>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
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
    function getDetailData(id) {
                $.ajax({
                    type: "GET",
                    url: "/contribution/" + id,
                    success: function(data) {
                        $("#msg").html(data);
                    }
                })
            }
    function getEditForm(contribution_id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('contribution.getEditForm') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': contribution_id
                },
                success: function(data) {
                    $('#modalContent').html(data.msg)
                }
            });
        }
        function deleteDataRemoveTR(contribution_id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('contribution.deleteData') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': contribution_id
                },
                success: function(data) {
                    if (data.status == "oke") {
                        $('#tr_' + contribution_id).remove();
                    }
                }
            });
        }
</script>
@endsection