@extends('layouts.conquer2')
@section('content')
    <div class="modal fade" id="disclaimer" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">DISCLAIMER</h4>
                </div>
                <div class="modal-body">
                    Pictures shown are for illustration purpose only. Actual product may vary due to product enhancement.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <a class="btn btn-warning" data-toggle="modal" href="#disclaimer">Warning</a>
    <div id="showinfo"></div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Pengaduan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($places as $place)
                <tr>
                    <td>{{ $place->name }}</td>
                    <td>{{ $place->address }}</td>
                    <td>
                        {{-- foreach Pengaduan --}}
                        @foreach ($place->tickets as $item)
                            <ul>
                                <li>{{ $item->report }}</li>
                            </ul>
                        @endforeach
                        <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#myModal'
                            onclick='showTickets({{ $place->id }})'>Detail</a>
                    </td>
                    <td>
                        <a class="btn btn-info" href="#detail_{{ $place->id }}"
                            data-toggle="modal">{{ $place->name }}</a>
                        <div class="modal fade" id="detail_{{ $place->id }}" tabindex="-1" role="basic"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ $place->name }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('images/'.$place->image) }}" height='200px' />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                </tr>
            @endforeach
            <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog modal-wide">
                    <div class="modal-content" id="showtickets">
                        <!--loading animated gif can put here-->
                    </div>
                </div>
            </div>
        </tbody>
    </table>
@endsection
@section('javascript')
    <script>
        function showInfo() {
            $.ajax({
                type: 'POST',
                url: '{{ route('place.showinfo') }}',
                data: '_token=<?php echo csrf_token(); ?>',
                success: function(data) {
                    $('#showinfo').html(data.msg);
                }
            });
        }
        //function showInfo..
        function showTickets(place_id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('place.showTickets') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'place_id': place_id
                },
                success: function(data) {
                    $('#showtickets').html(data.msg)
                }
            });
        }
    </script>
@endsection
