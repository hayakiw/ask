<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from', 10)->comment('user, staff');
            $table->bigInteger('user_id')->unsigned()->comment('ユーザーID');
            $table->bigInteger('staff_id')->unsigned()->comment('スタッフID');

            $table->text('subject')->nullable()->comment('件名');
            $table->text('body')->comment('メッセージ');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
