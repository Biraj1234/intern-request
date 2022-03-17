@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex">
                        <div class="p-2 flex-grow-1 bd-highlight">Profile</div>


                    </div>

                    <div class="card-body">

                        <div class="card-container">
                            <div class="user-info">

                                <div class="details">
                                    <span>Name:</span> {{ Auth::user()->name }} <br>
                                    <span>Email:</span> {{ Auth::user()->email }} <br>
                                    <span> Bio:</span> {{ Auth::user()->bio }} <br>
                                    <span> Posts:</span> {{ $count }} <br>

                                    <div class="buttons">
                                        <a href="{{ route('user.edit', Auth::user()->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('user.destroy', Auth::user()->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete your account?? Everyting will be deleted posted by you.')">Delete</button>
                                        </form>
                                    </div>
                                </div>



                                <div class="image">
                                    <img src="{{ asset('uploads/users/' . Auth::user()->image) }}" alt="" height="200px">
                                </div>


                            </div>

                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
