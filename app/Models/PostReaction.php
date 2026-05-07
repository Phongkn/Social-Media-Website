<?php

namespace App\Models;

use Database\Factories\PostReactionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostReaction extends Model
{
    /** @use HasFactory<PostReactionFactory> */
    use HasFactory;
}
