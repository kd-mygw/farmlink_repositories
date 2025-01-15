<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCultivationMethodToCroppingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('croppings', function (Blueprint $table) {
            // 新しいカラムを追加します
            $table->string('cultivation_method')->nullable()->after('color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('croppings', function (Blueprint $table) {
            // ロールバック時にカラムを削除します
            $table->dropColumn('cultivation_method');
        });
    }
}
