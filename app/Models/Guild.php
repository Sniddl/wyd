<?php

namespace App\Models;

use App\Observers\GuildObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy(GuildObserver::class)]
class Guild extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'identifier', 'owner_id'];

    // protected $primaryKey = 'identifier';

    public function getRouteKeyName()
    {
        return 'identifier';
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function channels(): HasMany
    {
        return $this->hasMany(Channel::class)->whereNull('channel_id');
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'guild_user');
    }

    public function href($channel = null, $thread = null)
    {
        return route('thread', [
            'guild' => $this,
            'channel' => $channel,
            'thread' => $thread,
        ]);
    }
}
