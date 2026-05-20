<?php

namespace App\Models;

use Database\Factories\PostAttachmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostAttachment extends Model
{
    /** @use HasFactory<PostAttachmentFactory> */
    use HasFactory;

    protected $table = 'post_attachments';

    public $timestamps = false;

    protected $fillable = [
        'post_id',
        'name',
        'path',
        'url',
        'mime',
        'size',
        'created_by',
        'created_at',
    ];
}
