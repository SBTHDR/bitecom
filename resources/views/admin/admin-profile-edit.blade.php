@extends('admin.admin-master')

@section('content')
<div class="content">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit your profile details</h2>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                        value="{{ $admin->name }}">
                </div>
                @error('name')
                <p class="form-group col-md-12 mb-4 text-danger">
                    {{ $message }}
                </p>
                @enderror
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                        value="{{ $admin->email }}">
                </div>
                @error('email')
                <p class="form-group col-md-12 mb-4 text-danger">
                    {{ $message }}
                </p>
                @enderror

                <div class="form-group">
                    <label for="exampleFormControlFile1">Profile picture</label>
                    <input type="file" name="profile_photo_path" class="form-control-file" id="exampleFormControlFile1">
                </div>
                @error('profile_photo_path')
                <p class="form-group col-md-12 mb-4 text-danger">
                    {{ $message }}
                </p>
                @enderror
                <div class="form-footer pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update</button>
                    <a href="{{ route('admin.profile') }}" class="btn btn-secondary btn-default">Cancle</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
