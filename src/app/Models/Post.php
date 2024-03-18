<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use  HasFactory;

    protected $table = 'posts';

    /**
     * Получить изображение поста.
     */
    public function comment()
    {
        return $this->morphOne(Comment::class, 'commentable');
    }
}
