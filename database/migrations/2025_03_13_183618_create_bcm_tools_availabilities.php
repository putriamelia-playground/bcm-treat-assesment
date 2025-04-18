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
        Schema::create('bcm_tools_availabilities', function (Blueprint $table) {
            $table->id();
            $table->string('bcm_building_assignment_code');
            $table->string('tools');
            $table->string('tools_type');
            $table->boolean('is_available')->nullable();
            $table->string('amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bcm_tools_availabilities');
    }
};
