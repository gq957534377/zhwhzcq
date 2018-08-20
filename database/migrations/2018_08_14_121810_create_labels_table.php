<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Jialeo\LaravelSchemaExtend\Schema;


class CreateLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',64)->nullable()->comment('标签名');
            $table->tinyInteger('stage')->nullable()->comment('所属级别');
            $table->integer('parent_id')->nullable()->comment('父级id');
            $table->tinyInteger('nav_show')->default(2)->comment('是否展示在导航 1：展示 2：不展示');

            $table->timestamps();
            $table->softDeletes();
            $table->comment = '标签表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labels');
    }
}
