<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Category extends Model
{
    use HasFactory;

    protected $searchableColumns = ['name'];
    protected $fillable = ["name"];

    public function scopeSearch($query, $term)
    {
        return $query->where('name', 'like', '%' . $term . '%');
    }

}
