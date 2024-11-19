<body>

    @extends('layouts.conquer2')
    @section('content')
        <!--….pagebar…-->
        <form method="POST" action="{{ route('product.update', $product->product_id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="product_id">Product ID</label>
                <input type="text" value="{{ $product->product_id }}" class="form-control" id="product_id"
                    name="product_id" aria-describedby="product_id" placeholder="Enter Product ID" disabled>
                </div>
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" value="{{ $product->name }}" class="form-control" id="name" name="name"
                    aria-describedby="name" placeholder="Enter Citizen Name">
                <small id="name" class="form-text text-muted">Please write down Citizen Name here.</small>
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection

</body>
