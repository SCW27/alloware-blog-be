<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id', 'id')->orderBy('created_at', 'DESC');
    }
}
