<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');           // sedan, SUV, sports, etc.
            $table->string('brand');
            $table->integer('year');
            $table->decimal('price_per_day', 10, 2);
            $table->integer('seats');
            $table->string('transmission');   // auto, manual
            $table->string('fuel_type');      // petrol, diesel, electric
            $table->string('image')->nullable();
            $table->enum('status', ['available', 'unavailable'])->default('available');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
