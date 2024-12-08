<?php

namespace App\Livewire\Concerns;

use Illuminate\Support\Facades\DB;

trait InteractsWithMostRecentTags
{
    public function getMostRecentTags()
    {
        return DB::table("hashtaggables")
            ->join("hashtags", "hashtaggables.hashtag_id", "=", "hashtags.id")
            ->select(
                "hashtags.name",
                DB::raw("MAX(hashtaggables.created_at) as last_used")
            )
            ->groupBy("hashtags.name")
            ->orderByDesc("last_used")
            ->limit(50)
            ->get();
    }
}
