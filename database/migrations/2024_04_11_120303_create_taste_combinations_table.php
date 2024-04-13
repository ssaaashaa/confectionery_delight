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
        Schema::create('taste_combinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("biscuit_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("fill_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->text("img")->nullable();
            $table->decimal("ratio");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taste_combinations');
    }
};
