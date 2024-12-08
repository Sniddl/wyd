<?php

namespace App\Observers;

use App\Models\Hashtag;

class HashtagObserver
{
    public function saving(Hashtag $hashtag)
    {
        $hashtag->name = str($hashtag->name)->lower()->value();
    }
}
