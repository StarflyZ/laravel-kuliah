<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Citizen</th>
            <th>Employee</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $contribution->contribution_id }}</td>
            <td>{{ $contribution->citizen->name }}</td>
            <td>{{ $contribution->employee->name }}</td>
            <td>{{ $contribution->contribution_date }}</td>
        </tr>
    </tbody>
</table>
<table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contribution->products as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td>{{ $p->pivot->amount }}</td>
                {{-- <a href="">+ New Contribution Product</a> --}}
            </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('contribution.contributionProduct_create') }}">+ New Contribution Product</a>
