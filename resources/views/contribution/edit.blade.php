<body>

    @extends('layouts.conquer2')
    @section('content')
    <!--….pagebar…-->
    <form method="POST" action="{{ route('contribution.update', $contribution->contribution_id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Contribution Citizen</label>
            <input type="text" value="{{ $contribution->citizen_id }}" class="form-control" id="name" name="name"
                aria-describedby="name" placeholder="Enter Name" disabled>
        </div>
        <div class="form-group">
            <label for="name">Employee Username</label>
            <input type="text" value="{{ $contribution->username }}" class="form-control" id="username" name="username"
                aria-describedby="username" placeholder="Enter Employee username" disabled>
            <small id="name" class="form-text text-muted">Please write down Employee username here.</small>
        </div>
        <div class="form-group">
            <label for="username">Employee Username</label>
            <select name="username" id="username" class="form-control" required>
                <option value="">Select Employee</option>
                @foreach($employees as $e)
                    <option value="{{ $e->username }}">{{ $e->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection

</body>