<?php

namespace App\Models;

use App\Models\AparTool;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class AparType extends Model
{
    protected $table = 'bcm_apar_types';

    public function apar(): HasMany
    {
        return $this->hasMany(AparTool::class);
    }
}
