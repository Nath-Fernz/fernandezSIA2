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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->foreignId('booking_id')->references('booking_id')->on('bookings')->cascadeOnUpdate()->cascadeOnDelete();
            $table->double('amount', 8, 2);
            $table->enum('payment_method', ['cash', 'gcash', 'credit_card', 'debit_card', 'paypal', 'bank_transfer'])->default('gcash');
            $table->dateTime('payment_date')->nullable(); 
            $table->decimal('total_payment', 8, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
