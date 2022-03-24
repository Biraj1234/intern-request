@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Post') }}</div>

                    <div class="card-body">




                        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                            @csrf



                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="title" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

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
                                    <textarea name="description" id="description" cols="30" rows="10"
                                        class="form-control @error('description') is-invalid @enderror"
                                        autocomplete="description">{{ old('description') }}</textarea>

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
                                        value="{{ old('position') }}" autocomplete="position" autofocus>

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
                                    <input id="status" type="radio" class="form-check-input" name="status" value="1">Active
                                    <input id="status" type="radio" class="form-check-input" name="status" value="0"
                                        checked>Inactive

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
                                </div>
                            </div>



                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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
