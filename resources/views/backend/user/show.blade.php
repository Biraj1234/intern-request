@extends('backend.layouts.master')
@section('title', $title)
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">

                <a class="btn btn-success" href="{{ route($base_route . 'edit', auth()->user()->id) }}">
                    <i class="far fa-edit"></i>
                    Edit
                </a>

                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>

                            <tr>
                                <th>Name</th>
                                <td>{{ $row->name }}</td>
                            </tr>


                            <tr>
                                <th>Email</th>
                                <td>{{ $row->email }}</td>
                            </tr>

                            <tr>
                                <th>Age</th>
                                <td>{{ $row->age }}</td>
                            </tr>


                            <tr>
                                <th>Bio</th>
                                <td>{{ $row->bio }}</td>
                            </tr>


                            <tr>
                                <th>Profile Picture</th>
                                <td>
                                    <img src="{{ asset('uploads/users/' . $row->image) }}" alt="" width="100px"
                                        height="100px">
                                </td>
                            </tr>

                        </thead>



                    </table>
                </div>






            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection
