@extends('admin.admin-master')

@section('content')
<div class="content">
    <div class="col-12">
        <!-- Recent Order Table -->
        <div class="card card-table-border-none" id="recent-orders">
            <div class="card-header justify-content-between">
                <h2>Slider Lists</h2>
                <div class="date-range-report ">
                    <span>Sep 23, 2021 - Oct 22, 2021</span>
                </div>
            </div>
            <div class="card-body pt-0 pb-5">
                <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                    <thead>
                        <tr>
                            <th>Slider Name</th>
                            <th>Slider Description</th>
                            <th>Slider Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                        <tr>
                            <td>
                                <p class="text-dark">{{ $slider->title }}</p>
                            </td>
                            <td>
                                <p class="text-dark">{{ $slider->description }}</p>
                            </td>
                            <td>
                                <img src="{{ url('upload/sliders/'.$slider->slider_image) }}" alt="" width="150">
                            </td>
                            <td>
                                <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('sliders.delete', $slider->id) }}" id="delete"
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
