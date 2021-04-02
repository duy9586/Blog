<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatModel extends Model
{
    protected $fillable = [
        'author',
        'content',
        'receiver'
    ];
}
