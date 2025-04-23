<?php

namespace App\Models;

use App\Models\ApabTool;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class ApabType extends Model
{
    protected $table = 'bcm_apab_types';

    public function apab(): HasMany
    {
        return $this->hasMany(ApabTool::class);
    }
}
