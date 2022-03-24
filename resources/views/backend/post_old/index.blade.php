@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex">
                        <div class="p-2 flex-grow-1 bd-highlight">Your Posts</div>
                        <div class="p-2 bd-highlight"><a href="{{ route($base_route . 'create') }}"
                                class="btn btn-success">Add</a>
                        </div>

                    </div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ Session::get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif


                        <div class="card-container">
                            @forelse ($posts as $post)
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('uploads/posts/' . $post->image) }}" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <p class="card-text">{{ $post->description }}</p>

                                    </div>

                                    <div class="buttons">
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>


                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Do you want to delete this??')">Delete</button>
                                        </form>
                                    </div>

                                </div>
                            @empty
                                <p>No post created</p>
                            @endforelse
                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
