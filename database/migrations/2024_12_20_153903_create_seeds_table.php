<?php

// database/migrations/xxxx_xx_xx_create_seeds_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeedsTable extends Migration
{
    public function up()
    {
        Schema::create('seeds', function (Blueprint $table) {
            $table->id(); // ID
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade'); // 品目ID
            $table->date('purchase_date'); // 購入日
            $table->decimal('content_volume', 10, 2); // 内容量
            $table->integer('quantity'); // 数量
            $table->date('expiry_date')->nullable(); // 有効期限
            $table->string('lot_number')->nullable(); // ロット番号
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seeds');
    }
}
