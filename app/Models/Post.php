<?php

namespace App\Models;

use App\Observers\PostObserver;
use App\Services\ContentParsing\Enricher;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

#[ObservedBy(PostObserver::class)]
class Post extends Model
{
    protected $fillable = ['bait', 'content', 'guild_id', 'channel_id', 'post_id', 'user_id'];

    protected $with = ['guild'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function guild(): BelongsTo
    {
        return $this->belongsTo(Guild::class);
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
}
