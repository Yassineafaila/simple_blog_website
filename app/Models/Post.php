<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["title", "user_id", "description", "cover", "content", "categories"];
    public function scopeFilter($query, array $filters)
    {
        if ($filters["category"] ?? false) {
            $query->where("categories", "like", "%" . request("category") . "%");
        }
        if ($filters["search"] ?? false) {
            $query->where("title", "like", "%" . request("search") . "%")->orWhere("description", "like", "%" . request("search") . "%")->orWhere("categories", "like", "%" . request("search") . "%");
        }
    }
    //Relationship To User
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
