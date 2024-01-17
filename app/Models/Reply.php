<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = ["content", "user_id", "comment_Id", "post_id"];


    //RelationShip with comment
    public function comment(){
        return $this->belongsTo(Comment::class,"comment_Id");
    }

    //Relationship with user
    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }
}
