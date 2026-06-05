<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['attempt_id', 'question_id', 'selected_answer', 'is_correct'])]
class TestAnswer extends Model
{
    protected function casts(): array
    {
        return [
            'is_correct' => 'boolean',
        ];
    }

    public function testAttempt(): BelongsTo
    {
        return $this->belongsTo(TestAttempt::class, 'attempt_id');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
