<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ["comment", "post_id", "user_id"];


    //Relationship To Post
    public function post()
    {
        return $this->belongsTo(Post::class, "post_id");
    }

    //Relationship To User
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    //Relationship To Replies
    public function replies(){
        return $this->hasMany(Reply::class,"comment_Id");
    }

    //Relationship to likes
    public function likes(){
        return $this->hasMany(Like::class,"comment_Id");
    }
}
