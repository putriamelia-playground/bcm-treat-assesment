<?php

namespace App\Models;

use App\Models\ChecklistAnswer;
use App\Models\ChecklistItem;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class SafetyTool extends Model
{
    protected $table = 'bcm_safety_tools';

    public function ChecklistItems(): HasMany
    {
        return $this->hasMany(ChecklistItem::class);
    }

    // public function safetyToAnswer(): HasMany
    // {
    //     return $this->hasMany(ChecklistAnswer::class);
    // }
}
