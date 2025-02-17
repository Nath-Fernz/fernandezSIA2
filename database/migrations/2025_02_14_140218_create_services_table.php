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
        Schema::create('services', function (Blueprint $table) {
            $table->id('service_id'); // Primary Key
            $table->string('service_name', 50);
            $table->string('description');
            $table->unsignedBigInteger('category_id'); // Foreign Key Column
            $table->decimal('price', 8, 2);
            $table->time('duration');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        
            // Foreign Key Reference (Must match primary key in categories)
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
