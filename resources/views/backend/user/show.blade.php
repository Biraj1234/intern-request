@extends('backend.layouts.master')
@section('title',$title)
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$title}} {{$panel}}
                    <a class="btn btn-success" href="{{route($base_route.'index')}}">
                        <i class="fas fa-list"></i>
                        List
                    </a>

                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>

                        <tr>
                            <th>Name</th>
                            <td>{{$data['row']->name}}</td>
                        </tr>


                        <tr>
                            <th>Email</th>
                            <td>{{$data['row']->email}}</td>
                        </tr>


                        <tr>
                            <th>Username</th>
                            <td>{{$data['row']->username}}</td>
                        </tr>


                        <tr>
                            <th>Profile Picture</th>
                            <td>
                                <img src="{{asset('uploads/'. $data['row']->profile_picture)}}" alt="" width="100px" height="100px">
                            </td>
                        </tr>

                        <tr>
                            <th>Cotact No.</th>
                            <td>{{$data['row']->contact_number}}</td>
                        </tr>



                        </thead>



                    </table>
                </div>



                <!--Room Details-->
                <h4>Room Posted by {{$data['row']->name}}</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Description</th>
                            <th>Rental Amount</th>
                            <th>City</th>
                            <th>Area</th>
                            <th>Room Type</th>
                            <th>Status</th>

                        </tr>
                        </thead>

                        <tbody>

                          @forelse($data['room'] as $index=>$data)
                              <tr>
                          <td>
                              {{$index+1}}
                          </td>
                              <td>
                                  {{$data->description}}
                              </td>
                              <td>
                                  {{$data->rental_amount}}
                              </td> <td>
                                  {{$data->city}}
                              </td> <td>
                                  {{$data->area}}
                              </td> <td>
                                  {{$data->roomType->name}}
                              </td>

                                  <td>
                                      @if($data->status == 1)
                                          <p style="color: green">Available</p>
                                      @else
                                          <p style="color:red" class="red">Not Available</p>
                                      @endif
                              </td>
                              </tr>
                          @empty


                      <td colspan="7" style="text-align: center;color:red">
                       No rooms added.

                      </td>
                        @endforelse
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

