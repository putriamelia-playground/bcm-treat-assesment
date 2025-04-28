<?php

namespace App\Models;

use App\Models\ChecklistItem;
use App\Models\SafetyTool;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class ChecklistAnswer extends Model
{
    protected $table = 'bcm_checklist_answers';

    public function safetyTool(): BelongsTo
    {
        return $this->belongsTo(SafetyTool::class, 'safety_tool_id');
    }

    public function checklistItem(): BelongsTo
    {
        return $this->belongsTo(ChecklistItem::class, 'checklist_item_id');
    }
}
