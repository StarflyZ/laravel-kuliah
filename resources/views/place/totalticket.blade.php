<!DOCTYPE html>
<html>
<head>
    <title>Place List with Total Tickets</title>
</head>
<body>
    <h1>List of Places and Total Tickets</h1>

    @if ($places->isEmpty())
        <p>No places found.</p>
    @else

    <table border="1">
        <thead>
            <tr>
                <th>Place Name</th>
                <th>Total Tickets</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($places as $place)
                <tr>
                    <td>{{ $place->name }}</td>
                    <td>{{ $place->tickets_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</body>
</html>
