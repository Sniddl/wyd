<?php

namespace App\Livewire\Concerns;

use App\Livewire\Forms\ShoutForm;
use App\Models\Post;
use App\Models\PostReaction;
use App\Models\Reaction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;

trait InteractsWithFeed
{
    use InteractsWithThread;

    public ShoutForm $shoutForm;

    public function shout()
    {
        $this->shoutForm->validate();

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $post = $user->posts()->create([
            'bait' => $this->shoutForm->bait,
            'guild_id' => $this->post?->guild_id ?? $this->guild?->id,
            'channel_id' => $this->post?->channel_id ?? $this->thread?->id ?? $this->channel?->id,
            'post_id' => $this->post?->id,
            'depth' => ($this->post?->depth ?? -1) + 1,
        ]);

        $post->searchable();

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

    public function getReactionsForPosts($posts)
    {
        $postIds = $posts->pluck('id');
        $reactions = [];
        foreach ($postIds as $id) {
            $reactions[$id] = [
                'emojis' => '❤️',
                'total' => 0,
            ];
        }
        Reaction::query()
            ->select("post_reaction.post_id", "emoji", DB::raw("COUNT(*) as count"))
            ->join("post_reaction", "reactions.id", "=", "post_reaction.reaction_id")
            ->whereIn("post_reaction.post_id", $posts->pluck('id'))
            ->whereNull("post_reaction.deleted_at")
            ->groupBy("post_reaction.post_id", "emoji")
            ->orderBy("count", "asc")
            ->get()
            ->groupBy("post_id")
            ->each(function ($group, $postId) use (&$reactions) {
                $reactions[$postId] = [
                    'emojis' => $group->pluck('emoji')->join(' '),
                    'total' => Number::abbreviate($group->sum('count'))
                ];
            });

        return collect($reactions);
    }
}
