<?php

namespace App\Models;

use App\Models\RegulationType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    protected $table = 'bcm_regulations';

    public function regulationType(): BelongsTo
    {
        return $this->belongsTo(RegulationType::class, 'bcm_regulation_type_id');
    }
}
