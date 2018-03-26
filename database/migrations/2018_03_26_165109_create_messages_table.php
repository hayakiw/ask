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
            $table->bigInteger('user_id')->unsigned()->comment('���[�U�[ID');
            $table->bigInteger('staff_id')->unsigned()->comment('�X�^�b�tID');

            $table->text('subject')->nullable()->comment('����');
            $table->text('body')->comment('���b�Z�[�W');

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
