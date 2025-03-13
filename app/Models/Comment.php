<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name',
        'comment',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
