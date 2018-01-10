<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //--------------------------------------------------
        //テーブル作成
        //--------------------------------------------------
        //管理者
        Schema::create('admins', function (Blueprint $t) {
            $t->bigIncrements('id');

            $t->string('email');
            $t->string('password', 255);

            $t->rememberToken();

            $t->timestamps();
            $t->softDeletes();
        });

        //ユーザー
        Schema::create('users', function (Blueprint $t) {
            $t->bigIncrements('id');

            $t->string('email');
            $t->string('password', 255);

            $t->rememberToken();

            $t->timestamps();
            $t->softDeletes();
        });

        //サービス
        Schema::create('items', function (Blueprint $t) {
            $t->bigIncrements('id');

            $t->string('title', 255);

            $t->timestamps();
            $t->softDeletes();
        });

        //カテゴリ
        Schema::create('categories', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->bigInteger('parent_id')->unsigned()->nullable()->comment('親カテゴリID');
            $t->string('name')->comment('カテゴリ名称');

            $t->timestamps();
            $t->softDeletes();
        });

        //タグ
        Schema::create('tags', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->string('name')->comment('タグ名称');

            $t->timestamps();
            $t->softDeletes();
        });

        //お知らせ
        Schema::create('notices', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->string('title')->comment('タイトル');
            $t->text('content')->comment('内容');
            $t->datetime('start_at')->comment('掲載 開始日時');
            $t->datetime('end_at')->comment('掲載 終了日時');

            $t->timestamps();
            $t->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //--------------------------------------------------
        //テーブル削除
        //--------------------------------------------------
        Schema::dropIfExists('admins');
        Schema::dropIfExists('users');
        Schema::dropIfExists('items');
    }
}
