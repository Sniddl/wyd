<?php

namespace App\Models;

use App\Observers\PostObserver;
use App\Services\Content\Enricher;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Laravel\Scout\Searchable;

#[ObservedBy(PostObserver::class)]
class Post extends Model
{
    use Searchable;

    protected $fillable = ['bait', 'content', 'guild_id', 'channel_id', 'post_id', 'user_id', 'depth'];

    protected $with = ['guild'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function guild(): BelongsTo
    {
        return $this->belongsTo(Guild::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function replies()
    {
        return $this->hasMany(Post::class);
    }

    public function hashtags(): MorphToMany
    {
        return $this->morphToMany(Hashtag::class, 'model', 'hashtaggables')->withTimestamps();
    }

    public function enrich($db = false): Post
    {
        $enricher = new Enricher($db);
        $this->enriched_bait = $enricher->enrich($this, $this->bait);
        $this->save();
        return $this;
    }

    public function reactions()
    {
        return $this->belongsToMany(Reaction::class, 'post_reaction')
            ->wherePivotNull('deleted_at')
            ->withPivot(['user_id']);
    }
}
