<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleRelLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_rel_labels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('label_id')->comment('标签id');
            $table->integer('article_id')->comment('文章id');
            $table->timestamps();
            $table->comment = '文章标签关联表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_rel_labels');
    }
}
