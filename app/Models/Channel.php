<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Channel extends Model
{
    /** @use HasFactory<\Database\Factories\ChannelFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'identifier', 'channel_id', 'guild_id', 'deleted_at'];

    public function getRouteKeyName()
    {
        return 'identifier';
    }

    protected static function booted(): void
    {
        static::addGlobalScope('channels', function (Builder $builder) {
            $builder->whereNull('channel_id')->orderBy('order', 'asc');
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

    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class, 'channel_id');
    }
}
