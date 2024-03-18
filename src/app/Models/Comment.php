<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    
    protected $table = 'comments';

    /**
     * Получить родительскую модель (пользователя или поста), к которой относится изображение.
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
