<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleRelLabel;
use App\Models\Banner;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 获取轮播图
        $banners = Banner::orderBy('sort', 'desc')
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();

        // 新闻要点
        $newsPoints = $this->articlesByChannelId(12, 4);
        // 外宣媒体
        // 实时要闻
        // 本月焦点
        // 文化投资
        return view('frontend.index');
    }

    private function articlesByChannelId($labelId, $num)
    {
        $articleIds = ArticleRelLabel::where('label_id', $labelId)
            ->pluck('article_id')
            ->toArray();

        return Article::whereIn('id', $articleIds)
            ->orderBy('sort', 'desc')
            ->orderBy('updated_at', 'desc')
            ->take($num)
            ->get();
    }
}
