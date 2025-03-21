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
        Schema::create('bcm_building_photos', function (Blueprint $table) {
            $table->id();
            $table->string('bcm_building_assignment_code');
            $table->string('building_address');
            $table->string('front_building_photo');
            $table->string('entrance_building_photo');
            $table->string('exit_building_photo');
            $table->string('leftside_building_photo');
            $table->string('rightside_building_photo');
            $table->string('behind_building_photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bcm_building_photos');
    }
};
