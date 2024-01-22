<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    use HasFactory;
    protected $fillable=["post_id","user_id"];
    //Relationship with user
    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }
    //relationship with post
    public function post()
    {
        return $this->belongsTo(Post::class,"post_id");
    }
}
