@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach($posts as $post)
            <indexed-post
                profile-image="{{$post->user->profile->profileImage()}}"
                user-id="{{$post->user->id}}"
                username="{{$post->user->username}}"
                image="{{$post->image}}"
                caption="{{$post->caption}}"
                liked="{{$post->liked()}}"
                post-id="{{$post->id}}"
            ></indexed-post>
        @endforeach
    </div>
@endsection
