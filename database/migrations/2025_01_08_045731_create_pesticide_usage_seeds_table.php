<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pesticide_usage_seeds', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('cropping_id')
                  ->constrained('croppings')
                  ->cascadeOnDelete();
            $table->foreignId('seed_id')
                  ->constrained('seeds')
                  ->cascadeOnDelete();
            $table->foreignId('pesticide_id')
                  ->constrained('pesticides')
                  ->cascadeOnDelete();
            $table->decimal('dilution', 8, 2);
            $table->decimal('usage_amount', 8, 2);
            $table->foreignId('worker_id')
                  ->nullable()
                  ->constrained('workers')
                  ->nullOnDelete();
            $table->foreignId('equipment_id')
                  ->nullable()
                  ->constrained('equipment')
                  ->nullOnDelete();
            $table->text('memo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesticide_usage_seeds');
    }
};
