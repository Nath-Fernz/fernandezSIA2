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
        Schema::create('booking_services', function (Blueprint $table) {
            $table->id('booking_service_id');
            $table->foreignId('booking_id')->references('booking_id')->on('bookings')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('service_id')->references('service_id')->on('services')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('staff_id')->references('staff_id')->on('staff')->cascadeOnUpdate()->cascadeOnDelete();
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('price');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_services');
    }
};
