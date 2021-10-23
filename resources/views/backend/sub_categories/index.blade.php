@extends('admin.admin-master')

@section('content')
<div class="content">
    <div class="col-12">
        <!-- Recent Order Table -->
        <div class="card card-table-border-none" id="recent-orders">
            <div class="card-header justify-content-between">
                <h2>Sub Category Lists</h2>
                <div class="date-range-report ">
                    <span>Sep 23, 2021 - Oct 22, 2021</span>
                </div>
            </div>
            <div class="card-body pt-0 pb-5">
                <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Sub Category Name (English)</th>
                            <th>Sub Category Name (Bangla)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subCategories as $category)
                        <tr>
                            <td>
                                <p class="text-dark">{{ $category->category_id }}</p>
                            </td>
                            <td>
                                <p class="text-dark">{{ $category->sub_category_name_en }}</p>
                            </td>
                            <td>
                                <p class="text-dark">{{ $category->sub_category_name_bn }}</p>
                            </td>
                            <td>
                                <a href="{{ route('sub.category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('sub.category.delete', $category->id) }}" id="delete"
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
