<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateArticleRelLabels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_rel_labels', function (Blueprint $table) {
            $table->unsignedBigInteger('model_id')->nullable();
            $table->string('model_type', 63)->nullable();
        });
        \App\Models\ArticleRelLabel::where([])->get()->map(function ($item) {
            $item->model_id = $item->article_id;
            $item->model_type = 'App\Models\Article';
            $item->save();
        });
        Schema::table('article_rel_labels', function (Blueprint $table) {
            $table->dropColumn('article_id');
        });
        \App\Models\ArticleHasLabel::where([])->get()->map(function ($item) {
            \App\Models\ArticleRelLabel::create([
                'model_id'=>$item->article_id,
                'label_id'=>$item->label_id,
                'model_type'=>'App\Models\ArticleForAtlas'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_building_info', function (Blueprint $table) {
            $table->dropColumn('model_id');
            $table->dropColumn('model_type');
            $table->unsignedBigInteger('article_id')->nullable();
        });
    }
}
