@extends('admin.admin-master')

@section('content')
<div class="content">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Brand</h2>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Brand Name English</label>
                    <input type="text" name="brand_name_en" class="form-control" id="exampleFormControlInput1">
                </div>
                @error('brand_name_en')
                <p class="form-group col-md-12 mb-4 text-danger">
                    {{ $message }}
                </p>
                @enderror

                <div class="form-group">
                    <label for="exampleFormControlInput1">Brand Name Bangla</label>
                    <input type="text" name="brand_name_bn" class="form-control" id="exampleFormControlInput1">
                </div>
                @error('brand_name_bn')
                <p class="form-group col-md-12 mb-4 text-danger">
                    {{ $message }}
                </p>
                @enderror

                <div class="form-group">
                    <label for="exampleFormControlFile1">Brand Image</label>
                    <input type="file" name="brand_image" class="form-control-file" id="exampleFormControlFile1">
                </div>
                @error('brand_image')
                <p class="form-group col-md-12 mb-4 text-danger">
                    {{ $message }}
                </p>
                @enderror
                <div class="form-footer pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Create</button>
                    <a href="/brand" class="btn btn-secondary btn-default">Cancle</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
