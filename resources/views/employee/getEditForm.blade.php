<h3>Update Employee</h3>
<form method="POST" action="{{ route('employee.update', $employee->username) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" value="{{ $employee->username }}" class="form-control" id="username" name="username"
            aria-describedby="username" placeholder="Enter Username" disabled>
    </div>
    <div class="form-group">
        <label for="name">Employee Email </label>
        <textarea class="form-control" id="email" name="email" rows="4" placeholder="Enter your email here"
            aria-describedby="email">{{ $employee->email }}</textarea>
        <small id="email" class="form-text text-muted">Please write down Employee Email here.</small>
    </div>
    <div class="form-group">
        <label for="name">Employee Name</label>
        <input type="text" value="{{ $employee->name }}" class="form-control" id="name" name="name"
            aria-describedby="name" placeholder="Enter Employee Name">
        <small id="name" class="form-text text-muted">Please write down Employee Name here.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
