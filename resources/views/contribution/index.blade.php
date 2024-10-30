    @extends('layouts.conquer2')
    @section('content')
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
                        <td><a class="btn btn-primary" href="#detail-modal" data-toggle="modal"
                                onclick="getDetailData({{ $c->contribution_id }})">Show details</a></td>
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
        </script>
    @endsection
