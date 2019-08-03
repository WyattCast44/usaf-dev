<form method="POST" action="{{ route('app.users.account.settings.demographics.update') }}"
    class="mb-8 border border-solid p-8 rounded bg-white">

    <h3 class="text-2xl mb-6 text-gray-900">Demographics Info</h3>

    @csrf
    @method('PATCH')

    <!-- Gender -->
    <div class="form-group row mb-6">
        <label for="gender_id" class="col-sm-3 col-form-label text-gray-700">Gender</label>

        <div class="col-sm-9">

            <select name="gender_id" id="gender_id" class="form-control">

                @if(!$user->gender)
                    <option disabled selected value> -- select an option -- </option>
                @endif

                @foreach ($genders as $gender)

                    <option value="{{ $gender->id }}"

                        @if ($user->gender)
                            {{ ($user->gender->id === $gender->id) ? 'selected' : '' }}
                        @endif

                        >
                        {{ $gender->title }}
                    </option>

                @endforeach

            </select>
        </div>
    </div>

    @error('gender_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row mb-6 mb-0">
        <div class="col-sm-12 flex justify-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

</form>
