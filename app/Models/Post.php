<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = ['bait', 'content', 'guild_id', 'channel_id', 'post_id'];

    protected $with = ['guild'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function guild(): BelongsTo
    {
        return $this->belongsTo(Guild::class);
    }
}
