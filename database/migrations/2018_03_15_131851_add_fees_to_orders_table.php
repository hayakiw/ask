<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFeesToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $t) {
            $t->bigInteger('fee')->unsigned()->nullable()->comment('Žè”—¿')->after('status');
            $t->bigInteger('total_price')->unsigned()->nullable()->comment('‡Œv‹àŠz')->after('fee');
            $t->datetime('payment_at')->nullable()->comment('Žx•¥“úŽž')->after('total_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $t) {
            $t->dropColumn('fee');
            $t->dropColumn('total_price');
            $t->dropColumn('payment_at');
        });
    }
}
