<?php

namespace App\Models;

use App\Models\OwnershipStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class CompanyData extends Model
{
    protected $table = 'bcm_company_data';

    public function buildingownership(): BelongsTo
    {
        return $this->belongsTo(OwnershipStatus::class, 'bcm_building_ownership_status_id');
    }
}
