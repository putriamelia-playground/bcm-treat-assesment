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
        Schema::create('bcm_disaster_histories', function (Blueprint $table) {
            $table->id();
            $table->string('bcm_assessment_code');
            $table->string('disaster_type');
            $table->date('disaster_time');
            $table->string('disaster_impact');
            $table->string('disaster_fatality');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bcm_disaster_histories');
    }
};
