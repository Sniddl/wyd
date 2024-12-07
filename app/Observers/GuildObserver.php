<?php

namespace App\Observers;

use App\Models\Guild;

class GuildObserver
{
    public function created(Guild $guild)
    {
        $guild->channels()->create([
            'name' => 'General',
            'identifier' => 'general'
        ]);
    }
}
