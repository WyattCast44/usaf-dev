@extends('admin.apps.layout')

@section('app-content')

<div class="row">

    <div class="col-md-6">

            <h3 class="tw-text-2xl tw-mb-8">Create New App</h3>

            <form action="{{ route('admin.apps.index') }}" method="POST" enctype="multipart/form-data">
            
                @csrf
            
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">App Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" required>
                        <small id="name_help" class="form-text text-muted">
                            Required. A name your users will recognize and trust.
                        </small>
            
                        @error('name')
                            @include('components.error')
                        @enderror
            
                    </div>
                </div>
            
                <div class="form-group row">
                    <label for="homepage_url" class="col-sm-3 col-form-label">Homepage Url</label>
                    <div class="col-sm-9">
                        <input type="url" class="form-control" id="homepage_url" name="homepage_url">
                        <small id="homepage_url_help" class="form-text text-muted">
                            Required. The url to your application homepage, so users can easily access your app from thier
                            dashboard.
                        </small>
            
                        @error('homepage_url')
                            @include('components.error')
                        @enderror
            
                    </div>
                </div>
            
                <div class="form-group row">
                    <label for="redirect" class="col-sm-3 col-form-label">Redirect Url</label>
                    <div class="col-sm-9">
                        <input type="url" class="form-control" id="redirect" name="redirect">
                        <small id="redirect_help" class="form-text text-muted">
                            Required. The redirect URL is where the user will be redirected after approving or denying a
                            request for authorization.
                        </small>
            
                        @error('redirect')
                            @include('components.error')
                        @enderror
            
                    </div>
                </div>
            
                <div class="form-group row">
                    <label for="avatar" class="col-sm-3 col-form-label">App Avatar</label>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="avatar" name="avatar">
                            <label class="custom-file-label" for="avatar">Choose image</label>
                        </div>
                        <small id="avatar_help" class="form-text text-muted">
                            Optional. Choose a avatar that your users will recognize.
                        </small>
            
                        @error('avatar')
                            @include('components.error')
                        @enderror
            
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label">App Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="description" name="description" required></textarea>
                        <small id="description_help" class="form-text text-muted">
                            Required. A short description of what your app is and why the user should approve it.
                        </small>
            
                        @error('description')
                            @include('components.error')
                        @enderror
            
                    </div>
                </div>

                <div class="form-group row">
                    <label for="first_party" class="col-sm-3 col-form-label">First Party App</label>
                    <div class="col-sm-9">
                        <div class="custom-control custom-switch mt-2">
                            <input type="checkbox" class="custom-control-input" id="first_party" name="first_party">
                            <label class="custom-control-label" for="first_party"></label>
                        </div>
                    </div>
                </div>
            
                <div class="tw-flex tw-justify-end tw-mt-8">
                    <a href="{{ route('admin.apps.index') }}" class="btn btn-link tw-mr-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create App</button>
                </div>
            
            </form>

    </div>

</div>

@endsection
