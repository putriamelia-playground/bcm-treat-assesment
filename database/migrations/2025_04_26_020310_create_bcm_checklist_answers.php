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
        Schema::create('bcm_checklist_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('safety_tool_id')->nullable();  // TODO ini perlu atau engga karna di items udah ada
            $table->foreignId('checklist_item_id')->nullable();  // TODO ini perlu atau engga karna di items udah ada
            $table->boolean('condition_answer');
            $table->boolean('function_answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bcm_checklist_answers');
    }
};
