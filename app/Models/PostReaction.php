<?php

namespace App\Models;

use Database\Factories\PostReactionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostReaction extends Model
{
    /** @use HasFactory<PostReactionFactory> */
    use HasFactory;

    protected $table = 'post_reactions';

    public $timestamps = false;

    protected $fillable = [
        'post_id',
        'type',
        'user_id',
        'created_at',
    ];
}
