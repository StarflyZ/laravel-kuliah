<body>

    @extends('layouts.conquer2')
    @section('content')
    
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="../product/">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>Create Citizen</li>
            </ul>
        </div>
    
        <form method="POST" action="{{route('product.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                    placeholder="Enter Product Name">
                <small id="name" class="form-text text-muted">Please write down the Product Name here.</small>
            </div>
    
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
    
    @endsection
    </body>