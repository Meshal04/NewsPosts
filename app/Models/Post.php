<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    use HasFactory;
    
    // It is important to use fillable in models and controllers to fill the fields in the database
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id',
        'image'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
