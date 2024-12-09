<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostReaction extends Model
{
    use SoftDeletes;

    protected $table = 'post_reaction';

    protected $fillable = ['user_id', 'post_id', 'reaction_id', 'deleted_at'];
}
