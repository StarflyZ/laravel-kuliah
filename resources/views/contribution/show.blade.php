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
        <tr id="tr_{{ $p->product_id }}">
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
                <button type="button" class="btn btn-danger"
                    onclick="contributionProduct_deleteTR({{ $contribution->contribution_id }}, {{ $p->product_id }})">Delete
                    without Reload</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('contribution.contributionProduct_create') }}">+ New Contribution Product</a>

<script>
    function contributionProduct_deleteTR(contributionId, productId) {
        // Generate URL menggunakan Laravel route
        const url = `{{ route('contribution.contributionProduct_deleteTR', ['contribution' => '__CONTRIBUTION__', 'product' => '__PRODUCT__']) }}`;
        const resolvedUrl = url.replace('__CONTRIBUTION__', contributionId).replace('__PRODUCT__', productId);

        if (confirm("Are you sure you want to delete this product?")) {
            $.ajax({
                type: "POST",
                url: resolvedUrl, // Menggunakan URL yang dihasilkan Laravel
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status === "success") {
                        // Hapus baris dengan ID produk
                        $('#tr_' + productId).remove();
                        alert(response.message);
                    } else {
                        alert(response.message || "Failed to delete the product.");
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert("An error occurred. Please try again.");
                }
            });
        }
    }
</script>