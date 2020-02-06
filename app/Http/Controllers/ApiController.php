<?php

namespace App\Http\Controllers;

use App\Post;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function followUser(User $user)
    {
        return auth()->user()->following()->toggle($user->profile);
    }

    public function likePost(Post $post)
    {
        return auth()->user()->likedPosts()->toggle($post);
    }

    public function getNumberOfLikes(Post $post)
    {
        return $post->usersWhoLiked->count();
    }

    public function destroy(Post $post)
    {
        DB::table('post_user')->where('post_id', '=', $post->id)->delete();

        $post->delete();
        if (!Post::where('id', '=', $post->id)->exists())
            return ['status' => 'success'];
        return ['status' => 'failed'];
    }

    public function getProfiles($criteria)
    {
        $users = User::where('username', 'like', '%' . $criteria . '%')->get()->pluck('id');;
        return Profile::whereIn('user_id', $users)->with('user')->get();
    }
}
