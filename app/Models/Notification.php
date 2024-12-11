<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    /** @use HasFactory<\Database\Factories\NotificationFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'post_id', 'type', 'creator_id', 'message'];

    protected $casts = [
        'messages' => 'array'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
