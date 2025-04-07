<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'created_by',
        'post_id',
        'description',
        'media_link',
        'updated_at',
    ]; 

    public function user(){
        return $this->belongsTo(User::class, 'created_by');
    }
    public function postComment(){
        return $this->hasMany(PostComment::class, 'post_id');
    }
    public function video(){
        return $this->hasOne(PostComment::class, 'post_id');
    }
}
