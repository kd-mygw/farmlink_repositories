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
        Schema::create('crops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');//作物を登録したユーザーＩＤ
            $table->string('product_name'); //商品名
            $table->string('name'); //品種名
            $table->string('cultivation_method'); //栽培方法
            $table->string('fertilizer_info')->nullable(); //肥料情報
            $table->string('pesticide_info')->nullable();  //農薬情報
            $table->text('description')->nullable(); //作物の説明
            $table->text('cooking_tips')->nullable(); //料理のコツ
            $table->string('image')->nullable(); //画像
            $table->string('video')->nullable(); //動画
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crops');
    }
};
