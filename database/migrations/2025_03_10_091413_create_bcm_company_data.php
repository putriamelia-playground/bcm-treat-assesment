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
        Schema::create('bcm_company_data', function (Blueprint $table) {
            $table->id();
            $table->string('building_assignment_code');
            $table->string('company_name');
            $table->string('building_name');
            $table->string('build_year');
            $table->string('use_year');
            $table->foreignId('bcm_building_ownership_status_id')->constrained();
            $table->string('bulding_resident');
            $table->string('building_floor');
            $table->string('building_basement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bcm_company_data');
    }
};
