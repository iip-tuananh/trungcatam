<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThuonghieuIdToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('products', function (Blueprint $table) {
        $table->unsignedBigInteger('thuonghieu_id')->nullable()->after('id');
        $table->foreign('thuonghieu_id')->references('id')->on('partners')->onDelete('set null');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('products', function (Blueprint $table) {
        $table->dropForeign(['thuonghieu_id']);
        $table->dropColumn('thuonghieu_id');
    });
    }
}
