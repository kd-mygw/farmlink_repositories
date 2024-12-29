<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // 資材名
            $table->string('category'); // 種苗、農薬、肥料など
            $table->decimal('quantity', 10, 2); // 数量
            $table->string('unit', 10); // 単位（例: kg, L, 袋など）
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
