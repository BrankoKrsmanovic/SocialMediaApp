<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function usersWhoLiked()
    {
        return $this->belongsToMany(User::class);
    }

    public function liked()
    {
        return auth()->user()->likedPosts->contains($this->id);
    }

    public function canDelete()
    {
        return $this->user_id == auth()->user()->id;
    }
}
