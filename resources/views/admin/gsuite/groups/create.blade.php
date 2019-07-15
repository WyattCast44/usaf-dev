@extends('admin.gsuite.layout')

@section('gsuite-content')

<div class="tw-mb-8">
    <a href="{{ route('admin.gsuite.groups.index') }}" class="tw-text-sm tw-text-blue-400 tw-mb-2 tw-inline-block">&leftarrow; Back</a>
    <h3 class="tw-text-2xl tw-mb-2">Create Group</h3>
    <p class="tw-text-gray-500">
        Think of groups as "org-boxes"
    </p>
</div>

<form action="{{ route('admin.gsuite.groups.store') }}" method="post">

    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required autofocus>
    </div>

    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="text" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>

    <div class="form-group tw-flex tw-justify-end tw-items-center tw-mt-6">
        <a href="{{ route('admin.gsuite.groups.index') }}" class="btn btn-link">Cancel</a>
        <button type="submit" class="btn btn-primary">Create Group</button>
    </div>

</form>

@endsection
