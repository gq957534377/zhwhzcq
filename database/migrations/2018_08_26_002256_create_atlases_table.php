<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtlasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atlases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brief')->nullable()->comment('该图片简述');
            $table->string('banner')->nullable()->comment('文件名');
            $table->integer('sort')->nullable()->comment('排序');
            $table->string('url')->nullable()->comment('所跳转的链接');

            $table->timestamps();
            $table->comment = '文章图集信息表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atlases');
    }
}
