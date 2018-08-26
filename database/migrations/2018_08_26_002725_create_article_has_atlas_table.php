<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleHasAtlasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_has_atlas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('atlas_id')->comment('图集id');
            $table->integer('article_id')->comment('图集文章id');
            $table->timestamps();
            $table->comment = '文章图集关联表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_has_atlas');
    }
}
