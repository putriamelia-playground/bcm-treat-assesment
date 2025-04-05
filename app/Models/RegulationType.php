<?php

namespace App\Models;

use App\Models\Regulation;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class RegulationType extends Model
{
    protected $table = 'bcm_regulation_types';

    public function regulation(): HasMany
    {
        return $this->hasMany(Regulation::class);
    }
}
