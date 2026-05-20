<?php

namespace App\Models;

use Database\Factories\GroupUserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    /** @use HasFactory<GroupUserFactory> */
    use HasFactory;

    protected $table = 'group_users';

    protected $fillable = [
        'group_id',
        'user_id',
        'status',
        'role',
        'token',
        'token_expire_date',
        'token_used',
        'created_by',
    ];
}
