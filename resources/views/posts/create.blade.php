@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row pt-3 d-flex justify-content-between align-items-baseline">
                    <h1>Add New Post</h1>
                    <a href="/post/random">Generate Random Post</a>
                </div>

                <div class="row p-2">
                </div>

                <form action="/post" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label ">Post Caption</label>

                        <input id="caption" type="text"
                               class="form-control @error('caption') is-invalid @enderror" name="caption"
                               value="{{ old('caption') }}" autocomplete="off" autofocus autocomplete="off">

                        @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label ">Post Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                        @error('image')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Add New Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
