@extends('layouts.app')

@section('content')
    <single-post
        profile-image="{{$post->user->profile->profileImage()}}"
        user-id="{{$post->user->id}}"
        username="{{$post->user->username}}"
        image="{{$post->image}}"
        caption="{{$post->caption}}"
        liked="{{$post->liked()}}"
        post-id="{{$post->id}}"
        candelete="{{$post->canDelete()}}"
    ></single-post>
@endsection
