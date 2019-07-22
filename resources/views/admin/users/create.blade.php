@extends('admin.users.layout')

@section('page-title', 'Create User')

@section('user-content')

    <div class="row">

        <div class="col-md-6">
    
                <h3 class="tw-text-2xl tw-mb-8">Create New User</h3>
    
                <form action="{{ route('admin.users.store') }}" method="POST">
                
                    @csrf
                
                    <!-- First Name -->
                    <div class="form-group row">
                        <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="first_name" name="first_name" required autofocus>
                            <small id="first_name_help" class="form-text text-muted">
                                Required.
                            </small>
                
                            @error('first_name')
                                @include('components.error')
                            @enderror
                
                        </div>
                    </div>
                
                    <!-- Last Name -->
                    <div class="form-group row">
                        <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                            <small id="last_name_help" class="form-text text-muted">
                                Required.
                            </small>
                
                            @error('last_name')
                                @include('components.error')
                            @enderror
                
                        </div>
                    </div>

                    <!-- Middle Name -->
                    <div class="form-group row">
                        <label for="middle_name" class="col-sm-3 col-form-label">Middle Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="middle_name" name="middle_name">
                            <small id="middle_name_help" class="form-text text-muted">
                                Optional.
                            </small>
                
                            @error('middle_name')
                                @include('components.error')
                            @enderror
                
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email Address</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" required>
                            <small id="email_help" class="form-text text-muted">
                                Required, must be a <span class="tw-italic">us.af.mil</span> email address.
                            </small>
                
                            @error('email')
                                @include('components.error')
                            @enderror
                
                        </div>
                    </div>
    
                    <!-- Admin -->
                    <div class="form-group row">
                        <label for="admin" class="col-sm-3 col-form-label">Admin</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-switch mt-2">
                                <input type="checkbox" class="custom-control-input" id="admin" name="admin">
                                <label class="custom-control-label" for="admin"></label>
                            </div>
                        </div>
                    </div>

                    <p class="tw-text-gray-600 tw-my-8 tw-text-sm">
                        The user will be sent an invitation email. They will be required to set a password, and set up their account. This invite email will expire five days after sending.
                    </p>

                    <div class="tw-flex tw-justify-end">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-link tw-mr-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Send Invite</button>
                    </div>
                
                </form>
    
        </div>
    
    </div>

@endsection
