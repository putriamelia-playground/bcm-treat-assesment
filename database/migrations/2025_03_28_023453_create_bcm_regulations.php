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
        Schema::create('bcm_regulations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bcm_regulation_type_id')->constrained();
            $table->string('regulation_value');
            $table->string('regulation_year');
            $table->boolean('regulation_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bcm_regulations');
    }
};
