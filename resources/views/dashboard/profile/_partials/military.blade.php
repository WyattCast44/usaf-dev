@if(auth()->user()->military)

    <form method="POST" action="{{ route('app.users.account.settings.military.update') }}"
        class="mb-8 border border-solid p-8 rounded bg-white">

        <h3 class="text-2xl mb-6 text-gray-900">Military Info</h3>

        @csrf
        @method('PATCH')

        <div class="form-group row mb-6">
            <label for="branch_id" class="col-sm-3 col-form-label text-gray-700">Branch</label>
            <div class="col-sm-9">
                <select name="branch_id" id="branch_id" class="form-control">

                    @if(!$user->military->branch_id)
                        <option>Select your branch of service</option>
                    @endif

                    @foreach ($branches as $branch)

                        <option value="{{ $branch->id }}"
                            {{ ($user->military->branch_id && $user->military->branch_id === $branch->id) ? 'selected' : '' }}>
                            {{ $branch->name }}
                        </option>

                    @endforeach

                </select>
            </div>
        </div>

        @error('branch_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group row mb-6">
            <label for="rank_id" class="col-sm-3 col-form-label text-gray-700">Rank</label>
            <div class="col-sm-9">
                <select name="rank_id" id="rank_id" class="form-control">

                    @if(!$user->military->rank_id)
                        <option>Select your military rank</option>
                    @endif

                    @foreach ($ranks as $rank)

                        <option value="{{ $rank->id }}"
                            {{ ($user->military->rank_id && $user->military->rank_id === $rank->id) ? 'selected' : '' }}>
                            {{ $rank->name }}
                        </option>

                    @endforeach

                </select>
            </div>
        </div>

        @error('rank_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group row mb-6 mb-0">
            <div class="col-sm-12 flex justify-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    </form>

@endif