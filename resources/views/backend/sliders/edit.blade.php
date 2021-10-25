@extends('admin.admin-master')

@section('content')

<div class="content">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Slider</h2>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('sliders.update', $slider->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlInput1">Slider Name</label>
                    <input type="text" name="title" class="form-control"
                        id="exampleFormControlInput1" value="{{ $slider->title }}">
                </div>
                @error('title')
                <p class="form-group col-md-12 mb-4 text-danger">
                    {{ $message }}
                </p>
                @enderror

                <div class="form-group">
                    <label for="exampleFormControlInput1">Slider Description</label>
                    <input type="text" name="description" class="form-control"
                        id="exampleFormControlInput1" value="{{ $slider->description }}">
                </div>
                @error('description')
                <p class="form-group col-md-12 mb-4 text-danger">
                    {{ $message }}
                </p>
                @enderror

                <div class="form-group">
                    <label for="exampleFormControlFile1">Slider Image</label>
                    <input type="file" name="slider_image" class="form-control-file"
                        id="exampleFormControlFile1" onChange="mainThumbUrl(this)">
                </div>
                @error('slider_image')
                <p class="form-group col-md-12 mb-4 text-danger">
                    {{ $message }}
                </p>
                @enderror
                <img src="" alt="" id="mainThumb">

                <div class="form-footer pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update</button>
                    <a href="/sliders" class="btn btn-secondary btn-default">Cancle</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function mainThumbUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainThumb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
