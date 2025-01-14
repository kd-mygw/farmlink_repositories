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
        Schema::create('reports', function (Blueprint $table) { // 日付,作業員,作業時間(開始、終了),作業内容,メモ
            
            $table->id();
            $table->date('date');                       // 日付
            $table->unsignedBigInteger('worker_id')
                  ->nullable();                         // 作業員ID
            $table->foreign('worker_id')
                  ->references('id')
                  ->on('workers')
                  ->nullOnDelete();
            $table->time('start_time');                 // 作業時間(開始)
            $table->time('end_time');                   // 作業時間(終了)
            $table->foreignId('task_id')                // 作業内容
                  ->constrained('tasks')
                  ->cascadeOnDelete();
            $table->text('memo')->nullable();           // メモ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report');
    }
};
