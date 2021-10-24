@extends('admin.admin-master')

@section('content')
<div class="content">
    <div class="col-12">
        <!-- Recent Order Table -->
        <div class="card card-table-border-none" id="recent-orders">
            <div class="card-header justify-content-between">
                <h2>Products Lists</h2>
                <div class="date-range-report ">
                    <span>Sep 23, 2021 - Oct 22, 2021</span>
                </div>
            </div>
            <div class="card-body pt-0 pb-5">
                <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                    <thead>
                        <tr>
                            <th>Products Name</th>
                            <th>Product Quantity</th>
                            <th>Product Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>
                                <p class="text-dark">{{ $product->product_name }}</p>
                            </td>
                            <td>
                                <p class="text-dark">{{ $product->product_quantity }}</p>
                            </td>
                            <td>
                                <img src="{{ url('upload/products/'.$product->product_thumbnail) }}" alt="" width="100">
                            </td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('products.delete', $product->id) }}" id="delete"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
