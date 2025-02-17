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
        Schema::create('price_modifiers', function (Blueprint $table) {
            $table->id('modifier_id');
            $table->string('modifier_name');
            $table->foreignId('service_id')->references('service_id')->on('services')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('category_id')->references('category_id')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->double('price_increase', 8, 2);
            $table->string('description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_modifiers');
    }
};
