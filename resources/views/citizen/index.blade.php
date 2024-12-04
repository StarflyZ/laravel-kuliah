@extends('layouts.conquer2')
@section('content')
    @if (session('status'))
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
    <a href="#modalCreate" data-toggle="modal" class="btn btn-info"> + New Citizen with modals</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Citizen</th>
                <th>Employee</th>
                <th>Telephone</th>
                @can('delete-permission', Auth::user())
                    <th>Action</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($citizen as $c)
                <tr id="tr_{{ $c->citizen_id }}">
                    <td>{{ $c->citizen_id }}</td>
                    <td id="td_name{{ $c->citizen_id }}">{{ $c->name }}</td>
                    <td id="td_address{{ $c->citizen_id }}">{{ $c->address }}</td>
                    <td id="td_telephone{{ $c->citizen_id }}">{{ $c->telephone }}</td>
                    <td>
                        @can('delete-permission', Auth::user())
                            <a class="btn btn-warning" href="{{ route('citizen.edit', $c->citizen_id) }}">Edit</a>

                            <a href="#modalEditA" class="btn btn-warning" data-toggle="modal"
                                onclick="getEditForm({{ $c->citizen_id }})">Edit Type A</a>

                            <a href="#modalEditB" class="btn btn-info" data-toggle="modal"
                                onclick="getEditFormB({{ $c->citizen_id }})">Edit Type B</a>

                            <form method="POST" action="{{ route('citizen.destroy', $c->citizen_id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="delete" class="btn btn-danger"
                                    onclick="return confirm('Are you sure to delete {{ $c->citizen_id }} - {{ $c->name }} ? ');">
                            </form>

                            <a href="#" class="btn btn-danger"
                                onclick="if(confirm('Are you sure to delete {{ $c->citizen_id }} - {{ $c->name }} ?')) deleteDataRemoveTR({{ $c->citizen_id }})">Delete
                                without Reload</a>
                        @endcan
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
                    <h4 class="modal-title">Add New Ctizen</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('citizen.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="citizen_id">Citizen ID</label>
                            <input type="text" class="form-control" id="citizen_id" name="citizen_id"
                                aria-describedby="citizen_id" placeholder="Enter Citizen ID">
                            <small id="citizen_id" class="form-text text-muted">Please write down Citizen ID here.</small>
                        </div>
                        <div class="form-group">
                            <label for="name">Citizen Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                                placeholder="Enter Citizen Name">
                            <small id="name" class="form-text text-muted">Please write down Citizen Name here.</small>
                        </div>
                        <div class="form-group">
                            <label for="address">Citizen Address </label>
                            <textarea class="form-control" id="address" name="address" rows="4" placeholder="Enter your address here"
                                aria-describedby="address"></textarea>
                            <small id="name" class="form-text text-muted">Please write down Citizen Address
                                here.</small>
                        </div>
                        <div class="form-group">
                            <label for="telephone">Citizen Telephone</label>
                            <input type="text" class="form-control" id="telephone" name="telephone"
                                aria-describedby="telephone" placeholder="Enter Citizen telephone">
                            <small id="telephone" class="form-text text-muted">Please write down Citizen telephone
                                here.</small>
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

    <div class="modal fade" id="modalEditB" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
            <div class="modal-content">
                <div class="modal-body" id="modalContentB">
                    {{-- You can put animated loading image here... --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        function getEditForm(citizen_id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('citizen.getEditForm') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': citizen_id
                },
                success: function(data) {
                    $('#modalContent').html(data.msg)
                }
            });
        }
    </script>

    <script>
        function getEditFormB(citizen_id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('citizen.getEditFormB') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': citizen_id
                },
                success: function(data) {
                    $('#modalContentB').html(data.msg)
                }
            });
        }

        function saveDataUpdateTD(citizen_id) {
            var name = $('#ename ').val();
            var address = $('#eaddress ').val();
            var telephone = $('#etelephone ').val();
            console.log(name); //debug->print to browser console
            $.ajax({
                type: 'POST',
                url: '{{ route('citizen.saveDataTD') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': citizen_id,
                    'name': name,
                    'address': address,
                    'telephone': telephone,
                },
                success: function(data) {
                    if (data.status == "oke") {
                        $('#td_name_' + citizen_id).html(name);
                        $('#td_address_' + citizen_id).html(address);
                        $('#td_telephone_' + citizen_id).html(telephone);
                        $('#modalEditB').modal('hide');
                    }
                }
            })
        }

        function deleteDataRemoveTR(citizen_id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('citizen.deleteData') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': citizen_id
                },
                success: function(data) {
                    if (data.status == "oke") {
                        $('#tr_' + citizen_id).remove();
                    }
                }
            });
        }
    </script>
@endsection
