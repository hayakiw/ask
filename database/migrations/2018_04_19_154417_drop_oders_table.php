<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropOdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $t) {
            $t->dropColumn('prefer_at2');
            $t->dropColumn('prefer_at3');
            $t->dropColumn('comment');
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
            $t->datetime('prefer_at2')->nullable()->comment('Šó–]“ú2');
            $t->datetime('prefer_at3')->nullable()->comment('Šó–]“ú3');
            $t->text('comment')->comment('ƒRƒƒ“ƒg');
        });
    }
}
