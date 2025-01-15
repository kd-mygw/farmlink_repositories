<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuantityUnitToPesticidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesticides', function (Blueprint $table) {
            $table->string('quantity_unit')->after('quantity')->nullable()->comment('内容量の単位');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesticides', function (Blueprint $table) {
            $table->dropColumn('quantity_unit');
        });
    }
}
