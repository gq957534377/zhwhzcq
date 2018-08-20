<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',125)->nullable()->comment('标题');
            $table->string('file')->nullable()->comment('文件名');
            $table->integer('sort')->nullable()->comment('排序');
            $table->string('url')->nullable()->comment('所跳转的链接');

            $table->timestamps();
            $table->softDeletes();
            $table->comment = '轮播图信息表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
