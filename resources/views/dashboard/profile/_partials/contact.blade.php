<form method="POST" action="{{ route('app.users.account.settings.contact-info.update') }}" class="mb-8 border border-solid p-8 rounded bg-white">

    <h3 class="text-2xl mb-6 text-gray-900">Contact Info</h3>

    @csrf
    @method('PATCH')

    <div class="form-group row mb-6">
        <label for="cell_phone" class="col-sm-3 col-form-label text-gray-700">Cell Phone</label>
        <div class="col-sm-9">
            <input type="tel" class="form-control" id="cell_phone" name="cell_phone"
                value="{{ ($user->contact->cell_phone) ? $user->contact->cell_phone : old('cell_phone') }}">
        </div>
    </div>

    @error('cell_phone')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row mb-6">
        <label for="personal_email" class="col-sm-3 col-form-label text-gray-700">Personal Email</label>
        <div class="col-sm-9">
            <input type="email" class="form-control" id="personal_email" name="personal_email"
                value="{{ $user->contact->personal_email }}">
        </div>
    </div>

    @error('personal_email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row mt-6 mb-0">
        <div class="col-sm-12 flex justify-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

</form>