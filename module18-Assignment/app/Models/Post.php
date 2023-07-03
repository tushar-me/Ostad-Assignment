<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTotalPostsByCategory($categoryId)
    {
        return $this->where('category_id', $categoryId)->count();
    }
    use SoftDeletes;
    public function getSoftDeletedPosts()
    {
        return $this->onlyTrashed()->get();
    }

}