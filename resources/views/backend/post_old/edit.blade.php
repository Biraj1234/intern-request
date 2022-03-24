@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit') }}</div>

                    <div class="card-body">

                        <form action="{{ route('post.update', $data['row']->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="title" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ $data['row']->title }}" autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>

                                <div class="col-md-6">
                                    <input id="description" type="text"
                                        class="form-control @error('description') is-invalid @enderror" name="description"
                                        value="{{ $data['row']->description }}" autocomplete="description">

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="position" class="col-md-4 col-form-label text-md-end">Position</label>

                                <div class="col-md-6">
                                    <input id="position" type="number"
                                        class="form-control @error('position') is-invalid @enderror" name="position"
                                        value="{{ $data['row']->position }}" autocomplete="position" autofocus>

                                    @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="age" class="col-md-4 col-form-label text-md-end">Status</label>

                                <div class="col-md-6">

                                    @if ($data['row']->status == 1)
                                        <input id="status" type="radio" class="form-check-input" name="status" value="1"
                                            checked>Active
                                        <input id="status" type="radio" class="form-check-input" name="status"
                                            value="0">Inactive
                                    @endif

                                    @if ($data['row']->status == 0)
                                        <input id="status" type="radio" class="form-check-input" name="status"
                                            value="1">Active
                                        <input id="status" type="radio" class="form-check-input" name="status" value="0"
                                            checked>Inactive
                                    @endif

                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>

                                <div class="col-md-6">
                                    <input id="image_file" type="file"
                                        class="form-control @error('image_file') is-invalid @enderror" name="image_file"
                                        value="{{ old('image_file') }}" autocomplete="image_file">

                                    @error('image_file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="old">
                                        <span>Old Image</span> <br>
                                        <img src="{{ asset('uploads/posts/' . $data['row']->image) }}"
                                            class="rounded">
                                    </div>
                                </div>
                            </div>



                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-warning">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
