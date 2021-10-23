@extends('admin.admin-master')

@section('content')
<div class="content">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Category</h2>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('category.update', $category->id) }}">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Category Name English</label>
                    <input type="text" name="category_name_en" class="form-control" id="exampleFormControlInput1" value="{{ $category->category_name_en }}">
                </div>
                @error('category_name_en')
                <p class="form-group col-md-12 mb-4 text-danger">
                    {{ $message }}
                </p>
                @enderror

                <div class="form-group">
                    <label for="exampleFormControlInput1">Category Name Bangla</label>
                    <input type="text" name="category_name_bn" class="form-control" id="exampleFormControlInput1" value="{{ $category->category_name_bn }}">
                </div>
                @error('category_name_bn')
                <p class="form-group col-md-12 mb-4 text-danger">
                    {{ $message }}
                </p>
                @enderror

                <div class="form-group">
                    <label for="exampleFormControlInput1">Category Icon</label>
                    <input type="text" name="category_icon" class="form-control" id="exampleFormControlInput1" value="{{ $category->category_icon }}">
                </div>
                @error('category_icon')
                <p class="form-group col-md-12 mb-4 text-danger">
                    {{ $message }}
                </p>
                @enderror
                <div class="form-footer pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update</button>
                    <a href="/category" class="btn btn-secondary btn-default">Cancle</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
