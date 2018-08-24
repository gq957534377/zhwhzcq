<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use App\Models\ArticleRelLabel;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $where = [];
        $keys = [];

        $query = Article::where($where);

        if (!empty($request->position_id) && !empty($position = Position::find($request->position_id))) {
            $lableIds = $position->labels->pluck('id')->unique()->toArray();
            $articleIds = ArticleRelLabel::whereIn('label_id', $lableIds)
                ->pluck('article_id')
                ->toArray();
            $articleIds = array_keys(array_count_values($articleIds), count($lableIds));

            $query = $query->whereIn('id', $articleIds);
            $keys[] = $position->name;
        }

        if (!empty($request->title)) {
            $keys[] = $request->title;
            $query = $query->where('title', 'like', '%' . $request->title . '%');
        }

        $query = $query
            ->orderBy('updated_at', 'desc')
            ->orderBy('sort', 'desc');
        $query2 = clone $query;

        $result = $query->paginate(10);

        // 导航
        $labels = Position::where(['stage' => 1, 'nav_show' => 1])->orderBy('sort')->get();

        // 热点排行
        $hotArticles = $query2->orderBy('updated_at', 'desc')->take(4)->get();

        // 精彩推荐
        $pointArticles = $query2->orderBy('updated_at', 'desc')->take(2)->get();

        empty($keys) && $keys[] = '全部';
        return view('frontend.list', [
            'articles' => $result,
            'key' => implode('-', $keys),
            'labels' => $labels,
            'hotArticles' => $hotArticles,
            'pointArticles' => $pointArticles
        ]);
    }

    public function pages(Request $request)
    {
        $where = [];
        $keys = [];

        $query = Article::where($where);

        if (!empty($request->position_id) && !empty($position = Position::find($request->position_id))) {
            $lableIds = $position->labels->pluck('id')->unique()->toArray();
            $articleIds = ArticleRelLabel::whereIn('label_id', $lableIds)
                ->pluck('article_id')
                ->toArray();
            $articleIds = array_keys(array_count_values($articleIds), count($lableIds));

            $query = $query->whereIn('id', $articleIds);
            $keys[] = $position->name;
        }

        if (!empty($request->title)) {
            $query = $query->where('title', 'like', '%' . $request->title . '%');
        }

        $result = $query
            ->orderBy('updated_at', 'desc')
            ->orderBy('sort', 'desc')
            ->paginate(10);
        return response()->json(['StatusCode' => 200, 'ResultData' => $result]);
    }

    public function show(Article $article, Request $request)
    {
        // 导航
        $labels = Position::where(['stage' => 1, 'nav_show' => 1])->orderBy('sort')->get();

        // 热点排行
        $hotArticles = Article::orderBy('updated_at', 'desc')->take(4)->get();

        // 精彩推荐
        $pointArticles = Article::orderBy('updated_at', 'desc')->take(2)->get();

        return view('frontend.info', [
            'article' => $article,
            'labels' => $labels,
            'hotArticles' => $hotArticles,
            'pointArticles' => $pointArticles
        ]);
    }
}
