<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Jialeo\LaravelSchemaExtend\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',125)->nullable()->comment('标题');
            $table->string('source',32)->nullable()->comment('来源');
            $table->string('banner',125)->nullable()->comment('缩略图');
            $table->string('brief',255)->nullable()->comment('简述');
            $table->string('url',255)->nullable()->comment('文章链接');
            $table->string('author',64)->nullable()->comment('编辑');
            $table->integer('sort')->default(0)->comment('排序');
            $table->longText('content')->nullable()->comment('内容');

            $table->timestamps();
            $table->softDeletes();
            $table->comment = '文章表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
