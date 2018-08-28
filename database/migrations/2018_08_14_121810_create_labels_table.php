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
//        Schema::create('labels', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name',64)->nullable()->comment('标签名');
//
//            $table->timestamps();
//            $table->softDeletes();
//            $table->comment = '标签表';
//        });
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
