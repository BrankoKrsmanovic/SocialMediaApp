@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-3 p-5">
                <img src="https://s3.amazonaws.com/freecodecamp/curriculum-diagram-full.jpg"
                     class="rounded-circle w-100">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">

                    <div class="d-flex align-items-center pb-4">
                        <div class="h4 mr-2">{{$user->username}}</div>

                        <a href="/p/create">Add new post</a>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="pr-sm-5">
                        <span class="font-weight-bold">3</span>
                        <span>posts</span>
                    </div>
                    <div class="pr-sm-5">
                        <span class="font-weight-bold">10</span>
                        <span> followers</span>
                    </div>
                    <div class="pr-sm-5">
                        <span class="font-weight-bold">5</span>
                        <span>following</span>
                    </div>
                </div>

                <div class="pt-sm-4 font-weight-bold">Naslov</div>
                <div>Opis</div>
                <div><a href="#">www.google.com</a></div>

            </div>

            <div class="row pt-sm-5">
                <div class="col-4 pb-4">
                    <img
                        src="https://instagram.fbeg4-1.fna.fbcdn.net/v/t51.2885-15/e35/80567208_1398308817014780_3527894357366973531_n.jpg?_nc_ht=instagram.fbeg4-1.fna.fbcdn.net&_nc_cat=108&_nc_ohc=kvi14NKw_uUAX9oDx2o&oh=63312a6eea7056ebcc4d8ae88d0a230b&oe=5EB586AD"
                        class="w-100">
                </div>
                <div class="col-4 pb-4">
                    <img
                        src="https://instagram.fbeg4-1.fna.fbcdn.net/v/t51.2885-15/e35/80567208_1398308817014780_3527894357366973531_n.jpg?_nc_ht=instagram.fbeg4-1.fna.fbcdn.net&_nc_cat=108&_nc_ohc=kvi14NKw_uUAX9oDx2o&oh=63312a6eea7056ebcc4d8ae88d0a230b&oe=5EB586AD"
                        class="w-100">
                </div>
                <div class="col-4 pb-4">
                    <img
                        src="https://instagram.fbeg4-1.fna.fbcdn.net/v/t51.2885-15/e35/80567208_1398308817014780_3527894357366973531_n.jpg?_nc_ht=instagram.fbeg4-1.fna.fbcdn.net&_nc_cat=108&_nc_ohc=kvi14NKw_uUAX9oDx2o&oh=63312a6eea7056ebcc4d8ae88d0a230b&oe=5EB586AD"
                        class="w-100">
                </div>
            </div>
        </div>
@endsection
