<?php

namespace App\Models;

use Database\Factories\GroupUserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    /** @use HasFactory<GroupUserFactory> */
    use HasFactory;

    protected $fillable = [
        'group_id',
        'user_id',
    ];
}
