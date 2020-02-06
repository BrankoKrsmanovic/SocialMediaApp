{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}

{{--        <div class="row">--}}
{{--            <div class="col-3 p-5">--}}
{{--                <img src="https://s3.amazonaws.com/freecodecamp/curriculum-diagram-full.jpg"--}}
{{--                     class="rounded-circle w-100">--}}
{{--            </div>--}}
{{--            <div class="col-9 pt-5">--}}
{{--                <div class="d-flex justify-content-between align-items-baseline">--}}

{{--                    <div class="d-flex align-items-center pb-4">--}}
{{--                        <div class="h4 mr-2">{{$user->username}}</div>--}}
{{--                    </div>--}}

{{--                    <a href="/post/create">Add new post</a>--}}

{{--                </div>--}}

{{--                <a href="/profile/{{$user->id}}/edit">Edit profile</a>--}}

{{--                <div class="d-flex">--}}
{{--                    <div class="pr-sm-5">--}}
{{--                        <span class="font-weight-bold">3</span>--}}
{{--                        <span>posts</span>--}}
{{--                    </div>--}}
{{--                    <div class="pr-sm-5">--}}
{{--                        <span class="font-weight-bold">10</span>--}}
{{--                        <span> followers</span>--}}
{{--                    </div>--}}
{{--                    <div class="pr-sm-5">--}}
{{--                        <span class="font-weight-bold">5</span>--}}
{{--                        <span>following</span>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="pt-sm-4 font-weight-bold">Naslov</div>--}}
{{--                <div>Opis</div>--}}
{{--                <div><a href="#">www.google.com</a></div>--}}

{{--            </div>--}}

{{--            <div class="row pt-sm-5">--}}

{{--                @foreach($user->posts as $post)--}}
{{--                    <div class="col-4 pb-4">--}}
{{--                        <img src="{{$post->image}}" class="w-100">--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-3 p-5">
                <img src="{{$user->profile->profileImage()}}"
                     class="rounded-circle w-100">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">

                    <div class="d-flex align-items-center pb-4">
                        <div class="h4 mr-2">{{$user->username}}</div>

                        @can('follow', $user->profile)
                            <follow-button
                                user-id="{{$user->id}}"
                                follows="{{$follows}}"
                            >
                            </follow-button>
                        @endcan
                    </div>

                    @can('update', $user->profile)
                        <a href="/post/create">Add new post</a>
                    @endcan

                </div>
                @can('update', $user->profile)
                    <a href="/profile/{{$user->id}}/edit">Edit profile</a>
                @endcan
                <profile-stats
                    followers-count="{{$followersCount}}"
                    following-count=" {{$followingCount}}"
                    posts-count="{{$postsCount}}">
                </profile-stats>

                <div class="pt-sm-4 font-weight-bold">{{$user->profile->title}}</div>
                <div>{{$user->profile->description}}</div>
                <div><a href="#">{{$user->profile->url}}</a></div>
            </div>
        </div>

        <div class="row pt-sm-5">

            @foreach($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/post/{{$post->id}}">
                        <img src="{{$post->image}}" class="w-100">
                    </a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
