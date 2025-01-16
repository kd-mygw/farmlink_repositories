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
        Schema::create('records_fertilizers_soils', function (Blueprint $table) {
            $table->id();
            $table->date('date');                        // 使用日
            $table->foreignId('cropping_id')             // 作付ID
                  ->constrained('croppings')
                  ->cascadeOnDelete();
            $table->foreignId('soil_id')                // 床土ID
                  ->constrained('soils')
                  ->cascadeOnDelete();
            $table->foreignId('fertilizer_id')            // 農薬ID
                  ->constrained('fertilizers')
                  ->cascadeOnDelete();
            $table->decimal('usage_amount', 8, 2);       // 使用量
            $table->string('unit');                      // 単位
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records_fertilizers_soils');
    }
};
