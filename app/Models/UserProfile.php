<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{


    protected $fillable = [
        'user_id',
        'bio',
        'profile_picture',
        'cover_picture',
        'full_name',
        'nickname',
        'updated_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function post()
    {
        return $this->hasMany(Post::class, 'created_by');
    }
    public function postComment()
    {
        return $this->hasMany(PostComment::class, 'created_by');
    }

}
