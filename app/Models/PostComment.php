<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'created_by',
        'post_id',
        'comment',
        'updated_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
    
};