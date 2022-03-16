<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";

    protected $fillable = [
        'blogger_id',
        'category_id',
        'title',
        'text',
        'tags',
        'image',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function blogger(){
        return $this->belongsTo(User::class);
    }

    public function commentaries(){
        return $this->hasMany(Commentary::class);
    }
}
