<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['topic_id', 'title', 'description', 'content', 'video_url'])]
class Material extends Model
{
    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }
}
