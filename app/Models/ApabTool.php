<?php

namespace App\Models;

use App\Models\ApabType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class ApabTool extends Model
{
    protected $table = 'bcm_apab_tools';

    public function apabType(): BelongsTo
    {
        return $this->belongsTo(ApabType::class, 'apab_type_id');
    }
}
