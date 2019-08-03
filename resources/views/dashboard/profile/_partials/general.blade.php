<form method="POST" enctype="multipart/form-data" class="tw-mb-8 tw-border tw-border-solid tw-p-8 tw-rounded tw-bg-white">

    <h3 class="tw-text-2xl tw-mb-6 tw-text-gray-900">General</h3>

    @csrf
    @method('PATCH')

    <div class="form-group row tw-mb-6">
        <label for="first_name" class="col-sm-3 col-form-label tw-text-gray-700">First Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="first_name" name="first_name"
                value="{{ auth()->user()->first_name }}" required>
        </div>
    </div>

    @error('first_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row tw-mb-6">
        <label for="last_name" class="col-sm-3 col-form-label tw-text-gray-700">Last Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="last_name" name="last_name"
                value="{{ auth()->user()->last_name }}" required>
        </div>
    </div>

    @error('last_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row tw-mb-6">
        <label for="middle_name" class="col-sm-3 col-form-label tw-text-gray-700">Middle Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="middle_name" name="middle_name"
                value="{{ auth()->user()->middle_name }}">
        </div>
    </div>

    @error('middle_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row tw-mb-6">
        <label for="nickname" class="col-sm-3 col-form-label tw-text-gray-700">Nickname</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nickname" name="nickname"
                value="{{ auth()->user()->nickname }}">
        </div>
    </div>

    @error('nickname')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row mb-6">
        <label for="avatar" class="col-sm-3 col-form-label tw-text-gray-700">

            @if(auth()->user()->avatar)
                Change Avatar
            @else
                Upload Avatar
            @endif

        </label>
        <div class="col-sm-9">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="avatar" name="avatar">
                <label class="custom-file-label" for="avatar">Choose file</label>
            </div>
        </div>
    </div>

    @error('avatar')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row tw-mt-6 tw-mb-0">
        <div class="col-sm-12 tw-flex tw-justify-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

</form>