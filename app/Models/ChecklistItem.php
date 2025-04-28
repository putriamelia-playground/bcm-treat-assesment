<?php

namespace App\Models;

use App\Models\ChecklistAnswer;
use App\Models\SafetyTool;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    protected $table = 'bcm_checklist_items';

    public function checklistToSafety(): BelongsTo
    {
        return $this->belongsTo(SafetyTool::class, 'safety_tool_id');
    }

    public function ChecklistToAnswer(): HasMany
    {
        return $this->hasMany(ChecklistAnswer::class);
    }
}
