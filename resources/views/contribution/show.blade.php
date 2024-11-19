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
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contribution->products as $p)
        <tr>
            <td>{{ $p->name }}</td>
            <td>{{ $p->pivot->amount }}</td>
            <td>
                <a class="btn btn-warning" href="{{ route('product.edit', $p->product_id) }}">Edit</a>
                <form
                    action="{{ route('contribution.contributionProduct_delete', [$contribution->contribution_id, $p->product_id]) }}"
                    method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('contribution.contributionProduct_create') }}">+ New Contribution Product</a>