@extends('backend.layouts.master')

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>

                <!-- Small Box (Stat card) -->
                <h5 class="mb-2 mt-4"></h5>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                {{-- <h3>{{$data['room']}}</h3> --}}

                                <p>Rooms</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <a href="" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                {{-- <h3>{{$data['rentee']}}</h3> --}}
                                <p>Customers</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-users"></i>
                            </div>
                            <a href="" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                {{-- <h3>{{$data['room_owners']}}</h3> --}}

                                <p>Room Owners</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-user-check"></i>
                            </div>
                            <a href="" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                {{-- <h3>Rs.{{$data['payment']}}</h3> --}}

                                <p>Total Income</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <a href="" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>



            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection
