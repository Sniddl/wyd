<?php

namespace App\Livewire\Concerns;

use App\Livewire\Forms\ShoutForm;
use App\Models\Post;
use App\Models\PostReaction;
use App\Models\Reaction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait InteractsWithFeed
{
    use InteractsWithThread;

    public ShoutForm $shoutForm;

    public function shout()
    {
        $this->shoutForm->validate();

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->posts()->create([
            'bait' => $this->shoutForm->bait,
            'guild_id' => $this->post?->guild_id ?? $this->guild?->id,
            'channel_id' => $this->post?->channel_id ?? $this->thread?->id ?? $this->channel?->id,
            'post_id' => $this->post?->id,
            'depth' => ($this->post?->depth ?? -1) + 1,
        ]);

        if ($this->post) {
            $this->post->replyCount += 1;
            $this->post->save();
        }

        $this->shoutForm->reset();
        $this->dispatch('shout');
    }

    public function posts(): Builder
    {
        return Post::query()
            ->latest()
            ->where(function ($query) {
                $query->whereNull('post_id')
                    ->orWhere('replyCount', '>=', 2);
            })

            ->withCount('replies');
    }

    public function getAvailableReactions()
    {
        return Reaction::whereNull('guild_id')->whereNull('channel_id')->get();
    }

    public function react($postId, $reactionId)
    {
        $reaction = PostReaction::withTrashed()->firstOrNew([
            'user_id' => Auth::user()->id,
            'post_id' => $postId,
            'reaction_id' => $reactionId
        ]);

        if ($reaction->id && !$reaction->deleted_at) {
            $reaction->delete();
        } else {
            $reaction->deleted_at = null;
            $reaction->save();
        }
    }
}
