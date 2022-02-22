<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'comment',
        'blog_id',
        'parent_id',
    ];

    protected $with = ['comments'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id')->orderBy('created_at', 'DESC');
    }
}
