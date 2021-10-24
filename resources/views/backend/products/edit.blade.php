@extends('admin.admin-master')

@section('content')

<div class="content">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Product</h2>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Product Name</label>
                            <input type="text" name="product_name" class="form-control"
                                id="exampleFormControlInput1" value="{{ $product->product_name }}">
                        </div>
                        @error('product_name')
                        <p class="form-group col-md-12 mb-4 text-danger">
                            {{ $message }}
                        </p>
                        @enderror

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Product Description</label>
                            <textarea class="form-control" name="product_description" id="exampleFormControlTextarea1"
                                rows="1">{{ $product->product_description }}</textarea>
                        </div>
                        @error('product_description')
                        <p class="form-group col-md-12 mb-4 text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Product Sell Price</label>
                            <input type="text" name="sell_price" class="form-control"
                                id="exampleFormControlInput1" value="{{ $product->sell_price }}">
                        </div>
                        @error('sell_price')
                        <p class="form-group col-md-12 mb-4 text-danger">
                            {{ $message }}
                        </p>
                        @enderror

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Product Discount Price</label>
                            <input type="text" name="discount_price" class="form-control"
                                id="exampleFormControlInput1" value="{{ $product->discount_price }}">
                        </div>
                        @error('discount_price')
                        <p class="form-group col-md-12 mb-4 text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect12">Brand Select</label>
                            <select class="form-control" name="brand_id" id="exampleFormControlSelect12">
                                <option selected disabled>Select a category</option>
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $brand->id === $product->brand_id ? 'selected' : '' }}>{{ $brand->brand_name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('brand_id')
                        <p class="form-group col-md-12 mb-4 text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect12">Category Select</label>
                            <select class="form-control" name="category_id" id="exampleFormControlSelect12">
                                <option selected disabled>Select a category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id === $product->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                        <p class="form-group col-md-12 mb-4 text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect12">Sub Category Select</label>
                            <select class="form-control" name="sub_category_id" id="exampleFormControlSelect12">
                                <option selected disabled>Select a category</option>
                                @foreach ($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}" {{ $subCategory->id === $product->sub_category_id ? 'selected' : '' }}>{{ $subCategory->sub_category_name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('sub_category_id')
                        <p class="form-group col-md-12 mb-4 text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Product Code</label>
                            <input type="text" name="product_code" class="form-control" id="exampleFormControlInput1" value="{{ $product->product_code }}">
                        </div>
                        @error('product_code')
                        <p class="form-group col-md-12 mb-4 text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Product Quantity</label>
                            <input type="text" name="product_quantity" class="form-control"
                                id="exampleFormControlInput1" value="{{ $product->product_quantity }}">
                        </div>
                        @error('product_quantity')
                        <p class="form-group col-md-12 mb-4 text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Product Color</label>
                            <input type="text" name="product_color" class="form-control" id="exampleFormControlInput1" value="{{ $product->product_color }}">
                        </div>
                        @error('product_color')
                        <p class="form-group col-md-12 mb-4 text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Product Thumbnail</label>
                            <input type="file" name="product_thumbnail" class="form-control-file"
                                id="exampleFormControlFile1" onChange="mainThumbUrl(this)">
                        </div>
                        @error('product_thumbnail')
                        <p class="form-group col-md-12 mb-4 text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                        <img src="" alt="" id="mainThumb">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Product Multipale Image</label>
                            <input type="file" name="image_name[]" class="form-control-file"
                                id="exampleFormControlFile1" multiple="">
                        </div>
                        @error('image_name')
                        <p class="form-group col-md-12 mb-4 text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-12 col-md-9">
                                <label class="control control-checkbox">Make as Featured Product
                                    <input type="checkbox" name="featured_product" value="1" {{ $product->featured_product === 1 ? 'checked' : '' }}>
                                    <div class="control-indicator"></div>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-md-9">
                                <label class="control control-checkbox">Make as Hot Deals
                                    <input type="checkbox" name="hot_deals" value="1" {{ $product->hot_deals === 1 ? 'checked' : '' }}>
                                    <div class="control-indicator"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-12 col-md-9">
                                <label class="control control-checkbox">Make as Special Offer
                                    <input type="checkbox" name="special_offer" value="1" {{ $product->special_offer === 1 ? 'checked' : '' }}>
                                    <div class="control-indicator"></div>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-md-9">
                                <label class="control control-checkbox">Make as Special Deals
                                    <input type="checkbox" name="special_deals" value="1" {{ $product->special_deals === 1 ? 'checked' : '' }}>
                                    <div class="control-indicator"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-footer pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Create</button>
                    <a href="/products" class="btn btn-secondary btn-default">Cancle</a>
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
