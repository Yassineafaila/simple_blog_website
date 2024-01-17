<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable=["user_id","comment_Id"];


    //Relationship to Comment
    public function comment(){
        return $this->belongsTo(Comment::class,"comment_Id");
    }
}
