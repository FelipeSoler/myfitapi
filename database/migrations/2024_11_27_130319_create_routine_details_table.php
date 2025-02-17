<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('routine_details', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('routine_id')->constrained('routines');
            $table->foreignId('exercise_id')->constrained('exercises');
            $table->integer('sets');
            $table->integer('reps');
            $table->integer('weight');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routine_details');
    }
};
