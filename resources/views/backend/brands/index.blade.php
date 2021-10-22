@extends('admin.admin-master')

@section('content')
<div class="content">
    <div class="col-12">
        <!-- Recent Order Table -->
        <div class="card card-table-border-none" id="recent-orders">
            <div class="card-header justify-content-between">
                <h2>Brand Lists</h2>
                <div class="date-range-report ">
                    <span>Sep 23, 2021 - Oct 22, 2021</span>
                </div>
            </div>
            <div class="card-body pt-0 pb-5">
                <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                    <thead>
                        <tr>
                            <th>Brand Name En</th>
                            <th>Brand Name Bn</th>
                            <th class="d-none d-md-table-cell">Image</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                        <tr>
                            <td>
                                <p class="text-dark">{{ $brand->brand_name_en }}</p>
                            </td>
                            <td>
                                <p class="text-dark">{{ $brand->brand_name_bn }}</p>
                            </td>
                            <td>
                                <img src="{{ url('upload/brand/'.$brand->brand_image) }}" alt="" width="80">
                            </td>                            
                            <td>
                                <a href="#" class="btn btn-success">Edit</a>
                                <a href="#" class="btn btn-danger">Delete</a>
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
