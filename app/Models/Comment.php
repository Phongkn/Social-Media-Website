<?php

namespace App\Models;

use Database\Factories\CommentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<CommentFactory> */
    use HasFactory;

    protected $table = 'comments';

    public $timestamps = false;

    protected $fillable = [
        'post_id',
        'comment',
        'user_id',
        'created_at',
    ];
}
