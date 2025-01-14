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
        Schema::create('memo', function (Blueprint $table) {    // 日付,記述者,（作業員),メモ
            
            $table->id();
            $table->date('date');                       // 日付
            $table->foreignId('worker_id')              // 作業員ID
                   ->nullable()
                   ->constrained('workers')
                   ->nullOnDelete();
            $table->text('memo')                        // メモ
                  ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memo');
    }
};
