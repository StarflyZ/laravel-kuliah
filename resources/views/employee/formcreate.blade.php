<body>

    @extends('layouts.conquer2')
    @section('content')
    
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="../employee/">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>Create Employee</li>
            </ul>
        </div>
    
        <form method="POST" action="{{route('employee.store')}}">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="username"
                    placeholder="Enter Username">
                <small id="username" class="form-text text-muted">Please write down Username here.</small>
            </div>
            <div class="form-group">
                <label for="name">Employee Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                    placeholder="Enter Employee Name">
                <small id="name" class="form-text text-muted">Please write down Employee Name here.</small>
            </div>
            <div class="form-group">
                <label for="name">Employee Email</label>
                <input class="form-control" id="email" name="email" placeholder="Enter your Email here" aria-describedby="Email"></input>
                <small id="name" class="form-text text-muted">Please write down Employee Email here.</small>
            </div>
    
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
    
    @endsection
    </body>