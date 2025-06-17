<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKmToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->longText('km')->nullable()->after('home_status');
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
        $table->dropColumn('km');
    });
}
}
