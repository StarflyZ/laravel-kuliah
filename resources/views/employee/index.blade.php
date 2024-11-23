@extends('layouts.conquer2')
@section('content')
@if (@session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="../employee/">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>Create Employee</li>
    </ul>
</div>
<h3>List of Product</h3>
<a class="btn btn-primary" href="{{route('employee.create')}}"> + New Employee</a>
<a href="#modalCreate" data-toggle="modal" class="btn btn-info"> + New Employee with modals</a>
<table class="table">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employee as $e)
        <tr>
            <td>{{ $e->username }}</td>
            <td>{{ $e->email }}</td>
            <td>{{ $e->name }}</td>
            <td>
                <a class="btn btn-warning" href="{{ route('employee.edit', $e->username) }}">Edit</a>

                <a href="#modalEditA" class="btn btn-warning" data-toggle="modal"
                    onclick="getEditForm('{{ $e->username }}')">Edit Type A</a>


                <form method="POST" action="{{ route('employee.destroy', $e->username) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="delete" class="btn btn-danger"
                        onclick="return confirm('Are you sure to delete {{ $e->username }} - {{ $e->name }} ? ');">
                </form>
                <a href="#" class="btn btn-danger"
                    onclick="if(confirm('Are you sure to delete {{ $e->username }} - {{ $e->name }} ?')) deleteDataRemoveTR('{{ $e->username }}')">Delete
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
                <h4 class="modal-title">Add New Employee</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('employee.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="username">Employee Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            aria-describedby="username" placeholder="Enter Username">
                        <small id="username" class="form-text text-muted">Please write down Username here.</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Employee Email </label>
                        <textarea class="form-control" id="email" name="email" rows="4"
                            placeholder="Enter your Email here" aria-describedby="email"></textarea>
                        <small id="email" class="form-text text-muted">Please write down Employee Email
                            here.</small>
                    </div>
                    <div class="form-group">
                        <label for="name">Employee Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                            placeholder="Enter Employee Name">
                        <small id="name" class="form-text text-muted">Please write down Employee Name here.</small>
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
    function getEditForm(username) {
            $.ajax({
                type: 'POST',
                url: '{{ route('employee.getEditForm') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'username': username
                },
                success: function(data) {
                    $('#modalContent').html(data.msg)
                }
            });
        }
        function deleteDataRemoveTR(username) {
            $.ajax({
                type: 'POST',
                url: '{{ route('employee.deleteData') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'username': username
                },
                success: function(data) {
                    if (data.status == "oke") {
                        $('#tr_' + username).remove();
                    }
                }
            });
        }
</script>
@endsection