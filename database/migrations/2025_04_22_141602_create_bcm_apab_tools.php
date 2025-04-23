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
        Schema::create('bcm_apab_tools', function (Blueprint $table) {
            $table->id();
            $table->string('bcm_assessment_code')->nullable();
            $table->foreignId('apab_type_id')->nullable();
            $table->string('apab_weight')->nullable();
            $table->string('amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bcm_apab_tools');
    }
};
