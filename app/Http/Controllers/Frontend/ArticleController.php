<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use App\Models\ArticleRelLabel;
use App\Models\Label;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $where = [];
        $keys = [];

        $query = Article::where($where);

        if (!empty($request->label_id)) {
            $articleIds = ArticleRelLabel::where('label_id', $request->label_id)
                ->pluck('article_id')
                ->toArray();

            $query = $query->whereIn('id', $articleIds);
            $label = Label::find($request->label_id);
            !empty($label) && $keys[] = $label->name;
        }

        if (!empty($request->title)) {
            $query = $query->where('title', 'like', '%' . $request->title . '%');
        }

        $result = $query
            ->orderBy('updated_at', 'desc')
            ->orderBy('sort', 'desc')
            ->paginate(15);
        return view('frontend.list', ['articles' => $result, 'key' => implode('-', $keys)]);
    }

    public function pages(Request $request)
    {
        $where = [];
        $keys = [];

        $query = Article::where($where);

        if (!empty($request->label_id)) {
            $articleIds = ArticleRelLabel::where('label_id', $request->label_id)
                ->pluck('article_id')
                ->toArray();

            $query = $query->whereIn('id', $articleIds);
            $label = Label::find($request->label_id);
            !empty($label) && $keys[] = $label->name;
        }

        if (!empty($request->title)) {
            $query = $query->where('title', 'like', '%' . $request->title . '%');
        }

        $result = $query
            ->orderBy('updated_at', 'desc')
            ->orderBy('sort', 'desc')
            ->paginate(15);
        return response()->json(['StatusCode' => 200, 'ResultData' => $result]);
    }

    public function show(Article $article, Request $request)
    {
        return view('frontend.info',['article'=>$article]);
    }
}
