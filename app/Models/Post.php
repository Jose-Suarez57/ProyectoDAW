<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";

    protected $fillable = [
        'category_id',
        'title',
        'text',
        'tags',
        'image_url',
        'banned',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}