<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('crops', function (Blueprint $table) {
            $table->string('qr_code_path')->nullable()->after('video'); // `qr_code_path` カラムを追加
        });
    }
    
    public function down()
    {
        Schema::table('crops', function (Blueprint $table) {
            $table->dropColumn('qr_code_path'); // ロールバック時にカラムを削除
        });
    }
};
