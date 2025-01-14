<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pesticide_usage_fields', function (Blueprint $table) {
            $table->id();
            $table->date('date');                        // 使用日
            $table->foreignId('cropping_id')             // 作付ID
                  ->constrained('croppings')
                  ->cascadeOnDelete();
            $table->foreignId('field_id')                // 圃場ID
                  ->constrained('fields')
                  ->cascadeOnDelete();
            $table->foreignId('pesticide_id')            // 農薬ID
                  ->constrained('pesticides')
                  ->cascadeOnDelete();
            $table->decimal('dilution', 8, 2);           // 希釈倍数
            $table->decimal('usage_amount', 8, 2);       // 使用量
            $table->foreignId('worker_id')               // 作業員ID
                  ->nullable()
                  ->constrained('workers')
                  ->nullOnDelete();
            $table->foreignId('equipment_id')              // 使用機械ID
                  ->nullable()
                  ->constrained('equipment')
                  ->nullOnDelete();
            $table->text('memo')->nullable();            // メモ
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesticide_usage_fields');
    }
};
