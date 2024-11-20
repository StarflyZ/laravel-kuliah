<h3>Update Citizen</h3>
<form method="POST" action="{{ route('citizen.update', $citizen->citizen_id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="citizen_id">Citizen ID</label>
        <input type="text" value="{{ $citizen->citizen_id }}" class="form-control" id="citizen_id" name="citizen_id"
            aria-describedby="citizen_id" placeholder="Enter Citizen ID" disabled>
    </div>
    <div class="form-group">
        <label for="name">Citizen Name</label>
        <input type="text" value="{{ $citizen->name }}" class="form-control" id="name" name="name"
            aria-describedby="name" placeholder="Enter Citizen Name">
        <small id="name" class="form-text text-muted">Please write down Citizen Name here.</small>
    </div>
    <div class="form-group">
        <label for="name">Citizen Address </label>
        <textarea class="form-control" id="address" name="address" rows="4" placeholder="Enter your address here"
            aria-describedby="address">{{ $citizen->address }}</textarea>
        <small id="name" class="form-text text-muted">Please write down Citizen Address here.</small>
    </div>
    <div class="form-group">
        <label for="telephone">Citizen Telephone</label>
        <input type="text" value="{{ $citizen->telephone }}" class="form-control" id="etelephone" name="telephone"
            aria-describedby="telephone" placeholder="Enter Citizen Telephone">
        <small id="telephone" class="form-text text-muted">Please write down Citizen telephone here.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
