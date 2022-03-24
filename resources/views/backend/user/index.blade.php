@extends('backend.layouts.master')
@section('title', $title)
@section('content')
    <section class="content">


        <!-- Default box -->
        <div class="card">
            <div class="card-header">

                <h3 class="card-title">{{ $title }} {{ $panel }}</h3>

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

                <div class="table-responsive" id="printMe">
                    @include('backend.includes.flashmessage')

                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Profile Picture</th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($data['rows'] as $index => $data)
                                <tr>

                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <a href="{{ route($base_route . 'show', $data->id) }}">
                                            {{ $data->name }}
                                        </a>
                                    </td>

                                    <td>
                                        <img src="{{ asset('uploads/users/' . $data->image) }}" height="100px"
                                            width="100px" alt="">


                                    </td>



                                </tr>
                            @endforeach
                        </tbody>

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

@endsection
