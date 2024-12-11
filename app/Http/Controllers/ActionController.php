<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Post;
use App\Models\PostReaction;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;

class ActionController extends Controller
{
    public function react(Request $request)
    {
        if (Auth::check()) {
            $r = Reaction::find($request->reactionId);
            $reaction = PostReaction::withTrashed()->firstOrNew([
                'user_id' => Auth::user()->id,
                'post_id' => $request->postId,
                'reaction_id' => $request->reactionId
            ]);

            if ($reaction?->id && !$reaction->deleted_at) {
                $reaction->delete();
            } else {
                $reaction->deleted_at = null;
                $reaction->save();
            }

            $post = Post::find($request->postId);
            if ($post->user_id !== Auth::user()->id) {
                Notification::firstOrCreate([
                    'user_id' => $post->user_id,
                    'post_id' => $post->id,
                    'creator_id' => Auth::user()->id,
                    'type' => 'reaction',
                    'message' => $r->emoji,
                ]);
            }
        }

        $reactions = Reaction::query()
            ->select("emoji", DB::raw("COUNT(*) as count"))
            ->join("post_reaction", "reactions.id", "=", "post_reaction.reaction_id")
            ->where("post_reaction.post_id", $request->postId)
            ->whereNull('post_reaction.deleted_at')
            ->groupBy("emoji")
            ->orderBy("count", "asc")
            ->get();



        return [
            'reactions' => $reactions->pluck('emoji'),
            'selected' => Auth::check() ? $post->reactions()
                ->where('user_id', Auth::user()->id)
                ->pluck('emoji') : [],
            'total' => Number::abbreviate($reactions->sum('count'))
        ];
    }
}
