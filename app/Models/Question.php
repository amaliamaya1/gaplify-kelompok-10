<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['topic_id', 'question', 'option_a', 'option_b', 'option_c', 'option_d', 'correct_answer'])]
class Question extends Model
{
    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function testAnswers(): HasMany
    {
        return $this->hasMany(TestAnswer::class);
    }
}
