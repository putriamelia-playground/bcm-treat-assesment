<?php

namespace App\Models;

use App\Models\AparType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class AparTool extends Model
{
    protected $table = 'bcm_apar_tools';

    public function aparType(): BelongsTo
    {
        return $this->belongsTo(AparType::class, 'apar_type_id');
    }
}
