<body>

    @extends('layouts.conquer2')
    @section('content')
        <!--….pagebar…-->
        <form method="POST" action="{{ route('employee.update', $employee->username) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="username">Employee Username</label>
                <input type="text" value="{{ $employee->username }}" class="form-control" id="username"
                    name="username" aria-describedby="username" placeholder="Enter Username" disabled>
                </div>
            <div class="form-group">
                <label for="name">Employee Email</label>
                <input type="text" value="{{ $employee->email }}" class="form-control" id="email" name="email"
                    aria-describedby="email" placeholder="Enter Employee Email">
                <small id="name" class="form-text text-muted">Please write down Employee Email here.</small>
                </div>
            <div class="form-group">
                <label for="name">Employee Name</label>
                <textarea class="form-control" id="name" name="name" rows="4" placeholder="Enter your employee name here"
                    aria-describedby="name">{{ $employee->name }}</textarea>
                <small id="name" class="form-text text-muted">Please write down Employee name here.</small>
                
            </div> 
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection

</body>
