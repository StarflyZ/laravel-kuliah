<body>

    @extends('layouts.conquer2')
    @section('content')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="../contribution/">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>Create Contribution</li>
            </ul>
        </div>
    
        <form method="POST" action="{{route('contribution.contributionProduct_store')}}">
            @csrf
            <div class="form-group">
                <label for="contribution_id">Contribution</label>
                <select name="contribution_id" id="contribution_id" class="form-control" required>
                    <option value="">Select Contribution</option>
                    @foreach($contributions as $contribution)
                        <option value="{{ $contribution->contribution_id }}">{{ $contribution->username }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Combo Box untuk Product ID -->
            <div class="form-group">
                <label for="product_id">Product</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    <option value="">Select Product</option>
                    @foreach($products as $product)
                        <option value="{{ $product->product_id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" class="form-control" placeholder="Amount" required min="1">
            </div>
    
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @endsection
    </body>