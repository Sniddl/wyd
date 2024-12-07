<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use SoftDeletes;

    protected $table = 'channels';

    protected $fillable = ['name', 'identifier', 'channel_id', 'guild_id', 'deleted_at'];

    public function getRouteKeyName()
    {
        return 'identifier';
    }

    protected static function booted(): void
    {
        static::addGlobalScope('threads', function (Builder $builder) {
            $builder->whereNotNull('channel_id')->orderBy('order', 'asc');
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
