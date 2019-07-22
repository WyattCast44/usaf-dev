@extends('dashboard.layout')

@section('page-title', 'My Profile')

@section('dashboard-content')

<div class="card">

    <div class="card-header">Update My Avatar</div>

    <div class="card-body">
        
        <form action="{{ route('user.avatar.update') }}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="avatar">Upload Avatar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="avatar" name="avatar">
                    <label class="custom-file-label" for="avatar">Choose image</label>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>

    </div>

</div>

@endsection