<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphPivot;

class Hashtaggable extends MorphPivot
{
    protected $table = 'hashtaggables';

    public function hashtag()
    {
        return $this->hasOne(Hashtag::class);
    }
}
