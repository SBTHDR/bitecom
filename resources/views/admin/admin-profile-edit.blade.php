@extends('admin.admin-master')

@section('content')
<div class="content">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit your profile details</h2>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $admin->name }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{ $admin->email }}">
                </div>
            
                <div class="form-group">
                    <label for="exampleFormControlFile1">Profile picture</label>
                    <input type="file" name="profile_photo_path" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <inpput type="submit" class="btn btn-primary btn-default">Update</inpput>
                    <a href="{{ route('admin.profile') }}" class="btn btn-secondary btn-default">Cancle</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
