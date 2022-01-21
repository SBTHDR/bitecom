@extends('admin.admin-master')

@section('content')

<!-- Content Wrapper. Contains page content -->

<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Order List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Date </th>
                                        <th>Invoice </th>
                                        <th>Amount </th>
                                        <th>Payment </th>
                                        <th>Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $item)
                                    <tr>
                                        <td> {{ $item->order_date }} </td>
                                        <td> {{ $item->invoice_no }} </td>
                                        <td> ${{ $item->amount }} </td>

                                        <td> {{ $item->payment_method }} </td>

                                        <td> <span class="badge badge-pill badge-primary">{{ $item->status }} </span>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <a target="_blank" href="" class="btn btn-primary">
                                Excel
                            </a>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection
