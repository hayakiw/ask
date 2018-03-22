<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned()->comment('���[�U�[ID');
            $table->bigInteger('staff_id')->unsigned()->comment('�X�^�b�tID');

            $table->tinyInteger('rate')->unsigned()->comment('�X�^�b�tID');
            $table->text('comment')->comment('�R�����g');

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
        Schema::dropIfExists('reviews');
    }
}
