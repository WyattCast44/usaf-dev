@extends('admin.gsuite.layout')

@section('gsuite-content')

<div class="tw-mb-8">
    <a href="{{ route('admin.gsuite.accounts.index') }}" class="tw-text-sm tw-text-blue-400 tw-mb-2 tw-inline-block">&leftarrow; Back</a>
    <h3 class="tw-text-2xl tw-mb-2">Create Account</h3>
</div>

<form action="{{ route('admin.gsuite.accounts.store') }}" method="post">

    @csrf

    <div class="form-group">
        <label for="first_name">Account First Name</label>
        <input type="text" name="first_name" id="first_name" class="form-control" required autofocus>
    </div>

    <div class="form-group">
        <label for="last_name">Account Last Name</label>
        <input type="text" name="last_name" id="last_name" class="form-control" required autofocus>
    </div>

    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="text" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group tw-flex tw-justify-end tw-items-center tw-mt-6">
        <a href="{{ route('admin.gsuite.accounts.index') }}" class="btn btn-link">Cancel</a>
        <button type="submit" class="btn btn-primary">Create Account</button>
    </div>

</form>

@endsection
