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
    
        <form method="POST" action="{{route('contribution.store')}}">
            @csrf
            <div class="form-group">
                <label for="citizen_id">Citizen</label>
                <select name="citizen_id" id="citizen_id" class="form-control" required>
                    <option value="">Select Citizen</option>
                    @foreach($citizens as $c)
                        <option value="{{ $c->citizen_id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="username">Employee</label>
                <select name="username" id="username" class="form-control" required>
                    <option value="">Select Employee</option>
                    @foreach($employees as $e)
                        <option value="{{ $e->username }}">{{ $e->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Products</label>
                <div id="product-fields">
                    <div class="product-field">
                        <select name="products[0][id]" class="form-control" required>
                            <option value="">Select Product</option>
                            @foreach($products as $p)
                                <option value="{{ $p->product_id }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                        <input type="number" name="products[0][amount]" class="form-control" placeholder="Amount" required min="1">
                    </div>
                </div>
                <a href="{{route('product.create')}}">+ New Product</a>
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