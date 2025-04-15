<?php

namespace App\Models;

use App\Models\AssessmentCode;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class BuildingPhoto extends Model
{
    protected $table = 'bcm_building_photos';

    public function codeAssessment(): BelongsTo
    {
        return $this->belongsTo(AssessmentCode::class, 'bcm_assessment_code');
    }
}
