<?php

namespace App\Models;

use Database\Factories\PostAttachmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostAttachment extends Model
{
    /** @use HasFactory<PostAttachmentFactory> */
    use HasFactory;
}
