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
            $table->json('images')->nullable()->after('cooking_tips'); // JSON形式で保存
        });
    }
    
    public function down()
    {
        Schema::table('crops', function (Blueprint $table) {
            $table->dropColumn('images');
        });
    }
};
