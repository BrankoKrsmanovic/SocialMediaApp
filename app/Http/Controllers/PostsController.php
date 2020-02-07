<?php

namespace App\Http\Controllers;

use App\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->get();


        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function storeRandom()
    {
        $data = request()->validate([
            'caption' => 'required',
            'url' => 'required'
        ]);


        $image = Image::make(request('url'))->fit(1200, 1200)->encode('jpg');
        $hash = md5($image->__toString());
        $path = "storage/uploads/{$hash}.jpg";

        $image->save(public_path($path));


        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => '/storage/uploads/' . $hash . '.jpg',
        ]);

        return [ 'profile' => '/profile/' . auth()->user()->id];
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => '/storage/' . $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function random()
    {
        return view('posts.random');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
