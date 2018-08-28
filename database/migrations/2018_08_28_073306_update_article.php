<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->unsignedTinyInteger('type')->default(1)->comment('文章类型');
        });
        \App\Models\ArticleForAtlas::where([])->get()->map(function ($item) {
            $articleId = \App\Models\Article::insertGetId([
                'type' => 2,
                'title' => $item->title,
                'source' => $item->source,
                'brief' => $item->brief,
                'url' => $item->url,
                'author' => $item->author,
                'sort' => $item->sort,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ]);

            $labelIds = \App\Models\ArticleHasLabel::where('article_id', $item->id)->pluck('label_id')->unique();

            $labelIds->map(function ($label) use ($articleId) {
                \App\Models\ArticleRelLabel::create([
                    'article_id' => $articleId,
                    'label_id' => $label,
                ]);
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
