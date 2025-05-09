<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bcm_building_safety_structures', function (Blueprint $table) {
            $table->id();
            $table->string('bcm_assessment_code');
            $table->boolean('location_type');
            $table->string('building_floor');
            $table->string('status');
            $table->string('name');
            $table->string('phone_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bcm_building_safety_structures');
    }
};
