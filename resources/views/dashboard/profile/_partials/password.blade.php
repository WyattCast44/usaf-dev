
<form method="POST" action="{{ route('user.password.update') }}" class="tw-mb-8 tw-border tw-border-solid tw-p-8 tw-rounded tw-bg-white">

    <h3 class="tw-text-2xl tw-mb-6 tw-text-gray-900">Change Password</h3>

    @csrf
    @method('PATCH')

    <div class="form-group row tw-mb-6">
        <label for="password" class="col-sm-3 col-form-label tw-text-gray-700">Current Password</label>
        <div class="col-sm-9">
            <input type="password" name="password" id="password" class="form-control" autocomplete="false" spellcheck="false">
        </div>
    </div>

    <div class="form-group row tw-mb-6">
        <label for="new_password" class="col-sm-3 col-form-label tw-text-gray-700">New Password</label>
        <div class="col-sm-9">
            <input type="password" name="new_password" id="new_password" class="form-control" autocomplete="false" spellcheck="false">
        </div>
    </div>

    @error('new_password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row tw-mb-6">
        <label for="new_password_confirmation" class="col-sm-3 col-form-label tw-text-gray-700">
            Retype New Password
        </label>
        <div class="col-sm-9">
            <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                class="form-control" autocomplete="false" spellcheck="false">
        </div>
    </div>

    @error('new_password_confirmation')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row tw-mb-6 tw-mb-0">
        <div class="col-sm-12 tw-flex tw-justify-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

</form>
