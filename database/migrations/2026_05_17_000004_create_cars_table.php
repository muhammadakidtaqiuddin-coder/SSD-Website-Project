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

            // Basic Info
            $table->string('name');
            $table->string('brand');
            $table->string('model');
            $table->year('year');
            $table->string('color')->nullable();
            $table->text('description')->nullable();

            // Specs
            $table->string('category');                     // Sedan, SUV, etc.
            $table->enum('transmission', ['Auto', 'Manual']);
            $table->enum('fuel_type', ['Petrol', 'Diesel', 'Electric', 'Hybrid']);
            $table->unsignedTinyInteger('seats')->default(5);
            $table->unsignedInteger('engine_cc')->nullable();
            $table->unsignedInteger('mileage')->nullable();
            $table->json('features')->nullable();           // ["gps","bluetooth",...]

            // Media
            $table->string('image')->nullable();            // storage path

            // Pricing
            $table->decimal('price_per_day', 8, 2);
            $table->decimal('deposit', 8, 2)->default(0);

            // Status
            $table->boolean('is_available')->default(true);
            $table->boolean('is_featured')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
