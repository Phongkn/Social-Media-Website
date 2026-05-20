<?php

namespace App\Models;

use Database\Factories\FollowerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    /** @use HasFactory<FollowerFactory> */
    use HasFactory;

    protected $table = 'followers';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'follower_id',
        'created_at',
    ];
}
