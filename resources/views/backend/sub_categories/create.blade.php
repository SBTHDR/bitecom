@extends('admin.admin-master')

@section('content')
<div class="content">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Sub Category</h2>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('sub.category.store') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Sub Category Name English</label>
                    <input type="text" name="sub_category_name_en" class="form-control" id="exampleFormControlInput1">
                </div>
                @error('sub_category_name_en')
                <p class="form-group col-md-12 mb-4 text-danger">
                    {{ $message }}
                </p>
                @enderror

                <div class="form-group">
                    <label for="exampleFormControlInput1">Sub Category Name Bangla</label>
                    <input type="text" name="sub_category_name_bn" class="form-control" id="exampleFormControlInput1">
                </div>
                @error('sub_category_name_bn')
                <p class="form-group col-md-12 mb-4 text-danger">
                    {{ $message }}
                </p>
                @enderror

                <div class="form-group">
                    <label for="exampleFormControlSelect12">Sub Category Select</label>
                    <select class="form-control" name="category_id" id="exampleFormControlSelect12">
                        <option selected disabled>Select a category</option>
                        @foreach ($categories as $category)                        
                            <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                <p class="form-group col-md-12 mb-4 text-danger">
                    {{ $message }}
                </p>
                @enderror
                
                <div class="form-footer pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Create</button>
                    <a href="/sub/category" class="btn btn-secondary btn-default">Cancle</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
