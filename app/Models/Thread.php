<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Thread extends Model
{
    protected $table = 'channels';

    public function getRouteKeyName()
    {
        return 'identifier';
    }

    protected static function booted(): void
    {
        static::addGlobalScope('threads', function (Builder $builder) {
            $builder->whereNotNull('channel_id');
        });
    }

    public function guild(): BelongsTo
    {
        return $this->belongsTo(Guild::class, 'guild_id');
    }

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }
}
